<?php

use Illuminate\Support\Facades\Route;
use MakenaMaryann\CurrencyExchangeRate\Controllers\CurrencyExchangeController;

Route::get('/api/v1/currency-exchange', CurrencyExchangeController::class);
