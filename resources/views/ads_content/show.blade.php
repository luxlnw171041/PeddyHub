@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Ads_content {{ $ads_content->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/ads_content') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/ads_content/' . $ads_content->id . '/edit') }}" title="Edit Ads_content"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('ads_content' . '/' . $ads_content->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Ads_content" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $ads_content->id }}</td>
                                    </tr>
                                    <tr><th> Name Content </th><td> {{ $ads_content->name_content }} </td></tr><tr><th> Detail </th><td> {{ $ads_content->detail }} </td></tr><tr><th> Link </th><td> {{ $ads_content->link }} </td></tr><tr><th> Photo </th><td> {{ $ads_content->photo }} </td></tr><tr><th> Type Content </th><td> {{ $ads_content->type_content }} </td></tr><tr><th> Name Partner </th><td> {{ $ads_content->name_partner }} </td></tr><tr><th> Id Partner </th><td> {{ $ads_content->id_partner }} </td></tr><tr><th> Show User </th><td> {{ $ads_content->show_user }} </td></tr><tr><th> User Click </th><td> {{ $ads_content->user_click }} </td></tr><tr><th> Send Round </th><td> {{ $ads_content->send_round }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
