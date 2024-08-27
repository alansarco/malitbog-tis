@extends('layouts/app')

@section('title')
    <title>{{ env('APP_NAME') }}</title>
@endsection

@section('content')
    <div class="container max-w-md mx-auto m-44">
        <livewire:login />
    </div>
@endsection
