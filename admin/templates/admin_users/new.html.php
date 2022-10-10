
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
						<form class="form" method="POST" action="<?php echo Request::$BASE_PATH.$md['con'].'/new'?>" enctype='multipart/form-data'>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Name</label>
								<div class="col-10">
									<input class="form-control" type="text" name="name" required id="example-text-input">
								</div>
							</div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Email</label>
								<div class="col-10">
									<input class="form-control" type="email" name="email" required id="example-text-input">
								</div>
							</div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Password</label>
								<div class="col-10">
									<input class="form-control" type="password" name="password" required id="example-text-input">
								</div>
							</div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Profile</label>
								<div class="col-10">
									<input class="form-control" type="file" accept="image/*" name="file" required id="example-text-input">
								</div>
							</div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Phone</label>
								<div class="col-10">
									<input class="form-control" type="text" name="phone" required id="example-text-input">
								</div>
							</div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Role</label>
								<div class="col-10">
									<select class="custom-select col-12" required name="role_id" >
                                        <?php

                                        if ($roles)
                                            foreach ($roles as $role) {
                                                ?>
                                        <option value="<?php echo $role->id?>"><?php echo $role->name?></option>
                                        <?php }?>
                                    </select>
								</div>
							</div>
							
							<div class="custom-control custom-switch">
								<input type="checkbox" name="active" checked class="custom-control-input" id="customSwitch1"> 
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