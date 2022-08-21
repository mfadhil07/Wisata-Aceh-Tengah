@extends('layouts.main')

@section('isi')
<h1 class="text-2xl font-semibold font-sans ml-8 mt-4"> Edit Objek Wisata</h1>

<div class="mt-4 ml-8">
    <a href="/a_daftar">
        <button class="btn btn-sm btn-warning">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
            </svg>
            <span>Back</span>
        </button>
    </a>
</div>

@if(session()->has('pesan'))
    <div class="flex w-full max-w-sm ml-6 overflow-hidden bg-gray-100 rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex items-center justify-center w-12 bg-green-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
            </svg>
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span
                    class="font-semibold text-green-500 dark:text-green-400">{{ session('pesan') }}</span>
                <p class="text-sm text-gray-600 dark:text-gray-200"></p>
            </div>
        </div>
    </div>
@endif
<form action="/a_daftar/{{ $daftar->id }}/" method="POST" enctype="multipart/form-data" class="ml-10">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="grid grid-cols-2 gap-1 ml-10 mt-2">
        <div>
            <label class="label">
                <span class="label-text ml-2 font-bold">Nama Objek Wisata</span>
            </label>
            <input type="text" placeholder="Nama Objek Wisata" name="nama" id="nama"
                class="input input-accent input-bordered w-80 @error('nama') is-invalid @enderror"
                value="{{ $daftar->nama }}">
            @error('nama')
                <div class="text-red-700">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="">
            <label class="label">
                <span class="label-text ml-2 font-bold">Kecamatan</span>
            </label>
            <select name="kecamatan" id="kecamatan" class="select select-bordered w-80"
                value="{{ $daftar->kecamatan }}">
                <option value="{{ $daftar->kecamatan }}"> {{ $daftar->kecamatan }}</option>
                <option value="Atu Lintang"> Atu Lintang </option>
                <option value="Bebesen"> Bebesen </option>
                <option value="Bies"> Bies</option>
                <option value="Bintang"> Bintang </option>
                <option value="Celala"> Celala</option>
                <option value="Jagong Jeget"> Jagong Jeget</option>
                <option value="Kebayakan"> Kebayakan</option>
                <option value="Ketol"> Ketol </option>
                <option value="Kute Panang"> Kute Panang</option>
                <option value="Laut Tawar"> Laut Tawar</option>
                <option value="Linge"> Linge</option>
                <option value="Pegasing"> Pegasing </option>
                <option value="Rusip Antara"> Rusip Antara </option>
                <option value="Silih Nara"> Silih Nara </option>
            </select>
            @error('kecamatan')
                <div class="text-red-700">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label class="label mt-2">
                <span class=" label-text ml-2 font-bold">Desa</span>
            </label>
            <input type="text" placeholder="Desa" id="desa" name="desa"
                class="input input-accent input- w-80 @error('desa') is-invalid @enderror"
                value="{{ trim($daftar['desa']) }}">
            @error('desa')
                <div class="text-red-700">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label class="label mt-2">
                <span class=" label-text ml-2 font-bold">Latitude</span>
            </label>
            <input type="text" placeholder="Latitude" name="latitude" id="latitude"
                class="input input-accent input- w-80 @error('latitude') is-invalid @enderror"
                value="{{ $daftar->latitude }}">
            @error('latitude')
                <div class="text-red-700">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>

            <label class="label mt-2">
                <span class="label-text ml-2">Longitude</span>
            </label>
            <input type="text" placeholder="Longitude" name="longitude" id="longitude"
                class="input input-accent input- w-80 @error('longitude') is-invalid @enderror"
                value="{{ $daftar->longitude }}">
            @error('longitude')
                <div class="text-red-700">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="">
            <label class="label mt-2">
                <span class=" label-text ml-2 font-bold">Jam Buka - Tutup</span>
            </label>
            <input type="text" placeholder="Jam Buka - Tutup" name="jam" id="jam"
                class="input input-bordered input-accent input- w-80 @error('jam') is-invalid @enderror"
                value={{ $daftar->jam }}>
            @error('jam')
                <div>
                    <label class="text-red-700">{{ $message }}</label>
                </div>
            @enderror
        </div>
        <div class="">
            <label class="label mt-2">
                <span class=" label-text ml-2 font-bold">Harga Tiket</span>
            </label>
            <select name="tiket" id="tiket" class="select max-w-xs select-accent w-80" value="">
                <option value="{{ $daftar->tiket }}"> {{ $daftar->tiket }} </option>
                <option value="Gratis"> Gratis </option>
                <option value="2.000">Rp. 2.000 </option>
                <option value="3.000">Rp. 3.000 </option>
                <option value="5.000">Rp. 5.000 </option>
                <option value="5.000">Rp. 10.000 </option>
                <option value="5.000">Rp. 15.000 </option>
                <option value="80.000-120.000">Rp. 80.000 - 120.000 </option>
            </select>
            @error('tiket')
                <div>
                    <label class="text-red-700">{{ $message }}</label>
                </div>
            @enderror
        </div>
        <div class="mt-8">
            <h2>Fasilitas Wisata</h2>
            @foreach($fasilitas as $f)
                {{-- <option value="{{ $f['id'] }}">
                {{ $f['fasilitas'] }}</option> --}}
                <label class="inline-flex items-center mt-3">
                    <input <?php
                        foreach ($daftar->fasilitas as $fas) {
                            if ($f['id'] == $fas) {
                                echo 'checked';
                            }
                        }
                        ?> name="fasilitas[]" type="checkbox" value="{{ $f['id'] }}"
                        class="form-checkbox h-5 w-5 text-green-600"><span class="ml-2 text-gray-700">
                        {{ $f['fasilitas'] }}</span>
                </label>
            @endforeach
            @error('fasilitas')
                <div>
                    <label class="text-red-700">{{ $message }}</label>
                </div>
            @enderror
        </div>
        <div class="mt-2">
            <label class="label ">
                <span class="label-text ml-2 font-bold">Kategori Wisata</span>
            </label>
            <select name="kategori" id="kategori" class="select max-w-xs select-accent w-80 value="
                {{ $daftar->kategori }}">
                <option value="value=">{{ $daftar->kategori }} </option>
                <option value="Budaya"> Wisata Budaya </option>
                <option value="Bahari">Wisata Bahari</option>
                <option value="Pertanian"> Wisata Pertanian</option>
                <option value="Pemandangan"> Wisata Pemandangan </option>
                <option value="Ziarah">Wisata Ziarah</option>
                <option value="Sejarah"> Wisata Sejarah</option>
                <option value="Kuliner"> Wisata Kuliner</option>
                <option value="Buru"> Wisata Buru</option>
            </select>
            @error('kategori')
                <div>
                    <label class="text-red-700">{{ $message }}</label>
                </div>
            @enderror
        </div>
        <div class="mt h-40 w-80">
            <label class="label mt-2">
                <span class=" label-text ml-2 font-bold">Deskripsi</span>
            </label>
            <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi" cols="30" rows="4"
                class="input input-bordered input-accent input- h-40 w-80 @error('deskripsi') is-invalid @enderror">{{ $daftar->deskripsi }}</textarea>
            @error('deskripsi')
                <div>
                    <label class="text-red-700">{{ $message }}</label>
                </div>
            @enderror
        </div>

        <div class="mt-4">
            <div class="mb-3 w-60">
                <label for="img" class="form-label inline-block mb-2 text-gray-700"> Pilih File</label>
                <img name="img" class="img-preview"
                    src=" {{ asset('/storage/'.$daftar->img) }}" alt="">
                <input name="img" onchange="previewImage()"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300
                      rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="img"
                    @error('img') is-invalid @enderror>
            </div>
            @error('img')
                <div>
                    <label class="text-red-700">{{ $message }}</label>
                </div>
            @enderror
        </div>
        <div class="border border-dashed border-black relative mt-14 w-80 h-32">
            <label for="img" class="form-label inline-block mb-2 text-black"> Upload foto wisata :
                jpg,png,jpeg</label>
            <input type="file" name="photos[]" id="inputImage" multiple onchange="previewImage()"
                class="@error('image') is-invalid @enderror block w-full text-sm mt-28 text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            @error('photos')
                <label class="text-red-700">{{ $message }}</label>
            @enderror
            <hr class="my-1">

        </div>
        <div class="mt-20">
            <div class="flex justify-start">
                <div class="flex ml-10 mb-10 justify-center">
                    <button
                        class="inline-block px-12 w-40 h-10 text-sm font-medium text-green-600 border border-green-600 rounded hover:bg-green-600 hover:text-white active:bg-green-500 focus:outline-none focus:ring">
                        <span class="ml-2 font-semibold text-lg">Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="ml-10 mt-4">
<label for="img" class="form-label inline-block mb-4 text-black text-lg ml-6"> Hapus Foto Wisata :
    {{-- <div class="flex items-end mt-3 ml-3 mb-4">
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
    </div> --}}
    <table class="text-sm text-left text-gray-500 dark:text-gray-400 mt-4">
        <thead class="mx-4 my-2 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-1">No</th>
                <th class="px-6 py-1">Foto</th>
                <th class="px-6 py-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($daftar->image as $image)
                <tr>
                    <td class="px-6 py-4"></td>
                    <td class="px-6 py-4">
                        <img class="object-cover w-40 h-20 rounded shadow-lg mt-2"
                            src="{{ asset('/storage/'. $image->image) }}" alt="" />
                    </td>
                    <td class="px-6 py-4">
                       
                        <a href="/deletImage/{{$image->id}}" class="btn-sm mr-2 pb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    @endsection

    <script type="text/javascript">
        const checkbox = document.getElementById("flexCheckIndeterminate");
        checkbox.indeterminate = true;

        function previewImage() {
            const img = document.querySelector('#img');
            const imgPreview = document.querySelector('img-preview');

            imgPreview.style.display = 'block';

            const oFrReader = new FileReader();
            ofReader.readAsDataURL(img.files[0]);

            oFrReader.onLoad = function (ofREvent) {
                imgPreview.src = ofREvent.target.result;
            }
        }

        function previewImage() {
            const img = document.querySelector('#img');
            const imgPreview = document.querySelector('img-preview');

            imgPreview.style.display = 'block';

            const oFrReader = new FileReader();
            ofReader.readAsDataURL(img.files[0]);

            oFrReader.onLoad = function (ofREvent) {
                imgPreview.src = ofREvent.target.result;
            }
        }
    </script>