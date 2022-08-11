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
                        <h4 class="text-themecolor">Edit <?php echo ucfirst(Words::singularize($md['con'])) ;?></h4>
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
						<form class="form" method="POST" action="<?php echo Request::$BASE_PATH.$md['con'].'/edit/'.$Data->id?>">
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Module</label>
								<div class="col-10">
									<select class="custom-select col-12" required name="module_id"
										id="inlineFormCustomSelect">
                                        <?php

                                                if ($modules)
                                            foreach ($modules as $module) {
                                                ?>
                                        <option value="<?php echo $module->id?>" required <?php echo ($module->id==$Data->module_id)?'selectd':''?>><?php echo $module->name?></option>
                                        <?php }?>
                                    </select>
								</div>
							</div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Actions</label>
								<div class="tags-default col-10">
									<input type="text" required name="actions" value="<?php echo $Data->actions?>" data-role="tagsinput" placeholder="add tags" style="display: none;">
								</div>
							</div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Name</label>
								<div class="col-10">
									<input class="form-control" type="hidden" value="<?php echo $Data->id?>" name="id" required id="example-text-input">
									<input class="form-control" type="text" value="<?php echo $Data->name?>" name="name" required id="example-text-input">
								</div>
							</div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Link</label>
								<div class="col-10">
									<input class="form-control" value="<?php echo $Data->link?>" type="text" name="link" id="example-text-input">
								</div>
							</div>
							<div class="custom-control custom-switch">
                                  <input type="checkbox" name="active" <?php echo ($Data->is_active)?'checked':''?> class="custom-control-input" id="customSwitch1">
                                  <label class="custom-control-label" for="customSwitch1">Active</label>
                                </div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label"></label>
								<div class="col-10">
									<button type="submit" class="btn btn-success mr-2">Submit</button>
									<a href="<?php echo Request::$BASE_PATH.$md['con']?>" class="btn btn-dark">Cancel</a>
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