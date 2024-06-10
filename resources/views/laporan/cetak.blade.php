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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @media screen {
            body {
                background: #e0e0e0;
            }

            .sheet {
                background: white;
                box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
                margin: 5mm auto;
            }
        }

        @page {
            size: A4 landscape;
            /* Default to landscape */
            margin: 0;
            /* Adjust margins as needed */
        }

        body {
            margin: 0;
            padding: 0;
        }

        .printable {
            page-break-after: always;
        }
    </style>
</head>

<body class="">
    <div class="p-10 dark:bg-gray-900 sheet">
        <div class="flex w-60 justify-center items-center">
            <div class="w-20">
                <x-application-logo />
            </div>
            <div class="text-center w-32">
                <h1 class="text-xl">PT. Mardawa</h1>
                <hr>
                <h2 class="text-sm">Intiguna Persada</h2>
            </div>
        </div>
        <div class="mt-12">
            <h1 class="text-3xl font-bold text-center mb-4 print:text-3xl">Laporan Keuangan </h1>
            <h2><b>Tanggal: </b> {{ \Carbon\Carbon::parse(request('start_date'))->translatedFormat('d F Y') }} -
                {{ \Carbon\Carbon::parse(request('end_date'))->translatedFormat('d F Y') }}</h2>
            <h3 class="text-lg font-semibold print:text-lg">Detail Laporan</h3>
        </div>

        <table class="min-w-full border-collapse border border-gray-400 print:w-full mb-40">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 print:text-lg">No</th>
                    <th class="border border-gray-300 px-4 py-2 print:text-lg">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2 print:text-lg">Nama Karyawan</th>
                    <th class="border border-gray-300 px-4 py-2 print:text-lg">Nama Makanan</th>
                    <th class="border border-gray-300 px-4 py-2 print:text-lg">Jenis</th>
                    <th class="border border-gray-300 px-4 py-2 print:text-lg">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 print:text-lg">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2 print:text-lg">{{ $item->date }}</td>
                        <td class="border border-gray-300 px-4 py-2 print:text-lg">{{ $item->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2 print:text-lg">{{ $item->makanan->name }}</td>
                        <td class="border border-gray-300 px-4 py-2 print:text-lg">{{ $item->type }}</td>
                        <td class="border border-gray-300 px-4 py-2 print:text-lg">
                            {{ 'Rp ' . number_format($item->makanan->price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
