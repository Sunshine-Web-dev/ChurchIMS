<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
  <div class="sidebar-inner slimscrollleft"> 
    <!--- Divider -->
    <div id="sidebar-menu">
      <ul>
        <li class="text-muted menu-title">Navigation</li>
        <li> <a href="<?php echo SITE_URL;?>" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> </a> </li>
        <li> <a href="<?php echo Route::_('show=mycd');?>" class="waves-effect"><i class="ti-crown"></i> <span>My Church Overview </span> </a> </li>
        <li> <a href="<?php echo Route::_('show=contributing');?>" class="waves-effect" style="font-size:13px"><i class="ti-signal"></i> <span> Contribution Management </span> </a> </li>
        <li> <a href="<?php echo Route::_('show=expensing');?>" class="waves-effect"><i class="ti-paint-bucket"></i> <span> Expense Management </span> </a> </li>
        <li> <a href="<?php echo Route::_('show=contributemember');?>" class="waves-effect"><i class="ti-paint-bucket"></i> <span> Contribution Member </span> </a> </li>
        <li> <a href="<?php echo Route::_('show=staffmembering');?>" class="waves-effect"><i class="ti-paint-bucket"></i> <span> Staff Member </span> </a> </li>
        <li class="has_sub"> <a href="javascript:void(0);" class="waves-effect"><i class="ti-bar-chart"></i> <span> Categories / Types</span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
            <li><a href="<?php echo Route::_('show=contcatlist');?>">Contribution  Category</a></li>
            <li><a href="<?php echo Route::_('show=expcatlist');?>">Expense Category</a></li>
            <li><a href="<?php echo Route::_('show=staffcategory');?>">Staff Category</a></li>
            <li><a href="<?php echo Route::_('show=currencylist');?>">Currency Type</a></li>
          </ul>
        </li>
        <li class="has_sub"> <a href="javascript:void(0);" class="waves-effect"><i class="ti-bar-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled">
            <li><a href="<?php echo Route::_('show=report&report_id=staff');?>">Staff Member</a></li>
            <li><a href="<?php echo Route::_('show=report&report_id=allmember');?>">All Member</a></li>
            <li><a href="<?php echo Route::_('show=report&report_id=contributmem');?>">Contribution </a></li>
            <li><a href="<?php echo Route::_('show=report&report_id=churchexpense');?>">Expense</a></li>
          </ul>
        </li>
        <li> <a href="<?php echo Route::_('show=changepwd');?>" class="waves-effect"><i class="ti-pencil-alt"></i> <span> Setting </span> </a> </li>
        <li> <a href="<?php echo Route::_('show=logout');?>" class="waves-effect"><i class="ti-lock"></i> <span> Logout </span> </a> </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- Left Sidebar End -->