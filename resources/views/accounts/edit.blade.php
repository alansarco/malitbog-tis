@extends('layouts/layoutWithScript')

@section('title', 'User Accounts - Create')

@section('content')
    <div class="row">
        <div class="col-xl">
            <form method="POST" action="{{ route('accounts.update', ['account' => $user->id]) }}">
                @method('PUT')
                @csrf
                <div class="d-flex justify-content-end mb-3">
                    <button type="submit" class="btn btn-primary d-flex gap-1">
                        <i class="bx bx-pencil"></i>
                        Update
                    </button>
                    <button class="btn btn-secondary d-flex gap-1 ms-2">
                        <a href="{{ route('accounts.index') }}" class="text-white">
                            <i class="bx bx-arrow-back"></i>
                            Back
                        </a>
                    </button>
                </div>
                <div class="card mb-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Account Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-6">
                            <label class="form-label" for="name">Full Name <small class="text-danger">*</small> </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="John Doe"
                                value="{{ old('name') ?? $user->name }}" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="email">Email <small class="text-danger">*</small></label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="email" class="form-control" name="email"
                                    placeholder="john.doe@gmail.com" aria-label="john.doe" aria-describedby="email2"
                                    value="{{ old('email') ?? $user->email }}" />
                            </div>
                            <div class="form-text"> You can use letters, numbers & periods </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="*****" />
                            <div class="form-text"> Password must be 8 characters length </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="password_confirmation">Confirm Password </label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="*****" />
                            <div class="form-text"> Password must be 8 characters length </div>
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
