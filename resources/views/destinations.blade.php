@extends('layouts/guestLayoutWithScript')

@section('content')
    <x-navbar />

    <div class="container d-flex flex-column justify-content-center mt-5 gap-5">
      <h4 class="text-center">{{ $businessType->name }}</h4>

      <div class="card shadow p-4">
        <livewire:destination-table businessTypeId="{{$businessType->id}}" />
      </div>
  </div>
@endsection
