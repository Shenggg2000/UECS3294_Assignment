<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Models\Product;
use App\Policies\ProductPolicy;
use App\Models\ProductCategory;
use App\Policies\ProductCategotyPolicy;

class AuthServiceProvider extends ServiceProvider {
  /**
   * The policy mappings for the application.
   *
   * @var array<class-string, class-string>
   */

  protected $policies = [
    User::class => UserPolicy::class,
    Product::class => ProductPolicy::class,
    ProductCategory::class => ProductCategoryPolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot() {
    $this->registerPolicies();

    /* define an administrator user role */
    Gate::define('isAdmin', function ($user) {
      return $user->role == 'admin';
    });

    /* define a user role */
    Gate::define('isUser', function ($user) {
      return $user->role == 'user';
    });
  }
}
