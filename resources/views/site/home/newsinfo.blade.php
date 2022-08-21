@extends('layouts.site')
@section('content')
{{-- <div class="sub_header_in sticky_header">
    <div class="container">
        <h1>Sparker Blog</h1>
    </div>
</div> --}}
<main>
    <div class="container margin_60_35">
        <div class="row">
            @foreach($news_info as $new_info)
            <div class="col-lg-9">
                <div class="singlepost">
                    <figure><img alt="" class="img-fluid" src="http://localhost:8080/everest-dev/admin/{{$new_info->image}}" style="margin-left: auto;margin-right: auto;display: block;margin-top: 50px;"></figure>
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
                            <p>{{$new_info->description}}</p>
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
                        <h4>Latest Post</h4>
                    </div>
                    <ul class="comments-list">
                       
                        @foreach($latest_blogs as $latest_blog)
                        <li>
                            <div class="alignleft">
                                <a href="#0"><img src="admin/{{$latest_blog->image}}" alt=""></a>
                            </div>
                            <small>{{\Carbon\Carbon::parse($latest_blog->created)->format('d-m-Y')}}</small>
                            <h3><a href="news-info/{{$latest_blog->id}}" title="">{{$latest_blog->name}}</a></h3>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Categories</h4>
                    </div>
                    <ul class="cats">
                        @foreach($categories as $category)
                        <li><a href="#">{{$category->name}}<span>({{$category->level}})</span></a></li>
                        @endforeach
                        {{-- <li><a href="#">Food <span>(12)</span></a></li>
                        <li><a href="#">Places to visit <span>(21)</span></a></li>
                        <li><a href="#">New Places <span>(44)</span></a></li>
                        <li><a href="#">Suggestions and guides <span>(31)</span></a></li> --}}
                    </ul>
                </div>
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
@endsection
