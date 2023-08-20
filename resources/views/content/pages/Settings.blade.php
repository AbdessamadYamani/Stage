@extends('layouts/contentNavbarLayout')

@section('title', 'Les modalités de prêt pour vous servir')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Settings</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('update-settings') }}">
                        @csrf

                        <div class="form-group">
                            <label for="doti">Doti</label>
                            <input type="text" name="doti" id="doti" class="form-control" value="{{ old('doti', optional($user)->doti) }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', optional($user)->email) }}">
                        </div>

                        <div class="form-group">
    <label for="current_password">Current Password</label>
    <input type="password" name="current_password" id="current_password" class="form-control">
    @error('current_password')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="droit">Droit</label>
                            <input type="text" name="droit" id="droit" class="form-control" value="{{ old('droit', optional($user)->droit) }}">
                        </div>

                        <div class="form-group">
                            <label for="cod_t_user">Code T User</label>
                            <input type="text" name="cod_t_user" id="cod_t_user" class="form-control" value="{{ old('cod_t_user', optional($user)->cod_t_user) }}">
                        </div>

                        <div class="form-group">
                            <label for="cin">CIN</label>
                            <input type="text" name="cin" id="cin" class="form-control" value="{{ old('cin', optional($user)->cin) }}">
                        </div>

                        <!-- Add more fields for other user data -->

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
