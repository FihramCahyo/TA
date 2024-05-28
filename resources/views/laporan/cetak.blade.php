<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Laporan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-bold mb-4">Laporan Keuangan dari {{ request('start_date') }} hingga
            {{ request('end_date') }}
        </h1>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 px-4 py-2">No</th>
                    <th class="w-1/3 px-4 py-2">Tanggal</th>
                    <th class="w-1/3 px-4 py-2">Nama Karyawan</th>
                    <th class="w-1/3 px-4 py-2">Nama Makanan</th>
                    <th class="w-1/3 px-4 py-2">Harga</th>
                    <th class="w-1/3 px-4 py-2">Jenis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $item->date }}</td>
                        <td class="border px-4 py-2">{{ $item->user->name }}</td>
                        <td class="border px-4 py-2">{{ $item->makanan->name }}</td>
                        <td class="border px-4 py-2">{{ 'Rp ' . number_format($item->makanan->price, 0, ',', '.') }}
                        </td>
                        <td class="border px-4 py-2">{{ $item->type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 no-print">
            <button onclick="window.print()" class="px-4 py-2 bg-blue-500 text-white rounded">Print</button>
        </div>
    </div>
</body>

</html>
