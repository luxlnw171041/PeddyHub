@extends('layouts.peddyhub')

@section('content')
<div class="pet service">
<section class="contact">
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
                                                <a href="">  
                                                    <span class="fa-stack fa-lg wow fadeInUp">
                                                        <i class="fa fa-circle fa-stack-2x " style="color:#4267B2;"></i>
                                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                                    </span>  
                                                </a>
                                                <a href="">  
                                                    <span class="fa-stack fa-lg wow fadeInUp">
                                                        <i class="fa fa-circle fa-stack-2x" style="color:#db4a39;"></i>
                                                        <i class="fab fa-google-plus fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a>
                                                <a href="">  
                                                    <img class="wow fadeInUp" src="peddyhub/images/home_5/icon-line.png" alt="" width="35px">
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                            </div>
</section>

</div>
                                        <br><br><br>
<div class="main-wrapper pet login" style="margin-top:-55px;">
        <div class="pet service">
            <section class="contact">
                <div class="container">
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
                                                <a href="">  
                                                    <span class="fa-stack fa-lg wow fadeInUp">
                                                        <i class="fa fa-circle fa-stack-2x " style="color:#4267B2;"></i>
                                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                                    </span>  
                                                </a>
                                                <a href="">  
                                                    <span class="fa-stack fa-lg wow fadeInUp">
                                                        <i class="fa fa-circle fa-stack-2x" style="color:#db4a39;"></i>
                                                        <i class="fab fa-google-plus fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </a>
                                                <a href="">  
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