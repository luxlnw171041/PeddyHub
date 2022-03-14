@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Blood_bank {{ $blood_bank->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/blood_bank') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/blood_bank/' . $blood_bank->id . '/edit') }}" title="Edit Blood_bank"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('blood_bank' . '/' . $blood_bank->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Blood_bank" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $blood_bank->id }}</td>
                                    </tr>
                                    <tr><th> Pet Id </th><td> {{ $blood_bank->pet_id }} </td></tr><tr><th> User Id </th><td> {{ $blood_bank->user_id }} </td></tr><tr><th> Quantity </th><td> {{ $blood_bank->quantity }} </td></tr><tr><th> Total Blood </th><td> {{ $blood_bank->total_blood }} </td></tr><tr><th> Location </th><td> {{ $blood_bank->location }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
