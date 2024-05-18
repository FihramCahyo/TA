<x-app-layout>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Makanan Details</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                {{-- Table --}}
                <div class="relative overflow-x-auto mt-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Makanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datamakanan as $makanan)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $makanan->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $makanan->makanan->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $makanan->created_at->format('d F Y H:i:s') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
