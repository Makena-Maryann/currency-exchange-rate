<?php

namespace MakenaMaryann\CurrencyExchangeRate\Providers;

use Illuminate\Support\ServiceProvider;

class CurrencyExchangeProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    }
}
