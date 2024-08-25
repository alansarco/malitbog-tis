@extends('layouts/app')

@section('title')
    <title>{{ env('APP_NAME') }}</title>
@endsection

@section('content')
    {{-- <livewire:establishment /> --}}

    <div class="flex flex-col">
        <x-navbar />
        <x-hero-section />
        <x-feature-destinations />
        <x-footer />
    </div>

@endsection
