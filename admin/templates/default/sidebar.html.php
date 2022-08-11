 <!-- ============================================================== -->
 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav">
                 <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                         aria-expanded="false"><img src="<?php echo Request::$BASE_PATH.$user->image?>" alt="user-img"
                             class="img-circle"><span class="hide-menu"><?php echo $user->name?></span></a>
                     <ul aria-expanded="false" class="collapse">
                         <li><a href="admin_user_profile"><i class="fa fa-user"></i> My Profile</a></li>
                         <li><a href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
                     </ul>
                 </li>

                 <?php foreach($sideBaritems as $items){
                           if(Content::validate($items->name,'view')){

                           
                           $active=" ";
                            if(isset($paramerter[0]) && $paramerter[0]==$items->name){
                                $active=" active";
                            }
                            ?>
                 <li>
                     <a class="waves-effect waves-dark <?php echo $active;?>" href="<?php echo $items->name ?>">
                         <?php echo $items->icon ?><span class="hide-menu"><?php echo $items->label ?></span>
                     </a>
                 </li>
                 <?php } }?>
                 <!-- <li> 
                            <a class="waves-effect waves-dark" href="brands">
                                <i class="icon-speedometer"></i><span class="hide-menu">Brands</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="series">
                                <i class="icon-speedometer"></i><span class="hide-menu">Series</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="product_attributes">
                                <i class="icon-speedometer"></i><span class="hide-menu">Product Attributes</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="products">
                                <i class="icon-speedometer"></i><span class="hide-menu">Products</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="orders">
                                <i class="icon-speedometer"></i><span class="hide-menu">Orders</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="sell-queries">
                                <i class="icon-speedometer"></i><span class="hide-menu">Sell Queries</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="exchange-queries">
                                <i class="icon-speedometer"></i><span class="hide-menu">Exchange Queries</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">Global Web</li>
                       
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Global Web</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="sliders">Sliders</a></li>
                                <li><a href="stores">Stores</a></li>
                                <li><a href="articles">Articles</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-small-cap">User management</li>
                       
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Admin Panel Setting</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="admin_sections">Sections</a></li>
                                <li><a href="admin_roles">Roles</a></li>
                                <li><a href="admin_role_permissions">Permissions</a></li>
                                
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Product Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="modules">Modules</a></li>
                                <li><a href="sections">Sections</a></li>
                                <li><a href="roles">Roles</a></li>
                                <li><a href="roles">Permissions</a></li>
                                
                            </ul>
                        </li> -->

             </ul>
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!-- ============================================================== -->
 <!-- End Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
