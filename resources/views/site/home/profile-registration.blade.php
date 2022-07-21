@extends('layouts.site')
@section('content')
<main>
    <div class="container">
        <div class="row mt-4">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="box_account">
                    <h3 class="new_client">Company Profile</h3> <small class="float-end pt-2">* Required Fields</small>
                    <div class="form_container">
                        <h6 class="mb-4"><b>1) </b> Company Contact Details</h6>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="companyname" placeholder="Company Name*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="lastname"  placeholder="Owner Name*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Head office address*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="password_in_2" placeholder="Postal Code Country*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="email"  placeholder="Telephone*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="email"  placeholder="Website*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="skype" id="email" placeholder="Skype*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="facebook" placeholder="Facebook*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="instagram" placeholder="Instagram*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="youtube" placeholder="YouTube*">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <h6 class="mt-4 mb-4"><b>2) </b>Company Information</h6>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" class="form-control" name="companyname" placeholder="Company Profile*">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12form-group">
                                <input type="text" class="form-control" name="lastname"  placeholder="Company Date Started*">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Branch Office Address*">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" class="form-control" name="password_in_2" placeholder="Last Licenses Company*">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" class="form-control" name="email"  placeholder="Vat Number*">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Bank Details*">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <h6 class="mt-4 mb-4"><b>3) </b>Company Service</h6>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                <b>i)</b> Please inform us of services your company can provide (Please select all services)<br>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <input type="checkbox" class="mt-2" name="airfreight">
                                        <label for="airfreight">Air Freight</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="seafreight">
                                        <label for="seafreight">Sea Freight</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="projectcargo">
                                        <label for="projectcargo">Project Cargo</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="perishablecargo">
                                        <label for="perishablecargo">Perishable Cargo</label>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <input type="checkbox" class="mt-2" name="insurance">
                                        <label for="insurance">Insurance</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="customs">
                                        <label for="customs">Customs</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="timesensitive">
                                        <label for="timesensitive">Time Sensitive</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="roadferight">
                                        <label for="roadferight">Road Feright</label>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <input type="checkbox" class="mt-2" name="personaleffects">
                                        <label for="personaleffects">Personal Effects</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="animalclearance">
                                        <label for="animalclearance">Live Animal Clearance</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="hazardouscargo">
                                        <label for="hazardouscargo">Hazardous Cargo</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="Warehouse">
                                        <label for="warehouse">Warehouse</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                <b>ii)</b> Is your company covered by professional liability insurance?<br>
                                <input type="radio" class="mt-4" name="yes">
                                <label> Yes</label>
                                <input type="radio" class="ml-4" name="no">
                                <label> No</label>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                <b>iii)</b> Is your company a licensed customs broker? <br>
                                <input type="radio" class="mt-4" name="yes">
                                <label> Yes</label>
                                <input type="radio" class="ml-4" name="no">
                                <label> No</label>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                <label for="operatinglicense"><b>iv) </b> What operating licenses or certifications do you hold?</label>
                                <textarea id="operatinglicense" name="operatinglicense" rows="4" cols="50"></textarea>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                <label for="operatinglicense"><b>v) </b> What is Your Bank Details?</label>
                                <textarea id="bankdetails2" name="bankdetails2" rows="4" cols="50"></textarea>
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
                                        <input type="checkbox" class="mt-2" name="fiata">
                                        <label for="fiata">FIATA</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="fmc">
                                        <label for="fmc">FMC</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="chamber">
                                        <label for="chamber">Chamber of Commerce</label>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <input type="checkbox" class="mt-2" name="nvocc">
                                        <label for="nvocc">NVOCC</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="iata">
                                        <label for="iata">IATA</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="ferightnetwork">
                                        <label for="ferightnetwork">Freight Network</label>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <input type="checkbox" class="mt-2" name="customsbroker">
                                        <label for="customsbroker">Customs Broker</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="iso">
                                        <label for="iso">ISO 9001/9002</label>
                                        <br>
                                        <input type="checkbox" class="mt-2" name="others">
                                        <label for="other">Others</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                <label for="operatinglicense"><b>ii) </b> What Local or National Freight Associations (different to Freight Networks) do you belong to?</label>
                                <textarea id="operatinglicense" name="operatinglicense" rows="4" cols="50"></textarea>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                <label for="companystrength"><b>iii) </b> Please list your company strengths (e.g. air, sea, road freight etc.)</label>
                                <textarea id="companystrength" name="companystrength" rows="4" cols="50"></textarea>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 form-group">
                                <b>iv)</b> Are you member of others net work ?<br>
                                <input type="radio" class="mt-4" name="yes">
                                <label> Yes</label>
                                <input type="radio" class="ml-4" name="no">
                                <label> No</label>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <h6 class="mt-4 mb-4"><b>5) </b>Your Company Key Contact Information</h6>
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="clientname" placeholder="Your Name*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="email" class="form-control" name="clientemail"  placeholder="Your Email*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="clientmobile" placeholder="Your Mobile*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="clientskype" placeholder="Your Skype*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="clientwhatsapp"  placeholder="Your Whatsapp*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="email" class="form-control" name="clientposition" placeholder="Your Position*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="doa"  placeholder="Date of Application (dd/mm/yy)*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="clientmanager"  placeholder="Manager*">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 form-group">
                                <input type="text" class="form-control" name="gmceo" placeholder="GM-CEO*">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                <label class="container_check">I agree to International Freight Network storing and using the information to contact me.
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 form-group">
                                <label class="container_check">I confirm that our company does not have any outstanding payments or ongoing disputes with any other forwarders. I confirm that we are not listed on any industry blacklists, e.g. FDRS (Forwarders Debt Recovery Service), FDB (Freight Dead Beats) or any local association, as any findings can be published and will affect the outcome of our application.
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="text-right"><a href="/pricing"><input type="button" value="Submit Application" class="btn_1 "></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
