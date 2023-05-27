<?php

namespace App\Actions\Email;

use App\Constants\Email\EmailConstants;

final class AddEmailAction
{
    public function execute(AddEmailRequest $request): AddEmailResponse
    {
        $emails = [];

        if (!file_exists(storage_path() . "/sheets/" . EmailConstants::SHEET_NAME)) {
            mkdir(storage_path() . "/sheets", 0700, true);
        }

        $file = fopen(storage_path() . "/sheets/" . EmailConstants::SHEET_NAME, "a+");
        $requestedEmail = strtolower($request->getEmail());

        while (($data = fgetcsv($file, 1000, ";")) !== false) {
            $emails[] = strtolower($data[0]);
        }

        if (!in_array($requestedEmail, $emails, true)) {
            fputcsv($file, [$requestedEmail], ';');
            fclose($file);
        } else {
            abort(409, 'E-mail вже є в базі даних');
        }

        return new AddEmailResponse();
    }
}
