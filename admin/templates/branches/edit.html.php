 <!-- ============================================================== -->
 <!-- Page wrapper  -->
 <!-- ============================================================== -->
 <div class="page-wrapper">
     <!-- ============================================================== -->
     <!-- Container fluid  -->
     <!-- ============================================================== -->
     <div class="container-fluid">
         <!-- ============================================================== -->
         <!-- Bread crumb and right sidebar toggle -->
         <!-- ============================================================== -->
         <div class="row page-titles">
             <div class="col-md-5 align-self-center">
                 <h4 class="text-themecolor">Edit <?php echo ucfirst($md['stext']) ;?></h4>
             </div>

         </div>
         <!-- ============================================================== -->
         <!-- End Bread crumb and right sidebar toggle -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Start Page Content -->
         <!-- ============================================================== -->
         <div class="row">
             <div class="col-sm-12">
                 <div class="card">
                     <div class="card-body">
                         <form class="form" method="POST" enctype='multipart/form-data'
                             action="<?php echo Request::$BASE_PATH.$md['con'].'/'.$company_id.'/edit/'.$Data->id?>">
                             <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Name</label>
                                 <div class="col-10">
                                     <input class="form-control" type="hidden" value="<?php echo $Data->id?>" name="id"
                                         required id="example-text-input">
                                     <input class="form-control" type="text" value="<?php echo $Data->name?>"
                                         name="name" id="example-text-input">
                                 </div>
                             </div>
                             
                             <div class="form-group mt-5 row">
                                <label for="example-text-input" class="col-2 col-form-label">Continent</label>
                                <div class="col-10">
                                    <select id="continents" name="continent" class="custom-select col-12" required>
                                    <option selected disabled value="">Select Continent</option>
                                       <?php
											if ($continents)
											foreach ($continents as $continent) {
												?>
                                        <option value="<?php echo $continent->id?>" <?php echo ($continent->id==$Data->continent)?'selected':''?>><?php echo $continent->name?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-5 row">
                                <label for="example-text-input" class="col-2 col-form-label">Country</label>
                                <div class="col-10">
                                    <select class="custom-select col-12" required id="country" name="country">
                                    <?php
											if ($countries)
											foreach ($countries as $country) {
												?>
                                        <option value="<?php echo $country->id?>" <?php echo ($country->id==$Data->country)?'selected':''?>><?php echo $country->name?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-5 row">
                                <label for="example-text-input"  class="col-2 col-form-label">City</label>
                                <div class="col-10">
                                    <select class="custom-select col-12" required id="city" name="city">
                                    <?php
											if ($cities)
											foreach ($cities as $city) {
												?>
                                        <option value="<?php echo $city->id?>" <?php echo ($city->id==$Data->city)?'selected':''?>><?php echo $city->name?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Google Map</label>
                                 <div class="col-10">
                                     <input class="form-control" type="text"
                                         name="location" value="<?php echo $Data->location?>" required id="example-text-input">
                                 </div>
                             </div>
                           
                            <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label"></label>
                                 <div class="col-10">
                                     <button type="submit" class="btn btn-success mr-2">Submit</button>
                                     <a href="<?php echo Request::$BASE_PATH.$md['con'].'/'.$company_id?>"
                                         class="btn btn-dark">Cancel</a>
                                 </div>
                             </div>

                         </form>
                     </div>
                 </div>
             </div>
         </div>
         <!-- ============================================================== -->
         <!-- Start Page Content -->
         <!-- ============================================================== -->
     </div>


 </div>
 <script>
$(document).ready(function() {

    $('.textarea_editor').wysihtml5();


});
</script>
<script>

$('#continents').change(function () {
var id = $(this).find(':selected').val()
    console.log(id)

$.ajax({

    type: 'POST',
    url: "<?php echo Request::$BASE_PATH.'ajax/countries'?>",
    data: {
        'id': id
    },
    success: function (data) {
        // the next thing you want to do
        var $country = $('#country');
        $country.empty();
        $('#city').empty();
         data=JSON.parse(data);
         data=data.data;
       
        for (var i = 0; i < data.length; i++) {
            $country.append('<option id=' + data[i].id + ' value=' + data[i].id + '>' + data[i].name + '</option>');
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
    url: "<?php echo Request::$BASE_PATH.'ajax/cities'?>",
    data: {
        'id': id
    },
    success: function (data) {
        // the next thing you want to do
        var $city = $('#city');
        $city.empty();
        data=JSON.parse(data);
         data=data.data;
         console.log(data);
        $city.append('<option value="0" disabled selected value="">Select City</option>');
        for (var i = 0; i < data.length; i++) {
            $city.append('<option id="' + data[i].id + '" value="' + data[i].id + '">' + data[i].name + '</option>');
        }
    }
});
});
 </script>