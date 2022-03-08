@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Hospital_near {{ $hospital_near->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/hospital_near') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/hospital_near/' . $hospital_near->id . '/edit') }}" title="Edit Hospital_near"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('hospital_near' . '/' . $hospital_near->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Hospital_near" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $hospital_near->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $hospital_near->name }} </td></tr><tr><th> Lat </th><td> {{ $hospital_near->lat }} </td></tr><tr><th> Lng </th><td> {{ $hospital_near->lng }} </td></tr><tr><th> Photo </th><td> {{ $hospital_near->photo }} </td></tr>
                                    <tr><th> Address </th><td> {{ $hospital_near->address }} </td></tr><tr><th> Business Hours </th><td> {{ $hospital_near->business_hours }} </td></tr><tr><th> Phone </th><td> {{ $hospital_near->phone }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
