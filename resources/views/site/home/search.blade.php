@extends('layouts.site')
@section('content')
<main>
    <div class="container ">
        <div class="row" style="margin-top: 130px;">
            <div class="col-lg-12 min-vh-100">
              {{-- @dd($results); --}}
                @if(count($results)>0 && Auth::user())
                <table class="table table-bordered">
                    <thead  style="background: linear-gradient(to right, #27c3eb , #176e84); color:#fff;">
                      <tr>
                        <th scope="col">Company Name</th>
                        <th scope="col">Owner Name</th>
                        <th scope="col">Email </th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Country</th>
                        <th scope="col">city</th>
                        <th scope="col">View</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        @php
                          $cities=[];
                          $cities[]=$result->cityName->name;
                          if(isset($result->branches[0])){
                          foreach($result->branches as $branches){
                            if(!in_array($branches->cityName->name, $cities)){
                              $cities[]=$branches->cityName->name;
                            }
                          }
                            
                        }
                        $cities=implode(',',$cities); 
                        @endphp
                      <tr>
                        <td>{{$result->companyname}}</td>
                        <td>{{$result->ownername}}</td>
                        <td>{{$result->companyemail}}</td>
                        <td>{{$result->companytelephone}}</td>
                        {{-- <td>{{$result->country}}</td> --}}
                        <td>{{ $result->countryName->name }}</td>
                        <td>{{$cities}} </td>
                        {{-- <td>{{$result->city}}</td> --}}
                        @if(Auth::check())
                        <td><a href="{{route('company-profile',[$result->id])}}" class="fa fa-eye"></a></td>
                        @else
                        <td><a href="#"  class="showAlet fa fa-eye"></a></td>
                        @endif

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @elseif(count($results)>0)
                  <table class="table table-bordered">
                    <thead style="background: linear-gradient(to right, #27c3eb , #176e84); color:#fff;">
                      <tr>
                        <th scope="col">Company Name</th>
                        <th scope="col">Owner Name</th>
                        {{-- <th scope="col">Email </th>
                        <th scope="col">Telephone</th> --}}
                        <th scope="col">Country</th>
                        <th scope="col">city</th>
                        <th scope="col">View</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                      <tr>
                        <td>{{$result->companyname}}</td>
                        <td>{{$result->ownername}}</td>
                        {{-- <td>{{$result->companyemail}}</td>
                        <td>{{$result->companytelephone}}</td> --}}
                        {{-- <td>{{$result->country}}</td> --}}
                        <td>{{ $result->countryName->name }}</td>
                        <td>{{$result->cityName->name}}</td>
                        {{-- <td>{{$result->city}}</td> --}}
                        @if(Auth::check())
                        <td><a href="{{route('company-profile',[$result->id])}}" class="fa fa-eye"></a></td>
                        @else
                        <td><a href="#"  class="showAlet fa fa-eye"></a></td>
                        @endif

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @else
                  <div class="alert alert-danger text-center" role="alert">
                    <strong>No result found !</strong>
                  </div>
                   @endif
            </div>
        </div>
    </div>
</main>
@endsection

@push('script')
<script>

$('.showAlet').on('click', function (event) {
    event.preventDefault();

    //const url = $(this).attr('href');
    Swal.fire(
  'Members Access only!',
  'Become a member or Login to explore more!',
  'error'
)
});
  </script>
@endpush
