<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Form Edit Keuangan</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                {{-- Form untuk mengedit data keuangan --}}
                <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="date" id="date"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $keuangan->date }}">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $keuangan->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" name="amount" id="amount"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $keuangan->amount }}">
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Jenis</label>
                        <input type="text" name="type" id="type"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $keuangan->type }}">
                    </div>
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
                        <input type="number" name="user_id" id="user_id"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            value="{{ $keuangan->user_id }}">
                    </div>

                    <div class="flex">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">UPDATE</button>
                        <a href="{{ route('keuangan.index') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">BATAL</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
