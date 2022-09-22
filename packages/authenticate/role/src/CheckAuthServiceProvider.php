<?php

namespace Authenticate\Role;

use Illuminate\Support\Facades\Route ;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

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
    public function boot(Router $router)  
    {
        // //    
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'role');
      
        $router->middlewareGroup('web', array(
            \Authenticate\Role\Http\Middleware\CheckAuth::class,
        )
    );
   
    }
}
