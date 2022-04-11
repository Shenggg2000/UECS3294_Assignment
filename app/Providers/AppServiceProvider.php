<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\Sanctum;
use Illuminate\Pagination\Paginator;
use App\Models\ProductCategory;

class AppServiceProvider extends ServiceProvider {
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    Sanctum::ignoreMigrations();
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    Paginator::useTailwind();
    Schema::defaultStringLength(191);

    view()->share('categories', ProductCategory::all());
  }
}
