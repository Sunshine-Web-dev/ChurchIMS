		<!-- Main page container -->
		<section class="container" role="main">
		
			<!-- Left (navigation) side -->
			<div class="navigation-block">
			
				<!-- Main navigation -->
				<nav class="main-navigation" role="navigation">
					<ul>
						<li<?php if($_GET["show"]==''){ echo ' class="current"'; } else { echo '';}?>>
                        <a href="<?php echo SITE_URL;?>" class="no-submenu">
                        <span class="awe-home"></span>Dashboard</a></li>
                        
						<li<?php if($_GET["show"]=='card'){ echo ' class="current"'; } else { echo '';}?>><a href="<?php echo Route::_('show=card');?>" class="no-submenu">
                        <span class="awe-tasks"></span>Visitor Card</a></li>
						
                        <li<?php if($_GET["show"]=='department'){ echo ' class="current"'; } else { echo '';}?>><a href="<?php echo Route::_('show=department');?>" class="no-submenu">
                        <span class="awe-tasks"></span>Department</a></li>
                        
						<li<?php if($_GET["show"]=='visitorcategory'){ echo ' class="current"'; } else { echo '';}?>><a href="<?php echo Route::_('show=visitorcategory');?>" class="no-submenu">
                        <span class="awe-tasks"></span>Visitor Category</a></li>
                        
                        <!--<li<?php if($_GET["show"]=='employees'){ echo ' class="current"'; } else { echo '';}?>><a href="<?php echo Route::_('show=employees');?>" class="no-submenu">
                        <span class="awe-table"></span>Employees</a></li>-->
                        
                        <li<?php if($_GET["show"]=='report'){ echo ' class="current"'; } else { echo '';}?>><a href="<?php echo Route::_('show=report');?>" class="no-submenu">
                        <span class="awe-table"></span>In/Out Report</a></li>
                        
                        <li<?php if($_GET["show"]=='visitor_report'){ echo ' class="current"'; } else { echo '';}?>><a href="<?php echo Route::_('show=visitor_report');?>" class="no-submenu">
                        <span class="awe-table"></span>Visitor Report</a></li>
                        
                        <li<?php if($_GET["show"]=='setting'){ echo ' class="current"'; } else { echo '';}?>><a href="<?php echo Route::_('show=setting');?>" class="no-submenu">
                        <span class="awe-table"></span>Receipt On/Off</a></li>
                        
                        
                       <li<?php if($_GET["show"]=='changepwd'){ echo ' class="current"'; } else { echo '';}?>><a href="<?php echo Route::_('show=changepwd');?>" class="no-submenu">
                        <span class="awe-table"></span>Change Password</a></li>
                        
                        <li><a href="<?php echo Route::_('show=logout');?>" class="no-submenu">
                        <span class="awe-table"></span>Logout</a></li>
                        
					</ul>
				</nav>
				<!-- /Main navigation -->
				
				<!-- Sample side note -->
				<!--<section class="side-note">
					<div class="side-note-container">
						<h2>Sample Side Note</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis erat dui, quis purus.</p>
					</div>
					<div class="side-note-bottom"></div>
				</section>-->
				<!-- /Sample side note -->
				
			</div>
			<!-- Left (navigation) side -->