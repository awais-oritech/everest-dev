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
                             <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Name</label>
                                 <div class="col-10">
                                     <input class="form-control" type="hidden" value="<?php echo $Data->id?>" name="id"
                                         required id="example-text-input">
                                     <input class="form-control" type="text" value="<?php echo $Data->name?>"
                                         name="name" required id="example-text-input">
                                 </div>
                             </div>
                             <div class="form-group mt-5 row">
                                <label for="example-text-input" class="col-2 col-form-label">Album</label>
                                <div class="col-10">
                                    <select class="custom-select col-12" required name="album_id">
                                    <?php foreach($albums as $album ){?>
                                    <option value="<?php echo $album->id?>" <?php echo ($album->id==$Data->album_id)?'Selected':''?>><?php echo $album->name?></option>
                                    <?php }  ?>
                                    </select>

                                </div>
                            </div>
                             <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Link</label>
                                 <div class="col-10">

                                     <input class="form-control" type="text" value="<?php echo $Data->link?>"
                                         name="link" required id="example-text-input">
                                 </div>

                             </div>
                             <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Note:</label>
                                 <div class="col-10">
                                     Please add only highlighted part of Youtube Video
                                     <br>
                                     <br>
                                     <span>https://youtu.be/<span class="label label-info">ljX7kyS5R7M</span></span>
                                     <br>
                                     <span>https://www.youtube.com/watch?v=<span
                                             class="label label-info">ljX7kyS5R7M&t</span></span>
                                 </div>

                             </div>


                             <div class="custom-control custom-switch">
                                 <input type="checkbox" name="active" <?php echo ($Data->is_active)?'checked':''?>
                                     class="custom-control-input" id="customSwitch1">
                                 <label class="custom-control-label" for="customSwitch1">Active</label>
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
