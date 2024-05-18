<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Form Tambah Makanan</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                {{-- Form untuk menambahkan data makanan --}}
                <form action="{{ route('makanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Makanan</label>
                        <input type="text" name="name" id="name"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Masukkan Nama Makanan" required>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="number" name="price" id="price"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Masukkan Harga Makanan" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" rows="3"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Masukkan Deskripsi Makanan" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image_path" class="block text-sm font-medium text-gray-700">Gambar Makanan</label>
                        <input type="file" name="image_path" id="image_path" accept="image/*"
                            class="block w-full text-sm text-gray-900 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>

                    <div class="flex">
                        <button type="submit"
                            class="h-[40px] w-[100px] text-center mr-8 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">SIMPAN</button>
                        <a href="{{ route('makanan.index') }}"
                            class="h-[40px] w-[100px] text-center bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md">BATAL</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
