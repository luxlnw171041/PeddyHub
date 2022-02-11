@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Lost_Pet {{ $lost_pet->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/lost_pet') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/lost_pet/' . $lost_pet->id . '/edit') }}" title="Edit Lost_Pet"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('lost_pet' . '/' . $lost_pet->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Lost_Pet" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $lost_pet->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $lost_pet->user_id }} </td></tr><tr><th> Pet Id </th><td> {{ $lost_pet->pet_id }} </td></tr><tr><th> Photo </th><td> {{ $lost_pet->photo }} </td></tr><tr><th> Let </th><td> {{ $lost_pet->let }} </td></tr><tr><th> Long </th><td> {{ $lost_pet->long }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
