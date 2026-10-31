<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LaporBanjir') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center px-4 py-8 bg-pink-100">
            <div class="text-center">
                <a href="/">
                    <h1 class="text-3xl font-extrabold text-blue-600 mt-1">LaporBanjir</h1>
                </a>
                <p class="text-pink-600 font-medium">BPBD Kabupaten Bandung</p>
            </div>

            <div class="w-full sm:max-w-md mt-6 bg-white shadow-lg rounded-2xl overflow-hidden border border-pink-200">
                <div class="h-2 bg-blue-500"></div>
                <div class="px-6 py-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>