<x-app-layout>
    @if (auth()->user()->hasRole('SDM'))
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
                <h1 class="text-4xl">Data Voting</h1>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                    {{-- Button Tambah data --}}
                    <x-primary-button href="{{ route('voting.create') }}" class="h-[40px] w-[150px] text-center">
                        Tambah Data
                    </x-primary-button>

                    {{-- Table --}}
                    <div class="relative overflow-x-auto mt-2">
                        <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                            <thead
                                class="text-xs h-10 text-black uppercase bg-[#F4B04F] dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Restoran
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Restoran Icon
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Uploaded at
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datavoting as $voting)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $voting->restaurant_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('images_voting/' . $voting->image_path) }}"
                                                alt="Restaurant Image" class="w-16 h-16 object-cover rounded-full">
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $voting->created_at->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('voting.edit', $voting->id) }}"
                                                class="text-blue-600 hover:text-blue-900">Edit</a>
                                            <form action="{{ route('voting.destroy', $voting->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="confirmDelete()"
                                                    data-pesan={{ $voting->restaurant_name }}
                                                    class="text-red-600 btn-delete hover:text-red-900 ml-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <x-error-message>
            Hanya Bagian SDM yang diperbolehkan untuk mengakses halaman ini.
        </x-error-message>
    @endif

    {{-- Include SweetAlert component --}}
    @include('components.sweetalert')

    @if (session('success'))
        <script>
            showSuccessAlert('{{ session('success') }}');
        </script>
    @endif


</x-app-layout>
