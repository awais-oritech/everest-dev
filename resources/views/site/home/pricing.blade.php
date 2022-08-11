@extends('layouts.site')
@section('content')
<main>
    <div class="container margin_60_35">
        <div class="pricing-container cd-has-margins">
            <div class="membership__table">
                <div class="membership__table-header membership__table-row">
                    <div><span>Benifits</span></div>

                    <div><span>{{$packages[0]->package_name}}</span></div>
                    <div><span>{{$packages[1]->package_name}}</span></div>
                    <div><span>{{$packages[2]->package_name}}</span></div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Logo mention on our main page</span></div>
                    <div>
                        @if($packages[0]->main_page_logo!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->main_page_logo!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->main_page_logo!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Link to your web site in the directory </span></div>
                    <div>
                        @if($packages[0]->website_link!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->website_link!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->website_link!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Logo print on the directory </span></div>
                    <div>
                        @if($packages[0]->directory_logo!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->directory_logo!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->directory_logo!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Full information printed on the directory </span></div>
                    <div>
                        @if($packages[0]->full_info!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->full_info!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->full_info!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Free additional branch </span></div>
                    <div>
                        @if($packages[0]->branches==0)
                        <i class="fa fa-close text-danger "></i>
                        @else
                        {{ $packages[0]->branches}}
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->branches==0)
                        <i class="fa fa-close text-danger "></i>
                        @else
                        {{ $packages[1]->branches}}
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->branches==0)
                        <i class="fa fa-close text-danger "></i>
                        @else
                        {{ $packages[2]->branches}}
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Additional branch to be add </span></div>
                    <div>
                        {{ $packages[0]->branch_discount}}
                    </div>
                    <div>
                        {{ $packages[1]->branch_discount}}
                    </div>
                    <div>
                        {{ $packages[2]->branch_discount}}
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>priority for booking meeting conference </span></div>
                    <div>
                        @if($packages[0]->meeting_pirority!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->meeting_pirority!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->meeting_pirority!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Discount on conference fees for the additional member </span></div>
                    <div>
                        {{ $packages[0]->conference_discount}}
                    </div>
                    <div>
                        {{ $packages[1]->conference_discount}}
                    </div>
                    <div>
                        {{ $packages[2]->conference_discount}}
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>priority on sending news & articles </span></div>
                    <div>
                        @if($packages[0]->news_priority!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->news_priority!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->news_priority!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Commercial videos on our y-tube channel </span></div>
                    <div>
                        @if($packages[0]->youtube_videos==0)
                        <i class="fa fa-close text-danger "></i>
                        @else
                        {{ $packages[0]->youtube_videos}}
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->youtube_videos==0)
                        <i class="fa fa-close text-danger "></i>
                        @else
                        {{ $packages[1]->youtube_videos}}
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->youtube_videos==0)
                        <i class="fa fa-close text-danger "></i>
                        @else
                        {{ $packages[2]->youtube_videos}}
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Connecting you to over 900 companies all around the world</span></div>
                    <div>
                        @if($packages[0]->networking!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->networking!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->networking!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Build business relationships with domestic and international freight companies  </span></div>
                    <div>
                        @if($packages[0]->businiess_relation!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->businiess_relation!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->businiess_relation!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Attend Pioneer Annual Conference designed to developed agents’ relations & mutual business</span></div>
                    <div>
                        @if($packages[0]->annual_conference!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->annual_conference!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->annual_conference!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                </div>
                <div class="membership__table-row">
                    <div class="membership__table-text"><span>Direct access for members to the Pioneer directory. Weekly newsletter covering Member offers news & Industry News.</span></div>
                    <div>
                        @if($packages[0]->direct_access!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[1]->direct_access!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                    <div>
                        @if($packages[2]->direct_access!=0)
                        <i class="fa fa-check text-success "></i>
                        @else
                        <i class="fa fa-close text-danger "></i>
                        @endif
                    </div>
                </div>
                <div class="membership__table-row membership__table-price">
                    <div class="membership__table-text"><span></span></div>
                    <div><span><a href="{{route('profile-registration',[$packages[0]->id])}}"><button class="select_button">SELECT</button></a></span></div>
                    <div><span><a href="{{route('profile-registration',[$packages[1]->id])}}"><button class="select_button">SELECT</button></a></span></div>
                    <div><span><a href="{{route('profile-registration',[$packages[2]->id])}}"><button class="select_button">SELECT</button></a></span></div>
                </div>
                <div class="membership__table-row membership__table-footer">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <!-- /pricing-list -->
        </div>
        <!-- /pricing-container -->
    </div>
    <!-- /container -->

    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-md-6">
                    <div class="box_faq">
                        <i class="icon_info_alt"></i>
                        <h4>Porro soleat pri ex, at has lorem accusamus?</h4>
                        <p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo
                            posidonium necessitatibus. Augue honestatis vis no, ius quot mazim forensibus in, per sale
                            virtute legimus ne. Mea dicta facilisis eu.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box_faq">
                        <i class="icon_info_alt"></i>
                        <h4>Ut quo inani dolorem mediocritatem?</h4>
                        <p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo
                            posidonium necessitatibus. Augue honestatis vis no, ius quot mazim forensibus in, per sale
                            virtute legimus ne. Mea dicta facilisis eu.</p>
                    </div>
                </div>
            </div>
            <!-- /row  -->
            <div class="row">
                <div class="col-md-6">
                    <div class="box_faq">
                        <i class="icon_info_alt"></i>
                        <h4>Per sale virtute legimus ne?</h4>
                        <p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo
                            posidonium necessitatibus. Augue honestatis vis no, ius quot mazim forensibus in, per sale
                            virtute legimus ne. Mea dicta facilisis eu.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box_faq">
                        <i class="icon_info_alt"></i>
                        <h4>Mea in justo posidonium necessitatibus?</h4>
                        <p>Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo
                            posidonium necessitatibus. Augue honestatis vis no, ius quot mazim forensibus in, per sale
                            virtute legimus ne. Mea dicta facilisis eu.</p>
                    </div>
                </div>
            </div>
            <!-- /row  -->
        </div>
        <!--/container-->
    </div>
    <!--/bg_color_1-->
</main>
@endsection

<style>
    .select_button{
        border: none;
        padding: 10px;
        color: white;
        background-color: #1c75BA;
        border-radius: 5px;
        font-weight: 500;
        font-family: inherit;
    }
    .select_button:hover{
        background-color: #008adf;
    }
    .membership__table {
        border-radius: 16px;
        box-shadow: 0 10px 30px rgb(58 112 191 / 15%);
        overflow: hidden;
    }

    .membership__table-header {
        font-size: 20px;
        font-weight: 600;
        line-height: 24px;
        background: #1c75BA;
        color: #ffffff
    }

    .membership__table-row {
        display: grid;
        font-size: 14px;
        grid-template-columns: 3fr 2fr 2fr 2fr;
        line-height: 130%;
        min-height: 55px;
    }

    .membership__table-row div,
    .membership__table-row div {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .membership__table-row div:first-child,
    .membership__table-row div:nth-child(2) {
        position: relative;
        z-index: 2;
    }
    .membership__table-text {
    align-items: center !important;
    display: flex !important;
    justify-content: start !important;
    padding-left: 30px !important;
    line-height: 25px !important;
    }
    .membership__table-row:nth-child(even) {background-color: #f2f2f2;}



</style>
