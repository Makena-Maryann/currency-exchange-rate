<?php

namespace MakenaMaryann\CurrencyExchangeRate\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use MakenaMaryann\CurrencyExchangeRate\Providers\CurrencyExchangeProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            CurrencyExchangeProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Configure environment settings here
    }
}
