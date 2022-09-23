<?php

use Authenticate\Role\Http\Controllers\ValidUser;
use Authenticate\Role\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

Route::get('/block-site',[ValidUser::class,'index'])->name('block-site');
Route::any('/post-data',[ValidUser::class,'postData'])->name('post-data');

Route::middleware([CheckAuth::class])->group(function(){
	Route::get('/checkAuth',function(){
        return "Authenticated";
    });
    Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

});

