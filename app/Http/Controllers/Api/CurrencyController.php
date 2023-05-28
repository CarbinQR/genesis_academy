<?php

namespace App\Http\Controllers\Api;

use App\Actions\Currency\GetRateAction;
use App\Actions\Currency\GetRateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function fetchRate(Request $request, GetRateAction $action)
    {
        $rate = $action->execute(new GetRateRequest(
                $request->input('currency_gecko_id'),
                $request->input('vs_currency_gecko_id'))
        )->getResponse();

        return $this->successResponse($rate);
    }
}
