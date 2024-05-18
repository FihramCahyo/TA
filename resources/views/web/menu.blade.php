<x-app-layout>
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
                Data Sudah Masuk
                {{-- Countdown --}}
                {{-- <div class="flex items-center justify-center mb-12">
                    <div class="bg-gray-200 text-gray-900 rounded-lg p-4 dark:bg-gray-800 dark:text-gray-400">
                        <div id="countdown" class="text-center">
                            <p id="hours" class="text-2xl font-bold mb-2"></p>
                            <p class="text-lg">Jam</p>
                        </div>
                    </div>
                </div> --}}
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
    </section>


    {{-- Section 2 --}}
    <section class="mb-12">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Menu
                    Makan Siang Besok</h2>
                @if ($data_count_makanan != 0)
                    <div class="text-center mt-4">
                        <p class="text-gray-600 dark:text-gray-400">Anda sudah memilih menu makanan ini!</p>
                    </div>
                @else
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        @foreach ($menu as $item)
                            <div
                                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <img class="w-full rounded-t-lg" src="{{ asset('images/' . $item->image_path) }}"
                                    alt="product image" />
                                <div class="px-5 pb-5">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        {{ $item->name }}</h5>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $item->description }}</p>
                                    <div class="flex items-center mt-2.5 mb-5">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                            <div class="text-gray-400 dark:text-gray-600">Rp. {{ $item->price }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-4 text-center mt-4">
                                    <form action="{{ route('pilih.makanan') }}" method="POST">
                                        @csrf
                                        <input type="text" class="hidden" name="id"
                                            value="{{ $item->id }}">
                                        <x-primary-button type="submit" class="w-1/6">
                                            Pilih Makanan
                                        </x-primary-button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>


    {{-- <script>
        // Set the date we're counting down to
        var countDownDate = new Date("May 17, 2024 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="countdown"
            document.getElementById("hours").innerHTML = days + "h ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script> --}}
</x-app-layout>
