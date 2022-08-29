  <div class="container header-navbar">
      <div class="row">
          <div class="col-12">
              <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand" href="/"> <img src="{{ asset('assets/img/pioneer-01.png') }}" width="auto"
                          height="35" alt="" class="logo_normal"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse  navbar-right  navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto ">
                            <li class="nav-item active">
                              <a class="nav-link" style="color:#00a8df;" href="/"><i
                                      class="fa-solid fa-house"></i> Home <span
                                      class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " style="color:#00a8df;" href="{{route('about-us')}}"><i class="icon-info-circled"></i> About</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link " style="color:#00a8df;" href="{{route('directory')}}"><i class="fa-solid fa-book"></i> Directory</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:#00a8df;" href="{{route('packages')}}"><i class="fas fa-shopping-basket"></i> Packages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " style="color:#00a8df;" href="{{route('news')}}"><i class="fas fa-newspaper"></i> News</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" style="color:#00a8df;" href="{{route('events')}}"><i class="fas fa-flag"></i>
                                  Events</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " style="color:#00a8df;" href="{{route('contact-us')}}"><i class="fas fa-phone"></i> Contact</a>
                            </li>

                            @if(!Auth::user())
                            {{-- <li class="nav-item">
                                <a class="nav-link" style="color:#1c75BA;" href="/packages"><i class="fas fa-phone"></i>Packages</a>
                            </li> --}}
                            <li>
                                <a href="{{route('member')}}"><button type="button"  class="hvr-sweep-to-right buttons mt-2 ">Become Member</button></a>
                            </li>
                            @endif
                      </ul>
                      @if(Auth::user())
                      <a class="nav-link" href="{{route('profile-process')}}"><i class="fas fa-user"></i></a>
                      <a class="nav-link" href="{{route('logout')}}"><i class="fas fa-sign-out"></i></a>
                      @endif
                  </div>
              </nav>

          </div>
      </div>

  </div>
  </div>

  </div>
