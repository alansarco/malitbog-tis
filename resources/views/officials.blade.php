@extends('layouts/blankLayout')

@section('title', 'Officials')

@section('content')
    <x-navbar />
    <style>
        .background-section {
            background: linear-gradient(45deg, #1e90ff, #ff6347, #1e90ff);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 0;
            position: relative;
        }
        .background-content {
            padding: 0 2rem;
            padding-top: 2rem;
            padding-bottom: 2rem;
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.8);
        }
    </style>
    <div class="container-fluid background-section">
        <div class="background-content">
            <h1 style="font-family: 'Charm', cursive; font-weight: 700; ">Municipal Tourism Office</h1>
            <div class="row justify-content-center mt-5 pt-5 text-center">
                <span class="fs-2 col-12">Organizational Structure</span>
                <span class="col-5"></span>
        
                <div class="col-8 my-5">
                    <div class="row gap-3 justify-content-center">
                        
                        <div class="col-lg-3 card rounded">
                            <div class="card-body">
                                <img src="https://i.mydramalist.com/rNgNLN_5f.jpg" alt="" height="80" width="80">
                                <h5 class="card-title"></h5>
                                <small class="card-subtitle">Laborer/Tourism Staff</small>
                                <p class="card-text mt-3">
                                    Name: Mr. Jason Bacalla
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 card rounded">
                            <div class="card-body">
                                <img src="https://i.mydramalist.com/kEpQwc.jpg" alt="" height="80" width="80">
                                <h5 class="card-title"></h5>
                                <small class="card-subtitle">Municipal Mayor</small>
                                <p class="card-text mt-3">Mr. Antonio S. Lura SR.</p>
                            </div>
                        </div>
        
                        <div class="col-lg-3 card rounded">
                            <div class="card-body">
                                <img src="https://i.mydramalist.com/eLBmQ_5c.jpg" alt="" height="80" width="80">
                                <h5 class="card-title"></h5>
                                <small class="card-subtitle">Job Order/Tourism Staff</small>
                                <p class="card-text mt-3">Mr. Jesse Cabarrubias</p>
                            </div>
                        </div>
        
                        <div class="col-lg-3 card rounded">
                            <div class="card-body">
                                <img src="https://i.mydramalist.com/kEpQwc.jpg" alt="" height="80" width="80">
                                <h5 class="card-title"></h5>
                                <small class="card-subtitle">Municipal Tourism Designate</small>
                                <p class="card-text mt-3">Mr. Alrico M. Comajig</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection
