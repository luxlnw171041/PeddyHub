@extends('layouts.peddyhub')

@section('content')
    <div class="container">
        <div class="row">

        <section class="about_us">
            <div class="container">
                <div class="heading text-center">
                    <p class="wow fadeInUp" style="visibility: visible;"><span class="purple"><i class="fas fa-paw"></i> </span><span class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i class="fas fa-paw"></i> </span></p>
                    <h2 class="wow fadeInDown notranslate" style="visibility: visible;"><span class="wow pulse" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s;"> Check In/Out  </span>
                    </h2>
                </div>
                
            </div>
        </section>
            <div class="col-md-12">
                        <!-- <a href="{{ url('/check_in') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br /> -->

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/check_in') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('check_in.form', ['formMode' => 'create'])

                        </form>

        </div>
    </div>
@endsection
