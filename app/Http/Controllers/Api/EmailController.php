<?php

namespace App\Http\Controllers\Api;

use App\Actions\Currency\GetRateAction;
use App\Actions\Currency\GetRateRequest;
use App\Actions\Email\AddEmailAction;
use App\Actions\Email\AddEmailRequest;
use App\Actions\Email\SendEmailAction;
use App\Actions\Email\SendEmailRequest;
use App\Constants\Currency\CurrencyConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\Email\StoreEmailRequest;
use Illuminate\Http\Response;

class EmailController extends Controller
{
    public function create(StoreEmailRequest $request, AddEmailAction $action): Response
    {
        $action->execute(new AddEmailRequest($request->input('email')));

        return response('E-mail додано');
    }

    public function send(GetRateAction $getRateAction, SendEmailAction $sendEmailAction): Response
    {
        $rate = $getRateAction->execute(new GetRateRequest(
            CurrencyConstants::BTC_GECKO_ID,
            CurrencyConstants::UAH_GECKO_ID
        ))->getResponse();

        $sendEmailAction->execute(new SendEmailRequest($rate));

        return response('E-mailʼи відправлено');
    }
}
