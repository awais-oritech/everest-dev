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
						<form class="form" method="POST" action="<?php echo Request::$BASE_PATH.$md['con'].'/edit/'.$Data->id?>">
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Role</label>
								<div class="col-10">
								<input class="form-control" type="hidden" value="<?php echo $Data->id?>" name="id" required id="example-text-input">
									<select class="custom-select col-12" required name="role_id" >
                                        <?php

                                        if ($roles)
                                            foreach ($roles as $role) {
                                                ?>
                                        <option value="<?php echo $role->id?>" <?php ($role->id==$Data->role_id)?"selected":""?>><?php echo $role->name?></option>
                                        <?php }?>
                                    </select>
								</div>
							</div>
							<div class="form-group mt-5 row">
								<label for="example-text-input" class="col-2 col-form-label">Section</label>
								<div class="col-10">
									<select class="custom-select col-12" required name="section" onchange="get_actions()"
										id="section">
                                        <?php

                                        if ($sections)
                                            foreach ($sections as $section) {
                                                ?>
                                        <option data-id="<?php echo $section->id?>" value="<?php echo $section->name?>" <?php ($section->name==$Data->section)?"selected":""?>><?php echo $section->name?></option>
                                        <?php }?>
                                    </select>
								</div>
							</div>
							
							<div class="form-group row mt-5">
    							<label for="example-text-input" class="col-2 col-form-label">Actions</label>
                                <div class="col-sm-10 act">
                                <?php 
                                if($actions){
                                    $d=explode(',', $Data->actions);
                                    foreach ($actions as $action){
                                  ?>
                                    <div class="custom-control custom-checkbox">
                                    	<input type="checkbox" name="actions[<?php echo $action?>]" <?php echo (in_array($action,$d))?'checked':''?> class="custom-control-input" id="<?php echo $action?>">
                                    	<label class="custom-control-label" for="<?php echo $action?>"><?php echo $action?></label>
                                    </div>
                                    <?php }
                                }?>
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
<script>
function get_actions(){

		var name=$( "#section").children("option:selected").val();
		var id=$( "#section" ).children("option:selected").attr('data-id');
		$.ajax({
	        type:'POST',
	        url: '<?php echo Request::$BASE_PATH.$md['con']."/get_actions"?>',
	        data:{
	        	id:id,
	        	name:name,
	        		
	            },
	        success:function(data){
	        	data=$.trim(data);
	        	data=data.split(',');
	        	console.log();
	        	$('.act').empty();
	        	
	        	 $.each(data, function(key,d){
		        	 ht='<div class="custom-control custom-checkbox"><input type="checkbox" name="actions['+d+']" class="custom-control-input" id="'+d+'"><label class="custom-control-label" for="'+d+'">'+d+'</label></div>';
					 $(ht).appendTo($('.act'));
					 
					});
				
	        },
	        error: function(data){
	            console.log("error");
	            console.log(data);
	        }
	    });
		

	
	
}


</script>