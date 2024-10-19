@extends('layouts/contentNavbarLayout')

@section('title', 'User Accounts')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('accounts.create') }}" class="btn btn-primary rounded my-2 py-2 d-flex gap-2">
            <i class="bx bx-user-plus"></i>
            Add
        </a>
    </div>
    <div class="bg-white shadow rounded p-3">
        <livewire:user-table />
    </div>
@endsection