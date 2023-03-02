<!DOCTYPE html>
<html data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="leaflet-routing/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="leaflet-search/src/leaflet-search.css" />
    <script src="leaflet-routing/dist/leaflet-routing-machine.js"></script>
<link rel="stylesheet" href="{{ asset('leaflet-compass-master/src/leaflet-compass.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        #mapid {
            height: 580px;
            width: 99%;
        }
    </style>
    <title> {{ $title }}</title>
</head>

<body>
    <section class="flex flex-row">
        <nav class="h-screen hidden lg:block shadow-lg relative w-14 mr-4">
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
                    class="border-b-2 border-transparent dark:hover:text-gray-200 hover:border-blue-500 mx-0 sm:mx-3 mt-3 mb-3 {{ $active === 'rute' ? 'active: bg-green-400 ' : '' }}"
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
        <div class="w-full ml-2 mt-2">
            <div class="flex justify-start">
                <h1 class="text-2xl font-semibold mx-2 ml-2">Halaman Rute Objek Wisata</h1>
                <div class="flex justify-items-start mt-1 mb-2 mx-2 ml-96">
                    <button class="btn btn-outline btn-sm mt-3 btn-primary" id="btn-getloc">
                            Lihat Lokasi Anda 
                    </button>   
                 </div>
                <button class="mr-10 mt-4 mb-2  btn btn-outline btn-success btn-sm" type="button"
                    onclick="toggleModal('modal-id')">
                    Panduan
                </button>
                <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                    id="modal-id">
                    <div class="relative mt-20 w-auto my-6 mx-auto max-w-5xl">
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
                                    1. Tentukan lokasi anda saat ini dengan menekan tombol lihat lokasi anda atau mengeser *marker* biru pada halaman peta<br>
                                    2. Cari tujuan objek wsiata atau pilih tujuan di marker merah pada peta <br>
                                    3. Klik marker merah akan muncul pop up, dan tekan Pilih Ke Sini untuk menampilkan rute dari lokasi anda ke objek wisata<br>
                                    4. Selesai<br>
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
            <div id="mapid" class="z-10"></div>
        </div>
    </section>

</body>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script src="{{ asset('leaflet-compass-master/src/leaflet-compass.js')}}"></script>
{{-- control search --}}
<script type="text/javascript" src="js/kec.js"> </script>
<script src="leaflet-search/src/leaflet-search.js"></script>
<script type="text/javascript">
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
    let latLng = [4.61970103, 96.9053123];
    var mymap = L.map('mapid').setView(latLng, 11);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);
    var smallIcon = new L.Icon({
        iconSize: [30, 30],
        iconAnchor: [13, 27],
        popupAnchor: [1, -24],
        iconUrl: 'icon/icon.png'
    });
//compass
var comp = new L.Control.Compass({autoActive: true, showDigit:true});
    mymap.addControl(comp);
    
    $.ajax({
        url: 'http://127.0.0.1:8000/json',
        success: function (response) {
            const myLayer = L.geoJSON(response, {
                onEachFeature: function (feature, layer) {
                    let coord = feature.geometry.coordinates;
                    layer.bindPopup(
                        `<h1 class="text-sm"><b> <center>  ${feature.properties.name}</center></b><center> Kec.  ${feature.properties.kecamatan} , Desa ${feature.properties.desa} </center> <center> Kategori : <b>${feature.properties.kategori}</center></b> </h1>
                        <div class="flex justify-center"> <button class='btn btn-info btn-xs keSini' data-lat='${coord[1]}' data-lng='${coord[0]}'>Ke Sini</button></div>`
                    )
                },
                pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {
                        icon: smallIcon
                    });
                },
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

    let control = L.Routing.control({
        waypoints: [
            latLng
        ],
        lineOptions: {
      styles: [{color: 'blue', opacity: 1, weight: 5}]
   }
    }).addTo(mymap);

    $(document).on("click", ".keSini", function () {
        // Let latlng = [$(this).data('lat'), $(this).data('lng')];
        const lat = $(this).data('lat')
        const long = $(this).data('lng')
        const latlng = [lat, long]
        control.spliceWaypoints(control.getWaypoints().length - 1, 1, latlng);
    })

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
            case 'Kecamatan lut tawar': return {color: "#32CD32"};
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


    //getlocation
$(document).on('click', '#btn-getloc', function(e) {
    e.preventDefault()
    getLocation()
})
</script>

</html>