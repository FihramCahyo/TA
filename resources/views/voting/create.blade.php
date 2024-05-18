<x-app-layout>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Form Tambah Voting</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                {{-- Form untuk menambahkan data voting --}}
                <form action="{{ route('voting.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="restaurant_name" class="block text-sm font-medium text-gray-700">Nama
                            Restoran</label>
                        <input type="text" name="restaurant_name" id="restaurant_name"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Masukan Nama Restoran">
                    </div>
                    <div class="mb-4">
                        <label for="image_path"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Restoran
                            Icon</label>
                        <input type="file" name="image_path" id="image_path" accept="image/*"
                            class="block w-full text-sm text-gray-900 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>

                    <div class="flex">
                        <x-primary-button class="h-[40px] w-[100px] text-center mr-8">
                            SIMPAN
                        </x-primary-button>

                        <a href="{{ route('voting.index') }}">
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
