@extends('layouts.peddyhub')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
    <label for="username" class="col-md-4 col-form-label text-md-right">Username Or Email</label>
   
    <div class="col-md-6">
        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required  autofocus>
   
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   
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
</div> -->
<div class="crumb center">
                <div class="container">
                    <h1>
                        PeddyHub <span class="wow pulse" data-wow-delay="1s"> Login </span>
                    </h1>
                    <div class="bg_tran">
                        PeddyHub Login
                    </div>
                    <p>
                        <a href="{{ url('/') }}" title="Home">HOME</a>
                        || <span>LOGIN</span>
                    </p>
                </div>
            </div>
        </section>
    <div class="main-wrapper pet login" style="margin-top:-55px;">
        <div class="pet service">
            <section class="contact">
                <div class="container">
                    <div class="card">
                        <div class="content">
                            <div class="heading text-center">
                                <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span>
                                            <span class="orange"><i class="fas fa-paw"></i> </span>
                                            <span class="purple"><i class="fas fa-paw"></i> </span>
                                </p>
                                <h3> <span class="wow pulse" data-wow-delay="1s"> Login
                                    </span></h3>
                            </div>
                            <div class="faq wow fadeInRight mt-4">
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <input id="username" type="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required  autofocus>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="exampleCheck1">&nbsp;Remember Me</label>
                                                </div>
                                        </div>

                                        <div class="link text-center">
                                            <a href="{{ 'register' }}" class="d-inline-block" title="Register">Register</a> ||
                                            <a href="{{'password/reset'}}" class="d-inline-block"
                                                title="Forgot Password">Forgot-Password</a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn form-control">Login</button>
                                            </div>
                                        </div>
                                        <div class="heading text-center">
                                                <br>
                                            <p class="wow fadeInUp">
                                                <span class="wow pulse" data-wow-delay="1s"> Or Sign Up Using </span>
                                            </p>
                                            <center class="justify-content-xl-between" style="margin-top:10px;">
                                                <a href="{{ route('login.facebook') }}">
                                                    <span class="fa-stack fa-lg wow fadeInUp">
                                                        <i class="fa fa-circle fa-stack-2x " style="color:#4267B2;"></i>
                                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                                    </span>  
                                                </a>
                                                <a href="{{ route('login.google') }}?redirectTo={{ request('redirectTo') }}"> 
                                                    <span class="fa-stack fa-lg wow fadeInUp">
                                                        <i class="fa fa-circle fa-stack-2x" style="color:#db4a39;"></i>
                                                        <i class="fab fa-google-plus fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a>
                                                <a href="{{ route('login.line') }}?redirectTo={{ request('redirectTo') }}">
                                                    <img class="wow fadeInUp" src="peddyhub/images/home_5/icon-line.png" alt="" width="35px">
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        <div class="search-popup">
            <button class="close-search style-two"><img src="images/home_5/cross-out.png" alt=""></button>
            <button class="close-search"><img src="images/home_5/cross-out.png" alt=""></button>
            <form method="post" action="blog.html">
                <div class="form-group">
                    <input type="search" name="search-field" value="" placeholder="Search Here" required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
