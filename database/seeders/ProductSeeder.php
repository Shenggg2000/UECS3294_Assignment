<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('products')->insert([
      'name' => "Baking Ingredients A",
      'desc' => "This Baking Ingredients",
      'SKU' => Str::random(15),
      'product_category_id' => 1,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Baking Ingredients B",
      'desc' => "This Baking Ingredients",
      'SKU' => Str::random(15),
      'product_category_id' => 1,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Biscuits & Cakes A",
      'desc' => "This Biscuits & Cakes",
      'SKU' => Str::random(15),
      'product_category_id' => 2,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Biscuits & Cakes B",
      'desc' => "This Biscuits & Cakes",
      'SKU' => Str::random(15),
      'product_category_id' => 2,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Canned Food A",
      'desc' => "This Canned Food",
      'SKU' => Str::random(15),
      'product_category_id' => 3,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Canned Food B",
      'desc' => "This Canned Food",
      'SKU' => Str::random(15),
      'product_category_id' => 3,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Cereals A",
      'desc' => "This Cereals",
      'SKU' => Str::random(15),
      'product_category_id' => 4,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Cereals B",
      'desc' => "This Cereals",
      'SKU' => Str::random(15),
      'product_category_id' => 4,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Chocolates, Sweets & Jelly A",
      'desc' => "This Chocolates, Sweets & Jelly",
      'SKU' => Str::random(15),
      'product_category_id' => 5,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Chocolates, Sweets & Jelly B",
      'desc' => "This Chocolates, Sweets & Jelly",
      'SKU' => Str::random(15),
      'product_category_id' => 5,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Commodities A",
      'desc' => "This Commodities",
      'SKU' => Str::random(15),
      'product_category_id' => 6,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Commodities B",
      'desc' => "This Commodities",
      'SKU' => Str::random(15),
      'product_category_id' => 6,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Jam, Spreads & Honey A",
      'desc' => "This Jam, Spreads & Honey",
      'SKU' => Str::random(15),
      'product_category_id' => 7,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Jam, Spreads & Honey B",
      'desc' => "This Jam, Spreads & Honey",
      'SKU' => Str::random(15),
      'product_category_id' => 7,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Organic Food A",
      'desc' => "This Organic Food",
      'SKU' => Str::random(15),
      'product_category_id' => 8,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Organic Food B",
      'desc' => "This Organic Food",
      'SKU' => Str::random(15),
      'product_category_id' => 8,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Pasta & Instant Food A",
      'desc' => "This Pasta & Instant Food",
      'SKU' => Str::random(15),
      'product_category_id' => 9,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Pasta & Instant Food B",
      'desc' => "This Pasta & Instant Food",
      'SKU' => Str::random(15),
      'product_category_id' => 9,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Sauce, Spice & Seasoning A",
      'desc' => "This Sauce, Spice & Seasoning",
      'SKU' => Str::random(15),
      'product_category_id' => 10,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Sauce, Spice & Seasoning B",
      'desc' => "This Sauce, Spice & Seasoning",
      'SKU' => Str::random(15),
      'product_category_id' => 10,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Snacks A",
      'desc' => "This Snacks",
      'SKU' => Str::random(15),
      'product_category_id' => 11,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Snacks B",
      'desc' => "This Snacks",
      'SKU' => Str::random(15),
      'product_category_id' => 11,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Sundry A",
      'desc' => "This Sundry",
      'SKU' => Str::random(15),
      'product_category_id' => 12,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
    DB::table('products')->insert([
      'name' => "Sundry B",
      'desc' => "This Sundry",
      'SKU' => Str::random(15),
      'product_category_id' => 12,
      'stock' => random_int(1, 10),
      'price' => random_int(1, 100),
    ]);
  }
}
