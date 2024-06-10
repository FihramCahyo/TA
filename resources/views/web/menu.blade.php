<x-beranda-layout>
    {{-- Header Image --}}
    <section class="relative">
        <div class="h-48 lg:h-96 bg-cover bg-center"
            style="background-image: url('{{ asset('images/header-food.jpg') }}');">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl lg:text-6xl font-bold text-black">Judul Header</h1>
            </div>
        </div>
    </section>

    {{-- section 1 --}}
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="flex items-center justify-center mb-12">
                <h2 class="mb-4 text-xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Vote pemilihan restoran / tempat makan
                </h2>
            </div>
            @if ($data_count != 0)
                <h3 class="text-center mb-4 subtitle">Anda Sudah Memilih Restoran - Tunggu Waktu Pemilihan Makanan</h3>
                <div class="flex justify-center mb-12">
                    <div class="flex justify-end items-center">
                        <div class="bg-white shadow-md rounded-lg p-4 dark:bg-gray-800">
                            <div id="countdown" class="text-center space-y-2">
                                <div class="flex items-center justify-center space-x-2">
                                    <span id="hours" class="text-4xl font-bold"></span>
                                    <span class="text-gray-500">Jam</span>
                                    <span id="minutes" class="text-4xl font-bold"></span>
                                    <span class="text-gray-500">Menit</span>
                                    <span id="seconds" class="text-4xl font-bold"></span>
                                    <span class="text-gray-500">Detik</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <form action="{{ route('pilih.restoran') }}" method="post">
                    <ul class="grid w-full gap-6 md:grid-cols-4">
                        @foreach ($data as $item)
                            @csrf
                            <li class="flex items-center justify-center">
                                <input type="radio" id="restaurant{{ $item->id }}" name="id"
                                    value="{{ $item->id }}" class="hidden peer" required />
                                <label for="restaurant{{ $item->id }}"
                                    class="flex flex-col items-center justify-center w-2/3 p-4 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="flex items-center justify-center">
                                        <img class="rounded-t-lg mx-auto h-10 lg:h-24"
                                            src="{{ asset('images/' . $item->image_path) }}" alt="Logo Restoran" />
                                    </div>
                                    <div class="w-full text-center">{{ $item->restaurant_name }}</div>
                                </label>
                            </li>
                        @endforeach
                        <div class="col-span-4 text-center mt-4">
                            <x-primary-button type="submit" class="w-1/6">
                                Pilih Restoran
                            </x-primary-button>
                        </div>
                    </ul>
                </form>
            @endif
        </div>
    </section>

    {{-- Section 2 --}}
    <section id="menu-section" class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6"
        style="display:
        none;">
        <div class=" max-w-screen text-center lg:mb-16 mb-8">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                Menu Makan Siang Besok
            </h2>
            @if ($data_count_makanan != 0)
                <div class="text-center mt-4">
                    <p class="text-gray-600 dark:text-gray-400">Anda sudah memilih menu makanan ini!</p>
                </div>
            @else
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 w-full mt-12">
                    @foreach ($menu as $item)
                        <div
                            class="flex
                                items-center bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100
                                    dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                            <div class="w-1/2 bg-slate-500 h-full">
                                <img class="object-cover h-full rounded-t-lg"src="{{ asset('images/' . $item->image_path) }}"
                                    alt="product image" />
                            </div>

                            <div class="p-4 w-1/2 text-left">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $item->name }}</h5>
                                <p class="mb-3 text-gray-700 dark:text-gray-400">{{ $item->description }}</p>
                                <p class="text-gray-400 dark:text-gray-600 mb-6">Rp. {{ $item->price }}</p>
                                <form action="{{ route('pilih.makanan') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <x-primary-button type="submit">Pilih Makanan</x-primary-button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Determine the countdown target time
            var today = new Date();
            var countDownDate = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 15, 0, 0)
                .getTime();

            // Update the countdown every 1 second
            var countdownfunction = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;

                // Time calculations
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result
                if (distance > 0) {
                    document.getElementById("hours").innerHTML = hours;
                    document.getElementById("minutes").innerHTML = minutes;
                    document.getElementById("seconds").innerHTML = seconds;
                } else {
                    clearInterval(countdownfunction);
                    document.getElementById("countdown").innerHTML = "Silakan Pilih Menu Makanan Anda";
                    document.getElementById("menu-section").style.display = "block";
                }
            }, 1000);
        });
    </script>
</x-beranda-layout>
