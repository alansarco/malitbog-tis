@extends('layouts/guestLayoutWithScript')

@section('title', 'Homepage')

@section('content')
    <x-navbar />

    <div class="container">
        <div class=" row justify-content-center mt-5 pt-5 text-center">
            <span class="fs-2 col-12">Tourism</span>
            <span class="fs-2 col-12">Officials</span>
            <span class="col-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic necessitatibus, magni, ullam
                numquam
                inventore rerum dignissimos magnam itaque porro quisquam veniam, a nostrum enim nisi. Laborum ullam eum
                necessitatibus minus.</span>

            <div class="col-8 my-5">
                <div class="row gap-3 justify-content-center">
                    <div class="col-lg-3 card rounded">
                        <div class="card-body">
                            <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" alt="" srcset=""
                                height="80" width="80">
                            <h5 class="card-title">Employee One</h5>
                            <small class="card-subtitle">JOB TITLE</small>
                            <p class="card-text mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A mollitia
                                quos
                                ullam, officiis quibusdam exercitationem. Quam minus laborum neque quae provident aliquam,
                                eligendi architecto temporibus mollitia doloremque officiis reiciendis? Debitis?</p>
                        </div>
                    </div>

                    <div class="col-lg-3 card rounded">
                        <div class="card-body">
                            <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" alt="" srcset=""
                                height="80" width="80">
                            <h5 class="card-title">Employee One</h5>
                            <small class="card-subtitle">JOB TITLE</small>
                            <p class="card-text mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A mollitia
                                quos
                                ullam, officiis quibusdam exercitationem. Quam minus laborum neque quae provident aliquam,
                                eligendi architecto temporibus mollitia doloremque officiis reiciendis? Debitis?</p>
                        </div>
                    </div>

                    <div class="col-lg-3 card rounded">
                        <div class="card-body">
                            <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" alt="" srcset=""
                                height="80" width="80">
                            <h5 class="card-title">Employee One</h5>
                            <small class="card-subtitle">JOB TITLE</small>
                            <p class="card-text mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A mollitia
                                quos
                                ullam, officiis quibusdam exercitationem. Quam minus laborum neque quae provident aliquam,
                                eligendi architecto temporibus mollitia doloremque officiis reiciendis? Debitis?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
