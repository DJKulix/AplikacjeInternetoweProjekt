<?php

namespace App\Providers;

use App\Models\Equipment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Validator::extend('quantityLimit', function ($attribute, $value, $parameters){
//            $quantity = Equipment::where('id', '=', $value)->get('quantity');
//           return $q
//        });
    }
}
