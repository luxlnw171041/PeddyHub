@extends('layouts.partner.theme_partner')

@section('content')
    <div class="container-fluid translate">
        <div class="row">
            <div class="col-md-12">
                <!-- <a href="{{ url('/lost_pet') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <br />
                <br /> -->

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form id="lostpet_by_partner" method="POST" action="{{ url('api/lost_pet_by_partner') }}" accept-charset="UTF-8" class="form-horizontal needs-validation" novalidate="" enctype="multipart/form-data">
              
                    {{ csrf_field() }}

                    @include ('partner_admin.lost_pet.lost_pet_by_partner_form', ['formMode' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection
