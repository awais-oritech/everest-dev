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
                    <a href="<?php echo Request::$BASE_PATH.$md['con'].'/new'?>"
                        class="btn btn-info d-none d-lg-block m-l-15">
                        <i class="fa fa-plus-circle"></i> New
                    </a>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"><?php echo ucfirst($md['text']) ;?></h4>
                        <h6 class="card-title pull-right">

                        </h6>
                        <div class="table-responsive m-t-40">
                            <div id="" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <table id="example23"
                                    class="display nowrap table table-hover table-striped table-bordered dataTable"
                                    cellspacing="0" width="100%" role="grid" aria-describedby="example23_info"
                                    style="width: 100%;">
                                    <thead>
                                        <tr role="row">

                                            <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1"
                                                colspan="1" aria-label="Name: activate to sort column descending"
                                                style="width: 200px;" aria-sort="ascending">
                                                Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">
                                                Categories
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">
                                                Image
                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">
                                                Active
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 100px;">
                                                ACTIONS
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($Data)
										    foreach ($Data as $d){
										    ?>
                                        <tr role="row" class="odd">
                                            <td class=""><?php echo $d->name?></td>
                                            <td class=""><?php echo $d->category?></td>
                                            <!-- <td>
                                                <a href="<?php echo Request::$BASE_PATH.$d->file?>" type="button"
                                                    class="btn btn-danger  btn-circle" download><i
                                                        class="fa fa-download"></i>
                                                </a>
                                                <a href="<?php echo Request::$BASE_PATH.$d->file?>" type="button"
                                                    class="btn btn-info  btn-circle" target="_blank"><i
                                                        class="fa fa-eye"></i>
                                                </a>
                                            </td> -->

                                            <td><img height="40" width="auto" src="<?php echo $d->file?>" /></td>

                                            <td>
                                                <span
                                                    class="label <?php echo($d->is_active=='1')?'label-success':'label-danger';?>"><?php echo ($d->is_active=='1')?'Yes':'No' ;?></span>
                                            </td>
                                            <td>
                                                <a href="<?php echo Request::$BASE_PATH.$md['con'].'/edit/'.$d->id?>"
                                                    class="btn btn-warning btn-rounded"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0);" id="row<?php echo $d->id?>"
                                                    data-rec="<?php echo $d->id?>"
                                                    class="del btn btn-danger btn-rounded"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>


                                        </tr>
                                        <?php }?>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
    </div>


</div>
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Delete</h4>
                <button type="button" class="close mdclose" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h4>Are You sure you want Delete this ?</h4>
                <div id="deleteform">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default mdclose" data-dismiss="modal">cancle</button>
                <button type="button" class="btn btn-primary" id="delete">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<script>
$(document).ready(function() {

    //DOM manipulation code
    $(".del").click(function() {
        var self = $(this);
        var id = $(this).attr('data-rec');
        var data =
            '<input type="hidden" name="table" id="table" value="<?php echo $md['table']?>"><input type="hidden" name="id" class="rowid" value="' +
            id + '">';
        $("#deleteform").empty();
        $("#deleteform").html(data);
        $("#exampleModal").toggle();

    });
    $(".mdclose").click(function() {

        $("#exampleModal").toggle();

    });
    $("#delete").click(function() {
        row = $(".rowid").attr('value');
        table = $("#table").attr('value');
        $.ajax({
            type: 'POST',
            url: '<?php echo Request::$BASE_PATH."delete"?>',
            data: {
                id: row,
                table: table,

            },
            success: function(data) {
                console.log(data);
                $("#exampleModal").toggle();
                $("#row" + row).closest('tr').remove();

            },
            error: function(data) {
                console.log("error");
                console.log(data);
            }
        });


    });

});
</script>
<!-- end - This is for export functionality only -->
<script>
$(function() {
    $('#myTable').DataTable();
    var table = $('#example').DataTable({
        "columnDefs": [{
            "visible": false,
            "targets": 2
        }],
        "order": [
            [2, 'asc']
        ],
        "displayLength": 25,
        "drawCallback": function(settings) {
            var api = this.api();
            var rows = api.rows({
                page: 'current'
            }).nodes();
            var last = null;
            api.column(2, {
                page: 'current'
            }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group +
                        '</td></tr>');
                    last = group;
                }
            });
        }
    });
    // Order by the grouping
    $('#example tbody').on('click', 'tr.group', function() {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
        } else {
            table.order([2, 'asc']).draw();
        }
    });
    // responsive table
    $('#config-table').DataTable({
        responsive: true
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
        'btn btn-primary mr-1');
});
</script>
