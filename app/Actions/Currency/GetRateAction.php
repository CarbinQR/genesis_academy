<?php

namespace App\Actions\Currency;

use App\Constants\Currency\CurrencyConstants;
use App\Contracts\Services\CoinGeckoService;

final class GetRateAction
{
    private CoinGeckoService $coinGeckoService;

    public function __construct(CoinGeckoService $service)
    {
        $this->coinGeckoService = $service;
    }

    public function execute(GetRateRequest $request): GetRateResponse
    {
        $currencyGeckoId = $request->getCurrencyGeckoId() ?: CurrencyConstants::BTC_GECKO_ID;
        $vsCurrencyGeckoId = $request->getVsCurrencyGeckoId() ?: CurrencyConstants::UAH_GECKO_ID;

        $response = $this
            ->coinGeckoService
            ->getCurrencyRate($currencyGeckoId, $vsCurrencyGeckoId);

        return new GetRateResponse($response);
    }
}
