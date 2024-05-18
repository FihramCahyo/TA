<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Daftar makanan</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                {{-- Button Tambah data --}}
                <x-primary-button href="{{ route('makanan.create') }}" class="h-[40px] w-[150px] text-center">
                    Tambah Data
                </x-primary-button>

                <table class="w-full text-sm text-center rtl:text-right text-black dark:text-gray-400 mt-2">
                    <thead
                        class="text-xs text-black uppercase bg-[#F4B04F] dark:bg-gray-700 dark:text-gray-400 h-10    ">
                        <tr>
                            <th>
                                Nama makanan</th>
                            <th>
                                Gambar makanan</th>
                            <th>
                                Harga</th>
                            <th>
                                Deskripsi</th>
                            <th>
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($datamakanan as $data)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $data->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap"> <img
                                        src="{{ asset('images/' . $data->image_path) }}" alt="Restaurant Image"
                                        class="w-16 h-16 object-cover rounded-full"></td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp
                                    {{ number_format($data->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($data->description, 20) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('makanan.edit', $data->id) }}"
                                        class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <form action="{{ route('makanan.destroy', $data->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
