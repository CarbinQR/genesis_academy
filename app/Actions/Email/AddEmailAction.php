<?php

namespace App\Actions\Email;

use App\Constants\Email\EmailConstants;

final class AddEmailAction
{
    public function execute(AddEmailRequest $request): void
    {
        $emails = [];

        if (!file_exists(storage_path() . "/sheets/" . EmailConstants::SHEET_NAME)) {
            mkdir(storage_path() . "/sheets", 0700, true);
        }

        $file = fopen(storage_path() . "/sheets/" . EmailConstants::SHEET_NAME, "a+");
        $requestedEmail = strtolower($request->getEmail());

        while (($data = fgetcsv($file, 1000, ";")) !== false) {
            $emails[] = $data[0];
        }

        abort_if(in_array($requestedEmail, $emails, true), 409, 'E-mail вже є в базі даних');

        fputcsv($file, [$requestedEmail], ';');
        fclose($file);
    }
}
