<?php

namespace App\Services\CoinGecko;

use App\Contracts\Services\CoinGeckoService as CoinGeckoServiceInterface;
use App\Services\BaseService;

class CoinGeckoService extends BaseService implements CoinGeckoServiceInterface
{
    protected string $baseUrl;

    public function __construct()
    {
        parent::__construct();
        $this->baseUrl = config('coingecko.config.base_url');
    }

    /**
     * @inheritDoc
     */
    public function getCurrencyRate(string $currencyGeckoId, string $vsCurrencyGeckoId): int
    {
        $url = $this->baseUrl . config('coingecko.config.routes.price');
        $params = [
            'ids' => $currencyGeckoId,
            'vs_currencies' => $vsCurrencyGeckoId
        ];

        $response = $this->get($url, $params);

        return $response->$currencyGeckoId->$vsCurrencyGeckoId;
    }
}
