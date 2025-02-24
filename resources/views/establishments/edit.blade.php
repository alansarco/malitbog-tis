@extends('layouts/layoutWithScript')

@section('title', 'User Accounts - Create')

@section('content')
    <div class="row">
        <div class="col-xl">
            <form method="POST" action="{{ route('establishments.update', ['establishment' => $establishment->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn btn-primary d-flex gap-1">
                        <i class="bx bx-pencil"></i>
                        Update
                    </button>
                    <button class="btn btn-secondary d-flex gap-1 ms-2">
                        <a href="{{ route('owners.establishment-index') }}" class="text-white">
                            <i class="bx bx-arrow-back"></i>
                            Back
                        </a>
                    </button>
                </div>
                <div class="card mb-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Establishment Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-6">
                            <label class="form-label" for="establishment_owner">Owner <small
                                    class="text-danger">*</small></label>
                            <select class="select_mode form-select" name="establishment_owner">
                                <option value="" disabled selected>Select one</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if ($user->id == old('establishment_owner') || $user->id == $establishment->user_id) selected @endif>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('establishment_owner')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="establishment_name">Name <small
                                    class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="establishment_name" name="establishment_name"
                                placeholder="Starbucks" value="{{ old('establishment_name') ?? $establishment?->name }}" />
                            @error('establishment_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label class="form-label" for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                value="{{ old('image') }}" accept="image/*">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="form-label" for="establishment_description">Description <small
                                    class="text-danger">*</small></label>
                            <textarea id="establishment_description" class="form-control" name="establishment_description"
                                placeholder="Short Information About the establishmment">{{ old('establishment_description') ?? $establishment?->description }}</textarea>
                            @error('establishment_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="establishment_address">Address <small
                                    class="text-danger">*</small></label>
                            <textarea id="establishment_address" class="form-control" name="establishment_address"
                                placeholder="Malitbog, Southern Leyte">{{ old('establishment_address') ?? $establishment?->address }}</textarea>
                            @error('establishment_address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="establishment_geolocation_longitude">Geolocation
                                Longitude</label>
                            <input type="text" class="form-control" id="establishment_geolocation_longitude"
                                name="establishment_geolocation_longitude" placeholder="125.00094211920187"
                                value="{{ old('establishment_geolocation_longitude') ?? $establishment?->geolocation_longitude }}" />
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="establishment_geolocation_latitude">Geolocation
                                Latitude</label>
                            <input type="text" class="form-control" id="establishment_geolocation_latitude"
                                name="establishment_geolocation_latitude" placeholder="10.158163827849396"
                                value="{{ old('establishment_geolocation_latitude') ?? $establishment?->geolocation_latitude }}" />
                        </div>
                        <!-- Map container -->
                        <div class="mb-6">
                            <label class="form-label">Select Location on Map</label>
                            <div id="map" style="height: 400px;"></div>
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="establishment_contact_number">Contact Number <small
                                    class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="establishment_contact_number"
                                name="establishment_contact_number" placeholder="+6391234567890"
                                value="{{ old('establishment_contact_number') ?? $establishment?->contact_number }}" />
                            @error('establishment_contact_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="establishment_mode_of_access">Mode Of Access <small
                                    class="text-danger">*</small></label>
                            <select class="select_mode form-select" name="establishment_mode_of_access[]"
                                multiple="multiple">
                                <option value="Car Access" @if (in_array('Car Access', old('establishment_mode_of_access') ?? explode(', ', $establishment?->mode_of_access))) selected @endif>Car Access
                                </option>
                                <option value="Foot Access" @if (in_array('Foot Access', old('establishment_mode_of_access') ?? explode(', ', $establishment?->mode_of_access))) selected @endif>Foot Access
                                </option>
                            </select>
                            <div class="form-text"> Hold ctrl key or command to select multiple items </div>
                            @error('establishment_mode_of_access')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="establishment_type_of_business">Type of Business <small
                                    class="text-danger">*</small></label>
                            <select class="select_mode form-select" name="establishment_type_of_business">
                                <option value="" disabled selected>Select one</option>
                                @foreach ($businessTypes as $businessType)
                                    <option value="{{ $businessType->id }}"
                                        @if (
                                            $businessType->id == old('establishment_type_of_business') ||
                                                $businessType->id == $establishment?->business_type_id) selected @endif>{{ $businessType->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('establishment_type_of_business')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize the map
            var map = L.map('map').setView([10.158163827849396, 125.00094211920187], 13); // Default coordinates

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            // Add a marker
            var marker = L.marker([10.158163827849396, 125.00094211920187], { draggable: true }).addTo(map);

            // Update inputs on marker drag
            marker.on('dragend', function (event) {
                var position = marker.getLatLng();
                document.getElementById('establishment_geolocation_latitude').value = position.lat;
                document.getElementById('establishment_geolocation_longitude').value = position.lng;
            });

            // Update marker and inputs on map click
            map.on('click', function (event) {
                var lat = event.latlng.lat; // No toFixed, retains full precision
                var lng = event.latlng.lng;
                document.getElementById('establishment_geolocation_latitude').value = lat;
                document.getElementById('establishment_geolocation_longitude').value = lng;

                marker.setLatLng([lat, lng]);
            });
        });
    </script>
@endsection

@section('jsScripts')
    <script>
        $(document).ready(function() {
            $('.select_mode').select2();
        });
    </script>
@endsection
