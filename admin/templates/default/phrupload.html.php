
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
				<h4 class="text-themecolor">Labs</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Lab Data Uploads</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="card-title">
							Upload CSV
						</div>
						<div class="col-md-12">
							<form action="<?php echo Request::$BASE_PATH.'csvimport'?>" enctype="multipart/form-data" method="POST"> 
								<div class="form-group" >
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Upload</span>
										</div>
										<div class="custom-file">
											<input type="file" name="file" class="custom-file-input" accept=".csv" >
											<label class="custom-file-label" for="inputGroupFile01">Upload CSV</label>
										</div>
										
									</div>
									<div class="custom-file p-t-40">
										<button type="submit" class="btn waves-effect waves-light btn-block btn-danger"> Upload </button>
									</div>
								</div>
							</form>
						</div>
						
					</div>
					
				</div>
				
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h3 class="font-weight-300" class="popup_header">Response</h3>
						<pre>
						<?php 
						if(isset($res)){
							echo $res;
						}
						?>
						</pre>
					</div>
					<!-- <div class="card-footer">
						
					</div> -->
				</div>
			</div>
		</div>

	
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->

		
		<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->

