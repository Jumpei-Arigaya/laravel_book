<?php

namespace App\Providers;

use App\Http\Validators\HelloValidator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $validator = $this->app['validator'];
        // $validator->resolver(function ($translator, $data, $rules, $message) {
        //     return new HelloValidator($translator, $data, $rules, $message);
        // });

        Validator::extend('hello', function ($attribute, $value, $parameters, $validator) {
            return $value % 2 == 0;
        });

        View::composer(
            'hello.index',
            'App\Http\Composers\HelloComposer'
        );
    }
}
