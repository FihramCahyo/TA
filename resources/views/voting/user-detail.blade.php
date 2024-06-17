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
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                {{-- <th scope="col" class="px-6 py-3">
                                    Action
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datavoting as $voting)
                                @csrf
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $voting->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $voting->created_at }}
                                    </td>
                                    {{-- <td class="px-6 py-4">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">More</a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="flex justify-start mt-4">
                    <button type="button"
                        class="text-blue-500 hover:text-blue-700 border-blue-500 hover:border-blue-700 rounded-xl px-4 py-2"
                        onclick="window.history.back()">
                        Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
