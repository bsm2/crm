<?php

namespace App\Providers;

use App\Mail\CompanyEntered;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        Company::created(function($company)
        {
            Mail::to($company)->send(new CompanyEntered($company));
        });
    }
}
