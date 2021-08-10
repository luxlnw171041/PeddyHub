@extends('layouts.peddyhub')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
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
                        Reset <span class="wow pulse" data-wow-delay="1s"> Password </span>
                    </h1>
                    <div class="bg_tran">
                        ResetPassword
                    </div>
                    <p>
                        <a href="{{ url('/') }}" title="Home">HOME</a>
                        || <span>ResetPassword</span>
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
                                <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                                        class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                            class="fas fa-paw"></i> </span></p>
                                <h3> <span class="wow pulse" data-wow-delay="1s"> Reset Password
                                    </span></h3>
                            </div>
                            <div class="faq wow fadeInRight mt-4">
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn form-control">Send Password Reset Link</button>
                                            </div>
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
