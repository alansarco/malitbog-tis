@extends('layouts/layoutWithScript')

@section('title', 'My Establishment')

@section('content')
    <div class="row">
        <div class="col-xl">
            <form method="POST" action="{{ route('owners.establishment-update') }}">
                @method('PUT')
                @csrf
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn btn-primary d-flex gap-1">
                        <i class="bx bx-pencil"></i>
                        Update
                    </button>
                </div>
                <div class="card mb-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Establishment Information</h5>
                    </div>
                    @if (session()->has('status'))
                        <div class="mx-3 alert alert-success alert-dismissible fade show text-black" role="alert">
                            {{ session()->get('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
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
                            <input type="text" class="form-control" id="establishment_type_of_business" disabled
                                placeholder="+6391234567890" value="{{ $establishment?->businessType->name }}" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('jsScripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('.select_mode').select2();
        });
    </script>
@endsection
