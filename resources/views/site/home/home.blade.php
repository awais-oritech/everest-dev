 @extends('layouts.site')
 @section('content')
     <section class="hero_single version_2">
         <div class="wrapper">
             <div class="container" style="text-align: left">
                 <h3>International Network <br>Build on Foundation of <br> Safty and Trust</h3>
                 <p>Find what you need!</p>
                 {{-- <form method="post" action="http://www.ansonika.com/sparker/grid-listings-filterscol.html">
                     <div class="row g-0 custom-search-input-2">
                         <div class="col-lg-4">
                             <div class="form-group">
                                 <input class="form-control" type="text" placeholder="What are you looking for...">
                                 <i class="icon_search"></i>
                             </div>
                         </div>
                         <div class="col-lg-3">
                             <div class="form-group">
                                 <input class="form-control" type="text" placeholder="Where">
                                 <i class="icon_pin_alt"></i>
                             </div>
                         </div>
                         <div class="col-lg-3">
                             <select class="wide">
                                 <option>All Categories</option>
                                 <option>Shops</option>
                                 <option>Hotels</option>
                                 <option>Restaurants</option>
                                 <option>Bars</option>
                                 <option>Events</option>
                                 <option>Fitness</option>
                             </select>
                         </div>
                         <div class="col-lg-2">
                             <input type="submit" value="Search">
                         </div>
                     </div>
                     <!-- /row -->
                 </form> --}}
                 <a href="account.html" class="btn btn-lg btn_add">Become Member</a>
             </div>
         </div>
     </section>
     <!-- /hero_single -->

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
     <!-- About US -->
     <div class="bg_color_1">
         <div class="container margin_80_55">
             <div class="main_title_2">
                 <span><em></em></span>
                 <h2>Our Origins and Story</h2>
                 <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
             </div>
             <div class="row justify-content-between">
                 <div class="col-lg-6 wow" data-wow-offset="150">
                     <figure class="block-reveal">
                         <div class="block-horizzontal"></div>
                         <img src="{{ asset('assets/img/about_1.jpg') }}" class="img-fluid" alt="">
                     </figure>
                 </div>
                 <div class="col-lg-5">
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
     <div class="bg_color_1">
         <div class="container margin_80_55">
             <div class="main_title_2">
                 <span><em></em></span>
                 <h2>Our Sponsor</h2>
             </div>
             <div class="row justify-content-between">
                 <div class="sponsors-slider">
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image1.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image2.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image3.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image4.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image5.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image6.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image7.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image8.png">
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--/ Sponsors -->


     <div class="" style="background-color: #f8f8f8">
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
                 <div id="regions_div" style=" height: 400px;">></div>
             </div>
         </div>
     </div>
     <!-- Project Counter -->
     {{-- <div class="container margin_60_35">
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
     <div class="call_section">
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
                 <p class="text-center add_top_30 wow bounceIn" data-wow-delay="0.5s"><a href="account.html"
                         class="btn_1 rounded">Search</a></p>
             </div>
             <canvas id="hero-canvas" width="1920" height="1080"></canvas>
         </div>
         <!-- /wrapper -->
     </div>
     <!--/call_section-->

     <!-- Sponsors -->
     <div class="bg_color_1">
         <div class="container margin_80_55">
             <div class="main_title_2">
                 <span><em></em></span>
                 <h2>Our Diamond Partners</h2>
             </div>
             <div class="row justify-content-between">
                 <div class="diamond-slider">
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image1.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image2.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image3.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image4.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image5.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image6.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image7.png">
                     </div>
                     <div class="slide"><img
                             src="https://raw.githubusercontent.com/solodev/infinite-logo-carousel/master/images/image8.png">
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--/ Sponsors -->

     <!--News and Events-->
     <div class="container margin_80_55">
         <div class="main_title_2">
             <span><em></em></span>
             <h2>News and Events</h2>
             <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
         </div>
         <div class="row">
             <div class="col-lg-6">
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
             </div>
             <!-- /box_news -->
             <div class="col-lg-6">
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
             </div>
             <!-- /box_news -->
             <div class="col-lg-6">
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
             </div>
             <!-- /box_news -->
             <div class="col-lg-6">
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
             </div>
             <!-- /box_news -->
         </div>
         <!-- /row -->
         <p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all news</a></p>
     </div>
     <!--/News and Events-->
 @endsection
 @push('css')
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick-theme.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick.css') }}">
     <style>
         .counter-box {
             display: block;
             background: #ffc107;
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
             background-color: #ffc107;
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
                     colors: '#3d3187'
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
 @endpush
