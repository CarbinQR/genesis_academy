<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>gses2</title>
    </head>
    <body>
        <div>
            Актуальний курс BTC до UAH становить: {{ $rate }} грн.
        </div>
    </body>
</html>
