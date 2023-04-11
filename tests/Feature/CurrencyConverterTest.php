<?php

namespace MakenaMaryann\CurrencyExchangeRate\Tests\Unit;

use Illuminate\Support\Facades\Http;
use MakenaMaryann\CurrencyExchangeRate\Tests\TestCase;
use MakenaMaryann\CurrencyExchangeRate\CurrencyConverter;

class CurrencyConverterTest extends TestCase
{
    public function test_it_can_successfully_convert_currency()
    {
        $response = $this->getJson('api/v1/currency-exchange?amount=100&currency=USD');

        $responseData = json_decode($response->getContent(), true);

        $convertedAmount = $responseData['data']['converted_amount'];

        $this->assertEquals(109.15, $convertedAmount);
    }

    public function test_it_throws_a_validation_exception_when_the_amount_is_not_provided()
    {
        $response = $this->getJson('api/v1/currency-exchange?currency=USD');

        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals('The amount field is required.', $responseData['errors']['amount'][0]);
    }

    public function test_it_throws_a_validation_exception_when_the_currency_is_not_provided()
    {
        $response = $this->getJson('api/v1/currency-exchange?amount=100');

        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals('The currency field is required.', $responseData['errors']['currency'][0]);
    }

    public function test_it_throws_an_exception_when_the_currency_is_not_found()
    {
        $response = $this->getJson('api/v1/currency-exchange?amount=100&currency=KES');

        $response->assertJsonStructure([
            'message',
        ]);
    }
}
