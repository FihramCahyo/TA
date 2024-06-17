<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Detail Keuangan</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                {{-- Table --}}
                <div class="relative overflow-x-auto mt-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Karyawan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Makanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keuangans as $keuangan)
                                <tr class="bg-white text-black border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $keuangan->user->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $keuangan->makanan->name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        Rp {{ number_format($keuangan->makanan->price, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="bg-orange-500 text-white font-bold">
                                <td colspan="2" class="px-6 py-4 whitespace-nowrap">
                                    Total Pengeluaran
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ number_format($keuangans->sum('makanan.price'), 0, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <div class="mt-4">
                    <h2 class="text-2xl">Total Pengeluaran: Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h2>
                </div> --}}
                <div class="flex justify-start mt-4">
                    <a href="{{ route('dashboard.index') }}"
                        class="text-blue-600 hover:text-blue-900 border-blue-600 hover:border-blue-900 rounded-xl px-4 py-2">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
