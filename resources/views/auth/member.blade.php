@extends('layouts.site')
@section('content')
<main>
    <div class="container margin_60">
        <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="client">Already Member</h3>
                {{-- <form method="POST" action="{{route('login')}}" onsubmit="return formvalidation()" > --}}
                <form method="POST" action="{{route('login')}}">

                    @csrf
                    {{-- <div class="form_container">
                        <div class="form-group">
                            @if(session()->has('message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session()->get('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                            @endif
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Email*">
                            @error('login_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password*">
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
                            @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        <div class="float-end"><p  id="forgot">{{ __('Forgot Your Password?') }}</p></div>
                                    </a>
                                @endif
                        </div>
                        <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
                        <div id="forgot_pw">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
                            </div>
                            <p>A new password will be sent shortly.</p>
                            <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                        </div>
                    </div> --}}
                    <div class="form_container">
                        <div class="form-group">
                            <input type="email" class="form-control" id="useremail" name="email" value="{{ old('email') }}"  placeholder="Email*">
                            <span >
                                <strong class="text-danger" id="emailError"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="userpassword" name="password"  placeholder="Password*">
                            <span>
                                <strong class="text-danger" id="passwordError"></strong>
                            </span>
                        </div>
                        <div class="clearfix add_bottom_15">
                            <div class="checkboxes float-start">
                                <label class="container_check">Remember me
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        <div class="float-end"><p  id="forgot">{{ __('Forgot Your Password?') }}</p></div>
                                    </a>
                                @endif
                        </div>
                        <div class="text-center"><button type="submit" class="btn_1 full-width hvr-sweep-to-right" >Log In</button></div>

                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-8">
            <div class="box_account">
                <h3 class="new_client">New Member</h3> <small class="float-end pt-2">* Required Fields</small>
                @if(session()->has('signupmessage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('signupmessage') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                @endif
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="form_container">
                        <div class="form-group">
                            <input  type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name*">
                            {{-- @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror --}}
                        </div>
                        <div class="form-group">
                            <input  type="email" class="form-control" name="email"  placeholder="Email*" >
                            {{-- @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror --}}
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control " name="password"  placeholder="Password*" autocomplete="new-password">
                            {{-- @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control"  placeholder="Confirm Password*"  autocomplete="new-password">
                            {{-- @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                        <div class="text-center"><button type="submit" value="Register" class="btn_1 full-width hvr-sweep-to-right">Register</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection
