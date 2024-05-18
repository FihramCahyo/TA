<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Form Tambah Keuangan</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                {{-- Form untuk menambahkan data keuangan --}}
                <form action="{{ route('keuangan.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="date" id="date"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Tanggal">
                    </div>
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Pilih Pengguna</label>
                        <select name="user_id" id="user_id"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach ($users as $userId => $userName)
                                <option value="{{ $userId }}">{{ $userName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="makanan_id" class="block text-sm font-medium text-gray-700">Pilih Makanan</label>
                        <select name="makanan_id" id="makanan_id"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach ($makanans as $makananId => $makananName)
                                <option value="{{ $makananId }}">{{ $makananName }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" name="amount" id="amount"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Jumlah">
                    </div> --}}
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Jenis</label>
                        <input type="text" name="type" id="type"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Jenis">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Deskripsi"></textarea>
                    </div>

                    <div class="flex">
                        <x-primary-button class="h-[40px] w-[100px] text-center mr-8">
                            SIMPAN
                        </x-primary-button>

                        <a href="{{ route('keuangan.index') }}">
                            <x-danger-button class="h-[40px] w-[100px] text-center">
                                BATAL
                            </x-danger-button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
