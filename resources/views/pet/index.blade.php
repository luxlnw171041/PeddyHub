@extends('layouts.peddyhub')

@section('content')
<body>
    <div class="main-wrapper pet buy">
        <section class="featured">
            <div class="crumb">
                <div class="container">
                    <h1>
                        My <span class="wow pulse" data-wow-delay="1s"> Pet </span>
                    </h1>
                    <div class="bg_tran">
                        My Pet
                    </div>
                    <p>
                        <a href="{{ url('/') }}" title="Home">HOME</a>
                        || <span> PETS </span>
                    </p>
                </div>
            </div>
        </section>
        
        <div class="button wow fadeInUp ">
        <div class="container  d-flex justify-content-end">
            <a style="font-size:15px;" href="{{ url('/pet/create') }}" class="btn main" title="contact">
                Add Pet <i class="fas fa-paw"></i>
            </a>
            </div></div>
        <div class="pet about second" style="margin-top:-65px">
            <section class="team">
                <div class="container">
                    <!-- <div class="heading text-center">
                        <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                                class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                    class="fas fa-paw"></i> </span></p>
                        <h2 class="wow fadeInDown">Ready to Adopt <span class="wow pulse" data-wow-delay="1s">
                                Pets</span>
                        </h2>
                    </div> -->
                    <div class="row">
                        @foreach($pet as $item)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="member">
                                    <div class="image">
                                    @if(!empty($item->photo))
                                        <img src="{{ url('storage/'.$item->photo )}}" width="295px" alt="image of pet" title="pet" class="img-fluid customer">
                                    @else 
                                        <img src="{{ url('/peddyhub/images/home_5/team-1.png') }}"  alt="image of client" title="client" class="img-fluid customer">
                                    @endif
                                    </div>
                                    <div class="content">
                                        <h4 class="wow fadeInDown text-conter">{{ $item->name }}</h4>
                                        <ul>
                                        <li>
                                            <i class="fas fa-paw"></i>Gender : {{ $item->gender }}</li>
                                            <li><i class="fas fa-paw"></i>Birth : {{ $item->birth }}</li>
                                            <li><i class="fas fa-paw"></i>Age renge : {{ $item->age }}</li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-6 col-6 col-lg-6">
                                                <div class="button wow fadeInUp d-flex justify-content-start " >
                                                    <a  href="{{ url('/pet/' . $item->id . '/edit') }} " class="btn main d-flex align-items-end" title="contact">
                                                        Edit &nbsp;<i class="fas fa-paw"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6 col-lg-6" >
                                                <div class="button wow fadeInUp d-flex justify-content-end" >
                                                    <form id="myform" method="POST" action="{{ url('/pet' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <a href="javascript:;" type="submit" class="btn main" title="Delete Pet" onclick="document.getElementById('myform').submit() ">Delete</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>


<!-- 
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Pet</div>
                    <div class="card-body">
                        <a href="{{ url('/pet/create') }}" class="btn btn-success btn-sm" title="Add New Pet">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/pet') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>User Id</th><th>Name</th><th>Birth</th><th>Photo</th><th>Gender</th><th>Size</th><th>Age</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pet as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user_id }}</td><td>{{ $item->name }}</td><td>{{ $item->birth }}</td>
                                        <td><img src="{{ url('storage/'.$item->photo )}}" width="100" /></td>
                                        <td>{{ $item->gender }}</td><td>{{ $item->size }}</td><td>{{ $item->age }}</td>
                                        <td>
                                            <a href="{{ url('/pet/' . $item->id) }}" title="View Pet"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/pet/' . $item->id . '/edit') }}" title="Edit Pet"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/pet' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Pet" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pet->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection

<script>
    function myFunction() {
        document.getElementById("GFG").submit();
    }
</script>