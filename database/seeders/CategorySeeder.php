<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name' => 'Food',
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Fruit',
            'parent_id' => 1
        ]);

        DB::table('categories')->insert([
            'name' => 'Girl',
        ]);

    }
}
