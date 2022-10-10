
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
						<form class="form" method="POST" action="<?php echo Request::$BASE_PATH.$md['con'].'/new'?>">
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Name</label>
								<div class="col-10">
								<input class="form-control" type="text" name="name" required id="example-text-input">
								<input class="form-control" type="hidden" name="node_id" value="0" required id="example-text-input">
								<input class="form-control" type="hidden" name="is_global" value="1" required id="example-text-input">
									
								</div>
							</div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Modules</label>
								<div class="col-10">
									<select class="custom-select col-12" required id="node_id" onchange="get_actions()" name="node_type">
                                        <?php

                                        if ($modules)
                                            foreach ($modules as $module) {
                                                ?>
                                        <option value="<?php echo $module->id?>"><?php echo $module->name?></option>
                                        <?php }?>
                                    </select>
								</div>
							</div>
							
							
							<div class="row mt-12">
    							<label for="example-text-input" class="col-2 col-form-label">Permissions</label>
                                <div class="col-sm-10 act">
                                    
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
<script>
function get_actions(){

		var id=$( "#node_id").children("option:selected").val();
		$.ajax({
	        type:'POST',
	        url: '<?php echo Request::$BASE_PATH.$md['con']."/get_action"?>',
	        data:{
	        	module_id:id,
	        		
	            },
	        success:function(data){
	        	data=$.trim(data);
	        	$('.act').empty();
	        	$(data).appendTo($('.act'));
	        	 
				
	        },
	        error: function(data){
	            console.log("error");
	            console.log(data);
	        }
	    });
		

	
	
}
$( document ).ready(function() {
    get_actions();
});

</script>