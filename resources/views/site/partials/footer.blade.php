<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-up"></i></button>
<footer class="plus_border footer">
    <div class="container margin_60_35">

        <div class="row ">
            <div class="col-lg-12  icons" style="text-align:center">
              <a href="{{ App\Models\Utility::getValByName('instagram')}}"><img src="{{ asset('assets/img/insta.gif') }}" width="50px" height="50px"></a>
              <a href="{{ App\Models\Utility::getValByName('twitter')}}"><img src="{{ asset('assets/img/twitter.gif') }}" width="50px" height="50px"></a>
              <a href="{{ App\Models\Utility::getValByName('linkedin')}}"><img src="{{ asset('assets/img/linkedin.gif') }}" width="50px" height="50px"></a>
              <a href="{{ App\Models\Utility::getValByName('whatsapp')}}"><img src="{{ asset('assets/img/whtsapp.gif') }}" width="50px" height="50px"></a>
              <a href="{{ App\Models\Utility::getValByName('facebook')}}"><img src="{{ asset('assets/img/facebook.gif') }}" width="50px" height="50px"></a>

            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 quicklinks">
                <h3 data-bs-target="#collapse_ft_1" >Quick Links</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_1">
                    <ul class="links">
                        <li><a href="{{route('about-us')}}">About us</a></li>
                        <li><a href="{{route('faq')}}">Faq</a></li>
                        <li><a href="{{route('directory')}}">Directory</a></li>
                        <li><a href="{{route('member')}}">My account</a></li>
                        <li><a href="{{route('packages')}}">Create account</a></li>
                        <li><a href="{{route('contact-us')}}">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-bs-target="#collapse_ft_2">Explore More</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_2">
                    <ul class="links">
                        @php
                            $pages=App\Models\Page::all();
                        @endphp
                        @foreach($pages as $page)
                        <li><a href="{{route('page',$page->slug)}}">{{$page->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-bs-target="#collapse_ft_3">Contacts</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_3">
                    <ul class="contacts">
                        <li><i class="ti-home"></i>{{ App\Models\Utility::getValByName('company_address')}}<br>{{ App\Models\Utility::getValByName('company_city').' - '. App\Models\Utility::getValByName('company_country')}}</li>
                        <li><i class="ti-headphone-alt"></i>{{ App\Models\Utility::getValByName('company_phone_primary')}}</li>
                        <li><i class="ti-email"></i><a href="#0">{{ App\Models\Utility::getValByName('company_email_primary')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-bs-target="#collapse_ft_4">Keep in touch</h3>

                <div class="collapse dont-collapse-sm" id="collapse_ft_4">
                    <div id="newsletter">
                        <div class="alert alert-success alert-dismissible" role="alert" id="message-newsletter">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            Successfully Submitted
                        </div>
                        <form method="post" action="#" name="newsletter_formaa" id="newsletter_form">
                            <div class="form-group">
                                <input type="email" name="email_newsletter" style="color:white" id="email_newsletter" class="form-control"
                                    placeholder="Your email">
                               <button id="newslettera" class=" mt-2  hvr-sweep-to-right buttons animated bounceInRight" style="animation-delay: 3s">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <p class="text-white text-center"><small>© 2022. All Rights Reserved.Pioneerln</small></p>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-2">
                <a href="{{route('member')}}" class="btn btn-sm  hvr-sweep-to-right buttons animated bounceInRight" style="animation-delay: 3s">Become Member</a>
            </div>
        </div>
    </div>
</footer>

@push('script')
<script>
    $('#newslettera').click(function () {
        var email=$('#email_newsletter').val();
        $.ajax({
            type: 'POST',
            url: "{{route('newsletter')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                'email': email
            },
            success: function (data) {
                $('#message-newsletter').show();
                console.log(data)
            }
        });
    });

</script>
<script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
    </script>
<style>
    #message-newsletter{
        display: none;
    }
    #myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: black;
  opacity: 0.75;
  color: white;
  font-weight: bold;
  margin-left: 20px;
  cursor: pointer;
  padding: 10px;
  height: 50px;
  width: 50px;
  border-radius: 50px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    @if(Session::has('success'))
    toastr.success('{{ Session::get('success') }}');
@elseif(Session::has('error'))
    toastr.error('{{ Session::get('error') }}');
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        toastr.error('{{$error}}');
    @endforeach
@endif
</script>
@endpush
