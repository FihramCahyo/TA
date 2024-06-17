<x-app-layout>
    <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="relative bg-white h-32 md:h-36">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="absolute -top-2 bg-slate-700 rounded-lg p-3 size-14">
                            <svg class="ml-1 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="m3.62 6.389 8.396 6.724 8.638-6.572-7.69-4.29a1.975 1.975 0 0 0-1.928 0L3.62 6.39Z" />
                                <path
                                    d="m22 8.053-8.784 6.683a1.978 1.978 0 0 1-2.44-.031L2.02 7.693a1.091 1.091 0 0 0-.019.199v11.065C2 20.637 3.343 22 5 22h14c1.657 0 3-1.362 3-3.043V8.053Z" />
                            </svg>

                        </div>
                        <div class="text-end pt-1 ">
                            <h2 class="text-xl mb-0 text-capitalize">Hasil Voting</h2>
                            <h4 class="mt-1 text-lg font-bold">{{ $voteCount }}</h4>
                        </div>
                        <hr class="dark horizontal mt-2">
                        <div class="card-footer p-3">
                            <a href="{{ route('voting.detail') }}" class="text-black hover:text-blue-700">View
                                Details</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="relative bg-white h-32 md:h-36">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="absolute -top-2 bg-slate-700 rounded-lg p-3 size-14">
                            <svg class="ml-1 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M14 7h-4v3a1 1 0 0 1-2 0V7H6a1 1 0 0 0-.997.923l-.917 11.924A2 2 0 0 0 6.08 22h11.84a2 2 0 0 0 1.994-2.153l-.917-11.924A1 1 0 0 0 18 7h-2v3a1 1 0 1 1-2 0V7Zm-2-3a2 2 0 0 0-2 2v1H8V6a4 4 0 0 1 8 0v1h-2V6a2 2 0 0 0-2-2Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                        <div class="text-end pt-1 ">
                            <h2 class="text-xl mb-0 text-capitalize">Pesanan Makan</h2>
                            <h4 class="mt-1 text-lg font-bold">{{ $makananCount }} </h4>
                        </div>
                        <hr class="dark horizontal mt-2">
                        <div class="card-footer p-3">
                            <a href="{{ route('makanan.detail') }}" class="text-black hover:text-blue-700">View
                                Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative bg-white h-32 md:h-36">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="absolute -top-2 bg-slate-700 rounded-lg p-3 size-14">
                            <svg class="ml-1 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="text-end pt-1 ">
                            <h2 class="text-xl mb-0 text-capitalize">Pengeluaran</h2>
                            <h4 class="mt-1 text-lg font-bold">
                                {{ 'Rp ' . number_format($totalPengeluaran, 0, ',', '.') }}</h4>
                        </div>
                        <hr class="dark horizontal mt-2">
                        <div class="card-footer p-3">
                            <a href="{{ route('keuangan.detail') }}" class="text-black hover:text-blue-700">View
                                Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative bg-white h-32 md:h-36">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="absolute -top-2 bg-slate-700 rounded-lg p-3 size-14">
                            <svg class="ml-1 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <div class="text-end pt-1 ">
                            <h2 class="text-xl mb-0 text-capitalize">User</h2>
                            <h4 class="mt-1 text-lg font-bold">{{ $userCount }}</h4>
                        </div>

                        <hr class="dark horizontal mt-2">
                        <div class="card-footer p-3">
                            <a href="{{ route('user.index') }}" class="text-black hover:text-blue-700">View
                                Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- chart --}}
        <x-chart />


</x-app-layout>
