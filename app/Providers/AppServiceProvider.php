<?php

namespace App\Providers;
use View;
use App\Empresa;
use Illuminate\Support\ServiceProvider;

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
        $razon = implode(', ',Empresa::pluck('razon_social')->toArray());
        $logo = implode(', ',Empresa::pluck('logo')->toArray());
        View::share('varRazonSocial', $razon);
        View::share('varLogo', $logo);
    }
}
