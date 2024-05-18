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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-r from-white to-[#168ED1] dark:bg-gray-900 ">
        <div
            class="flex justify-center items-center relative overflow-hidden bg-[#008ED6] lg:w-[1000px] sm:max-w-full lg:h-[450px] rounded-3xl shadow-md shadow-slate-600 ">
            <div class="bg-white w-[500px] h-[1200px] absolute -left-10 rotate-12 rounded-3xl">
            </div>
            <div class="z-10 mr-40  w-80 h-72">
                <img src="https://media.licdn.com/dms/image/D560BAQHPvIvitg9hww/company-logo_400_400/0/1705039557541?e=2147483647&v=beta&t=g6WzZG0A9h41BDiT_t79vAP80HtwrqDSO11SS0BbGQA"
                    alt="" srcset="" class="w-40 m-auto">
                <h1 class="text-center text-2xl font-bold text-[#008ED6]">Mardawa Intiguna Persada</h1>
                <h2 class="text-center text-2xl font-bold text-[#F7AE45]">Lunch Menu</h2>
            </div>

            <div class=" w-[300px] mt-6 px-6 py-4 sm:rounded-lg mr-16">
                {{ $slot }}
            </div>
        </div>

    </div>

</body>

</html>
