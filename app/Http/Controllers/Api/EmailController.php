<?php

namespace App\Http\Controllers\Api;

use App\Actions\Email\AddEmailAction;
use App\Actions\Email\AddEmailRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmailController extends Controller
{
    public function create(Request $request, AddEmailAction $action): Response
    {
        return $action
            ->execute(new AddEmailRequest($request->input('email')))
            ->getResponse();
    }
}
