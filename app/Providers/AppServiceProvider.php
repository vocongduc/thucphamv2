<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

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
        if(! $this->app->runningInConsole()) {
            View::share('partner', DB::table('partner')->where('status', 1)->get());
            View::share('follow',DB::table('follow')->where('status',1)->get());
            $mess = DB::table('contacts')->count();
            view()->share('mess', $mess);
            $contact = DB::table('contacts')->orderBy('id', 'DESC')->get();
            view()->share('contact', $contact);
            $contacts = DB::table('change_contacts')->orderBy('id', 'DESC')->limit(1)->get();
            view()->share('contacts', $contacts);
            view()->share('cate_products', DB::table('cate_products_lv1')->orderBy('id', 'DESC')->get());
        }
    }
}
