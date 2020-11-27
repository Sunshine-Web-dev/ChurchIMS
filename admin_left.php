 <!-- ========== Left Sidebar Stsdart ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divid12er -->
                    <div id="sidebar-menu">
                        <ul>

                        	<li class="text-muted menu-title">Navigation</li>

                            <li>
                                <a href="<?php echo SITE_URL;?>" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> </a>
                            </li>

                            <li>
                                <a href="<?php echo Route::_('show=church');?>" class="waves-effect <?php if($_GET["show"]=='church' or $_GET["show"]=='addchurch' or $_GET["show"]=='cd'){ echo 'active'; } else { echo ''; }?>"><i class="ti-paint-bucket"></i> <span> Church Management </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-bar-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo Route::_('show=report&report_id=church');?>">Church Report</a></li>
                                    <!--<li><a href="<?php //echo Route::_('show=report&report_id=financemember');?>">Finance Member</a></li>-->
                                    <li><a href="<?php echo Route::_('show=report&report_id=contributmem');?>">Contribution Member</a></li>
                                    <li><a href="<?php echo Route::_('show=report&report_id=churchexpense');?>">Church Expense</a></li>
                                    <li><a href="<?php echo Route::_('show=report&report_id=staffmember');?>">Staff Member</a></li>
                                </ul>
                            </li>
                            
                            
                            
                            
                            <li>
                                <a href="<?php echo Route::_('show=changepwd');?>" class="waves-effect"><i class="ti-pencil-alt"></i> <span> Account Setting </span> </a>
                            </li>
                            
                             <li>
                                <a href="<?php echo Route::_('show=logout');?>" class="waves-effect"><i class="ti-lock"></i> <span> Logout </span> </a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->