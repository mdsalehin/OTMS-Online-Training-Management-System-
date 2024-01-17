@extends('front.master')

@section('title', 'Sign Up')





@section('body')


    <div class="site-breadcrumb">
        <div class="hero-shape-area">
            <img class="hero-shape-1"src="{{ asset('/') }}front/assets/img/shape/shape-1.png" alt>
            <img class="hero-shape-2"src="{{ asset('/') }}front/assets/img/shape/shape-3.png" alt>
            <img class="hero-shape-3"src="{{ asset('/') }}front/assets/img/shape/shape-6.png" alt>
            <img class="hero-shape-4"src="{{ asset('/') }}front/assets/img/shape/shape-4.png" alt>
        </div>
        <div class="container">
            <h2 class="breadcrumb-title">Sign Up</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Sign Up</li>
            </ul>
        </div>
    </div>


    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
{{--                        <imgsrc="{{ asset('/') }}front/assets/img/logo/logo.png" alt>--}}

                        <p>create your OTMS account</p>
                    </div>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name">
                            @error('name') <span class="text-danger">{{ $errors->first('name') }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Your Email">
                            @error('email') <span class="text-danger">{{ $errors->first('email') }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Your Password">
                            @error('password') <span class="text-danger">{{ $errors->first('password') }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label> Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Your Password">
                            @error('password_confirmation') <span class="text-danger">{{ $errors->first('password_confirmation') }}</span> @enderror
                        </div>

                        <div class="form-check form-group">
                            <input class="form-check-input" type="checkbox" value id="agree">
                            <label class="form-check-label" for="agree">
                                I agree with the <a href="#">Terms Of Service.</a>
                            </label>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="login-btn"><i class="far fa-paper-plane"></i> Sign Up</button>
                        </div>
                    </form>
                    <div class="other-login-signup my-4">
                        <div class="or-login-signup text-center">
                            <strong>Or Sign Up With</strong>
                        </div>
                    </div>
                    <div class="social-login">
                        <a href="#" class="btn-f"><i class="fab fa-facebook-f"></i> Facebook</a>
                        <a href="#" class="btn-g"><i class="fab fa-google"></i> Google</a>
                        <a href="#" class="btn-t"><i class="fab fa-twitter"></i> Twitter</a>
                    </div>
                    <div class="login-footer">
                        <p>Already have an account? <a href="{{ route('login') }}">Sign In.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
