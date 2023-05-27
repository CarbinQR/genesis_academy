<?php

namespace App\Actions\Email;

use App\Contracts\Actions\Response as ResponseInterface;
use Illuminate\Http\Response;

class AddEmailResponse implements ResponseInterface
{
    public function getResponse(): Response
    {
        return response('E-mail додано');
    }
}
