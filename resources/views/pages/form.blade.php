<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($pegawai) ? 'Edit Pegawai' : 'Tambah Pegawai' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ isset($pegawai) ? '/pegawai/update/' . $pegawai->id : '/pegawai/store' }}" method="post">
                        @csrf
                        <div class="mb-6">
                            <label for="nama" class="block text-sm font-medium">Nama:</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-slate-800 sm:text-sm @error('nama') border-red-500 @enderror" id="nama" name="nama"
                                value="{{ isset($pegawai) ? $pegawai->nama : old('nama') }}">
                            @error('nama')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="divisi" class="block text-sm font-medium">Divisi:</label>
                            <select id="divisi" name="divisi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-slate-800 sm:text-sm @error('divisi') border-red-500 @enderror">
                                <option value="">Pilih Divisi</option>
                                <option value="IT" {{ (isset($pegawai) && $pegawai->divisi == 'IT') || old('divisi') == 'IT' ? 'selected' : '' }}>IT</option>
                                <option value="HR" {{ (isset($pegawai) && $pegawai->divisi == 'HR') || old('divisi') == 'HR' ? 'selected' : '' }}>HR</option>
                                <option value="Marketing" {{ (isset($pegawai) && $pegawai->divisi == 'Marketing') || old('divisi') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            </select>
                            @error('divisi')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label for="jabatan" class="block text-sm font-medium">Jabatan:</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-slate-800 sm:text-sm @error('jabatan') border-red-500 @enderror" id="jabatan" name="jabatan"
                                value="{{ isset($pegawai) ? $pegawai->jabatan : old('jabatan') }}">
                            @error('jabatan')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="umur" class="block text-sm font-medium">Umur:</label>
                            <input type="number" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-slate-800 sm:text-sm @error('umur') border-red-500 @enderror" id="umur" name="umur"
                                value="{{ isset($pegawai) ? $pegawai->umur : old('umur') }}">
                            @error('umur')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="alamat" class="block text-sm font-medium">Alamat:</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-slate-800 sm:text-sm @error('alamat') border-red-500 @enderror" id="alamat" name="alamat"
                                value="{{ isset($pegawai) ? $pegawai->alamat : old('alamat') }}">
                            @error('alamat')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="nomor_telepon" class="block text-sm font-medium">Nomor Telepon:</label>
                            <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-slate-800 sm:text-sm @error('nomor_telepon') border-red-500 @enderror" id="nomor_telepon"
                                name="nomor_telepon" value="{{ isset($pegawai) ? $pegawai->nomor_telepon : old('nomor_telepon') }}">
                            @error('nomor_telepon')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium">Email:</label>
                            <input type="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-slate-800 sm:text-sm @error('email') border-red-500 @enderror" id="email" name="email"
                                value="{{ isset($pegawai) ? $pegawai->email : old('email') }}">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ isset($pegawai) ? 'Update' : 'Tambah' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
