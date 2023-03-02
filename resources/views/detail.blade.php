@extends('layouts.main')

@section('isi')
<h1 class="mt-8 ml-10 text-3xl font-bold"> Detail Objek Wisata</h1>
<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl mb-5 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
        <h3
            class="max-w-lg mb-6 font-sans text-2xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
            <span class="relative inline-block">
            </span>
            {{ $daftar->nama }}
        </h3>
        <p class="text-base md:text-lg font-semibold">
            Alamat : Desa {{ $daftar->desa }} , Kec. {{ $daftar->kecamatan }}
        </p>
    </div>
    <div class="grid max-w-screen-lg gap-8 lg:grid-cols-2 sm:mx-auto">
        <div class="flex flex-col justify-center">
            <div class="flex">
                <div class="ml-6 text-lg">
                    <h6 class="mb-2 font-semibold leading-5">
                        Hari Buka : <span>
                            {{ $daftar->hari }}
                    </h6>
                    <hr class="w-full my-2 border-gray-300" />
                    <h6 class="mb-2 font-semibold leading-5">
                        Jam Buka - Tutup : <span>
                            {{ $daftar->jam }} WIB
                    </h6>
                    <hr class="w-full my-2 border-gray-300" />
                    <h6 class="mb-2 font-semibold leading-5">
                        Tiket Masuk : <span> Rp. {{ $daftar->tiket }} </span>
                    </h6>
                    <hr class="w-full my-2 border-gray-300" />

                    <h6 class="mb-2 font-semibold leading-5">
                        Kategori Wisata : <button class="btn btn-xs btn-info"> {{ $daftar->kategori }}</button>
                    </h6>
                    <hr class="w-full my-2 border-gray-300" />
                </div>
            </div>
            <div class="flex">
                <div class="ml-6 text-lg">
                    <div class="">
                        <div class="flex items-center">
                            <div class="flex items-start w-30">
                                <h6 class="mb-2 mr-2 font-semibold leading-5 flex"> Rating :</h6>
                                @for($x = 1; $x <= $daftar->skor; $x++)
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                @endfor
                                @for($x = 0; $x < $daftar->sisa; $x++)
                                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                @endfor
                            </div>
                            {{-- <div class="">
                                    <p class="ml-2 text-xl font-medium text-gray-500 dark:text-gray-400">
                                        {{ round($daftar->skor, 1) }}/ 5</p>
                        </div> --}}
                    </div>
                </div>
                <hr class="w-full my-2 border-gray-300" />
                <h6 class="mb-2 font-semibold leading-5">Fasilitas Wisata :</h6>
                <p class="text-sm text-gray-900">
                    @foreach($daftar->fasilitas as $fas)
                        <label class="inlie-flex items-center ml-2">
                            <input disabled type="checkbox" class="form-checkbox h-4 w-4 text-green-600" checked><span
                                class="ml-2 text-sm text-black">{{ $fas }}</span>
                        </label>
                    @endforeach
                </p>
                <hr class="w-full my-4 border-gray-300" />
            </div>
        </div>
        <div>
            <p class="text-base md:text-lg font-semibold">
                 Link Objek Wisata : {{ $daftar->link }}
            </p>
        </div>
        <div class="flex">
            <div class="ml-6 text-lg">
                <h6 class="mb-2 font-semibold leading-5">Deskripsi :</h6>
                <p class="text-sm text-gray-900">
                    {{ $daftar->deskripsi }}
                </p>
                <hr class="w-full my-6 border-gray-300" />
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-5 ">
        <img class="object-cover w-full h-56 col-span-2 rounded shadow-lg"
            src="{{ asset('/storage/'. $daftar->img) }}" alt="" />
        @foreach($daftar->image as $daf)
            <img class="object-cover w-full h-48 rounded shadow-lg"
                src="{{ asset('/storage/'. $daf) }}" alt="" />
        @endforeach
    </div>
</div>
<div class="mt-4">
    <div id="mapid" data-longitude="{{ $daftar->longitude }}" data-latitude="{{ $daftar->latitude }}"></div>
</div>

@endsection