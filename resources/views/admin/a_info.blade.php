@extends('layouts.main')

@section('isi')
    <h1 class="font-sans text-black text-2xl ml-8 mt-2 font-bold"> Info Wisata Aceh Tengah</h1>
    <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-3 mt-20 ml-2 ">
        @foreach ($daftar as $item)
            <div class="flex justify-center ">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                        <img class="rounded-t-lg hover:scale-110 transition duration-300 ease-in-out"
                            src="{{ asset('/storage/'. $item->img) }}" alt="" />
                    </a>
                    <div class="p-2 mb-2">
                        <h5 class="text-black text-xl font-bold mb-2 ml-2">{{ $item->nama }}</h5>
                        <p class="text-black text-sm ml-1">
                            Alamat : Kec. {{ $item->kecamatan }}, Desa {{ $item->desa }}
                        </p>

                        <div class="flex items-start">
                            </svg> <span class="ml-1 text-sm text-black text-center"> Jam Buka - Tutup :
                                {{ $item->jam }}</span>
                        </div>
                        <div class="flex items-start">
                            </svg> <span class="ml-1 text-sm text-black text-center">Tiket Masuk :
                                {{ $item->tiket }}</span>
                        </div>
                        <div class="ml-1">
                            <p class="text-sm"> Kategori Wisata : <span class="text-2sm text-black text-semibold"><button
                                        class="btn btn-info btn-xs">{{ $item->kategori }}</button></span> </p>
                        </div>
                        <div class="ml-1">
                            <p class="text-gray-900 font-semibold text-2sm "> Fasilitas Wisata : </p>
                            @foreach ($item->fasilitas as $fas)
                                <label class="inlie-flex items-center ml-2">
                                    <input disabled type="checkbox" class="form-checkbox h-4 w-4 text-green-600"
                                        checked><span class="ml-2 text-sm text-black">{{ $fas }}</span>
                                </label>
                            @endforeach
                        </div>
                        <div class="flex items-start">
                            </svg> <span class="ml-1 mt-2 text-sm text-black  text-start">Deskripsi : <span
                                    class="ml-1">{{ $item->deskripsi }} </span> </span>
                        </div>
                    </div>
                    <div class="flex justify-end mt-2 mr-3 mb-2">
                        <a href="/detail/{{ $item->id }}"> <button
                                class="btn btn-sm btn-outline btn-accent">Detail</button></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-8 mr-3 ">
        {{ $daftar->links() }}
    </div>
@endsection
