@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Partner_premium</div>
                    <div class="card-body">
                        <a href="{{ url('/partner_premium/create') }}" class="btn btn-success btn-sm" title="Add New Partner_premium">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/partner_premium') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Name Partner</th><th>Id Partner</th><th>Level</th><th>BC By Car Max</th><th>BC By Car Sent</th><th>BC By Check In Max</th><th>BC By Check In Sent</th><th>BC By User Max</th><th>BC By User Sent</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($partner_premium as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name_partner }}</td><td>{{ $item->id_partner }}</td><td>{{ $item->level }}</td><td>{{ $item->BC_by_car_max }}</td><td>{{ $item->BC_by_car_sent }}</td><td>{{ $item->BC_by_check_in_max }}</td><td>{{ $item->BC_by_check_in_sent }}</td><td>{{ $item->BC_by_user_max }}</td><td>{{ $item->BC_by_user_sent }}</td>
                                        <td>
                                            <a href="{{ url('/partner_premium/' . $item->id) }}" title="View Partner_premium"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/partner_premium/' . $item->id . '/edit') }}" title="Edit Partner_premium"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/partner_premium' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Partner_premium" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $partner_premium->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
