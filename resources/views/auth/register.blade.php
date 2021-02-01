@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4><strong>{{ __('SIGN UP NOW') }}</strong></h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group  ">
                            <div class="col-12 col-md-12 col-xs-12 col-sm-12 ">
                                <label for="name" class="col-form-label text-md-left">{{ __('Name') }}</label>
                            </div>
                            <div class="col-12 col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  ">
                            <div class="col-12 col-md-12 col-xs-12 col-sm-12 ">
                                <label for="email" class="col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
                            </div>
                            <div class="col-12 col-md-12">
                                <input id=" email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group  ">
                            <div class="col-12 col-md-12 col-xs-12 col-sm-12 ">
                                <label for="telephone" class=" col-form-label text-md-left">{{ __('Telephone') }}</label>
                            </div>
                            <div class="col-12 col-md-12">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-12 col-md-12 col-xs-12 col-sm-12 ">
                                <label for="password" class=" col-form-label text-md-left">{{ __('Password') }}</label>
                            </div>
                            <div class="col-12 col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-12 col-md-12 col-xs-12 col-sm-12 ">
                                <label for="password-confirm" class=" col-form-label text-md-left">{{ __('Confirm Password') }}</label>
                            </div>
                            <div class="col-12 col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn  custom-btn">
                                    {{ __('SIGN UP') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style scoped>
    .card-header {
        font-weight: bolder;
        background-color: darkcyan;
    }

    label {
        font-weight: bold;
    }

    .btn {
        width: 11rem;
        background-color: darkcyan;
    }
</style>
@endsection