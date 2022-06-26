<?php

namespace App\Providers;

use App\Providers\Services\FileInterface;
use App\Providers\Services\FileService;
use App\Providers\Services\UserInterface;
use App\Providers\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserInterface::class,function (){
            return new UserService(new FileService());
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
