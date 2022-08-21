@extends('layouts.main')
@section('isi')
    <h1 class="text-2xl font-semibold font-sans ml-8 mt-4"> Tambah Jumlah Pengunjung</h1>
    <div class="mt-4">
        <a href="/a_daftar" class="ml-8">
            <button class="btn btn-sm btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                </svg>
                <span>Back</span>
            </button>
        </a>
    </div>
    <form action="/a_daftar/update_pengunjung" method="post" class="ml-10">
        @csrf
        <input type="text" value="{{ $id_lokasi }}" name="id_lokasi" id="id_lokasi"
            class="input input-accent input-bordered w-80 hidden">
        <div class=" grid grid-cols-2 gap-1 ml-10 mt-2">
            <div class="">
                <label class="label w-60">
                    <span class="label-text ml-2 font-bold">Jumlah Pengunjung Sekarang</span>
                </label>
                <input type="text" value="{{ $total }}" name="total" id="total"
                    class="input input-accent input-bordered w-80 @error('total')  @enderror" disabled>
                @error('total')
                    <div>
                        <span class="font-sm text-red-700 ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="">
                <label class="label w-60">
                    <span class="label-text ml-2 font-bold">Tambah Jumlah Pengunjung</span>
                </label>
                <input type="text" placeholder="Tambah Jumlah Pengunjung" name="jumlah" id="jumlah"
                    class="input input-accent input-bordered w-80 @error('jumlah')  @enderror" autofocus
                    value={{ old('jumlah') }}>
                @error('jumlah')
                    <div>
                        <span class="font-sm text-red-700 ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="">
                <label class="label ">
                    <span class="label-text ml-2 font-bold">Tahun</span>
                </label>
                <select name="tahun" id="tahun" class="select max-w-xs select-accent w-80">
                    <option value=""> Pilih Tahun</option>
                    <option value="2017"> 2017 </option>
                    <option value="2018"> 2018 </option>
                    <option value="2019"> 2019 </option>
                    <option value="2020"> 2020 </option>
                    <option value="2021"> 2021 </option>
                    <option value="2022"> 2022 </option>
                </select>
                @error('tahun')
                    <div>
                        <span class="font-sm text-red-700 ">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="flex justify-start">
                <div class="flex mb-10 mt-10">
                    <button
                        class="bg-green-500 text-gray-100 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-16 inline-flex items-center">
                        <span class="ml-2">Submit</span>
                    </button>
                </div>
            </div>
        </div>

    </form>
@endsection
