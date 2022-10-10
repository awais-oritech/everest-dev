@extends('layouts.site')
@section('content')
<main>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @forelse($pictures as $picture)
                    <div class="col-md-4">
                        <article class="blog">
                            <figure>
                                <a href=""><img src="https://pioneers.oritech.co/admin/{{$picture->image}}" alt="" style="height: 100%; width:100%;">
                                    <div class="preview"><span>View more</span></div>
                                </a>
                            </figure>
                            <div class="post_info">
                                {{-- <small>{{ \Carbon\Carbon::parse($album->created)->format('d-m-Y')}}</small> --}}
                                <h2><a href="{{url('news-info',[$picture->id])}}">{{$picture->name}}</a></h2>
                                {{-- <p>{{substr(strip_tags($album->description),0,50)}}</p> --}}
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
                    @empty
                    <div class=" col-md-12 alert alert-danger text-center" role="alert">
                        No Gallery or Picture Found!
                    </div>
                    @endforelse
                </div>
                <!-- /row -->

                <div class="pagination__wrapper add_bottom_30">
                    <ul class="pagination">
                        <div class="d-flex justify-content-center">
                            {!! $pictures->links() !!}
                        </div>
                    </ul>
                </div>
                <!-- /pagination -->

            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
@endsection
