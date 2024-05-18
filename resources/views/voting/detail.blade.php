<x-app-layout>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Voting Details</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                {{-- Table --}}
                <div class="relative overflow-x-auto mt-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Restoran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah Voting
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $voting)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img src="{{ asset('images/' . $voting['img']) }}" alt="Restaurant Image"
                                            class="w-16 h-16 object-cover rounded-full">
                                        {{ $voting['nama'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $voting['jmlh'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('voting.user-detail', ['id' => $voting['id']]) }}"
                                            class="text-blue-600 hover:text-blue-900">More</a>
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
