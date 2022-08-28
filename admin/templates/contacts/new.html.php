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
                        <form class="form" method="POST" enctype='multipart/form-data'
                            action="<?php echo Request::$BASE_PATH.$md['con'].'/new'?>">
                            <div class="form-group mt-5 row">
                                <label for="example-text-input" class="col-2 col-form-label">First Name</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="firstname" required
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group mt-5 row">
                                <label for="example-text-input" class="col-2 col-form-label">Last Name</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="lastname" required
                                        id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                 <div class="col-10">
                                     <input class="form-control" type="text"
                                         name="email" required id="example-text-input">
                                 </div>
                             </div>
                            <div class="form-group mt-5 row">
                                <label for="example-text-input" class="col-2 col-form-label">Phone</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="phone" required
                                        id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group mt-5 row">
                                <label for="example-text-input" class="col-2 col-form-label">Message</label>
                                <div class="col-10">
                                    <textarea class="textarea_editor form-control" rows="15" placeholder="Enter text ..." type="text" name="message"
                                        required
                                        id="example-textarea"></textarea>
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
