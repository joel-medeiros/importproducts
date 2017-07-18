<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Jobs\ImportBatchProducts;

class ImportProductTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testImport()
    {
        $this->expectsJobs(App\Jobs\ImportBatchProducts::class);

        $faker = \Faker\Factory::create();

        $category = factory(App\Category::class)->create();

        $products = [
            [
                'lm' => $faker->numberBetween(1, 10000),
                'name' => $faker->word,
                'category_id' => $category->id,
                'free_shipping' => $faker->boolean(),
                'description' => $faker->sentence(10),
                'price' => $faker->randomFloat(2, 10),
                'active' => $faker->boolean()
            ]
        ];

        $job = new ImportBatchProducts($products);

        app('Illuminate\Contracts\Bus\Dispatcher')->dispatch($job);


    }
}
