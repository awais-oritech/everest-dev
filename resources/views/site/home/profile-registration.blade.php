@extends('layouts.site')
@section('content')
<main>
    <div class="container">
        <div class="row mt-4">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="box_account">
                    <h3 class="new_client">Company Profile</h3> <small class="float-end pt-2">* Required Fields</small>
                    <div class="form_container">
                        @if(session('status'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{session('status')}}
                        </div>
                        @elseif(session('errormessage'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{session('errormessage')}}
                        </div>
                        @endif
                        @if(isset($profile->id) && !empty($profile->id) )
                        <form method="POST" action="{{url('profile-registration/'.$packs_id->id)}}" enctype="multipart/form-data">
                            @csrf
                            <h6 class="mb-4"><b>1) </b> Company Contact Details</h6>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyname" value="{{$profile->companyname}}" placeholder="Company Name*" required {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="ownername"  value="{{$profile->ownername}}" placeholder="Owner Name*" required {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyaddress" value="{{$profile->companyaddress}}" placeholder="Head office address*" required {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companypostal" value="{{$profile->companypostal}}" placeholder="Postal Code Country*" required {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companytelephone" value="{{$profile->companytelephone}}" placeholder="Telephone*" required {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="email" class="form-control" name="companyemail" value="{{$profile->companyemail}}" placeholder="Email Address*" required {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companywebsite" value="{{$profile->companywebsite}}"  placeholder="Website*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyskype" value="{{$profile->companyskype}}" id="email" placeholder="Skype*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyfacebook" value="{{$profile->companyfacebook}}" placeholder="Facebook*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyinstagram" value="{{$profile->companyname}}" placeholder="Instagram*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyyoutube" value="{{$profile->companyyoutube}}" placeholder="YouTube*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="file" class="form-control" name="companylogo" value="{{$profile->companylogo}}" required {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>2) </b>Company Information</h6>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="companyprofile"  value="{{$profile->companyprofile}}"  placeholder="Company Profile*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12form-group">
                                    <input type="date" class="form-control" name="startdate"  value="{{$profile->startdate}}" placeholder="Company Date Started*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="branchaddress"  value="{{$profile->branchaddress}}" placeholder="Branch Office Address*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="companylicense"  value="{{$profile->companylicense}}" placeholder="Last Licenses Company*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="vatnumber"  value="{{$profile->vatnumber}}"  placeholder="Vat Number*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="bankdetails"  value="{{$profile->bankdetails}}" id="email" placeholder="Bank Details*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="continents" name="continent" class="form-control"  value="{{$profile->continent}}" {{($profile->can_edit==1)?'':'disabled'}}>
                                        @foreach ($continents as $continent)
                                        <option value="{{$continent->code}}" {{ $profile->continent==$continent->code?'selected':'' }}>{{$continent->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="country" name="country" class="form-control" value="{{$profile->country}}" {{($profile->can_edit==1)?'':'disabled'}}>

                                        @foreach($countries as $country)
                                            <option value="{{$country->code}}" {{ $profile->country==$country->code?'selected':'' }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="city" name="city" class="form-control"  value="{{$profile->city}}" {{($profile->can_edit==1)?'':'disabled'}}>
                                        @foreach($cities as $city)
                                        <option value="{{$city->code}}" {{ $profile->city==$city->code?'selected':'' }}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>3) </b>Company Service</h6>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <b>i)</b> Please inform us of services your company can provide (Please select all services)<br>
                                    <div class="row">
                                        @if(isset($services) && !empty($services))
                                        @foreach ($services as  $service)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="service_name[]" {{(is_array($company_services) && in_array($service->id,$company_services)?'checked':'')}} value="{{ $service->id }}" {{($profile->can_edit==1)?'':'disabled'}}>
                                            <label for="airfreight">{{ $service->name }}</label>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>ii)</b> Is your company covered by professional liability insurance?<br>
                                    <input type="radio" class="mt-4" name="insurance" {{$profile->insurance=='yes'?'checked':''}} value="yes"  {{($profile->can_edit==1)?'':'disabled'}}>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="insurance" {{$profile->insurance=='no'?'checked':''}} value="no" {{($profile->can_edit==1)?'':'disabled'}}>
                                    <label> No</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>iii)</b> Is your company a licensed customs broker? <br>
                                    <input type="radio" class="mt-4" name="licensed" {{$profile->licensed=='yes'?'checked':''}} value="yes" {{($profile->can_edit==1)?'':'disabled'}}>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="licensed" {{$profile->licensed=='no'?'checked':''}} value="no" {{($profile->can_edit==1)?'':'disabled'}}>
                                    <label> No</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="operatinglicense"><b>iv) </b> What operating licenses or certifications do you hold?</label>
                                    @if($profile->ca_edit == 0)
                                    <div style="border: 1px solid #ccc; padding:30px; width:75%;">{{$profile->operatinglicense}}</div>
                                    @else
                                    <textarea id="operatinglicense" name="operatinglicense" rows="4" cols="50"></textarea>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="bankdetails2"><b>v) </b> What is Your Bank Details?</label>
                                    @if($profile->ca_edit == 0)
                                    <div style="border: 1px solid #ccc; padding:30px; width:75%;">{{$profile->operatinglicense}}</div>
                                    @else
                                    <textarea id="bankdetails2" name="bankdetails2" rows="4" cols="50"></textarea>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>4) </b>Company Certification/Membership</h6>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <b>i)</b> Please tick all relevant certification<br>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" {{(is_array($certifications) && in_array('fiata',$certifications)?'checked':'')}} value="fiata"  {{($profile->can_edit==1)?'':'disabled'}} >
                                            <label for="fiata">FIATA</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]"  {{(is_array($certifications) && in_array('fmc',$certifications)?'checked':'')}} value="fmc" {{($profile->can_edit==1)?'':'disabled'}}>
                                            <label for="fmc">FMC</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" {{(is_array($certifications) && in_array('chamber',$certifications)?'checked':'')}} value="chamber" {{($profile->can_edit==1)?'':'disabled'}}>
                                            <label for="chamber">Chamber of Commerce</label>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" {{(is_array($certifications) && in_array('nvocc',$certifications)?'checked':'')}} value="nvocc" {{($profile->can_edit==1)?'':'disabled'}}>
                                            <label for="nvocc">NVOCC</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" {{(is_array($certifications) && in_array('iata',$certifications)?'checked':'')}}  value="iata" {{($profile->can_edit==1)?'':'disabled'}}>
                                            <label for="iata">IATA</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" {{(is_array($certifications) && in_array('ferightnetwork',$certifications)?'checked':'')}} value="ferightnetwork" {{($profile->can_edit==1)?'':'disabled'}}>
                                            <label for="ferightnetwork">Freight Network</label>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" {{(is_array($certifications) && in_array('customsbroker',$certifications)?'checked':'')}}  value="customsbroker" {{($profile->can_edit==1)?'':'disabled'}}>
                                            <label for="customsbroker">Customs Broker</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" {{(is_array($certifications) && in_array('iso',$certifications)?'checked':'')}} {{($profile->can_edit==1)?'':'disabled'}}>
                                            <label for="iso">ISO 9001/9002</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" {{(is_array($certifications) && in_array('others',$certifications)?'checked':'')}}  value="others" {{($profile->can_edit==1)?'':'disabled'}}>
                                            <label for="other">Others</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="associations"><b>ii) </b> What Local or National Freight Associations (different to Freight Networks) do you belong to?</label>
                                    @if($profile->ca_edit == 0)
                                    <div style="border: 1px solid #ccc; padding:30px; width:75%;">{{$profile->associations}}</div>
                                    @else
                                    <textarea id="associations" name="associations" rows="4" cols="50" {{($profile->can_edit==1)?'':'disabled'}}></textarea>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="companystrength"><b>iii) </b> Please list your company strengths (e.g. air, sea, road freight etc.)</label>
                                    @if($profile->ca_edit == 0)
                                    <div style="border: 1px solid #ccc; padding:30px; width:75%;">{{$profile->companystrength}}</div>
                                    @else
                                    <textarea id="companystrength" name="companystrength" rows="4" cols="50" {{($profile->can_edit==1)?'':'disabled'}}></textarea>
                                    @endif
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>iv)</b> Are you member of others net work ?<br>
                                    <input type="radio" class="mt-4" name="member" value="yes" {{$profile->member=='yes'?'checked':''}} {{($profile->can_edit==1)?'':'disabled'}}>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="member" value="no" {{$profile->member=='no'?'checked':''}} {{($profile->can_edit==1)?'':'disabled'}}>
                                    <label> No</label>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>5) </b>Your Company Key Contact Information</h6>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientname" value="{{$profile->clientname}}" placeholder="Your Name*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="email" class="form-control" name="clientemail" value="{{$profile->clientemail}}"  placeholder="Your Email*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientmobile" value="{{$profile->clientmobile}}" placeholder="Your Mobile*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientskype" value="{{$profile->clientskype}}" placeholder="Your Skype*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientwhatsapp"  value="{{$profile->clientwhatsapp}}" placeholder="Your Whatsapp*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientposition" value="{{$profile->clientposition}}" placeholder="Your Position*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="date" class="form-control" name="doa"  value="{{$profile->doa}}" placeholder="Date of Application (dd/mm/yy)*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientmanager"  value="{{$profile->clientmanager}}" placeholder="Manager*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="gmceo" value="{{$profile->gmceo}}" placeholder="GM-CEO*" {{($profile->can_edit==1)?'':'disabled'}}>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="container_check">I agree to International Freight Network storing and using the information to contact me.
                                        <input type="checkbox" {{($profile->can_edit==1)?'':'disabled'}}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="container_check">I confirm that our company does not have any outstanding payments or ongoing disputes with any other forwarders. I confirm that we are not listed on any industry blacklists, e.g. FDRS (Forwarders Debt Recovery Service), FDB (Freight Dead Beats) or any local association, as any findings can be published and will affect the outcome of our application.
                                        <input type="checkbox" {{($profile->can_edit==1)?'':'disabled'}}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            @if($profile->can_edit==1)
                            <div class="text-right"><input type="submit" value="Submit Application" class="btn_1 "></div>
                            @endif
                        </form>
                        @else
                        <form method="POST" action="{{url('profile-registration/'.$packs_id->id)}}" enctype="multipart/form-data">
                            @csrf
                            <h6 class="mb-4"><b>1) </b> Company Contact Details</h6>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="package_id" value="{{$packs_id->id}}">
                                    {{-- <input type="hidden" name="company_id" value="{{$company_id->id}}"> --}}
                                    <input type="text" class="form-control" name="companyname" placeholder="Company Name*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="ownername"  placeholder="Owner Name*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyaddress"  placeholder="Head office address*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companypostal" placeholder="Postal Code Country*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companytelephone"  placeholder="Telephone*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="email" class="form-control" name="companyemail" placeholder="Email Address*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companywebsite"  placeholder="Website*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyskype" id="email" placeholder="Skype*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyfacebook" placeholder="Facebook*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyinstagram" placeholder="Instagram*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyyoutube" placeholder="YouTube*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="file" class="form-control" name="companylogo" required>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>2) </b>Company Information</h6>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="companyprofile" placeholder="Company Profile*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12form-group">
                                    <input type="date" class="form-control" name="startdate"  placeholder="Company Date Started*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="branchaddress"  placeholder="Branch Office Address*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="companylicense" placeholder="Last Licenses Company*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="vatnumber"  placeholder="Vat Number*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="bankdetails" id="email" placeholder="Bank Details*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="continents" name="continent" class="form-control" required>
                                        <option  selected disabled>Continents</option>
                                        @foreach ($continents as $continent)
                                            <option value="{{$continent->code}}">{{$continent->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="country" name="country" class="form-control" required>
                                        <option  selected disabled>Country</option>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="city" name="city" class="form-control" required>
                                        <option  selected disabled>City</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>3) </b>Company Service</h6>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <b>i)</b> Please inform us of services your company can provide (Please select all services)<br>
                                    <div class="row">
                                        @if(isset($services) && !empty($services))
                                        @foreach ($services as  $service)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="service_name[]" value="{{ $service->id }}" >
                                            <label for="airfreight">{{ $service->name }}</label>

                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>ii)</b> Is your company covered by professional liability insurance?<br>
                                    <input type="radio" class="mt-4" name="insurance" value="yes" required>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="insurance" value="no">
                                    <label> No</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>iii)</b> Is your company a licensed customs broker? <br>
                                    <input type="radio" class="mt-4" name="licensed" value="yes" required>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="licensed" value="no">
                                    <label> No</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="operatinglicense"><b>iv) </b> What operating licenses or certifications do you hold?</label>
                                    <textarea id="operatinglicense" name="operatinglicense" rows="4" cols="50" required></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="operatinglicense"><b>v) </b> What is Your Bank Details?</label>
                                    <textarea id="bankdetails2" name="bankdetails2" rows="4" cols="50" required></textarea>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>4) </b>Company Certification/Membership</h6>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <b>i)</b> Please tick all relevant certification<br>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="fiata">
                                            <label for="fiata">FIATA</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="fmc">
                                            <label for="fmc">FMC</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="chamber">
                                            <label for="chamber">Chamber of Commerce</label>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="nvocc">
                                            <label for="nvocc">NVOCC</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="iata">
                                            <label for="iata">IATA</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="ferightnetwork">
                                            <label for="ferightnetwork">Freight Network</label>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="customsbroker">
                                            <label for="customsbroker">Customs Broker</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="iso">
                                            <label for="iso">ISO 9001/9002</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="others">
                                            <label for="other">Others</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="associations"><b>ii) </b> What Local or National Freight Associations (different to Freight Networks) do you belong to?</label>
                                    <textarea id="associations" name="associations" rows="4" cols="50" required></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="companystrength"><b>iii) </b> Please list your company strengths (e.g. air, sea, road freight etc.)</label>
                                    <textarea id="companystrength" name="companystrength" rows="4" cols="50" required></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>iv)</b> Are you member of others net work ?<br>
                                    <input type="radio" class="mt-4" name="member" value="yes" required>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="member" value="no">
                                    <label> No</label>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>5) </b>Your Company Key Contact Information</h6>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientname"  placeholder="Your Name*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="email" class="form-control" name="clientemail"  placeholder="Your Email*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientmobile" placeholder="Your Mobile*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientskype" placeholder="Your Skype*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientwhatsapp"  placeholder="Your Whatsapp*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientposition" placeholder="Your Position*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="date" class="form-control" name="doa"  placeholder="Date of Application (dd/mm/yy)*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientmanager"  placeholder="Manager*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="gmceo" placeholder="GM-CEO*" required>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="container_check">I agree to International Freight Network storing and using the information to contact me.
                                        <input type="checkbox" required>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label class="container_check">I confirm that our company does not have any outstanding payments or ongoing disputes with any other forwarders. I confirm that we are not listed on any industry blacklists, e.g. FDRS (Forwarders Debt Recovery Service), FDB (Freight Dead Beats) or any local association, as any findings can be published and will affect the outcome of our application.
                                        <input type="checkbox" required>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="text-right"><input type="submit" value="Submit Application" class="btn_1 "></div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('script')
<script>
    $('#continents').change(function () {
    var id = $(this).find(':selected').val()
    $.ajax({
        type: 'POST',
        url: "{{route('countries-list')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': id
        },
        success: function (data) {
            // the next thing you want to do
            var $country = $('#country');
            $country.empty();
            $('#city').empty();
            for (var i = 0; i < data.length; i++) {
                $country.append('<option id=' + data[i].code + ' value=' + data[i].code + '>' + data[i].name + '</option>');
            }

            //manually trigger a change event for the contry so that the change handler will get triggered
            $country.change();
        }
    });

});

$('#country').change(function () {
    //var id = $(this).find(':selected')[0].id;
    var id = $(this).find(':selected').val()
    $.ajax({
        type: 'POST',
        url: "{{route('cities-list')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': id
        },
        success: function (data) {
            // the next thing you want to do
            var $city = $('#city');
            $city.empty();
            for (var i = 0; i < data.length; i++) {
                $city.append('<option id=' + data[i].code + ' value=' + data[i].code + '>' + data[i].name + '</option>');
            }
        }
    });
});
</script>
@endpush
