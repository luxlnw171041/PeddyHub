@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Text_topic {{ $text_topic->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/text_topic') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/text_topic/' . $text_topic->id . '/edit') }}" title="Edit Text_topic"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('text_topic' . '/' . $text_topic->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Text_topic" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $text_topic->id }}</td>
                                    </tr>
                                    <tr><th> Th </th><td> {{ $text_topic->th }} </td></tr><tr><th> En </th><td> {{ $text_topic->en }} </td></tr><tr><th> Zh TW </th><td> {{ $text_topic->zh_TW }} </td></tr><tr><th> Ja </th><td> {{ $text_topic->ja }} </td></tr><tr><th> Ko </th><td> {{ $text_topic->ko }} </td></tr><tr><th> Es </th><td> {{ $text_topic->es }} </td></tr><tr><th> Lo </th><td> {{ $text_topic->lo }} </td></tr><tr><th> My </th><td> {{ $text_topic->my }} </td></tr><tr><th> De </th><td> {{ $text_topic->de }} </td></tr><tr><th> De </th><td> {{ $text_topic->de }} </td></tr><tr><th> Ar </th><td> {{ $text_topic->ar }} </td></tr><tr><th> Ru </th><td> {{ $text_topic->ru }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
