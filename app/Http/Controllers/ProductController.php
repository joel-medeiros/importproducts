<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Jobs\ImportBatchProducts;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);

        return view('products.index', compact('products'));
    }

    /**
     * Store a resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $path = $request->file('import-product')->getRealPath();

        $data = Excel::load($path, function($reader) {})->sheet(0);

        $categoryId = $data->getCell('B1')->getValue();

        if(!Category::exists($categoryId)){
            $category = new Category();
            $category->name = $categoryId;
            $category->id = $categoryId;
            $category->save();
        }

        $data->removeRow(1, 2);

        if(!empty($data) && $data->rows()){

            $products = [];
            $heading = [];
            foreach ($data->rows()->toArray() as $key => $value) {

                if($key == 0) {
                    $heading = array_filter($value);
                    continue;
                }

                $product = array_slice($value, 0, count($heading));
                $data = array_combine( array_values($heading), $product);
                $data['category_id'] = $categoryId;

                $products[] = $data;
            }

            $this->dispatch(new ImportBatchProducts($products));

            return view('products.import', compact('products'));
        }
    }



    public function show($id)
    {
        $product = Product::find($id);

        if(!$product){
            return redirect('products/')
                ->with('errors', trans('errors.notfound', ['Item' => trans_choice('products.title', 1)]));
        }

        $categories = Category::all()->pluck('name', 'id');

        return view('products.show', compact('product', 'categories'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if(!$product){
            return redirect('products/')
                ->with('errors', trans('errors.notfound', ['Item' => trans_choice('products.title', 1)]));
        }

        $categories = Category::all()->pluck('name', 'id');

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);

        if(is_null($product)){
            return new JsonResponse(
                [
                    'updated' => false,
                    'message' => trans('errors.notfound', ['Item' => trans_choice('products.title', 1)])
                ],
                404);
        }

        $data = $request->all();
        $name = $request->get('name');

        $product->fill($data)->save();

        return new JsonResponse(
            [
                'updated' => true,
                'message' => trans('products.responses.edit.success', ['item' => $name])
            ],
            200
        );

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product->active){
            return new JsonResponse([
                'updated' => false,
                'message' => trans('products.responses.toggle.fail', [
                    'status' => trans('products.labels.inactive'),
                    'item' => $product->name
                ])
            ], 404);
        }

        $product->active = 0;
        $product->save();

        return new JsonResponse([
            'updated' => true,
            'message' => trans('products.responses.toggle.success', [
                'status' => trans('products.labels.inactive'),
                'item' => $product->name
            ])
        ], 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function active($id)
    {
        $product = Product::find($id);

        if($product->active){
            return new JsonResponse([
                'updated' => false,
                'message' => trans('products.responses.toggle.fail', [
                    'status' => trans('products.labels.active'),
                    'item' => $product->name ])
            ], 404);
        }

        $product->active = 1;
        $product->save();

        return new JsonResponse([
            'updated' => true,
            'message' => trans('products.responses.toggle.success',
                [
                    'status' => trans('products.labels.active'),
                    'item' => $product->name ])
        ], 200);
    }
}
