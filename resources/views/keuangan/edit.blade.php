<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Form Edit Keuangan</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="date" id="date" value="{{ $keuangan->date }}" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Tanggal">
                    </div>
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Pilih Pengguna</label>
                        <input type="text" name="user_id" id="user_id" value="{{ $keuangan->user->name }}" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Pengguna">
                    </div>
                    <div class="mb-4">
                        <label for="makanan_id" class="block text-sm font-medium text-gray-700">Pilih Makanan</label>
                        <select name="makanan_id" id="makanan_id"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Pilih Makanan</option>
                            @foreach ($makanans as $makanan)
                                <option value="{{ $makanan->id }}" @if ($makanan->id == $keuangan->makanan_id) selected @endif>
                                    {{ $makanan->name }} - {{ $makanan->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Jenis</label>
                        <select name="type" id="type"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item }}" @if ($item == $keuangan->type) selected @endif>
                                    {{ $item }}</option>
                            @endforeach
                        </select>
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
                                $('#makanan_id')
                                    .empty(); // Kosongkan pilihan makanan sebelum memuat yang baru
                                $.each(data, function(index, makanan) {
                                    $('#makanan_id').append('<option value="' + makanan
                                        .makanan.id + '">' + makanan.makanan.name +
                                        '</option>');
                                });
                            } else {
                                $('#makanan_id')
                                    .empty(); // Jika tidak ada makanan yang tersedia, kosongkan pilihan makanan
                            }
                        }
                    });
                } else {
                    $('#makanan_id').empty(); // Jika pengguna tidak dipilih, kosongkan pilihan makanan
                }
            });
        });
    </script>

</x-app-layout>
