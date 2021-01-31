@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-6 col-md-6">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4><strong>{{ __('SIGN IN NOW') }}</strong></h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group  ">
                            <div class="col-12 col-md-12 col-xs-12 col-sm-12 ">
                                <label for="email" class=" col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
                            </div>
                            <div class="col-12 col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  ">
                            <div class="col-12 col-md-12 col-xs-12 col-sm-12 ">
                                <label for="password" class=" col-form-label text-md-left">{{ __('Password') }}</label>
                            </div>
                            <div class="col-12 col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn btn-primary custom-btn">
                                    {{ __('SIGN IN') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row justify-content-between">
                    <div class="form-group  col-6 col-md-6">
                        <div class="pl-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<style scoped>
    .card-header {
        font-weight: bolder;
    }

    label {
        font-weight: bold;
    }

    .btn {
        width: 11rem;
    }

    a {
        text-decoration: none;
    }
</style>
@endsection