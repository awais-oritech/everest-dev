@extends('layouts.site')
@section('content')
<main>
    <div class="container margin_60">
        <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Already Member</h3>
                <div class="form_container">
                    {{-- <div class="row g-0">
                        <div class="col-lg-6 pe-lg-1">
                            <a href="#0" class="social_bt facebook">Login with Facebook</a>
                        </div>
                        <div class="col-lg-6 ps-lg-1">
                            <a href="#0" class="social_bt google">Login with Google</a>
                        </div>
                    </div> --}}
                    <div class="divider"><span>Or</span></div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password_in" id="password_in" value="" placeholder="Password*">
                    </div>
                    <div class="clearfix add_bottom_15">
                        <div class="checkboxes float-start">
                            <label class="container_check">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="float-end"><a id="forgot" href="javascript:void(0);">Lost Password?</a></div>
                    </div>
                    <div class="text-center"><a href="/pricing"><input type="button" value="Log In" class="btn_1 full-width"></a></div>
                    <div id="forgot_pw">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
                        </div>
                        <p>A new password will be sent shortly.</p>
                        <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                    </div>
                </div>
                <!-- /form_container -->
            </div>
            <!-- /box_account -->
            {{-- <div class="row hidden_tablet">
                <div class="col-md-6">
                    <ul class="list_ok">
                        <li>Find Locations</li>
                        <li>Quality Location check</li>
                        <li>Data Protection</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list_ok">
                        <li>Secure Payments</li>
                        <li>H24 Support</li>
                    </ul>
                </div>
            </div> --}}
            <!-- /row -->
        </div>
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="new_client">New Member</h3> <small class="float-end pt-2">* Required Fields</small>
                <div class="form_container">
                    <div class="form-group">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name*">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lastname"  placeholder="Last Name*">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password_in_2" id="password_in_2" value="" placeholder="Password*">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="container_check">Accept <a href="#0">Terms and conditions</a>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="text-center"><a href="/pricing"><input type="button" value="Register" class="btn_1 full-width"></a></div>
                </div>
                <!-- /form_container -->
            </div>
            <!-- /box_account -->
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
</main>
@endsection
