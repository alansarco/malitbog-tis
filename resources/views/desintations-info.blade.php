@extends('layouts/blankLayout')
@section('content')
    <x-navbar />
    @if(session('error'))
    <style>
        /* Responsive styling for text */
        p {
            text-align: justify;
            text-justify: inter-word;
        }
        .indent {
            text-indent: 2rem !important;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Error',
                text: "You already rate this establishment!",
                icon: 'error',
            })
            @php
                session()->forget('error');
            @endphp
        });
    </script>
    @endif
    <div class="container d-flex flex-column justify-content-center py-5 gap-5">
        <h2 class="text-center text-warning">{{ $establishment->name }}</h4>
        <div class="row">
            <div class="col">
                <div id="map" style="height: 500px; width:100%"></div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-7">
                <h3 class="text-primary">Overview</h3>
                <p class="indent">{{ $establishment->description }}</p>
            </div>
            <div class="col-md-5">
                <div class="row m-0">
                    <h6 class="text-warning text-uppercase text-center" style="letter-spacing: 5px;">Galleries</h6>

                        @forelse ($establishment->galleries as $gallery)
                        <div class="col-6 bg-white p-0 m-0 border border-white">
                            <img class="w-100 border border-white" src="{{ App\Helpers\ImagePathHelper::normalizePath($gallery->path) }}">
                        </div>
                        @empty
                            <img src="https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg"
                                alt="" class="w-100">
                        @endforelse
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-3 pb-3">
                            <h6 class="text-warning text-uppercase" style="letter-spacing: 5px;">Access</h6>
                        <div class="d-flex flex-column gap-2 text-center">
                            {{ $establishment->mode_of_access }}
                        </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="text-center mb-3 pb-3">
                            <h6 class="text-warning text-uppercase" style="letter-spacing: 5px;">Offerings</h6>
                        </div>
                        <div class="d-flex" >
                            <div class="row">
                                @forelse ($establishment->offerings as $offer)
                                <div class="col-12 mb-4">
                                    <div class="package-item bg-white mb-2">
                                        <img class="w-100" src="{{ App\Helpers\ImagePathHelper::normalizePath($offer->path) }}">
                                        <div class="p-4">
                                            {!! $offer->description !!}
                                            <div class="border-top mt-4 pt-4">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="m-0"><i class="fa fa-map-pin text-primary mr-2"></i>{{ $offer->name }}</small></h6>
                                                    <h5 class="m-0 text-primary">₱{{$offer->price}} </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col">
                        <h4 class="text-light-blue">Comments:</h4>
                        <div class="d-flex flex-column gap-3 p-2 d-flex" >
                            <livewire:review establishmentId="{{ $establishment->id }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        var latitude = {{ $establishment?->geolocation_latitude ?? '10.158163827849396' }};
        var longitude = {{ $establishment?->geolocation_longitude ?? '125.00094211920187' }};

        var map = L.map('map', {
            center: [latitude, longitude],
            zoom: 19
        });

        L.marker([latitude, longitude]).addTo(map)
            .bindPopup('Destination');

        // Tile layer for the map
        L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        // Define a custom icon for the current location
        var currentLocationIcon = L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/456/456212.png', // Replace with the path to your custom icon
            iconSize: [32, 32], // Size of the icon [width, height]
            iconAnchor: [16, 32], // Point of the icon which will correspond to marker's location [x, y]
            popupAnchor: [0, -32] // Point from which the popup should open relative to the iconAnchor [x, y]
        });

        // Function to add marker for current location and draw line
        function addCurrentLocationMarker(position) {
            var currentLat = position.coords.latitude;
            var currentLon = position.coords.longitude;

            // Add a marker with the custom icon for the current location
            L.marker([currentLat, currentLon], {
                    icon: currentLocationIcon
                }).addTo(map)
                .bindPopup('You are here')
                .openPopup();

            // Draw a line between the current location and the destination
            var latlngs = [
                [currentLat, currentLon],
                [latitude, longitude]
            ];
            var polyline = L.polyline(latlngs, {
                color: 'red'
            }).addTo(map);

            // Fit the map to the bounds of the polyline
            map.fitBounds(polyline.getBounds());

            // Calculate the distance in kilometers and display it
            var distance = (map.distance([currentLat, currentLon], [latitude, longitude]) / 1000).toFixed(2);

            // Add a permanent distance label to the map
            var distanceLabel = L.control({
                position: 'bottomleft'
            });

            distanceLabel.onAdd = function(map) {
                var div = L.DomUtil.create('div', 'distance-label');
                div.innerHTML = "<strong class='text-white'>Distance to destination: " + distance + " km</strong>";
                return div;
            };

            distanceLabel.addTo(map);
        }

        // Check if geolocation is available and get current position
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(addCurrentLocationMarker, function(error) {
                console.error("Geolocation failed: " + error.message);
            });
        } else {
            console.error("Geolocation is not supported by this browser.");
        }
    </script>
@endsection
