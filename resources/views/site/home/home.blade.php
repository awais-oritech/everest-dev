@extends('layouts.site') @section('content')
<section class="hero_single version_2">
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="carousel slide" data-ride="carousel">
						{{-- <ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol> --}}
						<div class="carousel-inner">
                            @if (isset($banners[0]))
                            @foreach ($banners as $banner)
							<div class="carousel-item active">
								<div class="carousel-caption ">
									<h5 class="animated bounceInRight" style="animation-delay: 1s">
                                                     {{ $banner->text1 }}</h5>
									<p class="animated bounceInLeft" style="animation-delay: 2s"> {{ $banner->text2 }}</p> <a href="{{ $banner->link }}" class="hvr-sweep-to-right buttons animated bounceInRight" style="animation-delay: 3s">{{ $banner->button }}</a> </div>
							</div>
                            @endforeach
                            @endif
                        </div>
					</div>
				</div>
				<div class="col-lg-6 d-none d-lg-block">
					<div class="formbox-header animated bounceInUp" style="animation-delay:3s">
						<form method="GET" action="{{ route('search') }}">
							<div class="form-group col-xs-12">
								<label for="exampleInputEmail1"><img src="{{ asset('assets/img/keyword.gif') }}" width="30px" height="30px"> Service</label>
								<select id="" name="service_id" class="form-control" style="border:none; border-bottom:1px solid #ccc">
									 @foreach ($services as $service)
									<option value="{{ $service->id }}">{{ $service->name }}</option> @endforeach </select>
							</div>
							<div class="form-group col-xs-12">
								<label for="continents"><img src="{{ asset('assets/img/country.gif') }}" width="30px" height="30px"> Continents</label>
								<select id="continents" name="continent" class="form-control" style="border:none; border-bottom:1px solid #ccc">
									<option value="0" selected disabled>Continents</option> @foreach ($continents as $continent)
									<option value="{{ $continent->id }}">{{ $continent->name }}</option> @endforeach </select>
							</div>
							<div class="form-group col-xs-12">
								<label for="country"><img src="{{ asset('assets/img/address.gif') }}" width="30px" height="30px"> Country</label>
								<select id="country" name="country" class="form-control" style="border:none; border-bottom:1px solid #ccc">
									<option value="0" selected disabled>All Countries</option>
								</select>
							</div>
							<div class="form-group col-xs-12">
								<label for="city"><img src="{{ asset('assets/img/home.gif') }}" width="30px" height="30px"> City</label>
								<select id="city" name="city" class="form-control" style="border:none; border-bottom:1px solid #ccc">
									<option value="0" selected disabled>All Cities</option>
								</select>
							</div>
							<div class="buttonn">
								<button type="submit" class="hvr-sweep-to-right buttons">Search</button></div>
						</form>
					</div>
				</div>
			</div>
		</div>
</section>
<div class="container public-form mb-4">
	<div class="row">
		<div class="col-12">
			<div class="formbox-header shadow-form animated bounceInUp" style="animation-delay:1s">
				<form method="GET">
					<div class="form-group col-xs-12">
						<label for="exampleInputEmail1"><img src="{{ asset('assets/img/keyword.gif') }}" width="30px" height="30px"> Keyword</label>
						<input type="text" class="form-control input-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="keyword"> </div>
					<div class="form-group col-xs-12">
						<label for="exampleInputPassword11"><img src="{{ asset('assets/img/home.gif') }}" width="30px" height="30px"> Address</label>
						<input type="text" class="form-control" id="exampleInputPassword11" placeholder="Address"> </div>
					<div class="form-group col-xs-12">
						<label for="exampleInputPassword1121"><img src="{{ asset('assets/img/country.gif') }}" width="30px" height="30px"> Country</label>
						<input type="text" class="form-control" id="exampleInputPassword1121" placeholder="Country"> </div>
					<div class="form-group col-xs-12">
						<label for="exampleInputPassword12"><img src="{{ asset('assets/img/address.gif') }}" width="30px" height="30px"> City</label>
						<input type="text" class="form-control" id="exampleInputPassword12" placeholder="City"> </div>
					<div class="buttonn">
						<button type="submit" class="hvr-sweep-to-right buttons">Search</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- About US -->
<div class="bg_color_1 ">
	<div class="container margin_80_55">
		<div class="main_title_2"> <span><em></em></span>
			<h2>{{ $abouts->title }}</h2> </div>
		<div class="row" style="justify-content: center;">
			<div class="col-lg-6 col-md-6 col-sm-12 ">
				<div class="row">
					<div class="col-3"> </div>
					<div class="col-3">
						<div class="box">
							<div class="content"> <img src="admin/{{ $abouts->image }}"> </div>
						</div>
					</div>
					<div class="col-3"> </div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<p>{!! $abouts->description !!}</p>  </div>
		</div>
		<!--/row-->
	</div>
	<!--/container-->
</div>
<!--/About US-->
<!-- Sponsors -->
<div class="bg_color_1">
	<div class="container margin_80_55">
		<div class="main_title_2"> <span><em></em></span>
			<h2>Our Sponsor</h2> </div>
		<div class="row justify-content-between">
			<div class="sponsors-slider">
                @foreach ($sponsers as $sponser)
				<div class="slide"> <img src="https://pioneers.oritech.co/admin/{{ $sponser->image }}" height="150px" width="100"> </div>
                 @endforeach
            </div>
		</div>
	</div>
</div>
<!--/ Sponsors -->
<!-- Globals -->
<div class="mt-4" style="background-color: #f8f8f8">
	<div class="container" style="padding-top:5%">
		<div class="row">
			<div class="col-md-2" style="text-align: left"> <span><em></em></span>
				<h2>GLOBAL <br> COVERAGE</h2> </div> @foreach ($globals as $global)
			<div class="four col-md-2" style="text-align: center"> <span class="counter ">{{ $global->value }}</span>
				<div class="counter-box colored">
					<p>{{ $global->name }}</p>
				</div>
			</div> @endforeach
			<div class="col-md-12 d-flex justify-content-center">
				<div id="regions_div" class="global_map" style="width: fit-content; height:fit-content;"></div>
			</div>
		</div>
	</div>
</div>
<!-- / Globals -->
<!-- Public Listing -->
<div class="public-listing mt-4">
	<!-- <video autoplay loop muted>
                 <source src="{{ asset('assets/videos/pricelistingvideo.mp4') }}">
             </video> -->
	<div class="">
		<div class="container margin_80_55">
			<div class="main_title_2"> <span><em></em></span>
				<h2 style="color:white">Pioneer Benefits</h2> </div>
			<div class="row "> @foreach ($benefits as $benefit)
				<div class="col-lg-3">
					<div class="benefit text-center "> <span>{{ $benefit->name }}</span> </div>
				</div> @endforeach </div>
		</div>
	</div>
</div>
<!-- Public Listing -->
<!-- Sponsors -->
<div class="bg_color_1">
	<div class="container margin_80_55">
		<div class="main_title_2"> <span><em></em></span>
			<h2>Our Diamond Partners</h2> </div>
		<div class="row justify-content-between">
			<div class="diamond-slider"> @foreach ($diamonds as $diamond)
				<div class="slide "> <img src="admin/{{ $diamond->image }}" height="150px"> </div> @endforeach </div>
		</div>
	</div>
</div>
<!--/ Sponsors -->
<!--News and Events-->
<div class="container margin_60_35">
	<div class="row"> @foreach($news as $new)
		<div class="col-md-4">
			<article class="blog">
				<figure> <a href="{{route('news-info',[$new->id])}}"><img src="admin/{{$new->image}}" class="img-fluid"
                            alt="">
                        <div class="preview"><span>Read more</span></div>
                    </a> </figure>
				<div class="post_info"> <small>{{ \Carbon\Carbon::parse($new->created)->format('d-m-Y')}}</small>
					<h2><a href="{{route('news-info',[$new->id])}}">{{$new->name}}</a></h2>
					<p style="max-height: 20px;">{{substr(strip_tags($new->description),0,50)}}</p>
				</div>
			</article>
			<!-- /article -->
		</div> @endforeach </div>
	<div class="col-md-12 mb-4"> <a href="{{route('news')}}" class="hvr-sweep-to-right p-1" style="float: right;">Read More <i class="fa fa-angle-right"></i></a> </div>
</div>
</div>
<!--/News and Events-->@endsection @push('css')
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

@media screen and (max-width: 480px) {
	.global_map {
		display: none;
	}
}
</style> @endpush @push('script')
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
$(document).ready(function() {

	 $('.diamond-slider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
        responsive: [
        {
            breakpoint: 1024,
            settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            }
        }
    ]
	});
	$('.sponsors-slider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
        responsive: [
        {
            breakpoint: 1024,
            settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            }
        }
    ]
	});



});
</script>
<script>
$('#continents').change(function() {
	var id = $(this).find(':selected').val()
	$.ajax({
		type: 'POST',
		url: "{{ route('countries-list') }}",
		data: {
			"_token": "{{ csrf_token() }}",
			'id': id
		},
		success: function(data) {
			// the next thing you want to do
			var $country = $('#country');
			$country.empty();
			$('#city').empty();
			$country.append('<option value="0" selected>All Countries</option>');
			for(var i = 0; i < data.length; i++) {
				$country.append('<option id="' + data[i].id + '" value="' + data[i].id + '">' + data[i].name + '</option>');
			}
			//manually trigger a change event for the contry so that the change handler will get triggered
			$country.change();
		}
	});
});
$('#country').change(function() {
	//var id = $(this).find(':selected')[0].id;
	var id = $(this).find(':selected').val()
	$.ajax({
		type: 'POST',
		url: "{{ route('cities-list') }}",
		data: {
			"_token": "{{ csrf_token() }}",
			'id': id
		},
		success: function(data) {
			// the next thing you want to do
			var $city = $('#city');
			$city.empty();
			console.log(data);
			$city.append('<option value="0" selected>All Cities</option>');
			for(var i = 0; i < data.length; i++) {
				$city.append('<option id="' + data[i].id + '" value="' + data[i].id + '"">' + data[i].name + '</option>');
			}
		}
	});
});
</script> @endpush
