<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'navy': '#1e3a8a',
                            'orange': '#3FB8E3',
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="text-center mb-6">
                <a href="/">
                    <img src="{{ asset('images/logo/logo.jpg') }}" alt="Atroks Security Services" class="h-20">
                </a>
                <p class="text-gray-500 text-sm mt-2 font-medium">Lets Talk Security</p>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-8 py-6 bg-white shadow-lg overflow-hidden rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
