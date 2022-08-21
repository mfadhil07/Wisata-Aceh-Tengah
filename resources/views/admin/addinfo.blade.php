@extends('layouts.main')
@section('isi')
    <div class="mt-4 ml-4">
        <a href="/a_info">
            <button
                class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                </svg>
                <span class="ml-2">Back</span>
            </button>
        </a>
    </div>
    <div class="form-control mx-8 my-4">
        <h1 class="font-sans text-black text-4xl ">Tambah Info Wisata</h1>
        <form action="a_info/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="label">
                    <span class="label-text">Jam Buka - Jam Tutup</span>
                </label>
                <input type="text" placeholder="Jam Buka - Jam Tutup" name="Jam" id="Jam"
                    class="input input-success input-bordered w-1/3">
            </div>
            <div>
                <label class="label">
                    <span class="label-text"> Harga Tiket Masuk</span>
                </label>
                <input type="text" placeholder="Pengunjung" name="pengunjung" id="pengunjung"
                    class="input input-success input-bordered w-1/3">
            </div>
            <div class="form-control w-1/3">
                <label class="label">
                    <span class="label-text">Deskripsi</span>
                </label>
                <textarea class="textarea h-24 textarea-bordered textarea-accent" placeholder="Deskripsi"></textarea>
            </div>
            <div class="flex mt-4 bordered">
                <label for="image" class="ml-4 mr-4">Pilih File :</label>
                <div class="max-w-1/3 h-20 rounded-lg">
                    <div class="items-center justify-center w-full h-10">
                        <input class="flex h-10" type="file" id="image" name="image">
                    </div>
                </div>
            </div>
    </div>
    <div class="mt-6 flex ml-20">
        <button
            class="bg-green-500 text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
            <span class="ml-2">Submit</span>
        </button>
    </div>
    </form>
    </div>
@endsection
