<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Response::macro('success', function ($data = [], $statusCode = 200) {
            return Response::json(
                $data,
                $statusCode
            );
        });

        Response::macro('error', function ($message = '', $statusCode = 400) {
            return Response::json(
                $message,
                $statusCode
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
