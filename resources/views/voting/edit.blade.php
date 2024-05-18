<x-app-layout>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Edit Data Voting</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                {{-- Form untuk mengedit data voting --}}
                <form action="{{ route('voting.update', $datavoting->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="restaurant_name" class="block text-sm font-medium text-gray-700">Nama
                            Restoran</label>
                        <input type="text" name="restaurant_name" id="restaurant_name"
                            value="{{ $datavoting->restaurant_name }}"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="image_path" class="block text-sm font-medium text-gray-700">Restoran
                            Icon</label>
                        <input type="file" name="image_path" id="image_path" accept="image/*"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="flex items-center justify-between">
                        <a href="{{ route('voting.index') }}"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Kembali</a>
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
