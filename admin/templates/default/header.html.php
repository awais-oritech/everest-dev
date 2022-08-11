<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href="<?php echo Request::$BASE_PATH?>">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
        <title>Poineers Network || Admin Panel</title>
        <!-- Data Tables Custom CSS -->
        <link href="dist/css/style.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"
            href="assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" type="text/css"
            href="assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
        <link href="dist/css/style.min.css" rel="stylesheet">
        <link href="assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
        <!-- Data Tables CSS -->
        <!-- page css -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="dist/css/pages/file-upload.css" rel="stylesheet">
        <link href="assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
        <link href="assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/node_modules/html5-editor/bootstrap-wysihtml5.css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="assets/node_modules/popper/popper.min.js"></script>
        <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
        <!--Wave Effects -->
        <script src="dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="dist/js/sidebarmenu.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!--stickey kit -->
        <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
       
        <!--Custom JavaScript -->
        <script src="dist/js/custom.min.js"></script>
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->
        <script src="dist/js/pages/jasny-bootstrap.js"></script>

        <!--Custom JavaScript -->
        <script src="dist/js/custom.min.js"></script>
        <!-- This is data table -->
        <script src="assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
        <script src="assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
        <script src="assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
        <!--Custom JavaScript -->
        <!-- wysuhtml5 Plugin JavaScript -->
    <script src="assets/node_modules/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/node_modules/html5-editor/bootstrap-wysihtml5.js"></script>
        <!-- jQuery peity -->
        <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/node_modules/jquery-sparkline/jquery.charts-sparkline.js"></script>
        <!-- start - This is for export functionality only -->
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <style type="text/css">
        .togglediv {
            margin-top: 0.5%;
        }

        .img-wrap {
            position: relative;
            display: inline-block;
            border: 1px red solid;
            font-size: 0;
        }

        .img-wrap .close {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
            background-color: #444;
            padding: 5px 5px 5px;
            color: #FFF;
            font-weight: bold;
            cursor: pointer;
            opacity: .3;
            text-align: center;
            font-size: 20px;
            line-height: 10px;
            border-radius: 50%;
        }

        .img-wrap:hover .close {
            opacity: 5;
        }

        </style>
    </head>

    <body class="skin-megna fixed-layout">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader" style="display:none;">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Fils App</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="">
                            <!-- Logo icon --><b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <!-- <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" /> -->
                                <!-- Light Logo icon -->
                                <!-- <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
                            </b>
                            <!--End Logo icon -->
                            <span class="hidden-xs"><span class="font-bold">Poineers Network</span></span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto">
                            <!-- This is  -->
                            <li class="nav-item"> <a
                                    class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                                    href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                            <li class="nav-item"> <a
                                    class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                                    href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <!-- <li class="nav-item">
                                <form class="app-search d-none d-md-block d-lg-block">
                                    <input type="text" class="form-control" placeholder="Search & enter">
                                </form>
                            </li> -->
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">
                            <!-- ============================================================== -->
                            <!-- Comment -->
                            <!-- ============================================================== 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            Message
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== 
                        <!-- End Comment -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                        class="icon-note"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown"
                                    aria-labelledby="2">
                                    <ul>
                                        <li>
                                            <div class="drop-title">You have 4 new messages</div>
                                        </li>
                                        <li>
                                            <div class="message-center">
                                                Message
                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="assets/images/users/1.jpg"
                                                            alt="user" class="img-circle"> <span
                                                            class="profile-status online pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                            admin!</span> <span class="time">9:30 AM</span>
                                                    </div>
                                                </a>

                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See
                                                    all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                             ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- mega menu -->
                            <!-- ============================================================== -->
                            <!--                         <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-layout-width-default"></i></a> -->
                            <!--                             <div class="dropdown-menu animated bounceInDown"> -->
                            <!--                                 <ul class="mega-dropdown-menu row"> -->
                            <!--                                     <li class="col-lg-3 col-xlg-2 m-b-30"> -->
                            <!--                                         <h4 class="m-b-20">CAROUSEL</h4> -->
                            <!-- CAROUSEL -->
                            <!--                                         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"> -->
                            <!--                                             <div class="carousel-inner" role="listbox"> -->
                            <!--                                                 <div class="carousel-item active"> -->
                            <!--                                                     <div class="container"> <img class="d-block img-fluid" src="assets/images/big/img1.jpg" alt="First slide"></div> -->
                            <!--                                                 </div> -->
                            <!--                                                 <div class="carousel-item"> -->
                            <!--                                                     <div class="container"><img class="d-block img-fluid" src="assets/images/big/img2.jpg" alt="Second slide"></div> -->
                            <!--                                                 </div> -->
                            <!--                                                 <div class="carousel-item"> -->
                            <!--                                                     <div class="container"><img class="d-block img-fluid" src="assets/images/big/img3.jpg" alt="Third slide"></div> -->
                            <!--                                                 </div> -->
                            <!--                                             </div> -->
                            <!--                                             <a class="carousel-control-prev" href="form-basic.html#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> -->
                            <!--                                             <a class="carousel-control-next" href="form-basic.html#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> -->
                            <!--                                         </div> -->
                            <!-- End CAROUSEL -->
                            <!--                                     </li> -->
                            <!--                                     <li class="col-lg-3 m-b-30"> -->
                            <!--                                         <h4 class="m-b-20">ACCORDION</h4> -->
                            <!-- Accordian -->
                            <!--                                         <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true"> -->
                            <!--                                             <div class="card"> -->
                            <!--                                                 <div class="card-header" role="tab" id="headingOne"> -->
                            <!--                                                     <h5 class="mb-0"> -->
                            <!--                                                         <a data-toggle="collapse" data-parent="#accordion" href="form-basic.html#collapseOne" aria-expanded="true" aria-controls="collapseOne"> -->
                            <!--                                                   Collapsible Group Item #1 -->
                            <!--                                                 </a> -->
                            <!--                                                     </h5> -->
                            <!--                                                 </div> -->
                            <!--                                                 <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"> -->
                            <!--                                                     <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div> -->
                            <!--                                                 </div> -->
                            <!--                                             </div> -->
                            <!--                                             <div class="card"> -->
                            <!--                                                 <div class="card-header" role="tab" id="headingTwo"> -->
                            <!--                                                     <h5 class="mb-0"> -->
                            <!--                                                         <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="form-basic.html#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> -->
                            <!--                                                   Collapsible Group Item #2 -->
                            <!--                                                 </a> -->
                            <!--                                                     </h5> -->
                            <!--                                                 </div> -->
                            <!--                                                 <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"> -->
                            <!--                                                     <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div> -->
                            <!--                                                 </div> -->
                            <!--                                             </div> -->
                            <!--                                             <div class="card"> -->
                            <!--                                                 <div class="card-header" role="tab" id="headingThree"> -->
                            <!--                                                     <h5 class="mb-0"> -->
                            <!--                                                         <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="form-basic.html#collapseThree" aria-expanded="false" aria-controls="collapseThree"> -->
                            <!--                                                   Collapsible Group Item #3 -->
                            <!--                                                 </a> -->
                            <!--                                                     </h5> -->
                            <!--                                                 </div> -->
                            <!--                                                 <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree"> -->
                            <!--                                                     <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div> -->
                            <!--                                                 </div> -->
                            <!--                                             </div> -->
                            <!--                                         </div> -->
                            <!--                                     </li> -->
                            <!--                                     <li class="col-lg-3  m-b-30"> -->
                            <!--                                         <h4 class="m-b-20">CONTACT US</h4> -->
                            <!-- Contact -->
                            <!--                                         <form> -->
                            <!--                                             <div class="form-group"> -->
                            <!--                                                 <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div> -->
                            <!--                                             <div class="form-group"> -->
                            <!--                                                 <input type="email" class="form-control" placeholder="Enter email"> </div> -->
                            <!--                                             <div class="form-group"> -->
                            <!--                                                 <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea> -->
                            <!--                                             </div> -->
                            <!--                                             <button type="submit" class="btn btn-info">Submit</button> -->
                            <!--                                         </form> -->
                            <!--                                     </li> -->
                            <!--                                     <li class="col-lg-3 col-xlg-4 m-b-30"> -->
                            <!--                                         <h4 class="m-b-20">List style</h4> -->
                            <!-- List style -->
                            <!--                                         <ul class="list-style-none"> -->
                            <!--                                             <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li> -->
                            <!--                                             <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li> -->
                            <!--                                             <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li> -->
                            <!--                                             <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li> -->
                            <!--                                             <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li> -->
                            <!--                                         </ul> -->
                            <!--                                     </li> -->
                            <!--                                 </ul> -->
                            <!--                             </div> -->
                            <!--                         </li> -->
                            <!-- ============================================================== -->
                            <!-- End mega menu -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- User Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown u-pro">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                        src="<?php echo Request::$BASE_PATH.$user->image?>" alt="user" class=""> <span
                                        class="hidden-md-down"><?php echo $user->name?>&nbsp;<i
                                            class="fa fa-angle-down"></i></span> </a>
                                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                    <!-- text-->
                                    <a href="admin_user_profile" class="dropdown-item"><i class="fa fa-user"></i> My
                                        Profile</a>
                                    <!-- text-->
                                    <div class="dropdown-divider"></div>
                                    <!-- text-->
                                    <a href="logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                    <!-- text-->
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End User Profile -->
                            <!-- ============================================================== -->
                            <!--                         <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li> -->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
