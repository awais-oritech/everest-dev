@extends('layouts.site')
@section('content')
{{-- <div class="sub_header_in sticky_header">
    <div class="container">
        <h1>Sparker Blog</h1>
    </div>
</div> --}}
<style>
    .post-content img{
        margin-left: auto;
        margin-right: auto;
        display: block;
        margin-top: 50px;
        max-width: -webkit-fill-available;
    }
</style>
<main>
    <div class="container margin_60_35">
        <div class="row">
            @foreach($news_info as $new_info)
            <div class="col-lg-9">
                <div class="singlepost">
                    <figure><img alt="" class="img-fluid" src="https://pioneers.oritech.co/admin/{{$new_info->image}}" style="margin-left: auto;margin-right: auto;display: block;margin-top: 50px;"></figure>
                    <h1>{{$new_info->name}}</h1>
                    <div class="postmeta">
                        <ul>
                            {{-- <li><a href="#"><i class="ti-folder"></i> Category</a></li> --}}
                            <li><a href="#"><i class="ti-calendar"></i>{{ \Carbon\Carbon::parse($new_info->created)->format('d-m-Y')}}</a></li>
                            {{-- <li><a href="#"><i class="ti-user"></i> Admin</a></li> --}}
                            {{-- <li><a href="#"><i class="ti-comment"></i> (14) Comments</a></li> --}}
                        </ul>
                    </div>
                    <!-- /post meta -->
                    <div class="post-content">
                        <div>
                            <p>{!! $new_info->description !!}</p>
                        </div>
                    </div>
                    <!-- /post -->
                </div>
                @endforeach
            </div>
            <!-- /col -->
            <aside class="col-lg-3">
                <div class="widget">
                    <div class="widget-title">
                        <h4>Latest Posts</h4>
                    </div>
                    <ul class="comments-list">
                        @foreach($latest_blogs as $latest_blog)
                        <li>
                            <div class="alignleft">
                                <a href="#"><img src="https://pioneers.oritech.co/admin/{{$latest_blog->image}}" alt=""></a>
                            </div>
                            <small>{{\Carbon\Carbon::parse($latest_blog->created)->format('d-m-Y')}}</small>
                            <h3><a href="{{url('news-info',$latest_blog->id)}}" title="">{{$latest_blog->name}}</a></h3>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /widget -->
                {{-- <div class="widget">
                    <div class="widget-title">
                        <h4>Categories</h4>
                    </div>
                    <ul class="cats">
                        @foreach($categories as $category)
                        <li><a href="#">{{$category->name}}<span>({{$category->level}})</span></a></li>
                        @endforeach
                    </ul>
                </div> --}}
                <div class="widget">
                    <div class="widget-title">
                        <h4>Categories</h4>
                    </div>
                    <div class="tags">
                        @foreach($categories as $category)
                        <a href="{{ url('news/category',$category->id) }}">{{$category->name}}</a>

                        @endforeach
                        
                    </div>
                </div>
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
@endsection
