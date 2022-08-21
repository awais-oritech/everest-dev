 @extends('layouts.site')
 @section('content')
     <section class="hero_single version_2">
         <div class="wrapper">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6 col-md-12 col-sm-12" >
                                <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol> -->
                            <div class="carousel-inner">
                            <div class="carousel-item active">

                                    <div class="carousel-caption ">
                                        <h5 class="animated bounceInRight" style="animation-delay: 1s">INTERNATIONAL NETWORK <br> BUILD ON FOUNDATION OF <br>SAFETY AND TRUST</h5>
                                        <p class="animated bounceInLeft" style="animation-delay: 2s">Find what you need!</p>
                                        <a href="{{route('member')}}" class="hvr-sweep-to-right buttons animated bounceInRight" style="animation-delay: 3s">Become Member</a>
                                    </div>
                                </div>
                                <div class="carousel-item ">

                                    <div class="carousel-caption">
                                        <h5 class="animated bounceInRight" style="animation-delay: 1s">Beating all other mobile figures previously covered by Oftel.</h5>
                                        <p  class="animated bounceInLeft" style="animation-delay: 2s">Just do it</p>
                                        <a href="" class="hvr-sweep-to-right buttons animated bounceInRight" style="animation-delay: 3s">Become Member</a>
                                    </div>
                                </div>
                                <div class="carousel-item ">

                                    <div class="carousel-caption ">
                                    <h5 class="animated bounceInRight" style="animation-delay: 1s">The people you need are only a touch away.</h5>
                                        <p  class="animated bounceInLeft" style="animation-delay: 2s">Waiting for you </p>
                                        <a href="" class="hvr-sweep-to-right buttons animated bounceInRight" style="animation-delay: 3s">Become Member</a>
                                    </div>
                                </div>
                            </div>
                     </div>
                     <div class="col-lg-6 d-none d-lg-block" >
                        <div class="formbox-header animated bounceInUp" style="animation-delay:3s">
                            <form method="GET" action="{{route('search')}}">
                                    {{-- <div class="form-group col-xs-3">
                                        <label for="exampleInputEmail1"><img src="{{ asset('assets/img/keyword.gif') }}" width="30px" height="30px"> Service</label>
                                        <select id="" name="name" class="form-control" style="border:none; border-bottom:1px solid #ccc">
                                            <option value="0" selected disabled>Services</option>
                                            @foreach ($services as $service)
                                                <option value="{{$service->name}}">{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    {{-- <div class="form-group col-xs-3">
                                        <label for="exampleInputPassword1"><img src="{{ asset('assets/img/home.gif') }}" width="30px" height="30px"> Address</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address">
                                    </div> --}}
                                <div class="form-group col-xs-3">
                                    <label for="continents"><img src="{{ asset('assets/img/country.gif') }}" width="30px" height="30px"> Continents</label>
                                    <select id="continents" name="continent" class="form-control" style="border:none; border-bottom:1px solid #ccc">
                                        <option value="0" selected disabled>Continents</option>
                                        @foreach ($continents as $continent)
                                            <option value="{{$continent->code}}">{{$continent->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xs-3">
                                    <label for="country"><img src="{{ asset('assets/img/address.gif') }}" width="30px" height="30px"> Country</label>
                                    <select id="country" name="country" class="form-control" style="border:none; border-bottom:1px solid #ccc">
                                        <option value="0" selected disabled>Country</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-3">
                                    <label for="city"><img src="{{ asset('assets/img/home.gif') }}" width="30px" height="30px"> City</label>
                                    <select id="city" name="city" class="form-control" style="border:none; border-bottom:1px solid #ccc">
                                        <option value="0" selected disabled>City</option>
                                    </select>
                                </div>
                                <div class="buttonn">
                                <button type="submit" class="hvr-sweep-to-right buttons">Search</button>
                                </div>
                            </form>
                        </div>
                     </div>
                 </div>
             </div>

     </section>


            {{-- <div class="main_categories">
         <div class="container">
             <ul class="clearfix">
                 <li>
                     <a href="grid-listings-filterscol.html">
                         <i class="icon-shop"></i>
                         <h3>Shops</h3>
                     </a>
                 </li>
                 <li>
                     <a href="grid-listings-filterscol.html">
                         <i class="icon-lodging"></i>
                         <h3>Hotels</h3>
                     </a>
                 </li>
                 <li>
                     <a href="grid-listings-filterscol.html">
                         <i class="icon-restaurant"></i>
                         <h3>Restaurants</h3>
                     </a>
                 </li>
                 <li>
                     <a href="grid-listings-filterscol.html">
                         <i class="icon-bar"></i>
                         <h3>Bars</h3>
                     </a>
                 </li>
                 <li>
                     <a href="grid-listings-filterscol.html">
                         <i class="icon-dot-3"></i>
                         <h3>More</h3>
                     </a>
                 </li>
             </ul>
         </div>
         <!-- /container -->
     </div> --}}
     <!-- /main_categories -->
     <div class="container public-form mb-4" >
         <div class="row">
            <div class="col-12" >
                    <div class="formbox-header shadow-form animated bounceInUp" style="animation-delay:1s">
                        <form method="GET">
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1"><img src="{{ asset('assets/img/keyword.gif') }}" width="30px" height="30px"> Keyword</label>
                                <input type="text" class="form-control input-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="keyword">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword11"><img src="{{ asset('assets/img/home.gif') }}" width="30px" height="30px"> Address</label>
                                <input type="text" class="form-control" id="exampleInputPassword11" placeholder="Address">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword1121"><img src="{{ asset('assets/img/country.gif') }}" width="30px" height="30px"> Country</label>
                                <input type="text" class="form-control" id="exampleInputPassword1121" placeholder="Country">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword12"><img src="{{ asset('assets/img/address.gif') }}" width="30px" height="30px"> City</label>
                                <input type="text" class="form-control" id="exampleInputPassword12" placeholder="City">
                            </div>
                            <div class="buttonn">
                            <button type="submit" class="hvr-sweep-to-right buttons">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
     </div>

     <!-- About US -->
     <div class="bg_color_1 "  >
         <div class="container margin_80_55">
             <div class="main_title_2">
                 <span><em></em></span>
                    <h2 >Our Origins and Story</h2>
                    <p class="animated bounceInLeft" style="animation-delay:1s">Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
             </div>
             <div class="row" style="justify-content: center;">
                 <div class="col-lg-6 col-md-6 col-sm-12 " >
                    <div class="row">
                            <div class="col-3">

                            </div>
                            <div class="col-3">
                                <div class="box">
                                <div class="content">
                                    <img src="{{ asset('assets/img/1_carousel.jpg') }}">
                                </div>
                                </div>
                            </div>
                            <div class="col-3">

                            </div>

                        </div>
                    </div>

                 <div class="col-lg-6 col-md-6 col-sm-12" >
                 <p>Lorem ipsum dolor sit amet, homero erroribus in cum. Cu eos <strong>scaevola probatus</strong>.
                         Nam
                         atqui intellegat ei, sed ex graece essent delectus. Autem consul eum ea. Duo cu fabulas nonumes
                         contentiones, nihil voluptaria pro id. Has graeci deterruisset ad, est no primis detracto
                         pertinax,
                         at cum malis vitae facilisis.</p>
                     <p>Dicam diceret ut ius, no epicuri dissentiet philosophia vix. Id usu zril tacimates neglegentur.
                         Eam
                         id legimus torquatos cotidieque, usu decore <strong>percipitur definitiones</strong> ex, nihil
                         utinam recusabo mel no. Dolores reprehendunt no sit, quo cu viris theophrastus. Sit unum
                         efficiendi
                         cu.</p>
                     <p><em>CEO Marc Schumaker</em></p>

                 </div>
             </div>

             <!--/row-->

         </div>
         <!--/container-->
     </div>
     <!--/About US-->

     <!-- Sponsors -->
     <div class="bg_color_1"  >
         <div class="container margin_80_55">
             <div class="main_title_2">
                 <span><em></em></span>
                 <h2>Our Sponsor</h2>
             </div>
             <div class="row justify-content-between">
                 <div class="sponsors-slider">
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo1.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo2.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo3.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo4.png') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo5.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo6.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo7.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo8.jpg') }}" height="150px">
                     </div>
                 </div>
             </div>

         </div>
     </div>
     <!--/ Sponsors -->


     <div class="mt-4" style="background-color: #f8f8f8"  >
         <div class="container" style="padding-top:5%">

             <div class="row">
                 <div class="col-md-2" style="text-align: left">
                     <span><em></em></span>
                     <h2>GLOBAL <br> COVERAGE</h2>
                 </div>
                 <div class="four col-md-2" style="text-align: center">
                     <span class="counter ">323</span>
                     <div class="counter-box colored">
                         <p>OFFICES</p>
                     </div>
                 </div>
                 <div class="four col-md-2" style="text-align: center">
                     <span class="counter ">220</span>
                     <div class="counter-box colored">
                         <p>MEMBERS</p>
                     </div>
                 </div>
                 <div class="four col-md-2" style="text-align: center">
                     <span class="counter ">89</span>
                     <div class="counter-box colored">
                         <p>COUNTRIES</p>
                     </div>
                 </div>
                 <div id="regions_div" style=" height: 400px;">
                </div>
             </div>
         </div>
     </div>
     <!-- Project Counter -->
     {{-- <div class="container margin_60_35" >
         <div class="row">
             <div class="four col-md-2">
                 <span class="counter colored">2147</span>
                 <div class="counter-box ">
                     <p>offices</p>
                 </div>
             </div>
             <div class="four col-md-3">
                 <div class="counter-box colored"> <i class="icon-group"></i> <span class="counter">3275</span>
                     <p>Registered Members</p>
                 </div>
             </div>
             <div class="four col-md-3">
                 <div class="counter-box colored"> <i class="icon-shop"></i> <span class="counter">289</span>
                     <p>Available Services</p>
                 </div>
             </div>
             <div class="four col-md-3">
                 <div class="counter-box colored"> <i class="icon-user"></i> <span class="counter">1563</span>
                     <p>Served Businness</p>
                 </div>
             </div>
         </div>
     </div> --}}
     <!-- /Project Counter -->





     <!--/call_section-->
     <!-- <!-- <div class="call_section mt-4" data-aos="fade-up">
         <div class="wrapper">
             <div class="container margin_80_55">
                 <div class="main_title_2">
                     <span><em></em></span>
                     <h2>Public Listing</h2>
                     <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                 </div>
                 <div class="row">
                     <form method="post" action="http://www.ansonika.com/sparker/grid-listings-filterscol.html">
                         <div class="row g-0 custom-search-input-2">
                             <div class="col-lg-3">
                                 <div class="form-group">
                                     <input class="form-control" type="text" placeholder="Search by Origin...">
                                     <i class="icon-globe"></i>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <div class="form-group">
                                     <input class="form-control" type="text" placeholder="Search by Country...">
                                     <i class="icon-compass"></i>
                                 </div>
                             </div>
                             {{-- <div class="col-lg-3">
                                 <div class="form-group">
                                     <input class="form-control" type="text" placeholder="What are you looking for...">
                                     <i class="icon_search"></i>
                                 </div>
                             </div> --}}
                             <div class="col-lg-3">
                                 <div class="form-group">
                                     <input class="form-control" type="text" placeholder="City">
                                     <i class="icon_pin_alt"></i>
                                 </div>
                             </div>
                             <div class="col-lg-3">
                                 <select class="wide">
                                     <option>Land</option>
                                     <option>Air</option>
                                     <option>Sea</option>

                                 </select>
                             </div>

                         </div>
                         <!-- /row -->
                     </form>
                     {{-- <div class="col-md-4">
                         <div class="box_how">
                             <i class="pe-7s-search"></i>
                             <h3>Search Locations</h3>
                             <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel
                                 ignota fierent eloquentiam id.</p>
                             <span></span>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="box_how">
                             <i class="pe-7s-info"></i>
                             <h3>View Location Info</h3>
                             <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel
                                 ignota fierent eloquentiam id.</p>
                             <span></span>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="box_how">
                             <i class="pe-7s-like2"></i>
                             <h3>Book, Reach or Call</h3>
                             <p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel
                                 ignota fierent eloquentiam id.</p>
                         </div>
                     </div> --}}
                 </div>
                 <!-- /row -->
                 <!-- <p class="text-center add_top_30 wow bounceIn" data-wow-delay="0.5s"><a href="account.html"
                         class="btn_1 rounded">Search</a></p> -->
             </div>

         </div>
         <!-- /wrapper -->
     <!-- </div> -->
     <!--/call_section-->

     <div class="public-listing mt-4" >
         <!-- <video autoplay loop muted>
             <source src="{{ asset('assets/videos/pricelistingvideo.mp4') }}">
         </video> -->
            <div class="">
                <div class="container margin_80_55">
                        <div class="main_title_2">
                            <span><em></em></span>
                            <h2 style="color:white">Pioneer Benefits</h2>
                            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
                        </div>
                    <div class="row ">
                        <div class="col-lg-3" >
                            <div class="benefit">
                                <img src="{{ asset('assets/img/benefitearth.png') }}" width="50px" height="50px"><span>   Global Search</span>
                            </div>
                        </div >

                        <div class="col-lg-3" >
                            <div class="benefit">
                                <img src="{{ asset('assets/img/finance.png') }}" width="50px" height="50px"><span>Financial Protection</span>
                            </div>
                        </div >
                        <div class="col-lg-3" >
                            <div class="benefit">
                                <img src="{{ asset('assets/img/pay.png') }}" width="50px" height="50px"><span>Partner Pay</span>
                            </div>
                        </div >
                        <div class="col-lg-3" >
                            <div class="benefit">
                                <img src="{{ asset('assets/img/partnership.png') }}" width="50px" height="50px"><span>Marketing and Promotion</span>
                            </div>
                        </div >
                        <div class="col-lg-3" >
                            <div class="benefit">
                                <img src="{{ asset('assets/img/customerservice.png') }}" width="50px" height="50px"><span>Customer Service</span>
                            </div>
                        </div >
                        <div class="col-lg-3" >
                            <div class="benefit">
                                <img src="{{ asset('assets/img/shipping.png') }}" width="50px" height="50px"><span>All World Shippng</span>
                            </div>
                        </div >
                        <div class="col-lg-3" >
                            <div class="benefit">
                                <img src="{{ asset('assets/img/box.png') }}" width="50px" height="50px"><span>Courier Program</span>
                            </div>
                        </div >
                        <div class="col-lg-3" >
                            <div class="benefit">
                                <img src="{{ asset('assets/img/wpsonline.png') }}" width="50px" height="50px"><span>WCA Online</span>
                            </div>
                        </div >
                        <div class="col-lg-3" >
                            <div class="benefit">
                                <img src="{{ asset('assets/img/voice.png') }}" width="50px" height="50px"><span>Voice of the Independant</span>
                            </div>
                        </div >



                    </div>
                </div>
            </div>
    </div>

     <!-- Sponsors -->
     <div class="bg_color_1" >
         <div class="container margin_80_55">
             <div class="main_title_2">
                 <span><em></em></span>
                 <h2>Our Diamond Partners</h2>
             </div>
             <div class="row justify-content-between">
                 <div class="diamond-slider">
                 <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo1.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo2.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo3.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo4.png') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo5.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo6.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo7.jpg') }}" height="150px">
                     </div>
                     <div class="slide"><img
                             src="{{ asset('assets/img/sponsorlogo8.jpg') }}" height="150px">
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--/ Sponsors -->

     <!--News and Events-->
     <div class="container margin_80_55" >
         <div class="main_title_2">
             <span><em></em></span>
             <h2>News and Events</h2>
             <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
            <section class="cards">
                    <article class="card card--1">
                    <div class="card__info-hover">
                        <svg class="card__like"  viewBox="0 0 24 24">
                        <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                    </svg>
                        <div class="card__clock-info">
                            <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                            </svg><span class="card__time">15 min</span>
                        </div>

                    </div>
                    <div class="card__img"></div>
                    <a href="#" class="card_link">
                        <div class="card__img--hover"></div>
                    </a>
                    <div class="card__info">
                        <span class="card__category"> Recipe</span>
                        <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
                        <span class="card__by">by <a href="#" class="card__author" title="author">Celeste Mills</a></span>
                    </div>
                    </article>


                    <article class="card card--2">
                    <div class="card__info-hover">
                        <svg class="card__like"  viewBox="0 0 24 24">
                        <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                    </svg>
                        <div class="card__clock-info">
                            <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                            </svg><span class="card__time">5 min</span>
                        </div>

                    </div>
                    <div class="card__img"></div>
                    <a href="#" class="card_link">
                        <div class="card__img--hover"></div>
                    </a>
                    <div class="card__info">
                        <span class="card__category"> Travel</span>
                        <h3 class="card__title">Discover the sea</h3>
                        <span class="card__by">by <a href="#" class="card__author" title="author">John Doe</a></span>
                    </div>
                    </article>
             </section>
            </div>
         <div class="col-lg-6 d-none d-md-block">
         <section class="cards">
                    <article class="card card--3">
                    <div class="card__info-hover">
                        <svg class="card__like"  viewBox="0 0 24 24">
                        <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                    </svg>
                        <div class="card__clock-info">
                            <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                            </svg><span class="card__time">15 min</span>
                        </div>

                    </div>
                    <div class="card__img"></div>
                    <a href="#" class="card_link">
                        <div class="card__img--hover"></div>
                    </a>
                    <div class="card__info">
                        <span class="card__category"> Recipe</span>
                        <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
                        <span class="card__by">by <a href="#" class="card__author" title="author">Celeste Mills</a></span>
                    </div>
                    </article>


                    <article class="card card--4">
                    <div class="card__info-hover">
                        <svg class="card__like"  viewBox="0 0 24 24">
                        <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                    </svg>
                        <div class="card__clock-info">
                            <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                            </svg><span class="card__time">5 min</span>
                        </div>

                    </div>
                    <div class="card__img"></div>
                    <a href="#" class="card_link">
                        <div class="card__img--hover"></div>
                    </a>
                    <div class="card__info">
                        <span class="card__category"> Travel</span>
                        <h3 class="card__title">Discover the sea</h3>
                        <span class="card__by">by <a href="#" class="card__author" title="author">John Doe</a></span>
                    </div>
                    </article>
             </section>
         </div>
        <div class="col-12 mt-4 btnnewsdiv">
            <button class="hvr-sweep-to-right buttons">Read More</button>
        </div>



             <!-- <div class="col-lg-6">
                 <a class="box_news" href="blog.html">
                     <figure><img src="{{ asset('assets/img/news_home_1.jpg') }}" alt=""></figure>
                     <ul>
                         <li>Restaurants</li>
                         <li>20.11.2017</li>
                     </ul>
                     <h4>Pri oportere scribentur eu</h4>
                     <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum
                         vidisse....</p>
                 </a>
             </div> -->
             <!-- /box_news -->
             <!-- <div class="col-lg-6">
                 <a class="box_news" href="blog.html">
                     <figure><img src="{{ asset('assets/img/news_home_2.jpg') }}" alt=""></figure>
                     <ul>
                         <li>Shops</li>
                         <li>20.11.2017</li>
                     </ul>
                     <h4>Duo eius postea suscipit ad</h4>
                     <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum
                         vidisse....</p>
                 </a>
             </div> -->
             <!-- /box_news -->
             <!-- <div class="col-lg-6">
                 <a class="box_news" href="blog.html">
                     <figure><img src="{{ asset('assets/img/news_home_3.jpg') }}" alt=""></figure>
                     <ul>
                         <li>Shops</li>
                         <li>20.11.2017</li>
                     </ul>
                     <h4>Elitr mandamus cu has</h4>
                     <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum
                         vidisse....</p>
                 </a>
             </div> -->
             <!-- /box_news -->
             <!-- <div class="col-lg-6">
                 <a class="box_news" href="blog.html">
                     <figure><img src="{{ asset('assets/img/news_home_4.jpg') }}" alt=""></figure>
                     <ul>
                         <li>Bars</li>
                         <li>20.11.2017</li>
                     </ul>
                     <h4>Id est adhuc ignota delenit</h4>
                     <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum
                         vidisse....</p>
                 </a>
             </div> -->
             <!-- /box_news -->
         </div>
         <!-- /row -->
         <!-- <p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all news</a></p> -->
     </div>
     <!--/News and Events-->
 @endsection
 @push('css')
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick-theme.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick.css') }}">
     <style>
         .counter-box {
             display: block;
             background: #00a8df;
             color: #222;
             text-align: center;
             padding: 19px 30px 5px;
             margin-top: -12px
         }

         .counter-box p {
             margin: 5px 0 0;
             padding: 0;
             color: #909090;
             font-size: 20px;
             font-weight: 500
         }

         .counter-box i {
             font-size: 60px;
             margin: 0 0 15px;
             color: #d2d2d2
         }

         .counter {
             display: block;
             font-size: 40px;
             font-weight: 700;
             color: #222;
             line-height: 28px
         }

         .colored {
             color: #222;
         }

         .counter-box.colored:hover {
             background-color: #00a8df;
             color: #222 !important;
         }

         .counter-box.colored p,
         .counter-box.colored i,
         .counter-box.colored .counter {
             color: #222
         }

     </style>
 @endpush
 @push('script')
     <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
     <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
     <script type="text/javascript" src="{{ asset('assets/slick/slick.min.js') }}"></script>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
         google.charts.load('current', {
             'packages': ['geochart'],
         });
         google.charts.setOnLoadCallback(drawRegionsMap);

         function drawRegionsMap() {
             var data = google.visualization.arrayToDataTable([
                 ['Country', 'Popularity'],
                 ['Germany', 200],
                 ['United States', 300],
                 ['Brazil', 400],
                 ['Canada', 500],
                 ['France', 600],
                 ['RU', 700]
             ]);

             var options = {
                 colorAxis: {
                     colors: '#1c75BA'
                 },
                 backgroundColor: '#f8f8f8'

             };

             var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

             chart.draw(data, options);
         }
     </script>
     <script>
         $(document).ready(function() {

             $('.counter').each(function() {
                 $(this).prop('Counter', 0).animate({
                     Counter: $(this).text()
                 }, {
                     duration: 4000,
                     easing: 'swing',
                     step: function(now) {
                         $(this).text(Math.ceil(now));
                     }
                 });
             });

         });
     </script>
      <script type="text/javascript">

    </script>
     <script type="text/javascript">
         $(document).ready(function() {

             $('.diamond-slider').slick({
                 slidesToShow: 6,
                 slidesToScroll: 1,
                 autoplay: true,
                 autoplaySpeed: 2000,
             });
             $('.sponsors-slider').slick({
                 slidesToShow: 6,
                 slidesToScroll: 1,
                 autoplay: true,
                 autoplaySpeed: 2000,
             });
         });
     </script>
     <script>

    $('#continents').change(function () {
    var id = $(this).find(':selected').val()


    $.ajax({

        type: 'POST',
        url: "{{route('countries-list')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': id
        },
        success: function (data) {
            // the next thing you want to do
            var $country = $('#country');
            $country.empty();
            $('#city').empty();
            for (var i = 0; i < data.length; i++) {
                $country.append('<option id=' + data[i].code + ' value=' + data[i].code + '>' + data[i].name + '</option>');
            }

            //manually trigger a change event for the contry so that the change handler will get triggered
            $country.change();
        }
    });

});

$('#country').change(function () {
    //var id = $(this).find(':selected')[0].id;
    var id = $(this).find(':selected').val()
    $.ajax({
        type: 'POST',
        url: "{{route('cities-list')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': id
        },
        success: function (data) {
            // the next thing you want to do
            var $city = $('#city');
            $city.empty();
            for (var i = 0; i < data.length; i++) {
                $city.append('<option id=' + data[i].code + ' value=' + data[i].code + '>' + data[i].name + '</option>');
            }
        }
    });
});
     </script>
 @endpush
