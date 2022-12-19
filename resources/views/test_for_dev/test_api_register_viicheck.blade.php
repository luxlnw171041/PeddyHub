@extends('layouts.peddyhub')

@section('content')
	
	<br><br><br><br><br><br><br><br>

	<a href="https://www.viicheck.com/login/line" class="btn btn-danger" target="bank">
		Login Line 
	</a>

    <form method="GET" action="https://www.viicheck.com/api/register_api" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="data">
	    <div class="input-group">

	        <input type="text" class="form-control" name="name" placeholder="name..." value="{{ $data_users->profile->name }}">
	        <input type="text" class="form-control" name="phone" placeholder="phone..." value="{{ $data_users->profile->phone }}">
	        <input type="text" class="form-control" name="tambon_th" placeholder="tambon_th..." value="{{ $data_users->profile->tambon_th }}">
	        <input type="text" class="form-control" name="amphoe_th" placeholder="amphoe_th..." value="{{ $data_users->profile->amphoe_th }}">
	        <input type="text" class="form-control" name="changwat_th" placeholder="changwat_th..." value="{{ $data_users->profile->changwat_th }}">
	        <input type="text" class="form-control" name="by_api" placeholder="by_api..." value="PEDDYHUB">

	        <span class="input-group-append">
	            <button class="btn btn-success" type="submit">
	                <i class="fa-brands fa-line"></i> LOGIN LINE
	            </button>
	        </span>
	    </div>
	</form>


@endsection