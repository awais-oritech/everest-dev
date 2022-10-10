<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar">
	<nav class="navbar top-navbar navbar-expand-md navbar-dark">
		<!-- ============================================================== -->
		<!-- Logo -->
		<!-- ============================================================== -->
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo Request::$BASE_PATH.'welcome'?>">
					<!-- Logo icon -->
				<b>
					<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
					<!-- Dark Logo icon -->
					<img src="assets/admin/images/faviconw.png" alt="homepage" class="dark-logo" />
					<!-- Light Logo icon -->
					<img src="assets/admin/images/faviconw.png" width="40px" alt="homepage" class="light-logo" />
				</b>
				<!--End Logo icon -->
				<span class="hidden-xs">
					<img src="assets/admin/images/title.png" width="140px" alt="homepage" class="light-logo">
				</span>
				<!--<span class="hidden-xs">My<span class="font-bold">Doc</span>tionary</span>-->
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
				<li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
				<li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
				<!-- ============================================================== -->
				<!-- Search -->
				<!-- ============================================================== -->
				<!--<li class="nav-item">
					<form class="app-search d-none d-md-block d-lg-block">
						<input type="text" class="form-control" placeholder="Search & enter">
					</form>
				</li>-->
			</ul>
			<!-- ============================================================== -->
			<!-- User profile and search -->
			<!-- ============================================================== -->
			<ul class="navbar-nav my-lg-0">
				<li class="nav-item dropdown u-pro">
					<a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php if(isset(Session::GetUser()->avatar) && Session::GetUser()->avatar != 'NULL'){?>
							<img src="uploads/user/<?php echo Session::GetUser()->avatar; ?>" alt="user" class="">
						<?php }else{?>
							<img src="uploads/user/defaultw.png" alt="user" class="">
						<?php }?>
						<span class="hidden-md-down">
							<?php echo ucfirst(Session::GetUser()->fullname); ?>
							<i class="fa fa-angle-down"></i>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right animated flipInY">
						
						<a href="<?php echo Request::$BASE_PATH.'profile'?>" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
						<!-- text-->
						<a href="<?php echo Request::$BASE_PATH.'changepassword'?>" class="dropdown-item"><i class="ti-wallet"></i> Change Password</a>
						<div class="dropdown-divider"></div>
						<!-- text-->
						<a href="<?php echo Request::$BASE_PATH.'logout'?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
						<!-- text-->
					</div>
				</li>
				<!-- ============================================================== -->
				<!-- End User Profile -->
				<!-- ============================================================== -->
				<li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
			</ul>
		</div>
	</nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->

