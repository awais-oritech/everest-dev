@extends('layouts.site')
@section('content')
<main>
    <div class="container ">
        <div class="row" style="margin-top: 130px;">
            <div class="col-lg-12 min-vh-100">
                {{-- @if(is_array($results) && !empty($results)) --}}
                <table class="table table-bordered">
                    <thead style="background-color:#1c75BA; color:white;">
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
                      <tr>
                        <td>{{$result->companyname}}</td>
                        <td>{{$result->ownername}}</td>
                        <td>{{$result->companyemail}}</td>
                        <td>{{$result->companytelephone}}</td>
                        {{-- <td>{{$result->country}}</td> --}}
                        <td>{{ $result->countryName->name }}</td>
                        <td>{{$result->cityName->name}}</td>
                        {{-- <td>{{$result->city}}</td> --}}
                        <td><a href="{{route('company-profile',[$result->id])}}" class="fa fa-eye"></a></td>
                       
                        
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{-- @else --}}
                  {{-- <div class="alert alert-danger text-center" role="alert">
                    <strong>No result found !</strong>
                  </div> --}}
                  {{-- @endif --}}
                  {{-- {!! $profiles->links() !!} --}}
            </div>
        </div>
    </div>
</main>
@endsection
