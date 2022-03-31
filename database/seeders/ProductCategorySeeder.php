<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
          'name' => 'Baking Ingredients'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Biscuits & Cakes'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Canned Food'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Cereals'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Chocolates, Sweets & Jelly'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Commodities'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Jam, Spreads & Honey'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Organic Food'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Pasta & Instant Food'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Sauce, Spice & Seasoning'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Snacks'
        ]);
        DB::table('product_categories')->insert([
          'name' => 'Sundry'
        ]);
    }
}
