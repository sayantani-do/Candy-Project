<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name','Laravel')  }}</title>

        <!-- Fonts -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:wght,FILL,GRAD@300,0,0" />
    </head>
    <body>
        <div id="app">
            <router-view></router-view>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>