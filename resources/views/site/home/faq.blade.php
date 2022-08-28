@extends('layouts.site')
@section('content')
<main>
    <div class="container">
        <div class="row ">
            {{-- <aside class="col-lg-3" id="faq_cat">
                    <div class="box_style_cat" id="faq_box">
                        <ul id="cat_nav">
                            <li><a href="#payment" class="active"><i class="icon_document_alt"></i>Payments</a></li>
                            <li><a href="#tips"><i class="icon_document_alt"></i>Suggestions</a></li>
                            <li><a href="#reccomendations"><i class="icon_document_alt"></i>Reccomendations</a></li>
                            <li><a href="#terms"><i class="icon_document_alt"></i>Terms&amp;conditons</a></li>
                            <li><a href="#booking"><i class="icon_document_alt"></i>Booking</a></li>
                        </ul>
                    </div>
            </aside> --}}
            <div class="col-lg-12 " id="faq">
                <h4 class="nomargin_top">Faq</h4>
                <div role="tablist" class="add_bottom_45 accordion_2" id="payment">
                    @foreach($faqs as $faq)
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-bs-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i class="indicator ti-minus"></i>{{$faq->question}}</a>
                            </h5>
                        </div>

                        <div id="collapseOne_payment" class="collapse show" role="tabpanel" data-bs-parent="#payment">
                            <div class="card-body">
                                <p>{{$faq->answer}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /card -->
                    {{-- <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-bs-toggle="collapse" href="#collapseTwo_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Generative Modeling Review
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo_payment" class="collapse" role="tabpanel" data-bs-parent="#payment">
                            <div class="card-body">
                                <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-bs-toggle="collapse" href="#collapseThree_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Variational Autoencoders
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree_payment" class="collapse" role="tabpanel" data-bs-parent="#payment">
                            <div class="card-body">
                                <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- /accordion payment -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!--/container-->
</main>
@endsection
