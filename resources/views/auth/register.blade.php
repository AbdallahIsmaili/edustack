@extends('layouts.application')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class="widget">
                    <h2 class="widget-title"><span>Be one of us.</span></h2>
                </div>

                <div class="">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-6">

                                <div class="widget">
                                    <h6 class="widget-title"><span>Full Name</span></h6>
                                    <div class="widget-search">
                                       <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="My name is..." >
                                    </div>
                                 </div>

                                 @error('name')
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

                            <div class="col-md-6">

                                <div class="widget">
                                    <h6 class="widget-title"><span>Password</span></h6>
                                    <div class="widget-search">
                                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="********">
                                    </div>
                                 </div>

                                 <a href="{{ route('login') }}">Already have an account, Click here...</a>

                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
