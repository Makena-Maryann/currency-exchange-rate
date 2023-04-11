<?php

namespace MakenaMaryann\CurrencyExchangeRate;

use Illuminate\Support\Facades\Http;

class CurrencyConverter
{
    public function convertCurrency(float $amount, string $currency): ?float
    {
        $response = Http::get('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

        if ($response->failed()) {
            throw new \Exception('Failed to fetch exchange rates from the API.');
        }

        $xml = simplexml_load_string($response->body());
        $namespaces = $xml->getNamespaces(true);
        $rates = $xml->xpath('//gesmes:Envelope/gv:Cube/gv:Cube[@time]/gv:Cube[@currency]');

        $exchangeRate = null;
        foreach ($rates as $rate) {
            if ((string) $rate['currency'] === $currency) {
                $exchangeRate = (float) $rate['rate'];
                break;
            }
        }

        if ($exchangeRate === null) {
            throw new \Exception("Exchange rate not found for currency '$currency'.");
        }

        $convertedAmount = $amount * $exchangeRate;

        return $convertedAmount;
        // $response = Http::get(config('exchange-rate.api_url'));
        // $xml = simplexml_load_string($response->body());
        // $json = json_encode($xml);
        // $array = json_decode($json, TRUE);
        // $rates = $array['Cube']['Cube']['Cube'];
        // $rate = 0;
        // foreach ($rates as $r) {
        //     if ($r['@attributes']['currency'] == $currency) {
        //         $rate = $r['@attributes']['rate'];
        //     }
        // }
        // $converted = $amount * $rate;
        // return [
        //     'amount' => $amount,
        //     'currency' => $currency,
        //     'converted' => $converted,
        // ];
    }
}
