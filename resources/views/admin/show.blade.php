@extends('layouts.main')

@section('isi')
    <div class=" mx-5 my-4">

        <a href="/a_daftar">
            <button class="btn btn-sm btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                </svg>
                <span>Back</span>
            </button>
        </a>
        <div class="max-w-sm ml-20 mt-4 overflow-hidden bg-gray-100 rounded-lg shadow-lg dark:bg-gray-800">
            <div class="">
                <img class="object-cover h-1/4" src="/{{ $daftar->img }}">
            </div>

            <div class="px-6 py-4">
                <h1 class="text-xl font-bold text-gray-800 dark:text-white">{{ $daftar->nama }}</h1>

                <p class="py-1 text-gray-700 dark:text-gray-400 font-semibold ">Desa : {{ $daftar->desa }}</p>
                <p class="py-1 text-gray-700 dark:text-gray-400 font-semibold">Kecamatan : {{ $daftar->kecamatan }}</p>
                <p class="py-1 text-gray-700 dark:text-gray-400 font-semibold">Latitude & Longitute :
                    {{ $daftar->latitude }},
                    {{ $daftar->longitude }}</p>
                <p class="pt-1 pb-20 text-gray-700 dark:text-gray-400 font-semibold ">Jam Buka-Tutup : {{ $daftar->jam }}
                    WIB
                </p>
                {{-- <div>
                    <p class="py-1 text-gray-700 dark:text-gray-400 font-semibold ">Fasilitas : {{ $daftar->fasilitas }}
                    </p>
                    @foreach ($daftar->fasilitas as $fas)
                        <label class="inline-flex items-center">
                            <input disabled type="checkbox" class="form-checkbox h-4 w-4 text-green-600" checked><span
                                class="ml-2 text-sm text-gray-700">{{ $fas }}</span>
                        </label>
                    @endforeach
                </div> --}}

            </div>
        </div>
    </div>
@endsection
