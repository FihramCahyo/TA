<x-app-layout>
    @if (auth()->user()->hasRole('SDM'))
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
                <h1 class="text-4xl">Form Laporan Keuangan</h1>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                    <form action="{{ route('laporan.cetak') }}" method="POST">
                        @csrf
                        <div class="flex items-center">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Zm0 8H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V12h1.5a1.5 1.5 0 1 1 0-3h-1.5Zm1.5-3H7V6.707l-2.293-2.293a1 1 0 0 1 1.414-1.414L12 6.707l2.293-2.293a1 1 0 0 1 1.414 0l2.293 2.293-2.293 2.293a1 1 0 0 1-1.414 1.414Z" />
                                    </svg>
                                </div>
                                <input name="start_date" type="date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('start_date') }}" placeholder="Select date start">
                            </div>
                            <span class="mx-4 text-gray-500">to</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Zm0 8H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V12h1.5a1.5 1.5 0 1 1 0-3h-1.5Zm1.5-3H7V6.707l-2.293-2.293a1 1 0 0 1 1.414-1.414L12 6.707l2.293-2.293a1 1 0 0 1 1.414 0l2.293 2.293-2.293 2.293a1 1 0 0 1-1.414 1.414Z" />
                                    </svg>
                                </div>
                                <input name="end_date" type="date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('end_date') }}" placeholder="Select date end">
                            </div>
                        </div>
                        <div class="flex justify-start mt-4">
                            <x-primary-button type="submit">
                                Print
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <x-error-message>
            Hanya Bagian SDM yang diperbolehkan untuk mengakses halaman ini.
        </x-error-message>
    @endif
</x-app-layout>
