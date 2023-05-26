<?php

namespace App\Http\Controllers;

use App\Services\CoinGecko\CoinGeckoService;

class CurrencyController extends Controller
{
    // id from coinGecko handbook (https://api.coingecko.com/api/v3/simple/supported_vs_currencies)
    protected const UAH_ID = 'uah';

    // id from coinGecko handbook (https://api.coingecko.com/api/v3/coins/list)
    protected const BTC_ID = 'bitcoin';

    public function fetchRate(CoinGeckoService $service) {
        return $service->getCurrencyRate(self::BTC_ID, self::UAH_ID);
    }
}
