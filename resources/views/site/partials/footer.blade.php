<footer class="plus_border footer">
    <div class="container margin_60_35">

        <div class="row ">

            <div class="col-lg-12  icons" style="text-align:center">
              <a href=""><img src="{{ asset('assets/img/insta.gif') }}" width="50px" height="50px"></a>
              <a href=""><img src="{{ asset('assets/img/twitter.gif') }}" width="50px" height="50px"></a>
              <a href=""><img src="{{ asset('assets/img/linkedin.gif') }}" width="50px" height="50px"></a>
              <a href=""><img src="{{ asset('assets/img/whtsapp.gif') }}" width="50px" height="50px"></a>
              <a href=""><img src="{{ asset('assets/img/facebook.gif') }}" width="50px" height="50px"></a>

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
                        <li><i class="ti-home"></i>World Tower St. 567<br>Riyad Saudia - SA</li>
                        <li><i class="ti-headphone-alt"></i>+66 66 123456</li>
                        <li><i class="ti-email"></i><a href="#0">info@pioneer.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 data-bs-target="#collapse_ft_4">Keep in touch</h3>
                <div class="collapse dont-collapse-sm" id="collapse_ft_4">
                    <div id="newsletter">
                        <div id="message-newsletter"></div>
                        <form method="post" action="#" name="newsletter_form" id="newsletter_form">
                            <div class="form-group">
                                <input type="email" name="email_newsletter" style="color:white" id="email_newsletter" class="form-control"
                                    placeholder="Your email">
                               <button type="submit" class=" mt-2 btn-footer">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-2">
                <a href="{{route('member')}}" class="btn btn-sm btn_add">Become Member</a>
            </div>
        </div>
    </div>
</footer>
