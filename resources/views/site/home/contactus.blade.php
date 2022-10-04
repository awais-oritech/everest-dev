@extends('layouts.site')
@section('content')
<main>
    <!-- /map -->
    <div class="container margin_60_35">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 pr-xl-5">
                <div class="main_title_3">
                    @if(session('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{session('status')}}
                    </div>
                    @endif
                    <h2>Send us a message</h2>
                    <p>For any Query you can freely contact us.</p>
                </div>
                <div id="message-contact"></div>
                    <form method="post" action="{{route('contact-us')}}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" id="name_contact" name="firstname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input class="form-control" type="text" id="lastname_contact" name="lastname" required>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" id="email_contact" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input class="form-control" type="text" id="phone_contact" name="phone" required>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" id="message_contact" name="message" style="height:150px;" required></textarea>
                        </div>
                        <button type="submit" class="btn_1 rounded">Submit</button>
                    </form>
            </div>
            <div class="col-xl-5 col-lg-6 pl-xl-5">
                <div class="box_contacts">
                    <i class="ti-support"></i>
                    <h2>Need Help?</h2>
                    <a href="#">{{ App\Models\Utility::getValByName('company_phone_primary')}}</a> - <a href="#">{{ App\Models\Utility::getValByName('company_email_primary')}}</a>
                </div>
                <div class="box_contacts">
                    <i class="ti-help-alt"></i>
                    <h2>Questions?</h2>
                    <a href="#0">{{ App\Models\Utility::getValByName('company_phone_secondary')}}</a> - <a href="#">{{ App\Models\Utility::getValByName('company_email_secondary')}}</a>
                </div>
                <div class="box_contacts">
                    <i class="ti-home"></i>
                    <h2>Address</h2>
                    <a href="#">{{ App\Models\Utility::getValByName('company_address')}}<br>{{ App\Models\Utility::getValByName('company_city').' - '. App\Models\Utility::getValByName('company_country')}}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->
</main>
@endsection
