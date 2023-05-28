<?php

namespace App\Http\Controllers\Api;

use App\Actions\Currency\GetRateAction;
use App\Actions\Currency\GetRateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\CurrencyGetRateRequest;

class CurrencyController extends Controller
{
    public function fetchRate(CurrencyGetRateRequest $request, GetRateAction $action)
    {
        $rate = $action->execute(new GetRateRequest(
                $request->input('currency_gecko_id'),
                $request->input('vs_currency_gecko_id'))
        )->getResponse();

        return response($rate);
    }
}
