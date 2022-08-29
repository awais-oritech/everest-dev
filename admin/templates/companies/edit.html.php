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
                             action="<?php echo Request::$BASE_PATH.$md['con'].'/edit/'.$Data->id?>">
                            <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select class="form-control" required="required" id="package_id" name="package_id" >
                                        <option  selected disabled value="">Select Package</option>
                                        <?php foreach ($packages as $package){?>
                                            <option value="<?php echo $package->id ?>"  <?php echo ($package->id==$Data->package_id)?'Selected':''?>><?php echo $package->package_name ?></option>
                                       <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <h6 class="mb-4"><b>1) </b> Company Contact Details</h6>
                            
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="hidden" name="user_id" value="0">
                                    
                                    <input class="form-control" type="hidden" value="<?php echo $Data->id?>" name="id"
                                         required id="example-text-input">
                                    <input type="text" class="form-control" name="companyname" value="<?php echo $Data->companyname?>"  placeholder="Company Name*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="ownername" value="<?php echo $Data->ownername?>"  placeholder="Owner Name*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyaddress" value="<?php echo $Data->companyaddress?>"  placeholder="Head office address*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companypostal" value="<?php echo $Data->companypostal?>" placeholder="Postal Code Country*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companytelephone" value="<?php echo $Data->companytelephone?>"  placeholder="Telephone*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="email" class="form-control" name="companyemail" value="<?php echo $Data->companyemail?>" placeholder="Email Address*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companywebsite" value="<?php echo $Data->companywebsite?>"  placeholder="Website*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyskype" value="<?php echo $Data->companyskype?>" id="email" placeholder="Skype*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyfacebook" value="<?php echo $Data->companyfacebook?>" placeholder="Facebook*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyinstagram" value="<?php echo $Data->companyinstagram?>" placeholder="Instagram*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyyoutube" value="<?php echo $Data->companyyoutube?>" placeholder="YouTube*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="file"  accept="image/png, image/gif, image/jpeg, image/jpg" id="inputInfo"
                                         class="width-100"  class="form-control" name="newlogo" >
                                    <input type="hidden" class="form-control" name="companylogo" value="<?php echo $Data->companylogo?>"  required>
                                    
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Image</label>
                                 <div class="col-10">
                                     <img width="auto" height="200" alt="200x200"
                                         src="<?php echo Request::$BASE_PATH.'../public/uploads/'.$Data->companylogo ;?>">
                                 </div>
                             </div>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>2) </b>Company Information</h6>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea rows="10"  type="text" class="form-control" name="companyprofile"  placeholder="Company Profile*" required><?php echo $Data->companyprofile ?></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12form-group">
                                    <input type="date" class="form-control" name="startdate" value="<?php echo $Data->startdate?>"  placeholder="Company Date Started*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="branchaddress" value="<?php echo $Data->branchaddress?>"  placeholder="Branch Office Address*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="companylicense" value="<?php echo $Data->companylicense?>" placeholder="Last Licenses Company*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="vatnumber" value="<?php echo $Data->vatnumber?>"  placeholder="Vat Number*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="bankdetails" value="<?php echo $Data->bankdetails?>" id="email" placeholder="Bank Details*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="continents" name="continent" class="form-control" required>
                                        <option  selected disabled value="">Select Continents</option>
                                        <?php foreach ($continents as $continent){?>
                                            <option <?php echo ($continent->code==$Data->continent)?'Selected':''?> value="<?php echo $continent->id ?>"><?php echo $continent->name ?></option>
                                       <?php } ?>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="country" name="country" class="form-control" required>
                                        <option  selected disabled value="">Select Country</option>
                                        <?php foreach ($countries as $country){?>
                                            <option <?php echo ($country->code==$Data->country)?'Selected':''?> value="<?php echo $country->id ?>"><?php echo $country->name ?></option>
                                       <?php } ?>
                                        
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="city" name="city" class="form-control" required>
                                        <option  selected disabled value="">Select City</option>
                                        <?php foreach ($cities as $city){?>
                                            <option <?php echo ($city->code==$Data->city ||$city->name==$Data->city)?'Selected':''?> value="<?php echo $city->id ?>"><?php echo $city->name ?></option>
                                       <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>3) </b>Company Service</h6>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <b>i)</b> Please inform us of services your company can provide (Please select all services)<br>
                                    <div class="row">
                                        <?php if(isset($services) && !empty($services)){
                                        foreach ($services as  $service){
                                            ?>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="service_name[]" <?php echo (is_array($company_services) && in_array($service->id,$company_services)?'checked':'') ?> value="<?php echo $service->id ?>" >
                                            <label for="airfreight"><?php echo $service->name ?></label>

                                        </div>
                                        <?php }
                                    } ?>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>ii)</b> Is your company covered by professional liability insurance?<br>
                                    <input type="radio" class="mt-4" name="insurance" <?php echo $Data->insurance=='yes'?'checked':'' ?>  value="yes" required>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="insurance" <?php echo $Data->insurance=='no'?'checked':'' ?> value="no">
                                    <label> No</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>iii)</b> Is your company a licensed customs broker? <br>
                                    <input type="radio" class="mt-4" name="licensed" <?php echo $Data->licensed=='yes'?'checked':'' ?>  value="yes" required>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="licensed" <?php echo $Data->licensed=='no'?'checked':'' ?>  value="no">
                                    <label> No</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="operatinglicense"><b>iv) </b> What operating licenses or certifications do you hold?</label>
                                    <textarea id="operatinglicense" name="operatinglicense" rows="4" cols="50" required><?php echo $Data->operatinglicense?></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="operatinglicense"><b>v) </b> What is Your Bank Details?</label>
                                    <textarea id="bankdetails2" name="bankdetails2" rows="4" cols="50" required><?php echo $Data->bankdetails2?></textarea>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>4) </b>Company Certification/Membership</h6>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <b>i)</b> Please tick all relevant certification<br>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" <?php echo (is_array($certifications) && in_array('fiata',$certifications)?'checked':'') ?> value="fiata"  >
                                            <label for="fiata">FIATA</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]"  <?php echo (is_array($certifications) && in_array('fmc',$certifications)?'checked':'') ?> value="fmc" >
                                            <label for="fmc">FMC</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" <?php echo (is_array($certifications) && in_array('chamber',$certifications)?'checked':'') ?> value="chamber" >
                                            <label for="chamber">Chamber of Commerce</label>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" <?php echo (is_array($certifications) && in_array('nvocc',$certifications)?'checked':'') ?> value="nvocc" >
                                            <label for="nvocc">NVOCC</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" <?php echo (is_array($certifications) && in_array('iata',$certifications)?'checked':'') ?>  value="iata" >
                                            <label for="iata">IATA</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" <?php echo (is_array($certifications) && in_array('ferightnetwork',$certifications)?'checked':'') ?> value="ferightnetwork" >
                                            <label for="ferightnetwork">Freight Network</label>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" <?php echo (is_array($certifications) && in_array('customsbroker',$certifications)?'checked':'') ?>  value="customsbroker" >
                                            <label for="customsbroker">Customs Broker</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" <?php echo (is_array($certifications) && in_array('iso',$certifications)?'checked':'') ?> >
                                            <label for="iso">ISO 9001/9002</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" <?php echo (is_array($certifications) && in_array('others',$certifications)?'checked':'') ?>  value="others" >
                                            <label for="other">Others</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="associations"><b>ii) </b> What Local or National Freight Associations (different to Freight Networks) do you belong to?</label>
                                    <textarea id="associations" name="associations" rows="4" cols="50" required><?php echo $Data->associations?></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="companystrength"><b>iii) </b> Please list your company strengths (e.g. air, sea, road freight etc.)</label>
                                    <textarea id="companystrength" name="companystrength" rows="4" cols="50" required><?php echo $Data->companystrength?></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>iv)</b> Are you member of others network ?<br>
                                    <input type="radio" class="mt-4" name="member" <?php echo $Data->member=='yes'?'checked':'' ?>  value="yes" required>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="member" <?php echo $Data->member=='no'?'checked':'' ?>  value="no">
                                    <label> No</label>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>5) </b>Your Company Key Contact Information</h6>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientname" value="<?php echo $Data->clientname ?>"  placeholder="Your Name*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="email" class="form-control" name="clientemail" value="<?php echo $Data->clientemail ?>" placeholder="Your Email*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientmobile" value="<?php echo $Data->clientmobile ?>" placeholder="Your Mobile*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientskype" value="<?php echo $Data->clientskype ?>" placeholder="Your Skype*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientwhatsapp" value="<?php echo $Data->clientwhatsapp ?>"  placeholder="Your Whatsapp*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientposition" value="<?php echo $Data->clientposition ?>" placeholder="Your Position*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="date" class="form-control" name="doa" value="<?php echo $Data->doa ?>"  placeholder="Date of Application (dd/mm/yy)*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientmanager" value="<?php echo $Data->clientmanager ?>"  placeholder="Manager*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="gmceo" value="<?php echo $Data->gmceo ?>" placeholder="GM-CEO*" required>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            
                            
                            <div class="row">
                                <div class="col-md-1">
                                    <input  class="form-group" name="agree1" checked type="checkbox" required>
                                </div>
                                <div class="col-8" style="margin-left: -50px;">
                                    <p class="">I agree to International Freight Network storing and using the information to contact me.
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <input  class="form-group" name="agree2" checked  type="checkbox" required>
                                </div>
                                <div class="col-8" style="margin-left: -50px;">
                                    <p class="">I confirm that our company does not have any outstanding payments or ongoing disputes with any other forwarders. I confirm that we are not listed on any industry blacklists, e.g. FDRS (Forwarders Debt Recovery Service), FDB (Freight Dead Beats) or any local association, as any findings can be published and will affect the outcome of our application.
                                    </p>
                                </div>
                            </div>
                            <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label"></label>
                                 <div class="col-10">
                                     <button type="submit" class="btn btn-success mr-2">Submit</button>
                                     <a href="<?php echo Request::$BASE_PATH.$md['con']?>"
                                         class="btn btn-dark">Cancel</a>
                                 </div>
                             </div>
                            <!-- <div class="text-right"><input type="submit" value="Submit Application" class="btn_1 "></div> -->
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
            $city.append('<option id=' + data[i].id + ' value=' + data[i].id + '>' + data[i].name + '</option>');
        }
    }
});
});
 </script>