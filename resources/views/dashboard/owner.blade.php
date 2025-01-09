@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    @vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
    @vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
    @vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-6">
            <div class="card border-0">
                <div class="d-flex align-items-start row">
                    <div class="col-sm-5">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">Welcome back {{ $user->name }}! 🎉</h5>
                            <p class="mb-6">Let's take a look on what is system's progress lately.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-4">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="row pb-3 d-flex">
                          @foreach ($establishments as $establishment)
                          <div class="col-md-4 mb-4 pb-2 d-flex align-items-stretch">
                            <div class="blog-item bg-white d-flex flex-column shadow">
                              <div class="position-relative">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . str_replace('public/', '', $establishment->path)) }}" alt="Establishment Image">
                                <div class="blog-date">
                                    <h6 class="font-weight-bold mb-n1 text-white">{{ $loop->iteration }}</h6>
                                </div>
                              </div>
                              <div class="p-4">
                                  <div class="d-flex">
                                      <p class="text-primary text-uppercase text-decoration-none">{{$establishment->owner}}</p>
                                      <span class="text-primary px-2">|</span>
                                      <p class="text-warning text-uppercase text-decoration-none">{{$establishment->name}}</p>
                                  </div>
                                  <p class="h5 m-0 text-decoration-none"> {{$establishment->description}} </p>
                                  <a class="btn btn-sm btn-warning mt-3" href="{{ route('owner.destinations.view', ['id' => $establishment->id]) }}">
                                    See More
                                  </a>
                              </div>
                            </div>
                          </div>
                          @endforeach
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
