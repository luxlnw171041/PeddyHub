
@extends('layouts.peddyhub')

@section('content')

<style>
   .likebtn{
    background-color: transparent;
    color:#53565B;
    font-family: 'Sarabun', sans-serif;
    font-size:14px;

   }

.likebtn:hover {background-color: #F2F2F2; color:black ;}

/* .likebtn:active {
  background-color: #3e8e41 !important;;
  box-shadow: 0 5px #666 !important;;
  transform: translateY(4px) !important;;
} */
</style>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="button wow fadeInUp justify-content-end" style="margin-bottom:-50px">  
                <div class="container">
                    <div class="row col-12">
                        @include ('menubar.menu')
                    </div>
                    <br>
                    <div class="row col-12" style="padding:0px;">
                        <div class="col-12 col-md-9  ">
                            @include ('menubar.menu_btn')
                        </div>
<<<<<<< Updated upstream
=======
                        <div class="col-3">
                            <a href="{{ url('/lost_pet/create') }}" style="margin-top:8px" class="btn main float-right" title="contact">
                                <span style="">ประกาศหา</span>  
                            </a>
                        </div>
>>>>>>> Stashed changes
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------------------- -->
    <div class="pet event">
        <div class="pet job">
            <section class="job">
                <div class="container">

                    <div class="row mt-5">
                        @foreach($lost_pet as $item)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div  style="padding-top:10px;padding-left:20px;">
                                        <div class="row">
                                            <div class="col-2" style="padding:0px;">
                                                @if(!empty($item->user->photo))
                                                    <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('storage')}}/{{ $item->user->photo }}" alt="image of client" title="client" class="img-fluid customer">
                                                @else
                                                    <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('peddyhub/images/home_5/icon1.png')}}" alt="image of client" title="client" class="img-fluid customer">
                                                @endif
                                            </div>
                                            <div class="col-9" style="padding:0px">
                                                @if(!empty($item->user->name))
                                                <p class="notranslate" style="padding:0px;margin:0px;"> <b>{{ $item->user->name }}</b>  </p>
                                                    
                                                @else
                                                    Guest
                                                @endif
                                                <span style="font-size:20px"> <b></b> </span>
                                                <p style="font-size:12px;margin-top:-8px;"> {{ $item->created_at->diffForHumans() }} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <img class="imgf" src="{{ url('storage/'.$item->photo )}}" width="400px" height="300px" alt="image of pet" title="pet" class="img-fluid customer">
                                    </div>
                                    <div class="col-12" style="padding:0px;">
                                        <a href="{{ url('/lost_pet/' . $item->id) }}" class="col-6 main-shadow main-radius btn btn-info" style="margin:15px;float: right;">
                                            รายละเอียด
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>




                </div>
            </section>
        </div>
    </div>

</div>

@endsection
