@extends('layouts.peddyhub')
    @section('content')
        <div class="main-wrapper pet service">
            <div class="about pet">
                <section class="service">
                    <div class="container">
                        <div class="heading text-center">
                            <p class="wow fadeInUp" style="visibility: visible;"><span class="purple"><i class="fas fa-paw"></i> </span><span class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i class="fas fa-paw"></i> </span></p>
                            <h4 class="wow fadeInDown" style="visibility: visible;">โรงพยาบาลสัตว์ใกล้ฉัน</h4>
                        </div>
                        <div class="cards">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" id="location" class="form-control" placeholder="location"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <select name="pet_category_id" class="form-control" required>
                                        <option value='' selected="selected">distance</option>
                                        <option value="1">1 km</option>
                                        <option value="5">5 km</option>
                                        <option value="10">10 km</option>
                                        <option value="25">25 km</option>
                                        <option value="50">50 km</option>
                                        <option value="75">70 km</option>
                                        <option value="100">100 km</option>
                                        <option value="150">150 km</option>
                                        <option value="200">200 km</option>
                                        <option value="300">300 km</option>

                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-outline-primary">ค้นหา</button>
                                        <button type="button" class="btn btn-outline-danger">Reset</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>ชื่อโรงพยาบาล</h6>
                                            </div>
                                            <div class="col-8">                                                            
                                                <p><i style="color:#b81f5b;padding-right:10px;" class="fa-solid fa-location-crosshairs" ></i>ตำแหน่ง</p>
                                            </div>
                                            <div class="col-4">
                                                <img src="{{ asset('peddyhub/images/home_5/bowl4.png') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>ชื่อโรงพยาบาล</h6>
                                            </div>
                                            <div class="col-8">                                                            
                                                <p><i style="color:#b81f5b;padding-right:10px;" class="fa-solid fa-location-crosshairs" ></i>ตำแหน่ง</p>
                                            </div>
                                            <div class="col-4">
                                                <img src="{{ asset('peddyhub/images/home_5/bowl4.png') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <section class="map">
                                        <iframe width="100%" height="700"
                                            src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street%2C%20Dublin%2C%20Ireland+(Pets%20Event)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a
                                                href="https://www.maps.ie/create-google-map/">Create Google
                                                Map</a></iframe>
                                    </section>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    @endsection