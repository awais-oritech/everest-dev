@extends('layouts.site')
@section('content')
<main>
  <div class="container mb-4" >
    <div class="row">
       <div class="col-12" >
               <div class="formbox-header shadow-form animated bounceInUp" style="animation-delay:1s">
                <form method="GET" action="{{route('search')}}">
                  <div class="form-group col-xs-3">
                      <label for="exampleInputEmail1"><img src="{{ asset('assets/img/keyword.gif') }}" width="30px" height="30px"> Service</label>
                      <select id="" name="service_id" class="form-control" style="border:none; border-bottom:1px solid #ccc">
                          {{-- <option value="0" selected disabled>Services</option> --}}
                          @foreach ($services as $service)
                              <option value="{{$service->id}}">{{$service->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  {{-- <div class="form-group col-xs-3">
                      <label for="exampleInputPassword1"><img src="{{ asset('assets/img/home.gif') }}" width="30px" height="30px"> Address</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address">
                  </div> --}}
              <div class="form-group col-xs-3">
                  <label for="continents"><img src="{{ asset('assets/img/country.gif') }}" width="30px" height="30px"> Continents</label>
                  <select id="continents" name="continent" class="form-control" style="border:none; border-bottom:1px solid #ccc">
                      <option value="0" selected disabled>Continents</option>
                      @foreach ($continents as $continent)
                          <option value="{{$continent->id}}">{{$continent->name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group col-xs-3">
                  <label for="country"><img src="{{ asset('assets/img/address.gif') }}" width="30px" height="30px"> Country</label>
                  <select id="country" name="country" class="form-control" style="border:none; border-bottom:1px solid #ccc">
                      <option value="0" selected disabled>All Countries</option>
                  </select>
              </div>
              <div class="form-group col-xs-3">
                  <label for="city"><img src="{{ asset('assets/img/home.gif') }}" width="30px" height="30px"> City</label>
                  <select id="city" name="city" class="form-control" style="border:none; border-bottom:1px solid #ccc">
                      <option value="0" selected disabled>All Cities</option>
                  </select>
              </div>
              <div class="buttonn">
              <button type="submit" class="hvr-sweep-to-right buttons">Search</button>
              </div>
          </form>
      </div>
               </div>
           </div>
       </div>
</div>

</main>
@endsection

@push('script')
   
     <script>

    $('#continents').change(function () {
    var id = $(this).find(':selected').val()


    $.ajax({

        type: 'POST',
        url: "{{route('countries-list')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': id
        },
        success: function (data) {
            // the next thing you want to do
            var $country = $('#country');
            $country.empty();
            $('#city').empty();
            $country.append('<option value="0" selected>All Countries</option>');
            for (var i = 0; i < data.length; i++) {
                $country.append('<option id="'+data[i].id+'" value="'+ data[i].id+'">' + data[i].name + '</option>');
            }

            //manually trigger a change event for the contry so that the change handler will get triggered
            $country.change();
        }
    });

});

$('#country').change(function () {
    //var id = $(this).find(':selected')[0].id;
    var id = $(this).find(':selected').val()
    $.ajax({
        type: 'POST',
        url: "{{route('cities-list')}}",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': id
        },
        success: function (data) {
            // the next thing you want to do
            var $city = $('#city');
            $city.empty();
            console.log(data);
            $city.append('<option value="0" selected>All Cities</option>');
            for (var i = 0; i < data.length; i++) {
                $city.append('<option id="'+ data[i].id +'" value="' + data[i].id +'"">' + data[i].name + '</option>');
            }
        }
    });
});
     </script>
     
 @endpush
