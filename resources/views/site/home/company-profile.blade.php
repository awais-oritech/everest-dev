@extends('layouts.site')
@section('content')
<main>
    <nav class="secondary_nav sticky_horizontal_2">
        <div class="container">
            <ul class="clearfix">
                <li><a href="#" class="active">Description</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Booking</a></li>
            </ul>
        </div>
    </nav>

    <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    {{-- <div id="carousel_in" class="owl-carousel owl-theme add_bottom_30">
                      <div class="item"><img src="img/carousel_detail_1.jpg" alt=""></div>
                      <div class="item"><img src="img/carousel_detail_2.jpg" alt=""></div>
                      <div class="item"><img src="img/carousel_detail_3.jpg" alt=""></div>
                      <div class="item"><img src="img/carousel_detail_4.jpg" alt=""></div>
                    </div> --}}
                    @foreach($profile_data as $profile)
                    <section id="description" style="border: none!important;">
                        <div class="detail_title_1">
                            <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                            <h1>{{$profile->companyname}}</h1>
                            <a class="address" href="#">{{$profile->companyaddress}}</a>
                        </div>
                        <p>{{$profile->companyprofile}} <strong>temporibus vim</strong>, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.</p>
                        <p>Cum et probo menandri. Officiis consulatu pro et, ne sea sale invidunt, sed ut sint <strong>blandit</strong> efficiendi. Atomorum explicari eu qui, est enim quaerendum te. Quo harum viris id. Per ne quando dolore evertitur, pro ad cibo commune.</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="add_bottom_15">Services</h5>
                                <div class="row add_bottom_30">
                                    <div class="col-lg-6">
                                        <ul class="bullets">
                                            @foreach($profile_services as $service)
                                            <li>{{$service->service_name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="add_bottom_15">Certifications</h5>
                                <div class="row add_bottom_30">
                                    <div class="col-lg-6">
                                        <ul class="bullets">
                                            @foreach($profile_certification as $certification)
                                            <li>{{$certification->certification_name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <hr>
                        <h3>Information</h3>
                        <table class="table table-striped add_bottom_45">
                            <tbody>
                                <thead style="background-color:#1c75ba!important; color:white;">
                                    <tr>
                                        <th scope="col">Email</th>
                                        <th scope="col">Number</th>
                                        <th scope="col">License</th>
                                        <th scope="col">Vat Number</th>
                                        <th scope="col">Strength</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$profile->companyemail}}</td>
                                        <td>{{$profile->companytelephone}}</td>
                                        <td>{{$profile->companylicense}}</td>
                                        <td>{{$profile->vatnumber}}</td>
                                        <td>{{$profile->companystrength}}</td>
                                    </tr>
                                </tbody>
                            </tbody>
                        </table>
                    </section>
                    @endforeach
                    <!-- /section -->
                </div>
                <!-- /col -->
                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail booking" style="padding: 0% !important;">
                        <img src="{{asset('uploads/'.$profile->companylogo)}}" alt="profile">
                    </div>
                    <ul class="share-buttons">
                        <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
                        <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Share</a></li>
                        <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
                    </ul>
                </aside>
            </div>
            <!-- /row -->
    </div>
    <!-- /container -->
</main>
@endsection
