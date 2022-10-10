
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
				<h4 class="text-themecolor"><?php echo ucfirst($md['text']) ;?></h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		 <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30">
                                 <img src="<?php echo Request::$BASE_PATH.$Data->image?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo ucfirst($Data->name);?></h4>
                                    <h6 class="card-subtitle"><?php echo ucfirst($Data->role) ?></h6>
<!--                                     <div class="row text-center justify-content-md-center"> -->
<!--                                         <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div> -->
<!--                                         <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div> -->
<!--                                     </div> -->
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?php echo ucfirst($Data->email) ?></h6> 
                                <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo ucfirst($Data->phone) ?></h6> 
                                <small class="text-muted p-t-30 db">Role</small>
                                <h6><?php echo ucfirst($Data->role) ?></h6> 
                               
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" onclick="tabtoggle(profile)" href="#profile" role="tab">Edit Profile</a> </li>
                                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" onclick="tabtoggle(password)" href="#password" role="tab">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" onclick="tabtoggle(settings)" href="#settings" role="tab">Settings</a> </li> -->
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" method="POST" enctype='multipart/form-data' action="<?php echo Request::$BASE_PATH.'admin_user_profile/edit/'?>">
                                            <div class="form-group">
                                                <label class="col-md-12">Name</label>
                                                <div class="col-md-12">
                                                	<input type="hidden" value="<?php echo $Data->id?>" name="id" required class="form-control form-control-line">
                                                    <input type="text" value="<?php echo $Data->name?>" name="name" required class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $Data->phone?>" name="phone" required class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Profile</label>
                                                <div class="col-md-12">
                                                	<input type="hidden" value="<?php echo $Data->image?>" name="file_name" required class="form-control form-control-line">
                                                    <input type="file" name="file" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--second tab-->
                               
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
	</div>


</div>

<script type="text/javascript">
function tabtoggle(id){
	$('.tab-pane .active').removeClass('active');
	$('#'+id).addClass('active');
	
	
}
</script>
