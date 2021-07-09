<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body class="antialiased">
<div id="app">
    <x-header/>

    <main>
        <div class="container max-w-7xl mx-auto mt-10">
            {{ $slot }}
        </div>
    </main>

</div>
<script src="{{ mix('/js/app.js') }}" defer></script>
</body>
</html>
