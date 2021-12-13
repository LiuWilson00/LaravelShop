<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // [
        //     [
        //         'id' => 1,
        //         'name' => 'apple',
        //         'price' => 30,
        //         'imgUrl' => asset('images/products/apple_1.jpg')
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'orange',
        //         'price' => 45,
        //         'imgUrl' => asset('images/products/orange_1.jpg')
        //     ]
        // ];
        DB::table('products')->insert([
            'name' => 'apple',
            'price' => 30,
            'image_url' => '/images/products/apple_1.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'apple',
            'price' => 30,
            'image_url' => '/images/products/orange_1.jpg',
        ]);
    }
}
