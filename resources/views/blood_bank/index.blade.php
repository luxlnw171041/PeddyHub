@extends('layouts.peddyhub')

@section('content')
<div class="main-wrapper pet shop">
        <section class="featured">
            <div class="crumb" style="padding-bottom:0%">
                <div class="container notranslate">
                    <h4>
                        ธนาคารเลือด
                    </h4>
                    <p>
                        <span>ทั้งหมด : {{$count_pet}}  ตัว</span> || <span>จำนวนทั้งหมด :  {{ $count_time }} ครั้ง </span> || <span> รวม : {{ $total_blood }} ml </span>
                    </p>
                </div>
            </div>
        </section>
        <section class="steps">
            <div class="container">
                <div class="row">
                @foreach($petbank as $item)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card orange">
                            <div class="image">
                                <img src="{{ url('storage/'.$item->pet->photo )}}"style=" width: 348px; " height="10px" alt="Image of Product" title="Profuct" class="img-fluid">
                            </div>
                            <div class="content">
                                @php
                                    $pet_category = $item->pet->pet_category_id ;
                                @endphp
                                <h5>
                                    @include ('menubar.icon_categorie')
                                    {{$item->pet->name}}
                                    @switch($item->pet->gender)
                                        @case('หญิง')
                                        <i style="font-size:22px;color:#F06491;margin-left:1px" class="fas fa-venus"></i>
                                        @break
                                        @case('ชาย')
                                            <i style="font-size:22px;color:#00ADEF;margin-left:1px" class="fas fa-mars"></i>
                                        @break
                                        @case('ไม่ระบุ')
                                            <i style="font-size:22px;color:#88C550;margin-left:1px" class="fas fa-venus-mars"></i>
                                        @break
                                    @endswitch
                                </h5>
                                <p class="head">จำนวน : ครั้ง</p>
                                <p class="head">ปริมาณ : ครั้ง</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        

    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Blood_bank</div>
                    <div class="card-body">
                        <a href="{{ url('/blood_bank/create') }}" class="btn btn-success btn-sm" title="Add New Blood_bank">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/blood_bank') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Pet Id</th><th>User Id</th><th>Quantity</th><th>Total Blood</th><th>Location</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($blood_bank as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pet_id }}</td><td>{{ $item->user_id }}</td><td>{{ $item->quantity }}</td><td>{{ $item->total_blood }}</td><td>{{ $item->location }}</td>
                                        <td>
                                            <a href="{{ url('/blood_bank/' . $item->id) }}" title="View Blood_bank"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/blood_bank/' . $item->id . '/edit') }}" title="Edit Blood_bank"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/blood_bank' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Blood_bank" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $blood_bank->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
