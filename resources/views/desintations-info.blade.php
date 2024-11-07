@extends('layouts/guestLayoutWithScript')

@section('content')
    <x-navbar />

    <div class="container d-flex flex-column justify-content-center mt-5 gap-5">
        <h4 class="text-center">{{ $establishment->name }}</h4>


        <div class="row">

            <section class="col">
                <h2 class="text-3xl font-bold text-center mb-8">Map</h2>
                <div id="map" class="h-100"></div>
            </section>

        </div>
    </div>



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
                color: 'blue'
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
