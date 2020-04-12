<?php

use App\Product;
use App\Category;
use App\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 5)->create()->each(function ($category) {
            $products = factory(Product::class, 20)->make(); // make guarda los productos pero no los crea en bdd
            $category->products()->saveMany($products);// por cada categoria crear 20 productos con esa categoria

            $products->each(function($p) {
                $images = factory(ProductImage::class, 5)->make();
                $p->images()->saveMany($images); // por cada productos crear 5 iamgenes con ese producto
            });

        });
    }
}



















