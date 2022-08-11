<style>
  #sortable { list-style-type: none; margin: 0; padding: 2%; width: 60%; }
  #sortable li { margin: 16px 3px 3px 3px; padding: 0.4em; padding-left: 2.5em; font-size: 1.4em; }
  #sortable li span { }
  </style>
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
                        <h4 class="text-themecolor">Sort Admin Section</h4>
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
					<ul id="sortable">
					<?php if($sideBaritems)
					foreach($sideBaritems as $sideBar){?>
					<li class="ui-state-default listitem" data-id="<?php echo $sideBar->id?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span> <?php echo $sideBar->icon .'   '?><?php echo $sideBar->label?></li>
					<?php }?>
					
					</ul>
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
  $( function() {
    $( "#sortable" ).sortable({
    placeholder: "ui-state-highlight",
    update: function( event, ui ) {
		var listValues = [];
		$( ".listitem" ).each(function( index ) {
		console.log( index + ": " + $( this ).text()+ $( this ).data('id') );
		listValues.push($( this ).data('id'));
		});
		console.log(ui.item.index())
       $.ajax({
                url: "<?php echo Request::$BASE_PATH.'ajax/sort-update';?>",
                type: 'POST',
                data: { items: listValues },
                success: function (data) {
                    console.log(data)
                }

            });
    }
});
    $( "#sortable" ).disableSelection();
  } );
  </script>