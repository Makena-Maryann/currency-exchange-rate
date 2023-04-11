<?php

namespace MakenaMaryann\CurrencyExchangeRate;

use Illuminate\Support\Facades\Http;

class CurrencyConverter
{
    public function convertCurrency(float $amount, string $currency): ?float
    {
        $response = Http::get('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

        if ($response->failed()) {
            return response()->json(['message' => 'Failed to fetch exchange rates from the API.'], 500);
        }

        $xml = simplexml_load_string($response->body());
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        $rates = $array['Cube']['Cube']['Cube'];
        $rate = 0;

        foreach ($rates as $r) {
            if ($r['@attributes']['currency'] == $currency) {
                $rate = $r['@attributes']['rate'];
            }
        }

        if ($rate === 0) {
            return response()->json(['message' => "Exchange rate not found for currency '$currency'."], 404);
        }

        $convertedAmount = $amount * $rate;

        $convertedAmount = round($convertedAmount, 2);

        return $convertedAmount;
    }
}
