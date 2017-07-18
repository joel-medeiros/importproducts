<?php

namespace App\Jobs;

use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportBatchProducts implements ShouldQueue
{
    use  InteractsWithQueue, Queueable, SerializesModels;

    protected $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->products as $data) {
            $product = Product::where('lm', $data['lm'])->first();

            if(!$product) {
                $product = new Product();
            }

            $product->fill($data);
            $product->save();
        }
    }
}
