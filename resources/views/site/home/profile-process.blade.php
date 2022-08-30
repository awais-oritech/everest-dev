@extends('layouts.site')
@section('content')
<main>
    <div class="container ">
         <div class="row justify-content-center">
            <div class="col-md-10">
                @if(session('errormessage'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session('errormessage')}}
                </div>
                @elseif(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{session('status')}}
                </div>
                @endif
                <div id="confirm">
                    <div class="icon icon--order-success svg add_bottom_15">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Profile Processing!</h4>
                        @if($profile->status==1)
                        <p class="mt-4">Your Profile has been Registered Successfully, please wait for profile verification this may takes few moment for approval.</p>
                        @elseif($profile->status===2)
                        <p class="mb-0">Please Submit your Payment for approval Thank You!</p>
                        @else
                        <p class="mb-0">Your profile has been approved Thank You!</p>
                        @endif
                        <a href="{{url('profile-registration')}}">Click here to view your profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div id="comments">
                    <h5>Comments</h5>
                    <ul>
                        @if(!empty($comments))
                        @foreach($comments as $comment)
                        <li>
                            {{-- <div class="avatar">
                                <a href="#"><img src="{{asset('assets/img/avatar2.jpg')}}" alt="">
                                </a>
                            </div> --}}
                            <div class="comment_right clearfix">
                                <div class="comment_info">
                                    {{$comment->user_type}}
                                </div>
                                <p>{{$comment->comment}}</p>
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
                <hr>
                <h5>Leave a comment</h5>
                <form method="POST" action="{{route('profile-process')}}">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{$user_id}}">
                        <input type="hidden" name="company_id" value="{{$user_id}}">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="comment" id="comments2"   placeholder="Comment"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit2" class="btn_1 add_bottom_15">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-4">
                    <a href="#0" class="boxed_list">
                        <i class="pe-7s-help2"></i>
                        <h4>Need Help? Contact us</h4>
                        <p>Cum appareat maiestatis interpretaris et, et sit.</p>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#0" class="boxed_list">
                        <i class="pe-7s-wallet"></i>
                        <h4>Payments</h4>
                        <p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#0" class="boxed_list">
                        <i class="pe-7s-note2"></i>
                        <h4>Cancel Policy</h4>
                        <p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
                    </a>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->
</main>
@endsection
