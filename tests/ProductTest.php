<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Product;
use App\Category;

class ProductTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    public function testUpdate()
    {
        $product = factory(Product::class)->create();

        $this->json('PUT', '/products/' . $product->id . '/save', [
            'name' => 'Pente',
            'category_id' => $product->category_id,
            'description' => 'Para pentear os cabelos',
            'price'       => 10.0
        ])
            ->seeJson(['updated' => true]);
    }

    public function testInactive()
    {
        $product = factory(Product::class)->create();

        $product->active = true;
        $product->save();

        $this->json('DELETE', '/products/' . $product->id . '/inactive')
            ->seeJson(['updated' => true]);

    }

    public function testActive()
    {
        $product = factory(Product::class)->create();

        $product->active = false;
        $product->save();

        $this->json('PUT', '/products/' . $product->id . '/active')
            ->seeJson(['updated' => true]);
    }
}
