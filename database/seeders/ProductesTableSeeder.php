<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productes = ['laptop','phone'];

        foreach($productes as $product){
            Product::create([
                'name'          =>  $product,
                'category_id'   =>  1,
                'purches_price' =>  3500,
                'sale_price'    =>  5000,
                'stock'         =>  10
            ]);
        }
    }
}
