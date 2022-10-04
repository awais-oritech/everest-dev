@extends('layouts.site')
@section('content')
<main>
    <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    @if(isset($profile->id))
                    <section id="description" style="border: none!important;">
                        <div class="detail_title_1">
                            {{-- <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div> --}}
                            <h1>{{$profile->companyname}}</h1><small align="right"><strong>Member Since : </strong>{{$profile->created_at->format('d-m-yy')}}</small>
                            <br>
                            <a class="address" href="{{$profile->company_location}}" target="__blank">{{$profile->companyaddress}}</a>
                        </div>
                        <p>{{$profile->companyprofile}}</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="add_bottom_15">Services</h5>
                                <div class="row add_bottom_30">
                                    <div class="col-lg-6">
                                        <ul class="bullets">
                                            @if(isset($profile->services) && !empty($profile->services))
                                            @foreach($profile->services as $service)
                                            <li>{{$service->name}}</li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="add_bottom_15">Certifications</h5>
                                <div class="row add_bottom_30">
                                    <div class="col-lg-6">
                                        <ul class="bullets">
                                            @if(isset($profile->certificates) && !empty($profile->certificates))
                                            @foreach($profile->certificates as $certificate)
                                            <li>{{$certificate->certification_name}}</li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <hr>
                        <h3>Location</h3>
                        <iframe src="{{$profile->company_location}}" width="600" height="450" id="map_iframe" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <hr>
                        <h3>Information</h3>
                        <table class="table table-striped add_bottom_45">
                            <tbody>
                                <thead style="background-color:#1c75ba!important; color:white;">
                                    <tr>
                                        <th scope="col">Email</th>
                                        <th scope="col">Number</th>
                                        <th scope="col">License</th>
                                        <th scope="col">Vat</th>
                                        <th scope="col">Strength</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$profile->companyemail}}</td>
                                        <td>{{$profile->companytelephone}}</td>
                                        <td>{{$profile->companylicense}}</td>
                                        <td>{{$profile->vatnumber}}</td>
                                        <td>{{$profile->companystrength}}</td>
                                    </tr>
                                </tbody>
                            </tbody>
                        </table>
                        {{-- <hr> --}}
                        <h3>Concernd Person Info</h3>
                        <table class="table table-striped add_bottom_45">
                            <tbody>
                                <thead style="background-color:#1c75ba!important; color:white;">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Skype</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$profile->clientmanager}}</td>
                                        <td>{{$profile->clientposition}}</td>
                                        <td>{{$profile->companylicense}}</td>
                                        <td>{{$profile->clientemail}}</td>
                                        <td>{{$profile->clientmobile}}</td>
                                    </tr>
                                </tbody>
                            </tbody>
                        </table>

                       @if(isset($profile->branches) && count($profile->branches)>0)
                       <h3>Branches</h3>
                       <table class="table table-striped add_bottom_45">
                           <tbody>
                               <thead style="background-color:#1c75ba!important; color:white;">
                                   <tr>
                                       <th scope="col">Branch Name</th>
                                       <th scope="col">Contact Person</th>
                                        <th scope="col">Position</th>
                                       <th scope="col">Email</th>
                                       <th scope="col">Mobile</th>
                                       <th scope="col">Location</th>
                                   </tr>
                               </thead>
                               <tbody>
                                @foreach($profile->branches as $branch)
                                   <tr>
                                       <td>{{$branch->name}}</td>
                                       <td>{{$branch->contact_person}}</td>
                                       <td>{{$branch->position}}</td>
                                       <td>{{$branch->email}}</td>
                                       <td>{{$branch->phone}}</td>
                                       <td><a class="address" href="{{$branch->location}}" target="__blank">
                                        {{$branch->cityName->name.', '.$branch->countryName->name.', '.$branch->continentName->name}}</a>
                                        </td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </tbody>
                       </table>
                       @endif
                    </section>
                    @endif
                    <!-- /section -->
                </div>
                <!-- /col -->
                <aside class="col-lg-4" id="sidebar">
                    <div class="booking" style="padding: 0% !important; margin-bottom: 30px!important;">
                        <img  style="max-width:370px;max-height:370px" src="{{asset('uploads/'.$profile->companylogo)}}" alt="profile">
                    </div>
                    <ul class="share-buttons">
                        <li><a class="fb-share" href="{{$profile->companyfacebook}}"><i class="social_facebook"></i></a></li>
                        <li><a class="instagram-share" href="{{$profile->companyinstagram}}"><i class="social_instagram"></i></a></li>
                        <li><a class="skype-share" href="{{$profile->companyskype}}"><i class="social_skype"></i></a></li>
                        <li><a class="youtube-share" href="{{$profile->companyyoutube}}"><i class="social_youtube"></i></a></li>
                        <li><a class="gplus-share" href="{{$profile->companyemail}}"><i class="social_googleplus"></i></a></li>
                        <li><a class="web-share" href="{{$profile->companywebsite}}"><i class="fa fa-earth"></i></a></li>
                    </ul>
                </aside>
            </div>
            <!-- /row -->
    </div>
    <!-- /container -->
</main>
@endsection
