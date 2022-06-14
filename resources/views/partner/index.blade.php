@extends('layouts.admin')

@section('content')
<style>
    .lightbox {
        /* Default to hidden */
        display: none;

        /* Overlay entire screen */
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;

        /* A bit of padding around image */
        padding: 1em;

        /* Translucent background */
        background: rgba(0, 0, 0, 0.8);
    }

    /* Unhide the lightbox when it's the target */
    .lightbox:target {
        display: block;
    }

    .lightbox span {
        /* Full width and height */
        display: block;
        width: 100%;
        height: 100%;

        /* Size and position background image */
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<div class="card radius-10">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="font-weight-bold mb-0">Partner</h5>
            </div>
            <form method="GET" action="{{ url('/partner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right ms-auto" role="search">
                <div class="input-group">
                    <input type="text" class="form-control ps-5 radius-30" name="search" placeholder="ค้นหา..." value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn " type="submit" style="border-color:#D2D7DC;border-style: solid;border-width: 1px 1px 1px 1px;border-radius: 0px 30px 30px 0px">
                            <i class="bx bx-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <div class="ms-auto">
                <button type="button" class="btn btn-white radius-10" data-toggle="modal" data-target="#exampleModal"><i class='bx bx-user-plus'></i>เพิ่ม Partner</button>
            </div>
        </div>
    </div>
    <div class="card-body" style="position: relative;">
        <div class="row mt-3">
            @foreach($partner as $item)
            <div class="col-12 col-lg-3" id="img-logo{{$item->id}}">
                <div class="card shadow-none border radius-15">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <a href="{{ url('/partner/' . $item->id . '/edit') }}" title="Edit Partner"><button class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            @if($item->show_homepage == "show")
                            <div class="custom-control custom-switch">
                                <label class="switch" for="customSwitch1_{{ $item->id }}">

                                    <input type="checkbox" checked class="custom-control-input" id="customSwitch1_{{ $item->id }}" onclick="document.querySelector('#input_show_homepage_' + {{ $item->id }}).value = 'no',submit_show_homepage('{{ $item->id }}');">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            @else
                            <div class="custom-control custom-switch">
                                <label class="switch" for="customSwitch1_{{ $item->id }}">

                                    <input type="checkbox" class="custom-control-input" id="customSwitch1_{{ $item->id }}" onclick="document.querySelector('#input_show_homepage_' + {{ $item->id }}).value = 'show',submit_show_homepage('{{ $item->id }}');">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            @endif
                            <input class="d-none" type="text" name="input_show_homepage_{{ $item->id }}" id="input_show_homepage_{{ $item->id }}" value="">
                            <div class="ms-auto font-24">
                                <form method="POST" action="{{ url('/partner' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm text-center" title="Delete Partner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                        </div>
                        <h5 class="mt-3 mb-0">{{ $item->name }}</h5>
                        <h6 class="mt-0 mb-0 ">{{ $item->phone }}</h6>
                        <p>{{ $item->province }},{{ $item->district }},{{ $item->sub_district }}</p>
                        <div>
                            <a href="#logo{{$item->id}}">
                                <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ url('storage/'.$item->logo )}}">
                            </a>
                            <a href="#img-logo{{$item->id}}" class="lightbox" id="logo{{$item->id}}">
                                <span style="background-image: url('{{ url('storage/'.$item->logo )}}')"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Partner</div>
                    <div class="card-body">
                        <a href="{{ url('/partner/create') }}" class="btn btn-success btn-sm" title="Add New Partner">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/partner') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Name</th><th>Phone</th><th>Lat</th><th>Lng</th><th>Logo</th><th>Province</th><th>District</th><th>Sub District</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($partner as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->phone }}</td><td>{{ $item->lat }}</td><td>{{ $item->lng }}</td><td>{{ $item->logo }}</td><td>{{ $item->province }}</td><td>{{ $item->district }}</td><td>{{ $item->sub_district }}</td>
                                        <td>
                                            <a href="{{ url('/partner/' . $item->id) }}" title="View Partner"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/partner/' . $item->id . '/edit') }}" title="Edit Partner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/partner' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Partner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $partner->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่ม Partner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/partner') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('partner.form', ['formMode' => 'create'])
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function submit_show_homepage(partner_id) {
        let input_show_homepage = document.querySelector('#input_show_homepage_' + partner_id).value;
        // console.log(input_show_homepage);
        // console.log(partner_id);

        fetch("{{ url('/') }}/api/submit_show_homepage/" + partner_id + "/" + input_show_homepage)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
            });
    }
</script>
@endsection