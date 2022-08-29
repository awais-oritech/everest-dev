@extends('layouts.site')
@section('content')
<main>
    <div class="container margin_60_35">
        @foreach ($events as $event)
        <div class="strip list_view">
            <div class="row g-0">
                <div class="col-lg-5">
                    <figure>
                        <a href="#"><img src="admin/{{$event->image}}" class="img-fluid" alt=""><div class="read_more"><span>Read more</span></div></a>

                        {{-- <small>Bar</small> --}}
                    </figure>
                </div>
                <div class="col-lg-7">
                    <div class="wrapper">
                        {{-- <a href="#0" class="wish_bt"></a> --}}
                        <h3><a href="#">{{$event->name}}</a></h3>
                        {{-- <small>{{$event->date}}</small> --}}
                        <p>{!! $event->description !!}</p>
                        {{-- <a class="address" href="#">Get directions</a> --}}
                    </div>
                    <ul>
                        <li><span class="loc_open">{{$event->date}}</span></li>
                        {{-- <li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        {{-- <p class="text-center add_top_60"><a href="#0" class="btn_1 rounded">Load more</a></p> --}}
        {<div class="pagination__wrapper add_bottom_30">
            <ul class="pagination">
                <div class="d-flex justify-content-center">
                    {!! $events->links() !!}
                </div>
            </ul>
        </div>

    </div>
    <!-- /container -->
</main>
@endsection
