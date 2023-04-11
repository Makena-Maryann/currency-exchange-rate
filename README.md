# Currency Exchange Rate Package

This Laravel package exposes an API endpoint that calculates the exchange rate for a given amount and currency.

## Installation

By default, Composer pulls in packages from Packagist so you’ll have to make a slight adjustment to your project's `composer.json` file. Open the file and update include the following array somewhere in the object:

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Makena-Maryann/currency-exchange-rate"
        }
    ]

Now composer will also look into this repository for any installable package. Execute the following command to install the package:

    composer require makena-maryann/currency-exchange-rate

## Usage

To use this package, you need to make a `GET` request to the following endpoint:

    /api/v1/currency-exchange

The endpoint accepts the following parameters:

-   `amount` - The amount to be converted
-   `currency` - The currency to be converted to

## Testing

To run the tests, run the following command:

    ./vendor/bin/phpunit tests/

## Known Issues

    Documentation is not yet available.

    Open AI comments have been added to the code but the docs can not be generated yet. This is a known issue and will be fixed in the next release.

    In the meantime, you can use a provider like [Postman](https://www.postman.com/) to test the API.

## Support and contact details

Incase of any issues drop me an email at maryann.makena00@gmail.com

## License

The Pet Shop Project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Copyright (c) 2023 **Maryann Makena**
