<?php

namespace App\Providers;

use App\Contracts\Services\CoinGeckoService as CoinGeckoServiceInterface;
use App\Services\CoinGecko\CoinGeckoService;
use Illuminate\Support\ServiceProvider;

class CoinGeckoProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CoinGeckoServiceInterface::class, CoinGeckoService::class);
    }
}
