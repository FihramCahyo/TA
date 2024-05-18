<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-4xl">Tambah Pengguna Baru</h1>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-4">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="name"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                        <select name="role_id" id="role_id"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="flex">
                        <x-primary-button class="h-[40px] w-[100px] text-center mr-8">
                            SIMPAN
                        </x-primary-button>
                        <a href="{{ route('user.index') }}">
                            <x-danger-button class="h-[40px] w-[100px] text-center">
                                BATAL
                            </x-danger-button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
