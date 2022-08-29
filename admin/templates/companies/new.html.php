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
                <h4 class="text-themecolor">Add <?php echo ucfirst($md['stext']) ;?></h4>
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
                        


                        <form method="POST" enctype='multipart/form-data'
                            action="<?php echo Request::$BASE_PATH.$md['con'].'/new'?>">
                            <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select class="form-control" required="required" id="package_id" name="package_id" >
                                        <option  selected disabled value="">Select Package</option>
                                        <?php foreach ($packages as $package){?>
                                            <option value="<?php echo $package->id ?>"><?php echo $package->package_name ?></option>
                                       <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <h6 class="mb-4"><b>1) </b> Company Contact Details</h6>
                            
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="hidden" name="user_id" value="0">
                                    
                                   
                                    <input type="text" class="form-control" name="companyname" placeholder="Company Name*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="ownername"  placeholder="Owner Name*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyaddress"  placeholder="Head office address*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companypostal" placeholder="Postal Code Country*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companytelephone"  placeholder="Telephone*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="email" class="form-control" name="companyemail" placeholder="Email Address*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companywebsite"  placeholder="Website*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyskype" id="email" placeholder="Skype*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyfacebook" placeholder="Facebook*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyinstagram" placeholder="Instagram*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="companyyoutube" placeholder="YouTube*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" id="inputInfo"
                                         class="width-100"  class="form-control" name="companylogo" required>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>2) </b>Company Information</h6>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea rows="10"  type="text" class="form-control" name="companyprofile" placeholder="Company Profile*" required></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12form-group">
                                    <input type="date" class="form-control" name="startdate"  placeholder="Company Date Started*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="branchaddress"  placeholder="Branch Office Address*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="companylicense" placeholder="Last Licenses Company*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="vatnumber"  placeholder="Vat Number*" required>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" class="form-control" name="bankdetails" id="email" placeholder="Bank Details*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="continents" name="continent" class="form-control" required>
                                        <option  selected disabled value="">Select Continents</option>
                                        <?php foreach ($continents as $continent){?>
                                            <option value="<?php echo $continent->id ?>"><?php echo $continent->name ?></option>
                                       <?php } ?>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="country" name="country" class="form-control" required>
                                        <option  selected disabled value="">Select Country</option>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 form-group">
                                    <select id="city" name="city" class="form-control" required>
                                        <option  selected disabled value="">Select City</option>
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
                                            <input type="checkbox" class="mt-2" name="service_name[]" value="<?php echo $service->id ?>" >
                                            <label for="airfreight"><?php echo $service->name ?></label>

                                        </div>
                                        <?php }
                                    } ?>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>ii)</b> Is your company covered by professional liability insurance?<br>
                                    <input type="radio" class="mt-4" name="insurance" value="yes" required>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="insurance" value="no">
                                    <label> No</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>iii)</b> Is your company a licensed customs broker? <br>
                                    <input type="radio" class="mt-4" name="licensed" value="yes" required>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="licensed" value="no">
                                    <label> No</label>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="operatinglicense"><b>iv) </b> What operating licenses or certifications do you hold?</label>
                                    <textarea id="operatinglicense" name="operatinglicense" rows="4" cols="50" required></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="operatinglicense"><b>v) </b> What is Your Bank Details?</label>
                                    <textarea id="bankdetails2" name="bankdetails2" rows="4" cols="50" required></textarea>
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
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="fiata">
                                            <label for="fiata">FIATA</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="fmc">
                                            <label for="fmc">FMC</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="chamber">
                                            <label for="chamber">Chamber of Commerce</label>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="nvocc">
                                            <label for="nvocc">NVOCC</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="iata">
                                            <label for="iata">IATA</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="ferightnetwork">
                                            <label for="ferightnetwork">Freight Network</label>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="customsbroker">
                                            <label for="customsbroker">Customs Broker</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="iso">
                                            <label for="iso">ISO 9001/9002</label>
                                            <br>
                                            <input type="checkbox" class="mt-2" name="certification_name[]" value="others">
                                            <label for="other">Others</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="associations"><b>ii) </b> What Local or National Freight Associations (different to Freight Networks) do you belong to?</label>
                                    <textarea id="associations" name="associations" rows="4" cols="50" required></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <label for="companystrength"><b>iii) </b> Please list your company strengths (e.g. air, sea, road freight etc.)</label>
                                    <textarea id="companystrength" name="companystrength" rows="4" cols="50" required></textarea>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                    <b>iv)</b> Are you member of others network ?<br>
                                    <input type="radio" class="mt-4" name="member" value="yes" required>
                                    <label> Yes</label>
                                    <input type="radio" class="ml-4" name="member" value="no">
                                    <label> No</label>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <h6 class="mt-4 mb-4"><b>5) </b>Your Company Key Contact Information</h6>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientname"  placeholder="Your Name*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="email" class="form-control" name="clientemail"  placeholder="Your Email*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientmobile" placeholder="Your Mobile*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientskype" placeholder="Your Skype*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientwhatsapp"  placeholder="Your Whatsapp*">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientposition" placeholder="Your Position*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="date" class="form-control" name="doa"  placeholder="Date of Application (dd/mm/yy)*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="clientmanager"  placeholder="Manager*" required>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                    <input type="text" class="form-control" name="gmceo" placeholder="GM-CEO*" required>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            
                            
                            <div class="row">
                                <div class="col-md-1">
                                    <input  class="form-group" name="agree1" type="checkbox" required>
                                </div>
                                <div class="col-8" style="margin-left: -50px;">
                                    <p class="">I agree to International Freight Network storing and using the information to contact me.
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <input  class="form-group" name="agree2"  type="checkbox" required>
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
            $city.append('<option id="' + data[i].id + '" value="' + data[i].id + '">' + data[i].name + '</option>');
        }
    }
});
});
 </script>