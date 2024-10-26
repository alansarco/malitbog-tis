@extends('layouts/contentNavbarLayout')

@section('title', 'Establishment Event List')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('events.create') }}" class="btn btn-primary rounded my-2 py-2 d-flex gap-2">
            <i class="bx bx-calendar"></i>
            Add
        </a>
    </div>
    <div class="bg-white shadow rounded p-3">
        <livewire:establishment-event-table />
    </div>
@endsection
