@extends('layouts/app')

@section('title')
    <title>{{ env('APP_NAME') }}</title>
@endsection

@section('content')
    {{-- <livewire:establishment /> --}}

    <div class="flex flex-col bg-cover bg-center bg-no-repeat " style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/b/b5/Santo_Ni%C3%B1o_Catholic_Church_in_Malitbog%2C_Southern_Leyte.jpg');">
        <x-navbar />


        <section class="h-[90vh] flex items-center">
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-bold ">Explore the Beauty</h2>
                <p class="text-lg  mt-4">Discover stunning landscapes, rich culture, and unforgettable experiences.</p>
                <button onclick="document.location='{{route('destinations')}}'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Explore Now</button>
            </div>
        </section>

        <x-footer />
    </div>

@endsection
