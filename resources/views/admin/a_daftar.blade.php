@extends('layouts.main')
@section('isi')
    <div class="flex justify-end mt-6 mr-80">
        <div class="flex items-end mt-3">
            <a href="/a_daftar/create">
                <button class="h-11 w-20 text-lg text-white rounded-lg bg-green-600 hover:bg-green-900" type="submit">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 items-center mt-1 ml-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            <span>Data</span>
                        </svg>
                    </div>
                </button>
            </a>
        </div>

        <div class="flex justify-end ml-4 mr-4">
            <form action="/a_daftar">
                <div class="absolute border-2 rounded-btn mt-1 md:w-30 lg:w-1/4">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="search" name="search"
                        class="block p-4 pl-10 w-full  text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Search" required value="{{ request('search') }}">
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                </div>
            </form>
        </div>
        {{-- <form action="/a_daftar">
                <div class="absolute border-2 rounded-btn mt-1">
                    <input type="text" name="search"
                        class="h-10 w-30 pl-8 pr-10 rounded-lg z-0 focus:shadow focus:outline-none"
                        placeholder="Search Wisata..." value="{{ request('search') }}">
                    <div class="absolute top-0 left-60 mr-2">
                        <button class="h-10 w-20 text-white rounded-lg bg-green-500 hover:bg-green-600"
                            type="submit">Search
                        </button>
                    </div>
                </div>
            </form> --}}
    </div>
    @if (session()->has('pesan'))
        <div class="flex items-left w-full max-w-sm ml-8 overflow-hidden bg-gray-100 rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-green-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
                </svg>
            </div>
            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-green-500 dark:text-green-400">{{ session('pesan') }}</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200"></p>
                </div>
            </div>
        </div>
    @endif
    <div>
        <table class="m-1 w-full mt-6 bg-green-500 ">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 border-b-2 border-black text-left text-sm leading-4 text-black-100  tracking-wider">
                        Nama Objek Wisata</th>
                    <th
                        class="px-6 py-3 border-b-2 border-black text-left text-sm leading-4 text-black-100  tracking-wider">
                        Kecamatan</th>
                    <th
                        class="px-6 py-3 border-b-2 border-black text-left text-sm leading-4 text-black-100  tracking-wider">
                        Desa</th>
                    <th
                        class="px-6 py-3 border-b-2 border-black text-left text-sm leading-4 text-black-100  tracking-wider">
                        Kategori</th>
                    <th
                        class="px-6 py-3 border-b-2 border-black text-left text-sm leading-4 text-black-100  tracking-wider ">
                        Status </th>
                </tr>
            </thead>
            <tbody class="bg-white text-black">
                @foreach ($daftar as $d)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-black-900"> {{ $d['nama'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-black-900 border-gray-500 text-sm leading-5">
                            {{ $d['kecamatan'] }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-black-900 border-gray-500 text-sm leading-5">
                            {{ $d['desa'] }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-black-900 border-gray-500 text-sm leading-5">
                            <button class="btn btn-xs btn-info">
                                {{ $d['kategori'] }}
                        </td>
                        </button>
                        <td class="px-1 py-3 whitespace-no-wrap text-center border-b border-gray-500 text-sm leading-5">
                            <div class="flex flex-auto ">
                                <a href="/detail/{{ $d->id }}" class="mx-2" title="Lihat"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg></a>
                                <a href="/a_daftar/{{ $d->id }}/edit" class="mx-2" title="Edit"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                {{-- <a href="/a_daftar/tambah_pengunjung/{{ $d->id }}" class="mx-2"
                                    title="Tambah pengunjung">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                </a> --}}
                               
                                <div class="flex justify-center">
                                    <form action="/a_daftar/{{ $d->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn-sm mr-2 pb-2" type="submit"
                                            onclick="return confirm('Apakah Anda yakin Menghapus data ini ?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-10 mb-10 ml-6 pr-6">
        {{ $daftar->links() }}
    </div>
@endsection
