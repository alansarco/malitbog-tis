@extends('layouts/guestLayoutWithScript')

@section('title', 'Homepage')

@section('cssStyles')
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
@endsection


@section('content')
    <x-navbar />

    <div class="container d-flex flex-column mt-5 gap-5">

        <div class="d-flex flex-column">
            <h3>News</h3>
            <hr>
            <div class="owl-carousel mt-5">
                @forelse ($newses as $news)
                    <div class="card" style="">
                        <div class="card-body">
                            <div class="card-title d-flex flex-column">
                                <span class="me-auto fs-4">{{ $news->title }}</span>
                                <small>{{ $news->created_at->format('Y-m-d') }}</small>
                            </div>
                            <a href="{{ route('news-events-view', ['type' => 'news', 'id' => $news->id]) }}"
                                class="btn btn-primary">See more<i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                    </div>
                @empty
                    No Item
                @endforelse
            </div>
        </div>


        <div class="d-flex flex-column">
            <h3>Events</h3>
            <hr>
            <div class="owl-carousel mt-5">
                @forelse ($events as $event)
                    <div class="card" style="">
                        <div class="card-body">
                            <div class="card-title d-flex flex-column">
                                <span class="me-auto fs-4">{{ $event->title }}</span>
                                <small>{{ $event->date->format('Y-m-d') }}</small>
                            </div>
                            <a href="{{ route('news-events-view', ['type' => 'events', 'id' => $news->id]) }}"
                                class="btn btn-primary">See more<i class="bx bx-right-arrow-alt"></i></a>
                        </div>
                    </div>
                @empty
                    No Item
                @endforelse
            </div>
        </div>
    </div>

@endsection

@section('jsScripts')
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 4,
                // loop: true,
                margin: 10,
                // autoplay: true,
                // autoplayTimeout: 1000,
                autoplayHoverPause: true
            });
            $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
            })
            $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
            })
        });
    </script>
@endsection
