<?php

namespace App\Providers;

use App\Models\Info;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewFooterProvider extends ServiceProvider
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
        View::share('pages', Info::get());
    }
}
