<div>
    <x-navbar />

    <section class="relative">
        <img src="{{ $establishment->images->first()?->path ?? 'https://images.unsplash.com/photo-1680868543815-b8666dba60f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=400&h=310&q=80' }}"
            alt="Destination Image" class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center">
            <h1 class="text-white text-4xl font-bold">{{ $establishment->name }}</h1>
        </div>
    </section>

    <!-- Destination Overview -->
    <section class="container mx-auto py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Overview</h2>
        <div class="md:flex">
            <div class="md:w-2/3 pr-4">
                <p class="text-blue-600 leading-relaxed">
                    {{ $establishment->description }}
                </p>
            </div>
            <div class="md:w-1/3 bg-yellow-300 p-6 rounded-lg">
                <h3 class="text-xl font-bold mb-4">Key Facts</h3>
                <ul class="list-disc list-inside">
                    <li><strong>Location:</strong> {{ $establishment->address }}</li>
                    <li><strong>Hours of Operation:</strong> {{ $establishment->hours_of_operation }}</li>
                    <li><strong>Contact Number:</strong> {{ $establishment->contact_number }}</li>
                    <li><strong>Category:</strong> {{ $establishment->category }}</li>
                    <li><strong>Transportation:</strong> {{ Str::title($establishment->mode_of_transportation) }}</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Photo Gallery -->
    <section class="container mx-auto py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Photo Gallery</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @forelse ($establishment->images as $image)
                <x-image-gallery name="{{ $image->name }}" path="{{ $image->path }}" />
            @empty
                <img src="https://via.placeholder.com/600x400" alt="Gallery Image 1"
                    class="w-full h-64 object-cover rounded-lg">
                <img src="https://via.placeholder.com/600x400" alt="Gallery Image 2"
                    class="w-full h-64 object-cover rounded-lg">
                <img src="https://via.placeholder.com/600x400" alt="Gallery Image 3"
                    class="w-full h-64 object-cover rounded-lg">
            @endforelse
        </div>
    </section>

    <section class="container mx-auto py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Map</h2>
        <div id="map" class="h-[500px]"></div>
    </section>

    <!-- Reviews Section -->
    <section class="container mx-auto py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Visitor Reviews</h2>
        <div class="space-y-6">

            @forelse ($establishment->reviews as $review)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center">
                        <span class="text-yellow-500">&#9733;</span>
                        <span class="ml-2 text-gray-600">({{ $review->rate }})</span>
                    </div>
                    <p class="mt-4 text-blue-600">{{ $review->description }}</p>
                    <p class="mt-2 text-gray-600 text-sm">- {{ $review->user->fullName() }}</p>
                </div>
            @empty
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600 text-center">No Reviews</p>
                </div>
            @endforelse


        </div>
    </section>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        var latitude = {{ $establishment->geolocation_latitude }}
        var longitude = {{ $establishment->geolocation_longitude }}
        var map = L.map('map', {
            center: [latitude, longitude],
            zoom: 19
        });

        L.marker([latitude, longitude]).addTo(map);

        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 20,
        //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        // }).addTo(map);

        L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);
    </script>
</div>
