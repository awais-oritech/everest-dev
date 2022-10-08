@extends('layouts.site')
@section('content')
<main>
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="box_account">
                    <h3 class="new_client">Change Password</h3> <small class="float-end pt-2">* Required Fields</small>
                    <div class="form_container">
                        <form method="POST" action="{{url('update_password',Auth::user()->id)}}" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label for="old password"> Old Password</label>
                                    <input type="password" class="form-control" name="old_password" placeholder="Enter your old Password*">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label for="old password"> New Password</label>
                                    <input type="password" class="form-control" name="new_password" placeholder="Enter your New Password*">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label for="old password"> Confrim Password</label>
                                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Enter your Confirm Password*">
                                </div>
                            </div>
                            <div class="text-right "><button type="submit" class="btn_1  hvr-sweep-to-right">Save Changes</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
