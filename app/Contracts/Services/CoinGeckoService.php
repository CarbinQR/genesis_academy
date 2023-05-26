<?php

namespace App\Contracts\Services;

interface CoinGeckoService
{
    /**
     * Get currency rate from CoinGecko API.
     *
     * @param string $currencyId
     * @param string $vsCurrencyId
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCurrencyRate(string $currencyId, string $vsCurrencyId): int;
}
