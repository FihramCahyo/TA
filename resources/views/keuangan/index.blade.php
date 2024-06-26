<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Data Keuangan</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                {{-- Button Tambah data --}}
                <x-primary-button href="{{ route('keuangan.create') }}" class="h-[40px] w-[150px] text-center">
                    Tambah Data
                </x-primary-button>

                {{-- Table --}}
                <div class="relative overflow-x-auto mt-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-black uppercase bg-[#F4B04F] dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Karyawan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Makanan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keuangans as $key => $keuangan)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ \Carbon\Carbon::parse($keuangan->date)->format('d-m-Y') }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $keuangan->user ? $keuangan->user->name : '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $keuangan->makanan ? $keuangan->makanan->name : '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($keuangan->makanan)
                                            {{ 'Rp ' . number_format($keuangan->makanan->price, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $keuangan->type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('keuangan.edit', $keuangan->id) }}"
                                            class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" onclick="confirmDelete()"
                                                data-pesan={{ $key + 1 }}
                                                class="text-red-600 btn-delete hover:text-red-900 ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- Include SweetAlert component --}}
    @include('components.sweetalert')

    @if (session('success'))
        <script>
            showSuccessAlert('{{ session('success') }}');
        </script>
    @endif
</x-app-layout>
