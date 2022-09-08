<!DOCTYPE html>
<html data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <style>
        #mapid {
            height: 400px;
            width: 100%;
            padding-bottom: 0%;
        }
    </style>

    <script>
        const base_url = "{{ url('') }}"
    </script>

    <title> {{ $title }}</title>
</head>

<body>
    <div class="flex flex-row">
        @include('layouts.navbar')
        <div class="w-full mr-2">
            @yield('isi')
        </div>
    </div>
</body>
<script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/kec.js"> </script>
<script>
    function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        var popper = Popper.createPopper(
            element,
            document.getElementById(dropdownID), {
                placement: "bottom-start",
            }
        );
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
    }

    // $(document).ready(function() {
    //     $('.js-example-basic-multiple').select2();
    // });

    const defaultLongitude = (document.getElementById('mapid').dataset.longitude) ? parseFloat(document.getElementById('mapid').dataset.longitude) : 4.61270103;
    const defaultLatitude = (document.getElementById('mapid').dataset.latitude) ? parseFloat(document.getElementById('mapid').dataset.latitude) : 96.923123;

    var map = L.map('mapid').setView([defaultLatitude, defaultLongitude], 18);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', ).addTo(map);

    $.ajax({
        url: `${base_url}/json`,
        success: function(response) {
            const myLayer = L.geoJSON(response, {
                onEachFeature: function(feature, layer) {
                    let coord = feature.geometry.coordinates;
                    layer.bindPopup(
                        `<h1 class="text-sm"><b> <center>  ${feature.properties.name}</center></b>`
                    )
                },

            }).addTo(map);
        }
    })

    L.marker()
    var kecamatan = L.geoJSON(kecamatan, {
        style: function(feature) {
            switch (feature.properties.KECAMATAN) {
                case 'Kecamatan Atu Lintang':
                    return {
                        color: "black"
                    };
                case 'Kecamatan Bebesen':
                    return {
                        color: "blue"
                    };
                case 'Kecamatan Pegasing':
                    return {
                        color: "grey"
                    };
                case 'Kecamatan Bies':
                    return {
                        color: "green"
                    };
                case 'Kecamatan lut tawar':
                    return {
                        color: "gold"
                    };
                case 'Kecamatan Linge':
                    return {
                        color: "black"
                    };
                case 'Kecamatan Kute Panang':
                    return {
                        color: "black"
                    };
                case 'Kecamatan Jagong Jeget':
                    return {
                        color: "#8b0000"
                    };
                case 'Kecamatan Bintang':
                    return {
                        color: "#00008b"
                    };
                case 'Kecamatan Rusip Antara':
                    return {
                        color: "#9400D3"
                    };
                case 'Kecamatan Silih Nara':
                    return {
                        color: "#2F4F4F"
                    };
                case 'Kecamatan Celala':
                    return {
                        color: "#4B0082"
                    };
                case 'Kecamatan Kebayakan':
                    return {
                        color: "#00FF00"
                    };
                case 'Kecamatan Ketol':
                    return {
                        color: "#808000"
                    };
            }
        }
    }).addTo(map);
</script>

</html>