<?php

namespace MakenaMaryann\CurrencyExchangeRate\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use MakenaMaryann\CurrencyExchangeRate\CurrencyConverter;

class CurrencyExchangeController
{
    /**
     * @OA\Get(
     *     path="/api/v1/currency-exchange",
     *     operationId="convertCurrency",
     *     summary="Convert EUR amount to another currency",
     *     tags={"Currency"},
     *     @OA\Parameter(
     *      name="amount",
     *      parameter="amount",
     *      in="query",
     *      required=true,
     *      @OA\Schema(type="number"),
     *     ),
     *     @OA\Parameter(
     *      name="currency",
     *      parameter="currency",
     *      in="query",
     *      required=true,
     *      @OA\Schema(type="string"),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="OK",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Page Not Found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     * )
     */
    public function convertCurrency(Request $request, CurrencyConverter $converter): JsonResponse
    {
        $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string|size:3',
        ]);

        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $convertedAmount = $converter->convertCurrency($amount, $currency);

        $response = [
            'success' => true,
            'data' =>  ['converted_amount' => $convertedAmount],
            'error' => null,
            'errors' => [],
            'extra' => []
        ];

        return response()->json($response, 200);
    }
}
