@extends('layouts/contentNavbarLayout')

@section('title', 'Galleries')

@section('content')
    <livewire:establishment-gallery :establishment=$establishment />
@endsection
