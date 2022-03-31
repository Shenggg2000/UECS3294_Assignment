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
    for ($i = 0; $i < 36; $i++) {
      DB::table('products')->insert([
        'name' => Str::random(15),
        'desc' => Str::random(15),
        'img' => '',
        'SKU' => Str::random(15),
        'product_category_id' => random_int(1, 12),
        'price' => 100,
      ]);
    }
  }
}
