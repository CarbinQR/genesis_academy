<?php

namespace App\Actions\Email;

use App\Constants\Email\EmailConstants;
use App\Mail\RateMail;
use Illuminate\Support\Facades\Mail;

final class SendEmailAction
{
    public function execute(SendEmailRequest $request): void
    {
        $emails = [];

        $file = fopen(storage_path() . "/sheets/" . EmailConstants::SHEET_NAME, "a+");

        while (($data = fgetcsv($file, 1000, ";")) !== false) {
            $emails[] = strtolower($data[0]);
        }

        fclose($file);

        foreach ($emails as $recipient) {
            Mail::to($recipient)->send(new RateMail($request->getRate()));
        }
    }
}
