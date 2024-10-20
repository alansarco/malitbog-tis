@extends('layouts/contentNavbarLayout')

@section('title', 'Business Type List')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('business-types.create') }}" class="btn btn-primary rounded my-2 py-2 d-flex gap-2">
            <i class="bx bx-store"></i>
            Add
        </a>
    </div>
    <div class="bg-white shadow rounded p-3">
        <livewire:business-type-table />
    </div>
@endsection
