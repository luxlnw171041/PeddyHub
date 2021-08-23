@extends('layouts.peddyhub')

@section('content')
<div class="container">
        <div class="row">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ url('/pet/' . $pet->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                

                @include ('pet.form', ['formMode' => 'edit'])

            </form>
        </div>
    </div>
    <br>
</section >
@endsection
