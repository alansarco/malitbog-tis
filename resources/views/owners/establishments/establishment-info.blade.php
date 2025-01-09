@extends('layouts/blankLayout')
@section('content')
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
                customClass: {
                    title: 'alert-title',
                    icon: 'alert-icon',
                    confirmButton: 'alert-confirmButton',
                    cancelButton: 'alert-cancelButton',
                    container: 'alert-container',
                    popup: 'alert-popup'
                },
            })
            @php
                session()->forget('error');
            @endphp
        });
    </script>
    @endif
    <div class="container-fluid mt-5">
        <h2 class="text-center text-warning">{{ $establishment->name }}</h4>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div id="map" style="height: 500px; width:100%"></div>
            </div>
        </div>
    </div>
    <div class="container d-flex flex-column justify-content-center py-5 gap-5">        
        <div class="row mt-3">
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
                <div class="row justify-content-center align-items-center">
                    <h6 class="text-warning text-uppercase text-center" style="letter-spacing: 5px;">Galleries</h6>

                    <div class="col pb-1">
                        <!-- Start of Carousel with Continuous Slide Effect -->
                        <div id="imageCarousel" class="carousel slide carousel-3d" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
                            <div class="carousel-inner">
                                @forelse ($establishment->galleries as $gallery)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <img class="w-100 border border-white" src="{{ App\Helpers\ImagePathHelper::normalizePath($gallery->path) }}">
                                </div>
                                @empty
                                    <img src="https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg"
                                        alt="" class="w-100">
                                @endforelse
                            </div>
                            <!-- Carousel Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <p class="text-light-blue text-lg font-weight-bold mb-0">COMMENTS:</p>
                        <div class="d-flex flex-column gap-3 p-2 d-flex" >
                            <livewire:reviews establishmentId="{{ $establishment->id }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>

    <script>
        var latitude = {{ $establishment?->geolocation_latitude ?? '10.158163827849396' }};
        var longitude = {{ $establishment?->geolocation_longitude ?? '125.00094211920187' }};

        // Initialize the map
        var map = L.map('map', {
            center: [latitude, longitude],
            zoom: 19
        });

        // Add tile layer (Google or OpenStreetMap)
        APIKEY = "<a href='http://openstreetmap.org/AIzaSyA9pFkwVbR7uGz0sU47QoU7Gn4RfNqB3ow'>OpenStreetMap</a>";
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: 'Leaflet &copy; ' + APIKEY + ', contribution',
            maxZoom: 20,
        }).addTo(map);
        
        // Destination marker
        L.marker([latitude, longitude]).addTo(map)
            .bindPopup('Destination')
            .openPopup();

        // Define a custom icon for the current location
        var currentLocationIcon = L.icon({
            iconUrl: '{{ asset('assets/img/images/cartoon.png') }}',
            iconSize: [64, 64],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });
        

        // Southern Leyte boundaries (approximate latitudes and longitudes)
        const locationBounds = {
            // Philippines
            north: 21.0,  
            south: 4.5,   
            east: 126.6,  
            west: 116.9   

            // Southern Leyte
            // north: 10.520, 
            // south: 9.850,  
            // east: 125.350, 
            // west: 124.750 
        };

        // Function to check if current location is within Southern Leyte
        function isWithinBoundaries(lat, lon) {
            return (
                lat >= locationBounds.south &&
                lat <= locationBounds.north &&
                lon >= locationBounds.west &&
                lon <= locationBounds.east
            );
        }

        // Function to add marker for current location and draw route
        function addCurrentLocationMarker(position) {
            var currentLat = position.coords.latitude;
            var currentLon = position.coords.longitude;

            if (isWithinBoundaries(currentLat, currentLon)) {
                // Add current location marker
                var currentMarker = L.marker([currentLat, currentLon], { icon: currentLocationIcon })
                    .addTo(map)
                    .bindPopup('You are here')
                    .openPopup();

                // Add routing control (Leaflet Routing Machine)
                L.Routing.control({
                    waypoints: [
                        L.latLng(currentLat, currentLon),  // Start point: current location
                        L.latLng(latitude, longitude)      // Destination
                    ],
                    routeWhileDragging: true,
                    createMarker: function() { return null; }  // Hide default waypoint markers
                }).addTo(map);

                // Fit the map view to show both points
                var bounds = L.latLngBounds([
                    [currentLat, currentLon],    // User's current location
                    [latitude, longitude]        // Destination
                ]);
                map.fitBounds(bounds, { padding: [50, 50] });  // Add padding for better visibility
            } else {
                // Hide the map if outside Southern Leyte
                document.getElementById('map').style.display = 'none';
                Swal.fire({
                    title: 'Out of Zone',
                    text: "Your current location is outside the Southern Leyte zone, we can't show you the map.",
                    icon: 'warning',
                    customClass: {
                        title: 'alert-title',
                        icon: 'alert-icon',
                        confirmButton: 'alert-confirmButton',
                        cancelButton: 'alert-cancelButton',
                        container: 'alert-container',
                        popup: 'alert-popup'
                    },
                });
            }
        }

        // Check if geolocation is available and get current position
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(addCurrentLocationMarker, function(error) {
                console.error("Geolocation failed: " + error.message);
                document.getElementById('map').style.display = 'none';
            });
        } else {
            console.error("Geolocation is not supported by this browser.");
            document.getElementById('map').style.display = 'none';
        }


    </script>
@endsection
