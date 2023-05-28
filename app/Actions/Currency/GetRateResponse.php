<?php

namespace App\Actions\Currency;

use App\Contracts\Actions\Response as ResponseInterface;
use Illuminate\Http\Response;

class GetRateResponse implements ResponseInterface
{
    private ?int $rate;

    public function __construct(?int $rate)
    {
        $this->rate = $rate;
    }

    public function getResponse(): Response
    {
        return response($this->rate);
    }
}
