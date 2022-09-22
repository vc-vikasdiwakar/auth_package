<?php

namespace Authenticate\Role;

use Illuminate\Support\Facades\Route ;
use Illuminate\Support\ServiceProvider;

class CheckAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()  
    {
        // //    
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'role');
      
   
    }
}
