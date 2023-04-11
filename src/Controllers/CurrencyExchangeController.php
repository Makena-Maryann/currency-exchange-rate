<?php

namespace MakenaMaryann\CurrencyExchangeRate\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use MakenaMaryann\CurrencyExchangeRate\CurrencyConverter;

class CurrencyExchangeController
{
    public function __invoke(Request $request, CurrencyConverter $converter): JsonResponse
    {
        $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string|size:3',
        ]);

        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $convertedAmount = $converter->convertCurrency($amount, $currency);

        return new JsonResponse([
            'success' => true,
            'data' => [
                'amount' => $amount,
                'currency' => $currency,
                'converted' => $convertedAmount,
            ],
            'error' => null,
            'errors' => [],
            'extra' => []
        ], 200);
    }
}
