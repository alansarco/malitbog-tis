@extends('layouts/contentNavbarLayout')

@section('title', 'Create Business Type')

@section('content')
    <div class="row">
        <div class="col-xl">
            <form method="POST" action="{{ route('business-types.store') }}">
                @csrf
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn btn-primary d-flex gap-1">
                        <i class="bx bx-plus"></i>
                        Save
                    </button>
                </div>
                <div class="card mb-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Business Type Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-6">
                            <label class="form-label" for="name">Name <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Starbucks"
                                value="{{ old('name') }}" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('jsScripts')
    <script>
        $(document).ready(function() {
            $('.select_mode').select2();
        });
    </script>
@endsection
