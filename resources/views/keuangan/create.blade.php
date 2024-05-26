<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Form Tambah Keuangan</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
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
                            <option value="">Pilih User</option>
                            @foreach ($makanans as $item)
                                <option value="{{ $item->user_id }}">{{ $item->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="makanan_name" class="block text-sm font-medium text-gray-700">Makanan</label>
                        <input type="text" name="makanan_name" id="makanan_name" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Makanan">
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="text" name="price" id="price" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Harga Makanan">
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Jenis</label>
                        <select name="type" id="type"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
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

    <script>
        $(document).ready(function() {
            $('#user_id').on('change', function() {
                var userId = $(this).val();
                if (userId) {
                    $.ajax({
                        url: '/keuangan/get-makanan-by-keuangan/' + userId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data.length > 0) {
                                $('#makanan_id').val(data[0].makanan.id); // Simpan ID makanan
                                $('#makanan_name').val(data[0].makanan.name);
                                $('#price').val(data[0].makanan.price);
                            } else {
                                $('#makanan_id').val(''); // Reset nilai ID makanan
                                $('#makanan_name').val('');
                                $('#price').val('');
                            }
                        }
                    });
                } else {
                    $('#makanan_id').val(''); // Reset nilai ID makanan
                    $('#makanan_name').val('');
                    $('#price').val('');
                }
            });
        });
    </script>

</x-app-layout>
