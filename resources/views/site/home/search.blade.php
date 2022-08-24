@extends('layouts.site')
@section('content')
<main>
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-lg-12">
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
                        @if(session('status'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{session('status')}}
                        </div>
                        @endif
                        @foreach($results as $result)
                      <tr>
                        <td>{{$result->companyname}}</td>
                        <td>{{$result->ownername}}</td>
                        <td>{{$result->companyemail}}</td>
                        <td>{{$result->companytelephone}}</td>
                        {{-- <td>{{$result->country}}</td> --}}
                        <td>{{DB::table('companies')->where('country','=',$result->country)->join('world_countries','companies.country', '=','world_countries.code')->value('name')}}</td>
                        <td>{{DB::table('companies')->where('city','=',$result->city)->join('world_cities','companies.city', '=','world_cities.code')->value('name')}}</td>
                        {{-- <td>{{$result->city}}</td> --}}
                        <td><a href="{{route('company-profile',[$result->id])}}" class="fa fa-eye"></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{-- {!! $profiles->links() !!} --}}
            </div>
        </div>
    </div>
</main>
@endsection
