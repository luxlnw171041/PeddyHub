@extends('layouts.peddyhub')

@section('content')
    <div class="container translate">
        <div class="row">
            <div class="col-md-12">
                    <div class="faq wow fadeInRight">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="heading">
                                <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                    </span><span class="orange"><i class="fas fa-paw"></i> </span><span
                                        class="purple"><i class="fas fa-paw"></i> </span></p>
                                <h3>แจ้งน้องหาย <span class="wow pulse" data-wow-delay="1s"></span></h3>
                            </div>
                            </div>
                        </div>
                    </div>
                        <!-- <a href="{{ url('/lost_pet') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br /> -->

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/lost_pet') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('lost_pet.form', ['formMode' => 'create'])

                        </form>
                </div>
            </div>
        </div>
@endsection
