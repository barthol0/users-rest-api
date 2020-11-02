<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel REST API + Vue</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>

    <body>

        <div class="flex-center" id="app">
            <user-component></user-component>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>

    </body>

</html>
