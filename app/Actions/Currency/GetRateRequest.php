<?php

namespace App\Actions\Currency;

class GetRateRequest
{
    private ?string $currencyGeckoId;

    private ?string $vsCurrencyGeckoId;

    public function __construct(?string $currencyGeckoId, ?string $vsCurrencyGeckoId)
    {
        $this->currencyGeckoId = $currencyGeckoId;
        $this->vsCurrencyGeckoId = $vsCurrencyGeckoId;
    }

    public function getCurrencyGeckoId(): ?string
    {
        return $this->currencyGeckoId;
    }

    public function getVsCurrencyGeckoId(): ?string
    {
        return $this->vsCurrencyGeckoId;
    }
}
