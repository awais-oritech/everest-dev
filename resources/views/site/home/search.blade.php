@extends('layouts.site')
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        {{-- <th scope="col">#</th> --}}
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
                        <td>{{$result->country}}</td>
                        {{-- <td>{{DB::table('companies')->where('country','=',$result->country)->join('world_countries','code', '=',$result->country)->get()}}</td> --}}
                        <td>{{$result->city}}</td>
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
