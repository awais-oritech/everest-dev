@extends('layouts.site')
@section('content')
<main>
    <div class="container margin_60_35">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="singlepost">
                    {{-- <figure><img alt="" class="img-fluid" src="img/blog-single.jpg"></figure> --}}
                    <h1>{{$pages->title}}</h1><br>
                    <!-- /post meta -->
                    <div class="post-content">
                        <div class="">
                            <p>{!!$pages->description!!}</p>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
                <!-- /single-post -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
@endsection
