@extends('layouts/blankLayout')

@section('title', 'News and Events')

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

        <div class="container-fluid row background-content" 
         style="background-size: 400% 400%; animation: gradientAnimation 6s ease infinite; width: 100%; margin: 0;">
            <div class="d-flex flex-column">
                <h3 style="font-family: 'Charm', cursive; font-weight: 700; ">News</h3>
                <hr class="text-secondary">
                <div class="owl-carousel mt-5 row">
                    @forelse ($newses as $news)
                        <div class="card col-md-6 col-lg-4" style="">
                            <div class="card-body">
                                <div class="card-title d-flex">
                                    <span class="me-auto fs-4">{{ $news->title }}</span>
                                    <small>{{ $news->formatted_date }}</small>
                                </div>
                                <a href="{{ route('news-events-view', ['type' => 'news', 'id' => $news->id]) }}"
                                    class="btn btn-primary">See more<i class="bx bx-right-arrow-alt"></i></a>
                            </div>
                        </div>
                    @empty
                        <p class="text-dark">No Item</p>
                    @endforelse
                </div>
            </div>
            <div class="d-flex flex-column">
                <h3 style="font-family: 'Charm', cursive; font-weight: 700; ">Events</h3>
                <hr class="text-secondary">
                <div class="owl-carousel mt-5 row">
                    @forelse ($events as $event)
                        <div class="card col-md-6 col-lg-4" style="">
                            <div class="card-body">
                                <div class="card-title d-flex">
                                    <span class="me-auto fs-4">{{ $event->title }}</span>
                                    <small>{{ $event->formatted_date }}</small>
                                </div>
                                <a href="{{ route('news-events-view', ['type' => 'events', 'id' => $event->id]) }}"
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
