@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Text_topic</div>
                    <div class="card-body">
                        <a href="{{ url('/text_topic/create') }}" class="btn btn-success btn-sm" title="Add New Text_topic">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/text_topic') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Th</th><th>En</th><th>Zh TW</th><th>Ja</th><th>Ko</th><th>Es</th><th>Lo</th><th>My</th><th>De</th><th>De</th><th>Ar</th><th>Ru</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($text_topic as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->th }}</td><td>{{ $item->en }}</td><td>{{ $item->zh_TW }}</td><td>{{ $item->ja }}</td><td>{{ $item->ko }}</td><td>{{ $item->es }}</td><td>{{ $item->lo }}</td><td>{{ $item->my }}</td><td>{{ $item->de }}</td><td>{{ $item->de }}</td><td>{{ $item->ar }}</td><td>{{ $item->ru }}</td>
                                        <td>
                                            <a href="{{ url('/text_topic/' . $item->id) }}" title="View Text_topic"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/text_topic/' . $item->id . '/edit') }}" title="Edit Text_topic"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/text_topic' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Text_topic" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $text_topic->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
