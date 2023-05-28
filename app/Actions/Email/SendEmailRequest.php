<?php

namespace App\Actions\Email;

class SendEmailRequest
{
    private int $rate;

    public function __construct(int $rate)
    {
        $this->rate = $rate;
    }

    public function getRate(): string
    {
        return $this->rate;
    }
}
