<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('iranianNationalCode', function ($attribute, $value, $parameters, $validator) {
           return $this->isValidIranianNationalCode($value);
        });

        /*        $this->app->bind('path.public', function() {
            return base_path().'/public_html';
        });*/
    }

    protected function isValidIranianNationalCode($input) {
        # check if input has 10 digits that all of them are not equal
        if (!preg_match("/^\d{10}$/", $input)) {
            return false;
        }

        $check = (int) $input[9];
        $sum = array_sum(array_map(function ($x) use ($input) {
                return ((int) $input[$x]) * (10 - $x);
            }, range(0, 8))) % 11;

        return ($sum < 2 && $check == $sum) || ($sum >= 2 && $check + $sum == 11);
    }

}
