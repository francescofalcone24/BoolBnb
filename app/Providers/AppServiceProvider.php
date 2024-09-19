<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'yz8kqy5b4s9p34y4',
            'publicKey' => 'wyc972ft929h3vwc',
            'privateKey' => '159ac0e7bdcfb9af1a24d85bacdbcd8d'
        ]); 
    }
}
