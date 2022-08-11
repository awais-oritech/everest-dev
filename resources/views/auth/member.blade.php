@extends('layouts.site')
@section('content')
<main>
    <div class="container margin_60">
        <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Already Member</h3>
                <form method="POST" action="login">
                    @csrf
                    <div class="form_container">
                        <div class="form-group">
                            @if(session()->has('message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session()->get('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                            @endif
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Email*">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"  placeholder="Password*">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="clearfix add_bottom_15">
                            <div class="checkboxes float-start">
                                <label class="container_check">Remember me
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="float-end"><a id="forgot" href="javascript:void(0);">Lost Password?</a></div>
                        </div>
                        <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
                        <div id="forgot_pw">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
                            </div>
                            <p>A new password will be sent shortly.</p>
                            <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="new_client">New Member</h3> <small class="float-end pt-2">* Required Fields</small>
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="form_container">
                        <div class="form-group">
                            <input type="text" class="form-control @error('register_name') is-invalid @enderror" name="name" value="{{ old('register_name') }}" placeholder="Name*">
                            @error('register_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control @error('register_email') is-invalid @enderror" name="email" value="{{ old('register_email') }}" placeholder="Email*">
                            @error('register_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('register_password') is-invalid @enderror" name="password"  placeholder="Password*">
                            @error('register_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control @error('register_password') is-invalid @enderror" name="password"  placeholder="Confirm Password*">
                            @error('register_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="container_check">Accept <a href="#0">Terms and conditions</a>
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="text-center"><input type="submit" value="Register" class="btn_1 full-width"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection
