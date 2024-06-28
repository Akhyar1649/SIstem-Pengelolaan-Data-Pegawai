<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Data Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="/pegawai/form" class="bg-sky-600 hover:bg-sky-800 text-white font-bold py-2 px-4 rounded-full my-3 inline-flex items-center">
                        <i class="fa-solid fa-circle-plus mr-3"></i>
                        Tambah Pegawai
                    </a>

                    <form method="GET" action="/pegawai" class="mb-3 flex justify-between items-end">
                        <div class="ms-3">
                            <label for="search" class="block text-sm font-medium mb-1">Search by Name:</label>
                            <input type="text" name="search" id="search" class="w-60 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-slate-800 sm:text-sm" placeholder="Inputkan nama pegawai" value="{{ $search }}" onchange="this.form.submit()">
                        </div>

                        <div class="me-3">
                            <label for="divisi" class="block text-xs font-medium mb-1">Filter by Division:</label>
                            <select name="divisi" id="divisi" class="form-select border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-slate-800 sm:text-sm" onchange="this.form.submit()">
                                <option value="All" {{ $divisi == 'All' ? 'selected' : '' }}>All</option>
                                <option value="IT" {{ $divisi == 'IT' ? 'selected' : '' }}>IT</option>
                                <option value="HR" {{ $divisi == 'HR' ? 'selected' : '' }}>HR</option>
                                <option value="Marketing" {{ $divisi == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            </select>
                        </div>
                    </form>

                    <table class="min-w-full divide-y divide-gray-200 my-4">
                        <thead class="bg-slate-700 text-white">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Divisi</th>
                                <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Detail</th>
                                <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Edit</th>
                                <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Delete</th>
                            </tr>
                        </thead>

                        @php
                            $nomor = 1 + ($pegawai->currentPage() - 1) * $pegawai->perPage();
                        @endphp
                        @foreach ($pegawai as $p)
                        <tr class="bg-slate-600 text-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center">{{ $nomor++ }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $p->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $p->divisi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <button class="bg-transparent hover:bg-sky-500 text-sky-400 font-semibold hover:text-white py-1 px-2 border border-sky-400 hover:border-transparent rounded" data-modal-target="#detailModal{{ $p->id }}">
                                    <i class="fa-solid fa-circle-info"></i>
                                </button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <a href="/pegawai/form/{{ $p->id }}" class="bg-transparent hover:bg-indigo-500 text-indigo-300 font-semibold hover:text-white py-1 px-2 border border-indigo-300 hover:border-transparent rounded">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <button class="bg-transparent hover:bg-rose-600 text-rose-500 font-semibold hover:text-white py-1 px-2 border border-rose-500 hover:border-transparent rounded delete-button" data-modal-target="#confirmDeleteModal" data-id="{{ $p->id }}" data-name="{{ $p->nama }}">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Detail Pegawai -->
                        <div id="detailModal{{ $p->id }}" class="fixed z-10 inset-0 overflow-y-auto hidden backdrop-contrast-50" aria-labelledby="detailModalLabel{{ $p->id }}" aria-hidden="true">
                            <div class="flex items-center justify-center min-h-screen">
                                <div class="bg-grey text-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                                    <div class="bg-slate-900 px-4 py-2 sm:px-6 sm:flex sm:flex-row inline-flex items-center">
                                        <h5 class="text-lg font-medium flex-auto">Detail Pegawai</h5>
                                        <button type="button" class="close-modal-button flex-none bg-transparent border-0 float-right text-3xl font-semibold">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="bg-slate-700 px-4 py-5 sm:p-6">
                                        <p class="mb-3"><strong>Nama:</strong> {{ $p->nama }}</p>
                                        <p class="mb-3"><strong>Divisi:</strong> {{ $p->divisi }}</p>
                                        <p class="mb-3"><strong>Jabatan:</strong> {{ $p->jabatan }}</p>
                                        <p class="mb-3"><strong>Umur:</strong> {{ $p->umur }} Tahun</p>
                                        <p class="mb-3"><strong>Alamat:</strong> {{ $p->alamat }}</p>
                                        <p class="mb-3"><strong>Nomor Telepon:</strong> {{ $p->nomor_telepon }}</p>
                                        <p class="mb-3"><strong>Email:</strong> {{ $p->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </table>

                    <form method="GET" action="/pegawai" class="mb-3">
                        <label for="per_page" class="text-xs font-medium mb-1">Show per page:</label>
                        <select name="per_page" id="per_page" class="form-select border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bg-slate-800 sm:text-sm" onchange="this.form.submit()">
                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                            <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </form>

                    {{ $pegawai->appends(['per_page' => $perPage])->links() }}

                    <!-- Modal Delete Pegawai -->
                    <div id="confirmDeleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden backdrop-contrast-50" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="flex items-center justify-center min-h-screen">
                            <div class="bg-grey text-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                                <div class="bg-slate-900 px-4 py-2 sm:px-6 sm:flex sm:flex-row inline-flex items-center">
                                    <h5 class="text-lg font-medium flex-auto">Delete Confirmation</h5>
                                    <button type="button" class="close-modal-button flex-none bg-transparent border-0 float-right text-3xl font-semibold">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="bg-slate-700 px-4 py-5 sm:p-6 divide-y divide-gray-200">
                                    Apakah anda yakin ingin menghapus data <span id="deleteItemName" class="font-bold"></span>?
                                </div>
                                <div class="bg-slate-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button type="button" class="close-modal-button bg-gray-500 hover:bg-gray-600 font-bold py-2 px-4 rounded">Batal</button>
                                    <a href="#" id="confirmDeleteButton" class="bg-rose-600 hover:bg-rose-700 font-bold py-2 px-4 mr-3 rounded">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-modal-target]').forEach(button => {
                button.addEventListener('click', function () {
                    var target = document.querySelector(this.getAttribute('data-modal-target'));
                    target.classList.remove('hidden');
                });
            });

            document.querySelectorAll('.close-modal-button').forEach(button => {
                button.addEventListener('click', function () {
                    this.closest('.fixed').classList.add('hidden');
                });
            });

            // Modal Delete Pegawai
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function () {
                    var id = this.getAttribute('data-id');
                    var name = this.getAttribute('data-name');

                    var confirmDeleteModal = document.getElementById('confirmDeleteModal');
                    confirmDeleteModal.classList.remove('hidden');

                    var deleteItemName = confirmDeleteModal.querySelector('#deleteItemName');
                    deleteItemName.textContent = name;

                    var confirmDeleteButton = confirmDeleteModal.querySelector('#confirmDeleteButton');
                    confirmDeleteButton.href = '/pegawai/delete/' + id;
                });
            });
        });
    </script>
</x-app-layout>
