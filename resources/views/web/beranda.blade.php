<x-beranda-layout>

    {{-- Section 1 --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-12 lg:px-16">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h1
                    class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl text-wrap dark:text-white mb-6">
                    <span class="text-[#F4B04F] dark:text-blue-500">Hemat Waktu</span> Pilih Menu <br>Makan Siang
                    Lebih
                    Mudah!
                </h1>
                <p class="text-sm text-gray-900 lg:text-xl dark:text-gray-400 mb-12">
                    <span class="font-bold">Pemilihan Menu Makan Siang</span> hadir untuk mood booster
                    bagi para karyawan, dengan memberikan pilihan-pilihan <br>
                    makanan yang sesuai dan menggugah selera.
                </p>
                <a href="{{ route('menu.index') }}">
                    <x-primary-button class="w-64">
                        Cari Menu Makan
                    </x-primary-button>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="{{ asset('images/meal.jpg') }}" alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="{{ asset('images/ayam-geprek.jpg') }}"
                    alt="office content 2">
            </div>
        </div>
    </section>

</x-beranda-layout>
