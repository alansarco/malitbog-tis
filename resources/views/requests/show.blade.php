@extends('layouts/contentNavbarLayout')

@section('title', 'Establishment Information')

@section('content')
    <div class="row">
        <div class="col">
            <div class="nav-align-top mb-6">
                <ul class="nav nav-pills mb-4" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home"
                            aria-selected="true">Information</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                        @include('establishments.partials.information')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                    <button class="btn btn-secondary d-flex gap-1 ms-2">
                    <a href="{{ route('requests.index') }}" class="text-white">
                        <i class="bx bx-arrow-back"></i>
                        Back
                    </a>
                </button>
                </div>
                
            </div>
            
        </div>
    </div>

@endsection
