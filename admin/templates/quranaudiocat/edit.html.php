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
                             action="<?php echo Request::$BASE_PATH.$md['con'].'/edit/'.$Data->id.'?catID='.$cat->id?>">
                             <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Surah Name</label>
                                 <div class="col-10">
                                     <input class="form-control" type="hidden" value="<?php echo $Data->id?>" name="id"
                                         required id="example-text-input">
                                     <input class="form-control" type="text" value="<?php echo $Data->name?>"
                                         name="name" required id="example-text-input">
                                 </div>
                             </div>
                             <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Category</label>
                                 <div class="col-10">
                                     <select class="custom-select col-12" required name="category_id" disabled="true">
                                         <?php
											if ($categories)
											foreach ($categories as $category) {
												?>
                                         <option value="<?php echo $category->id?>"
                                             <?php echo ($category->id==$Data->category_id)?'Selected':''?>>
                                             <?php echo $category->name?></option>
                                         <?php }?>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Old Audio</label>
                                 &nbsp; &nbsp; &nbsp;<a href="<?php echo Request::$BASE_PATH.$Data->file?>"
                                     type="button" class="btn btn-danger  btn-circle" download><i
                                         class="fa fa-download"></i>
                                 </a> &nbsp; &nbsp;
                                 <a href="<?php echo Request::$BASE_PATH.$Data->file?>" type="button"
                                     class="btn btn-info  btn-circle" target="_blank"><i class="fa fa-eye"></i>
                                 </a>
                             </div>
                             <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">New Audio</label>
                                 <div class="col-10">
                                     <input type="file" class="form-control" name="file"
                                         accept="audio/mpeg3,audio/mp3,audio/ogg" id="inputInfo" class="width-100" />
                                     <input type="hidden" id="file_name" name="file_name"
                                         value="<?php echo $Data->file;?>" id="inputInfo" class="width-100" />
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