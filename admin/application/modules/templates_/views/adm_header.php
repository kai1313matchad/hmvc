        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('dashboard')?>" class="site_title"><!-- <i class="fa fa-paw"></i> --><img src="<?php echo base_url()?>assets/frontend/images/icons/favicon.png" style="display: inline-block;"> <span>Match Adv</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url()?>assets/frontend/images/icons/defuser.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Administrator</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('dashboard')?>">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-newspaper-o"></i> Blog <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('blogpost')?>">Manage</a></li>
                      <li><a href="<?php echo base_url('blogpost/categories')?>">Categories</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sliders"></i> Customize <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('mainbanners');?>">Main Banner</a></li>
                      <li><a href="<?php echo base_url('storeid');?>">Store Identity</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-book"></i> Categories <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('categories/billboard');?>">Billboard</a></li>
                      <li><a href="<?php echo base_url('categories/province');?>">Province</a></li>
                      <li><a href="<?php echo base_url('categories/district');?>">District</a></li>
                      <li><a href="<?php echo base_url('categories/subdistrict');?>">Sub-district</a></li>
                      <li><a href="<?php echo base_url('categories/size');?>">Size</a></li>
                      <li><a href="<?php echo base_url('categories/construct');?>">Construction</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('users');?>">Manage</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cubes"></i> Products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('products');?>">Manage</a></li>
                      <li><a href="<?php echo base_url('auctions');?>">Auctions</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Clients <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('client');?>">Manage</a></li>
                      <li><a href="<?php echo base_url('client/master');?>">Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-wpforms"></i> Recovering <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('recovering'); ?>">Manage</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('Signin/logout')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url()?>assets/frontend/images/icons/defuser.png" alt="">Administrator
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <!-- <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li><a href="<?php echo base_url('signin/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url()?>assets/frontend/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url()?>assets/frontend/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url()?>assets/frontend/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo base_url()?>assets/frontend/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->