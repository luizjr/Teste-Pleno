<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;

use Illuminate\Pagination\Paginator;

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
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);

        Route::resourceVerbs([
            'index' => 'listar',
            'create' => 'criar',
            'store' => 'salvar',
            'edit' => 'editar',
            'show' => 'ver',
            'update' => 'atualizar',
            'destroy' => 'excluir',
        ]);

        Paginator::defaultView('layouts.pagination.bootstrap-4');
    }
}
