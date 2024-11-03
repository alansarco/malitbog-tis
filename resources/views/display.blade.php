@extends('layouts/guestLayoutWithScript')

@section('content')
    <x-navbar />

    <div class="container d-flex flex-column mt-5 gap-5">
        <div class="d-flex flex-column">
            <span class="fs-2">{{ $toBeDisplay->title }}</span>
            @if (isset($toBeDisplay?->establishment?->name))
                <span class="fs-5"><i class="bx bx-buildings"></i>{{ $toBeDisplay->establishment->name }}</span>
            @endif
            <small> <i class="bx bx-calendar"></i>
                {{ $toBeDisplay?->date?->format('Y-m-d') ?? $toBeDisplay->created_at->format('Y-m-d') }}</small>
        </div>
        <hr>
        {!! $toBeDisplay->description !!}
    </div>
@endsection
