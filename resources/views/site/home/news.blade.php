@extends('layouts.site')
@section('content')
<main>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @foreach($news as $new)
                    <div class="col-md-6">
                        @if($category)
                        <h3>{{$category->name}}</h3>
                        @endif
                        <article class="blog">
                            <figure>
                                {{-- <a href="#"><img src="assets/spark-img/blog-1.jpg" alt=""> --}}
                                <a href="{{route('news-info',[$new->id])}}"><img src="https://pioneers.oritech.co/admin/{{$new->image}}" alt="" style="height: 100%; width:100%;">
                                    <div class="preview"><span>Read more</span></div>
                                </a>
                            </figure>
                            <div class="post_info">
                                <small>{{ \Carbon\Carbon::parse($new->created)->format('d-m-Y')}}</small>
                                <h2><a href="{{route('news-info',[$new->id])}}">{{$new->name}}</a></h2>
                                <p>{{substr(strip_tags($new->description),0,50)}}</p>
                                {{-- <ul>
                                    <li>
                                        <div class="thumb"><img src="assets/spark-img/avatar.jpg" alt=""></div> Admin
                                    </li>
                                    <li><i class="ti-comment"></i>20</li>
                                </ul> --}}
                            </div>
                        </article>
                        <!-- /article -->
                    </div>
                    @endforeach
                </div>
                <!-- /row -->

                <div class="pagination__wrapper add_bottom_30">
                    <ul class="pagination">
                        <div class="d-flex justify-content-center">
                            {!! $news->links() !!}
                        </div>
                    </ul>
                </div>
                <!-- /pagination -->

            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                {{-- <div class="widget search_blog">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search..">
                        <span><input type="submit" value="Search"></span>
                    </div>
                </div> --}}
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Latest Post</h4>
                    </div>
                    <ul class="comments-list">
                        @foreach($latest_blogs as $latest_blog)
                        <li>
                            <div class="alignleft">
                                <a href=""><img src="https://pioneers.oritech.co/{{$latest_blog->image}}" alt=""></a>
                            </div>
                            <small>{{\Carbon\Carbon::parse($latest_blog->created)->format('d-m-Y')}}</small>
                            <h3><a href="{{ url('news-info',$latest_blog->id) }}" title="">{{$latest_blog->name}}</a></h3>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /widget -->
               
                <div class="widget">
                    <div class="widget-title">
                        <h4>Categories</h4>
                    </div>
                    <div class="tags">
                        @foreach($categories as $category)
                        <a href="{{ url('news-category',$category->id) }}">{{$category->name}}</a>

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
