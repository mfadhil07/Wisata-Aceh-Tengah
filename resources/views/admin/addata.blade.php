<!DOCTYPE html>
<html data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <link rel="stylesheet" href="leaflet-search/src/leaflet-search.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="leaflet-routing/dist/leaflet-routing-machine.js"></script>
    <style>
        #mapid {
            height: 500px;
            width: 100%;
        }
    </style>
    <title> {{ $title }}</title>
</head>

<h1 class="text-2xl font-semibold font-sans ml-20 mt-4"> Tambah Objek Wisata</h1>

<div class="mt-4">
    <a href="/a_daftar" class="ml-28">
        <button class="btn btn-sm btn-outline btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
            </svg>
            <span class="ml-1">Back</span>
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
<div class="grid grid-cols-2 gap-4">
    <div class="ml-28">
        <form action="/a_daftar" method="post" enctype="multipart/form-data" class="ml-10">
            @csrf
            <div class="grid grid-cols-1 ml-4 mt-2">
                <div class="md:grid-cols-1">
                    <label class="label w-60">
                        <span class="label-text ml-2 font-bold">Nama Objek Wisata <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <input type="text" placeholder="Nama Objek Wisata" name="nama" id="nama"
                        class="input input-accent input-bordered w-80 @error('nama')  @enderror" autofocus
                        value={{ old('nama') }}>
                    @error('nama')
                        <div>
                            <span class="font-sm text-red-700 ">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="md:grid-cols-1">
                    <label class="label ">
                        <span class="label-text ml-2 font-bold">Kecamatan <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <select name="kecamatan" id="kecamatan" class="select max-w-xs select-accent w-80">
                        <option value=""> Pilih Kecamatan</option>
                        <option value="Atu Lintang"> Atu Lintang </option>
                        <option value="Bebesen"> Bebesen </option>
                        <option value="Bies"> Bies</option>
                        <option value="Bintang"> Bintang </option>
                        <option value="Celala"> Celala</option>
                        <option value="Jagong Jeget"> Jagong Jeget</option>
                        <option value="Kebayakan"> Kebayakan</option>
                        <option value="Ketol"> Ketol </option>
                        <option value="Kute Panang"> Kute Panang</option>
                        <option value="Lut Tawar"> Lut Tawar</option>
                        <option value="Linge"> Linge</option>
                        <option value="Pegasing"> Pegasing </option>
                        <option value="Rusip Antara"> Rusip Antara </option>
                        <option value="Silih Nara"> Silih Nara </option>
                    </select>
                    @error('kecamatan')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="md:grid-cols-1">
                    <label class="label mt-2">
                        <span class=" label-text ml-2 font-bold"> Desa <span style="color:red"> &#x26B9;</span> </span>
                    </label>
                    <input type="text" placeholder="Desa" id="desa" name="desa"
                        class="input input-bordered input-accent w-80 @error('desa') is-invalid @enderror"
                        value={{ old('desa') }}>
                    @error('desa')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label class="label mt-2">
                        <span class=" label-text ml-2 font-bold">Latitude<span style="color:red"> &#x26B9;</span> </span>
                    </label>
                    <input type="text" placeholder="4.61......" name="latitude" id="latitude"
                        class="input input-bordered input-accent input- w-80 @error('latitude') is-invalid @enderror"
                        value={{ old('latitude') }}>
                    @error('latitude')
                        <div>
                            <label class="text-red-700">{{ $message }} &#x26B9;</label>
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label class="label mt-2">
                        <span class="label-text ml-2 font-bold">Longitude <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <input type="text" placeholder="98.84....." name="longitude" id="longitude"
                        class="input input-bordered input-accent input- w-80 @error('longitute') is-invalid @enderror"
                        value={{ old('longitude') }}>
                    @error('longitude')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label class="label mt-2">
                        <span class=" label-text ml-2 font-bold">Hari Buka <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <input type="text" placeholder="Senin - Minggu" name="hari" id="hari"
                        class="input input-bordered input-accent input- w-80 @error('hari') is-invalid @enderror"
                        value={{ old('hari') }}>
                    @error('hari')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label class="label mt-2">
                        <span class=" label-text ml-2 font-bold">Jam Buka - Tutup <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <input type="text" placeholder="08.00 - 18.00" name="jam" id="jam"
                        class="input input-bordered input-accent input- w-80 @error('jam') is-invalid @enderror"
                        value={{ old('jam') }}>
                    @error('jam')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>

                <div class="">
                    <label class="label mt-2">
                        <span class=" label-text ml-2 font-bold">Harga Tiket <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <input type="text" placeholder="5.000" name="tiket" id="tiket"
                        class="input input-bordered input-accent input- w-80 @error('tiket') is-invalid @enderror"
                        value={{ old('tiket') }}>
                    @error('tiket')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="mt-9">
                    <h2>Fasilitas Wisata </h2>
                    @foreach($fasilitas as $f)
                        {{-- <option value="{{ $f['id'] }}">
                        {{ $f['fasilitas'] }}</option> --}}
                        <label class="inline-flex items-center mt-3">
                            <input name="fasilitas[]" type="checkbox" value="{{ $f['id'] }}"
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
                        <span class="label-text ml-2 font-bold">Kategori Wisata <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <select name="kategori" id="kategori" class="select max-w-xs select-accent w-80">
                        <option value=""> Pilih Kategori Wisata</option>
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
                <div class="">
                    <label class="label mt-2">
                        <span class=" label-text ml-2 font-bold">Link Website atau Instagram </span>
                    </label>
                    <input type="text" placeholder="https://id.wikipedia.org/wiki/Kabupaten_Aceh_Tengah" name="link" id="link"
                        class="input input-bordered input-accent input- w-80 @error('link') is-invalid @enderror"
                        value={{ old('link') }}>
                    @error('link')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="label mt-0">
                        <span class=" label-text ml-2 font-bold">Deskripsi <span style="color:red"> &#x26B9;</span></span>
                    </label>
                    <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi" cols="30" rows="4"
                        class="input input-bordered input-accent h-40 w-80 @error('deskripsi') is-invalid @enderror"
                        value={{ old('deskripsi') }}></textarea>
                    @error('deskripsi')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="mt-0 relative bordered">
                    <label for="image" class=" mr-4"> Pilih Foto : <span style="color:red"> &#x26B9;</span></label>
                    <div class="">
                        <div class="max-w-1/3 h-20 rounded-lg ">
                            <div class="items-center justify-center w-full h-10">
                                <input type="file" id="img" name="img"
                                    class="flex h-10 mt-2 ml-6 @error('img') is-invalid @enderror"
                                    value={{ old('img') }}>
                            </div>
                        </div>
                    </div>
                    @error('img')
                        <div>
                            <label class="text-red-700">{{ $message }}</label>
                        </div>
                    @enderror
                </div>
                <div class="flex justify-start">
                    <div class="flex ml-16 mb-10 mt-8">
                        <button
                            class="inline-block px-12 py-3 w-40 h-12 text-sm font-medium text-green-600 border border-green-600 rounded hover:bg-green-600 hover:text-white active:bg-green-500 focus:outline-none focus:ring">
                            <span class="ml-2 font-semibold text-lg">Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-8">
        <p class="mb-2 font-semibold">Geser Marker warna biru ke titik lokasi objek wisata yang ingin ditambahkan</p>
        <div id="mapid"></div>
    </div>
</div>

<script src="leaflet-search/src/leaflet-search.js"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script type="text/javascript" src="js/kec.js"> </script>
<script>

    var curLocation=[0,0];
    if(curLocation[0]==0 && curLocation[1]==0){
        curLocation =[4.621939830, 96.84726958];
    }
    let latLng = [4.621939830, 96.84726958];
    var mymap = L.map('mapid').setView(latLng, 14);
    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Leaflet</a>',
            id: 'mapbox/streets-v11',
        }).addTo(mymap);
    mymap.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position,{
            draggable : 'true'
        }).bindPopup(position).update();
        $("#latitude").val(position.lat);
        $("#longitude").val(position.lng).keyup();
    });
        $("#latitude, #longitude").change(function(){
            var position =[parseInt($("#latitude").val()), parseInt($("#longitude").val())];
            marker.setLatLng(position,{
                draggable : 'true'
            }).bindPopup(position).update();
            mymap.panTo(position);
        });

    mymap.addLayer(marker);
    

</script>