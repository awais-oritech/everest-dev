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
                                <label for="example-text-input" class="col-2 col-form-label">Category</label>
                                <div class="col-10">

                                <select name="category_id[]" class="select2  select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                <?php
                                $cats=explode(',',$Data->category_id);
											if ($categories)
											foreach ($categories as $category) {
												?>
                                        <option value="<?php echo $category->id?>" <?php echo (in_array($category->id, $cats))?'Selected':''?> ><?php echo $category->name?></option>
                                        <?php }?>
                                </select>
                                    
                                </div>
                            </div>
                             <?php if(!is_null($Data->file)){ ?>
                             <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">Image</label>
                                 <div class="col-10">
                                     <img width="auto" height="200" alt="200x200"
                                         src="<?php echo Request::$BASE_PATH.$Data->file ;?>">
                                 </div>
                             </div>
                             <?php } ?>
                             <div class="form-group mt-5 row">
                                 <label for="example-text-input" class="col-2 col-form-label">New Image</label>
                                 <div class="col-10">
                                     <input type="file" class="form-control" name="file"
                                         accept="image/png, image/gif, image/jpeg, image/jpg" id="inputInfo"
                                         class="width-100" />
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
 <script>
        $(function () {
            // For select 2
            $(".select2").select2();
           // $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            
            // For multiselect
           // $('#pre-selected-options').multiSelect();
            
         
        });
    </script>
    <style>
       .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: none!important;
        }
    </style>