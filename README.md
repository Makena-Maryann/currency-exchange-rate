# Currency Exchange Rate Package

This Laravel package exposes an API endpoint that calculates the exchange rate for a given amount and currency.

## Installation

To install this package, run the following command:

composer require your-vendor/currency-exchange-rate

## Configuration

To use this package, you need to configure it with your API credentials. You can do this by publishing the configuration file using the following command:

php artisan vendor:publish --provider="YourVendor\CurrencyExchangeRate\CurrencyExchangeRateServiceProvider" --tag="config"

## Usage

To use this package, you
