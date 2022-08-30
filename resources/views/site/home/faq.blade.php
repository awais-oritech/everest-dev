@extends('layouts.site')
@section('content')
<main>
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 " id="faq">
                <h4 class="nomargin_top">Faq</h4>
                <div role="tablist" class="add_bottom_45 accordion_2" id="payment">
                    @foreach($faqs as $faq)
                    <div class="card m-4">
                        <div class="card-header" style="background-color: #1c75BA;color:#fff" role="tab">
                            <h5 class="mb-0">
                                <a style="color:#fff!important" data-bs-toggle="collapse" href="#collapse{{$faq->id}}" aria-expanded="true"><i style="color:#fff!important" class="indicator ti-minus"></i>{{$faq->question}}</a>
                            </h5>
                        </div>

                        <div id="collapse{{$faq->id}}" class="collapse" role="tabpanel" data-bs-parent="#payment">
                            <div class="card-body">
                                <p>{!!$faq->answer!!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
