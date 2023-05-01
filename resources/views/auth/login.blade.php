@extends('layouts.application')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="widget">
                <h2 class="widget-title"><span>Login to your account</span></h2>
            </div>

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-6">

                                <div class="widget">
                                    <h6 class="widget-title"><span>Email</span></h6>
                                    <div class="widget-search">
                                       <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" placeholder="myemail@email.example ..." >
                                    </div>
                                 </div>

                                @error('email')
                                    <div class=" ">
                                        <div class="content">
                                            <div class="notices warning">
                                                <p>{{ $message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">

                                <div class="widget">
                                    <h6 class="widget-title"><span>Password</span></h6>
                                    <div class="widget-search">
                                       <input id="password" placeholder="*********" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    </div>
                                 </div>

                                @error('password')
                                    <div class="column is-10-desktop">
                                        <div class="content">
                                            <div class="notices warning">
                                                <p>{{ $message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <a href="{{ route('register') }}">Do not have an account? Click here...</a>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
