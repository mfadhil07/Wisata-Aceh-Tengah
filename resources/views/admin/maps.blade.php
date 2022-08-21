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
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <link rel="stylesheet" href="leaflet-search/src/leaflet-search.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        #mapid {
            height: 620px;
            width: 99%;
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
        <nav class="h-screen hidden lg:block shadow-lg relative w-14 mr-4">
            <div class="fixed flex flex-col top-0 left-0 w-18 bg-gray-100 h-full border-2 mr-6">
                <a href="/dashboard"
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
                <a href="/a_maps"
                    class="border-b-2 border-transparent dark:hover:text-gray-200 hover:border-blue-500 mx-0 sm:mx-3 mt-3 mb-3 {{ $active === 'a_maps' ? 'active: bg-green-600 ' : '' }}"
                    title="Maps">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg></span></a>
                <a href="/a_rute"
                    class="border-b-2 border-transparent dark:hover:text-gray-200 hover:border-blue-500 mx-0 sm:mx-3 mt-3 mb-3 {{ $active === 'a_rute' ? 'active: bg-green-400 ' : '' }}"
                    title="Rute">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg></span></a>

                <a href="/a_daftar"
                    class="border-b-2 border-transparent dark:hover:text-gray-200 hover:border-blue-500 mx-0 sm:mx-3 mt-3 mb-3"
                    title="Daftar">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </span></a>

                <a href="/a_info"
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
        <div class="w-1/3">
            <div class="flex flex-row">
                <div class="flex flex-wrap">
                    <div class="w-full h-full sm:w-6/12 md:w-4/12 mt-2 ml-3">
                        <div class="relative inline-flex align-middle w-full">
                            <button class="btn btn-info btn-xs mt-6" type="button"
                                onclick="openDropdown(event,'dropdown-id')">
                                Kategori
                            </button>
                            <div class="hidden bg-white  text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                                style="min-width:12rem" id="dropdown-id">
                                <a href="#"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                    Bahari / Air
                                </a>
                                <a href="#"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                    Pemandangan
                                </a>
                                <a href="#"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                    Ziarah
                                </a>
                                <a href="#"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                    Budaya
                                </a>
                                <a href="#"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                    Kuliner
                                </a>
                                <a href="#"
                                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700">
                                    Pertanian
                                </a>
                                <div class="h-0 my-2 border border-solid border-t-0 border-slate-800 opacity-25"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="flex justify-end" action="/a_maps">
                    <div class="ml-2 mt-4 flex mb-20">
                        <div class="absolute border-2 w-1/4 rounded-btn mt-1">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
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
            <div id="lokasi" class="flex flex-col ml-2 pl-1">
                @foreach ($daftar as $item)
                    <div class="h-30 border-2 border-gray-400 rounded-lg mb-2">
                        <img class="w-full object-cover px-2 py-2" style="min-width: 410px !important;"
                            src=" {{ $item->img }}" alt="River">
                        <h2 class="text-2sm font-bold ml-2">{{ $item->nama }} </h2>
                        <div class="flex ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg> <span class="ml-1 text-sm">Alamat : {{ $item->kecamatan }} , Desa
                                {{ $item->desa }}</span>
                        </div>
                        <div class="flex  ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> <span class="ml-1  text-sm text-center"> Buka-Tutup : {{ $item->jam }}</span>
                        </div>
                        <div class="flex ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> <span class="ml-1  text-sm text-center">Harga Tiket : {{ $item->tiket }}</span>
                        </div>
                        <div class="ml-3">
                            <p class="text-gray-900 text-2sm"> Fasilitas Wisata </p>
                            @foreach ($item->fasilitas as $fas)
                                <label class="inlie-flex items-center">
                                    <input disabled type="checkbox" class="form-checkbox h-4 w-4 text-green-600"
                                        checked><span class="ml-2 text-sm text-gray-700">{{ $fas }}</span>
                                </label>
                            @endforeach
                        </div>
                        <div class="pt-0 mt-2 ml-2">
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
                                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                    {{ round($item->skor, 1) }}/ 5</p>
                            </div>
                        </div>
                        <div class="stat pt-0 mt-4 ml-0">
                            <div class="flex justify-end">
                                <!-- The button to open modal -->
                                <label data-id="{{ $item->id }}" for="my-modal-3"
                                    class=" text-yellow-500 border border-yellow-500 hover:bg-yellow-500 hover:text-white active:bg-yellow-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 modal-button mr-1 btn-voting">Voting</label>
                                <button
                                    class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button"> <a href="/detail/{{ $item->id }}">Detail</a></button>
                                <button
                                    class="text-gray-700 border border-gray-700 hover:bg-gray-700 hover:text-white active:bg-gray-700 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button"><a href="/a_rute">Rute </a></button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-1 mt-12 mr-3 paginate-text">
                {{ $daftar->links() }}
            </div>
        </div>
        <div class="w-full ml-4 mt-4">
            <div id="mapid"></div>
        </div>

        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="my-modal-3" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box relative">
                <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="font-bold text-lg">Voting</h3>
                <form action="/vote" method="post" class="ml-10">
                    @csrf
                    <input type="text" class="hidden" id="id_lokasi" name="id_lokasi" />
                    <div class="w-full mt-10">
                        <input type="range" min="1" max="5" value="1" class="range"
                            step="1" name="skor" />
                        <div class="w-full flex justify-between text-xs px-2">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>4</span>
                            <span>5</span>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="flex mb-10 mt-16">
                            <button
                                class="w-full bg-green-500 text-gray-100 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-20 inline-flex items-center">
                                <span class="ml-2">Vote</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>
<script src="leaflet-search/src/leaflet-search.js"></script>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script type="text/javascript">
    $(document).on("click", ".btn-voting", function() {
        const id_lokasi = $(this).attr("data-id")
        $("#id_lokasi").val(id_lokasi)
    })
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
    var mymap = L.map('mapid').setView([4.6170461, 96.9205841, ], 12);
    L.tileLayer(
        'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Leaflet</a>',
            id: 'mapbox/streets-v11',
        }).addTo(mymap);
    $.ajax({
        url: 'http://dhil.test/json',
        success: function(response) {
            const myLayer = L.geoJSON(response, {
                onEachFeature: function(feature, layer) {
                    layer.bindPopup(
                        `<h1><b>
        <center> ${feature.properties.name} </center>
    </b>
    <center> Kec. ${feature.properties.kecamatan}</center>
    <center> Desa ${feature.properties.desa} </center>
</h1>`
                    )
                },
            }).on('click', function(e) {
                const id_lokasi = e.layer.feature.properties.id;
                getDetailLokasi(id_lokasi)
                $('.paginate-text').addClass('hidden')
            }).addTo(mymap)
            // control Search
            L.control.search({
                layer: myLayer,
                initial: false,
                propertyName: 'name',
                buildTip: function(text, val) {
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
        for (let i = 1; i <= sisa; i++) {
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
            url: 'http://dhil.test/detail_lokasi/' + id,
            success: function(response) {
                const lokasi = document.querySelector("#lokasi");
                lokasi.innerHTML = ` <div class="mt-2 h-30 border-2 border-gray-400 rounded-lg pr-4">
    <img style="min-width: 410px !important;" class="min-h-72 object-cover px-2 py-2" src=" ${ response.img }" alt="River">
    <h2 class="text-2sm font-bold mt-1 ml-2"> ${response.nama} </h2>
    <div class="flex ml-2">
        <span class="ml-1 text-sm"> Kecamatan ${response.kecamatan}, Desa ${response.desa} </span>
    </div>
    <div class="flex  ml-2">
        <span class="ml-1  text-sm text-center"> Buka : ${response.jam}</span>
    </div>
    <div class="flex ml-2">
        <span class="ml-1  text-sm text-center"> Rp.${response.tiket} / orang</span>
    </div>
    <div class="ml-3 mt-1">
        <p class="text-gray-900  text-2sm"> Fasilitas Wisata </p>
        <p class="text-gray-900  text-sm"> ${response.fasilitasString} </p>
    </div>
                 <div class="pt-0 mt-2 ml-2">
                            <div class="flex items-center">
                                <div class="flex items-center w-24">
                                    ${printRating(response.skor)}
                                    ${printSisa(response.sisa)}
                                </div>
                                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                                   ${Math.floor(response.skor)}/5</p>
                            </div>
                </div>
    <div class="stat mt-0 ">
        <div class="stat pt-0 mt-4 ml-10">
                            <div class="flex justify-end">
                                <!-- The button to open modal -->
                                <label data-id="${response.id}" for="my-modal-3"
                                    class=" text-yellow-500 border border-yellow-500 hover:bg-yellow-500 hover:text-white active:bg-yellow-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mb-1 ease-linear transition-all duration-150 modal-button mr-1 btn-voting">Voting</label>
                                <button
                                    class="text-green-500 border border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button"> <a href="/detail/${response.id}">Detail</a></button>
                                <button
                                    class="text-gray-700 border border-gray-700 hover:bg-gray-700 hover:text-white active:bg-gray-700 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button"><a href="/a_rute"> Rute  </a></button>
                            </div>
                        </div>
        `
            }
        })
    }
</script>

</html>