<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cart\CartItem;
use App\Cart\EasyCart;
use DB;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      URL::forceScheme('https');
      if(!session('cart'))
      {
          session(['cart' => new EasyCart()]);
      }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
