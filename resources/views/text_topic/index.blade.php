@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                    <h3>
                        Text Topic
                        <a style="float: right;" href="{{ url('/text_topic/create') }}" class="btn btn-success btn-sm" title="Add New Text_topic">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </h3>
                    @foreach($text_topic as $item)
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">
                                    {{ $item->th }}

                                    <form style="float: right;" method="POST" action="{{ url('/text_topic' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Text_topic" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <a style="float: right;" href="{{ url('/text_topic/' . $item->id . '/edit') }}" title="Edit Text_topic"><button class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button></a>

                                </h4>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="text-center">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">อังกฤษ :{{ $item->en }} </div>
                                            <div class="col-4">จีน : {{ $item->zh_TW }}</div>
                                            <div class="col-4">ญี่ปุ่น : {{ $item->ja }}</div>
                                            <div class="col-4">เกาหลี : {{ $item->ko }}</div>
                                            <div class="col-4">สเปน : {{ $item->es }}</div>
                                            <div class="col-4">ลาว : {{ $item->lo }}</div>
                                            <div class="col-4">พม่า : {{ $item->my }}</div>
                                            <div class="col-4">เยอรมัน : {{ $item->de }}</div>
                                            <div class="col-4">ฮินดี : {{ $item->hi }} </div>
                                            <div class="col-4">อาหรับ :{{ $item->ar }}</div>
                                            <div class="col-4">รัสเซีย : {{ $item->ru }}</div>
                                        </div>
                                    </div>
                                    <!-- <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                            <th>Th</th><th>En</th><th>Zh TW</th><th>Ja</th><th>Ko</th><th>Es</th><th>Lo</th><th>My</th><th>De</th><th>De</th><th>Ar</th><th>Ru</th><th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <tr class="text-center">
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
                                            
                                        </tbody>
                                    </table> -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
