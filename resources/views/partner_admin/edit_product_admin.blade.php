@extends('layouts.partner.theme_partner')

@section('content')
<style>
.adopt-pet-img{
    border:#B8205B 2px solid;
    border-radius: 20px;
    height: 120px;
    object-fit: cover;
    cursor: pointer;
}
.adopt-pet-img:hover{
    color: #B8205B;
}
</style>
<div class="form-body mt-4">
    <form method="POST" action="{{ url('/product/' . $product->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="row">
            <div class="col-lg-8">
                <div class="border border-3 p-4 rounded">
                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Product Title</label>
                        <input class="form-control" name="title" type="text" id="title" value="{{ isset($product->title) ? $product->title : ''}}">
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="mb-3">
                        
                        <label for="inputProductDescription" class="form-label">Description</label>
                        <textarea class="form-control" type="text" name="description" id="description" rows="3" value="{{ isset($product->description) ? $product->description : ''}}">{{$product->description}}</textarea>
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="mb-3">
                        <label for="inputProductDescription" class="form-label">Product Images</label>
                        @if(!empty($product->photo))
                            <div class="col-3">
                                <label  class="control-label" for="photo" on>
                                <img class="adopt-pet-img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_1" src="{{ url('storage')}}/{{ $product->photo }}" />
                                    <input class="form-control d-none" name="photo" type="file" id="photo" value="{{ isset($product->photo) ? $product->photo : ''}}" onchange="document.getElementById('show_photo_1').src = window.URL.createObjectURL(this.files[0])">
                                    
                                </label>
                            </div>
                        @endif
                        @if(empty($product->photo))
                        <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($product->photo) ? $product->photo : ''}}" accept="image/*">
                        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="border border-3 p-4 rounded">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="inputProductType" class="form-label">Product Tags</label>
                            <select id="tag" name="promotion" class="form-control" >
                                <option value='' selected="selected">ปรกติ</option>
                                <option value="ใหม่">สินค้าใหม่</option>
                                <option value="โปรโมชั่น">สินค้าโปรโมชั่น</option>
                                @if(Auth::user()->role == "admin" )
                                <option value="manoon">manoon</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPrice" class="form-label">Price</label>
                            <input class="form-control" name="price" type="text" id="price" value="{{ isset($product->price) ? $product->price : ''}}" placeholder="00.00">
                            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div id="div_price2"class="col-md-6 d-none">
                            <label for="inputCompareatprice" class="form-label">Compare at Price</label>
                            <input class="form-control" name="price2" type="text" id="price2" value="{{ isset($product->price2) ? $product->price2 : ''}}" placeholder="00.00">
                            {!! $errors->first('price2', '<p class="help-block">:message</p>') !!}
                        </div>
                        <!-- <div class="col-md-6">
                            <label for="inputCostPerPrice" class="form-label">Cost Per Price</label>
                            <input type="email" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                        </div>
                        <div class="col-md-6">
                            <label for="inputStarPoints" class="form-label">Star Points</label>
                            <input type="password" class="form-control" id="inputStarPoints" placeholder="00.00">
                        </div>
                            -->
                        <div class="col-12">
                            <label for="inputVendor" class="form-label">animal type</label>
                            <select name="pet_category_id" class="form-control" required>
                                <option value='{{$product->pet_category->id }}' selected="selected">{{$product->pet_category->name }}</option>
                                @foreach($category as $item)
                                <option value="{{ $item->id}}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputCollection" class="form-label">Product Type</label>
                            <select name="type" class="form-control" required>
                                <option value='{{$product->type}}' selected="selected">{{$product->type}}</option>
                                <option value="Food">Food</option>
                                <option value="Grooming">Grooming</option>
                                <option value="Health Food">Health Food</option>
                                <option value="Snack">Snack</option>
                                <option value="Pill">Pill</option>
                                <option value="Other">Other</option>
                            </select>
                            {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div id="div_link" class="col-12 d-none">
                            <label for="inputProductTags" class="form-label">Product link</label>
                            <input class="form-control" name="link" type="text" id="link" value="{{ isset($product->link) ? $product->link : ''}}" >
                            {!! $errors->first('link', '<p class="help-block">:message</p>') !!}            
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end row-->
</div>
@endsection