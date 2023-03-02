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
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <link rel="stylesheet" href="leaflet-search/src/leaflet-search.css" />
    <link rel="stylesheet" href="{{ asset('leaflet-compass-master/src/leaflet-compass.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="leaflet-routing/dist/leaflet-routing-machine.js"></script>
    <style>
        #mapid {
            /* position: fixed !important; */
            height: 580px;
            width: 100%;
  
        }
        .paginate-text p {
            width: 24rem;
            margin: ;
            margin-left: 2rem;
        }
    </style>
    <title> {{ $title }}</title>
</head>

<body>
    <section class="flex flex-row">
        <nav class="h-screen hidden lg:block shadow-lg relative w-14 pr-14">
            <div class="fixed flex flex-col top-0 left-0 w-18 bg-gray-100 h-full border-2 mr-6">
                <a href="/"
                    class=" border-b-2 border-transparent hover:border-blue-500 mx-0 sm:mx-3 mt-20 mb-3  {{ $active === 'home' ? 'active: bg-green-600' : '' }}"
                    title="Home">
                    <span>
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </span>
                </a>
                <a href="/maps"
                    class="border-b-2 border-transparent dark:hover:text-gray-200 hover:border-blue-500 mx-0 sm:mx-3 mt-3 mb-3 {{ $active === 'maps' ? 'active: bg-green-600 ' : '' }}"
                    title="Maps">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg></span></a>
                <a href="/rute"
                    class="border-b-2 border-transparent dark:hover:text-gray-200 hover:border-blue-500 mx-0 sm:mx-3 mt-3 mb-3 {{ $active === 'a_rute' ? 'active: bg-green-400 ' : '' }}"
                    title="Rute">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg></span></a>

                {{-- <a href="/daftar"
                    class="border-b-2 border-transparent dark:hover:text-gray-200 hover:border-blue-500 mx-0 sm:mx-3 mt-3 mb-3"
                    title="Daftar">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </span></a> --}}

                <a href="/info"
                    class="border-b-2 border-transparent dark:hover:text-gray-200 hover:border-blue-500 mx-0 sm:mx-3 mt-3"
                    title="info">
                    <span class="text-left">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                </a>
            </div>
        </nav>
        <div class="flex flex-col md:flex-row lg:w-full">
            <div class="order-last md:order-first w-100  md:w-1/4 md:mr-14">
                <div class="flex flex-row">
                    <div class="flex flex-wrap">
                        <div class="w-full h-full sm:w-6/12 md:w-4/12 mt-2 ml-3">
                            <div class="relative inline-flex align-middle w-full ml-1">
                                <button class="btn btn-info btn-sm mt-6" type="button"
                                    onclick="openDropdown(event,'dropdown-id')">
                                    Kategori
                                </button>
                                <div class="hidden bg-white  text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                                    style="min-width:12rem" id="dropdown-id">
                                    <a href
                                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                        Bahari / Air
                                    </a>
                                    <a href
                                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                        Pemandangan
                                    </a>
                                    <a href
                                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                        Ziarah
                                    </a>
                                    <a href
                                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                        Budaya
                                    </a>
                                    <a href
                                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                        Kuliner
                                    </a>
                                    <a href
                                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                        Pertanian
                                    </a>
                                    <div class="h-0 my-2 border border-solid border-t-0 border-slate-800 opacity-25"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="flex justify-end" action="/maps">
                        <div class="ml-2 mt-4 flex mb-16 md:w-60 lg:w-1/2">
                            <div class="absolute border-2 w-60 rounded-btn mt-1">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-1 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="search" id="search" name="search"
                                    class="block p-4 pl-10 w-full items-end text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                    placeholder="Search" required value="{{ request('search') }}">
                                <div class="pl-10">
                                    <button type="submit"
                                        class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="lokasi" class="ml-3" >
                @if(count($daftar) =='null')
                    <div class="mt-2 h-50 w-30 border-2 border-black rounded-lg pr-3">
                    <p class="font-semibold">Tidak Ada Objek Wisata Yang Di Temukan</p>
                    </div>
                @else
                        @foreach ($daftar as $item)
                            <div class="mt-2 h-30 border-2 border-gray-500 rounded-lg pr-3" style="width: 350px;">
                                <img style="width:690px !important;" class="px-1 py-1 ml-1"
                                    src=" {{ asset('/storage/'. $item->img) }}">
                                <h2 class="text-2sm font-bold ml-4">{{ $item->nama }}</h2>
                                <div class="flex ml-3">
                                    <span class="ml-1 text-sm">Desa : {{ $item->desa }} , Kec
                                        {{ $item->kecamatan }}</span>
                                </div>
                                <div class="flex  ml-3">
                                    <span class="ml-1  text-sm text-center">Hari Buka : {{ $item->hari }}</span>
                                </div>
                                <div class="flex  ml-3">
                                    <span class="ml-1  text-sm text-center">Jam Buka-Tutup : {{ $item->jam }} WIB</span>
                                </div>
                                <div class="flex ml-3">
                                    <span class="ml-1  text-sm text-center">Harga Tiket : {{ $item->tiket }}</span>
                                </div>
                                <div class="flex ml-3">
                                    <span class=" ml-1 text-sm text-center">Kategori Wisata: </span>
                                    <button class="ml-1 btn btn-info btn-xs">{{ $item->kategori }}</button>
                                </div>
                                <div class="ml-4">
                                    <p class="text-gray-900 text-2sm"> Fasilitas Wisata </p>
                                    @foreach ($item->fasilitas as $fas)
                                        <label class="inlie-flex items-center">
                                            <input disabled type="checkbox" class="form-checkbox h-4 w-4 text-green-600"
                                                checked><span class="ml-3 text-sm text-gray-700">{{ $fas }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                {{-- Rating --}}
                                <div class="pt-0 mt-2 ml-4">
                                    <div class="flex items-center">
                                        <div class="flex items-center w-24">
                                            @for ($x = 1; $x <= $item->skor; $x++)
                                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg>
                                            @endfor
                                            @for ($x = 0; $x < $item->sisa; $x++)
                                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                    </path>
                                                </svg>
                                            @endfor
                                        </div>
                                        {{-- <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                            {{ round($item->skor, 1) }}/5</p> --}}
                                    </div>
                                </div>
                                <div class="stat mt-0">
                                    <div class="flex justify-end">
                                        <a href="/register">
                                            <button
                                                class=" text-yellow-500 border border-yellow-500 hover:bg-yellow-500 hover:text-white active:bg-yellow-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 modal-button mr-2 btn-voting">Voting</label>
                                            </button>
                                        </a>
                                        <button
                                            class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="button"><a href="/det/{{ $item->id }}">Detail</a> </button>
                                        <button data-lat="{{ $item->latitude }}" data-long={{ $item->longitude }}
                                            class="text-gray-700 border btn-rute border-gray-700 hover:bg-gray-700 hover:text-white active:bg-gray-700 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                            type="button">Rute</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @endif
                </div>
                <div class="my-1 mt-12 mr-3 paginate-text">
                    {{ $daftar->links() }}
                </div>
            </div>
            <div class="order-first md:order-last w-full md:w-2/3 md:ml-6 mt-2">
                <div class="justify-end">
                    <button class="btn btn-outline btn-sm mt-3 dariSini btn-primary" id="btn-getloc">
                        Mulai dari Posisi Anda 
                    </button>
                    <button class="mr-10 mt-3 mb-2 btn btn-outline btn-success btn-sm" type="button"
                    onclick="toggleModal('modal-id')">
                    Panduan
                </button>
                {{-- <div class="justify-end">
                    <p class="font-bold">Jika Anda Menekan Marker di Map, Maka akan muncul Informasi tentang Objek wisata tersebut</p>
                </div> --}}
                <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                    id="modal-id">
                    <div class="relative mt-20 w-auto my-6 mx-auto max-w-3xl">
                        <!--content-->
                        <div
                            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                            <!--header-->
                            <div
                                class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                                <h3 class="text-3xl font-semibold">
                                    Panduan Rute
                                </h3>
                                <button
                                    class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                    onclick="toggleModal('modal-id')">
                                    <span
                                        class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <!--body-->
                            <div class="relative p-6 flex-auto">
                                <p class="my-4 text-slate-500 text-lg leading-relaxed">
                                    1. Tentukan lokasi anda dengan menekan tombol mulai dari posisi anda atau mengeser marker biru yang ada di peta.<br>
                                    2. Anda bisa mencari tujuan dengan mencari  nama Objek Wisata, Desa, Kecamatan atau Kategori Wisata dan menekan tombol rute untuk melakukan Routing dari lokasi Anda <br>
                                    3. Anda juga bisa mengklik marker merah akan muncul pop up, dan tekan pilih kesini untuk melakukan Rute.<br>
                                    4. Selesai <br>
                                </p>
                            </div>
                            <!--footer-->
                            <div
                                class="flex items-center justify-end p-4 border-t border-solid border-slate-200 rounded-b">
                                <button class="btn btn-outline btn-warning" type="button"
                                    onclick="toggleModal('modal-id')">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="mt-2 ">
                    <div class="z-10" style="position:relative; height: 580px; width: 96%;"  id="mapid">
                </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="leaflet-search/src/leaflet-search.js"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script src="{{ asset('leaflet-compass-master/src/leaflet-compass.js')}}"></script>
<script type="text/javascript" src="js/kec.js"> </script>

<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }

    function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
            placement: 'bottom-start'
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
    }

    let latLng = [4.61270103, 96.923123];
    var mymap = L.map('mapid').setView(latLng, 11);

    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Leaflet</a>',
            id: 'mapbox/streets-v11',
        }).addTo(mymap);
    var smallIcon = new L.Icon({
        iconSize: [30, 30],
        iconAnchor: [13, 27],
        popupAnchor: [1, -24],
        iconUrl: 'icon/icon.png'
    });

//rute
    let control = L.Routing.control({
        waypoints: [
            latLng
        ],
        lineOptions: {
      styles: [{color: 'blue', opacity: 1, weight: 5}]
   }
    }).addTo(mymap);

    let circle = L.circle([4.61270103, 96.923123], 
    {radius: 2000}).addTo(mymap);

    $(document).on("click", ".keSini", function () {
        const lat = $(this).data('lat')
        const long = $(this).data('lng')
        const latlng = [lat, long]
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latlng);
    })
    //compass
    var comp = new L.Control.Compass({autoActive: true, showDigit:true});
    mymap.addControl(comp);

  
//get Location
$(document).on('click', '#btn-getloc', function(e) {
    e.preventDefault()
    if (control != null) {
            mymap.removeControl(control);
            control = null;
    }
    getLocation()
})
function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert('Geolocation is not supported by this browser')
        }
    }
    function showPosition(position) {
    const x = position.coords.latitude
    const y = position.coords.longitude
    const tt = [x, y]

    control = L.Routing.control({
        waypoints: [
            tt
        ],
        lineOptions: {
      styles: [{color: 'blue', opacity: 1, weight: 5}]
   },
    }).addTo(mymap);
    }

var kecamatan = L.geoJSON(kecamatan, {
    style: function(feature) {
        switch (feature.properties.KECAMATAN) {
            case 'Kecamatan Atu Lintang': return {color: "black"};
            case 'Kecamatan Bebesen': return {color: "blue"};
            case 'Kecamatan Pegasing': return {color: "grey"};
            case 'Kecamatan Bies': return {color: "green"};
            case 'Kecamatan lut tawar': return {color: "gold"};
            case 'Kecamatan Linge': return {color: "black"};
            case 'Kecamatan Kute Panang': return {color: "black"};
            case 'Kecamatan Jagong Jeget': return {color: "#8b0000"};
            case 'Kecamatan Bintang': return {color: "#00008b"};
            case 'Kecamatan Rusip Antara': return {color: "#9400D3"};
            case 'Kecamatan Silih Nara': return {color: "#2F4F4F"};
            case 'Kecamatan Celala': return {color: "#4B0082"};
            case 'Kecamatan Kebayakan': return {color: "#00FF00"};
            case 'Kecamatan Ketol': return {color: "#808000"};
        }
    }
}).addTo(mymap);

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const kategori = urlParams.get('search')
    let query = ''
    if(kategori != null) {
        query = `?search=${kategori}`
    }
    
    $.ajax({
        url: 'http://127.0.0.1:8000/json' + query,
        success: function (response) {
            const myLayer = L.geoJSON(response, {
                onEachFeature: function (feature, layer) {
                    let coord = feature.geometry.coordinates;
                    layer.bindPopup(
                        `<h1 class="text-sm"><b> <center>  ${feature.properties.name}</center></b><center> Kec.  
                            ${feature.properties.kecamatan} , Desa ${feature.properties.desa} </center> <center> Kategori :
                          <b>${feature.properties.kategori}</center></b> </h1>
                        <div class="flex justify-center"> <button class='btn btn-info btn-xs keSini' data-lat='${coord[1]}' 
                            data-lng='${coord[0]}'>Ke Sini</button></div>`
                    )
                },
                pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {
                        icon: smallIcon
                    });
                },
            }).on('click', function (e) {
                const id_lokasi = e.layer.feature.properties.id;
                getDetailLokasi(id_lokasi)
                $('.paginate-text').addClass('hidden')
            }).addTo(mymap)
            
            // control Search
            L.control.search({
                layer: myLayer,
                initial: false,
                propertyName: 'name',
                buildTip: function (text, val) {
                    return '<a href="#" class="">' + text + '<b>'
                    '</b></a>';
                }
            }).addTo(mymap);
        }
    })

    function printRating(skor) {
        let html = ''
        for (let i = 1; i <= skor; i++) {
            html += `<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>`
                                 }
                    return html
             }
    function printSisa(sisa) {
        let html = ''
        for (let i = 0; i < sisa; i++) {
            html += `<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>`
                                 }
                        return html
                 }

    function getDetailLokasi(id) {
        $.ajax({
            url: 'http://127.0.0.1:8000/detail_lokasi/' + id,
            success: function(response) {
                const lokasi = document.querySelector("#lokasi");
                lokasi.innerHTML = ` <div class="mt-2 h-30 border-2 border-gray-400 rounded-lg pr-3" style="width: 350px;">
                                    <img style="width:690px !important;" class="px-1 py-2 ml-2" src="/storage/${ response.img }" >
                                    <h2 class="text-2sm font-bold mt-1 ml-4"> ${response.nama} </h2>
                                    <div class="flex ml-3">
                                        <span class="ml-1 text-sm"> Desa ${response.desa}, Kec. ${response.kecamatan} </span>
                                    </div>
                                    <div class="flex  ml-3">
                                        <span class="ml-1  text-sm text-center"> Hari Buka : ${response.hari}</span>
                                    </div>
                                    <div class="flex  ml-3">
                                        <span class="ml-1  text-sm text-center"> Buka : ${response.jam} WIB</span>
                                    </div>
                                    <div class="flex ml-3">
                                        <span class="ml-1  text-sm text-center"> Harga Tiket Rp.${response.tiket} / orang</span>
                                    </div>
                                    <div class="flex ml-3">
                                        <span class=" ml-1 text-sm text-center">Kategori Wisata: </span>
                                        <button class="ml-1 btn btn-info btn-xs">${response.kategori}</button>
                                    </div>
                                    <div class="ml-3 mt-0">
                                        <p class="text-gray-900  text-2sm"> Fasilitas Wisata </p>
                                        <p class="text-gray-900  text-sm"> ${response.fasilitasString} </p>
                                    </div>
                                    <div class="pt-0 mt-2 ml-2">
                                                            <div class="flex items-center">
                                                                <div class="flex items-center w-24">
                                                                    ${printRating(response.skor)}
                                                                    ${printSisa(response.sisa)}
                                </div>
                            </div>
                        </div>
                        <div class="stat mt-0">
                            <div class="flex justify-end">
                                <a href="/register">
                                    <button
                                        class=" text-yellow-500 border border-yellow-500 hover:bg-yellow-500 hover:text-white active:bg-yellow-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 modal-button mr-2 btn-voting">Voting</label>
                                    </button>
                                </a>
                                <button
                                    class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button"><a href="/detail/${response.id}"> Detail </a></button>
                                <button data-lat="${ response.latitude }" data-long=${response.longitude}
                                    class="text-gray-700 border btn-rute border-gray-700 hover:bg-gray-700 hover:text-white active:bg-gray-700 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button">Rute</></button>
                            </div>
                        </div>
                    </div>
                    `
            }
        })
    }

    $(document).on('click', '.btn-rute', function(e) {
        e.preventDefault()
        const lat = $(this).data('lat')
        const long = $(this).data('long')
        const latlng = [lat, long]
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latlng);
    })
</script>

</html>
