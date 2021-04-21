<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\PostRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    }
}
