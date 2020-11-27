<?php $GetContentRecord = $objContent->getContent($_GET['content']);?>
<!-- BEGIN .main-navigation -->
			<section class="main-navigation clearfix">
				<nav>
					<div class="navigation">
						<a href="<?php echo SITE_URL;?>">Home</a>
						<a href="javascript:void(0);"><?php echo $GetContentRecord["cms_title"];?></a>
					</div>
					<div class="title">
						<?php echo $GetContentRecord["cms_title"];?>
					</div>
				</nav>
			<!-- END .main-navigation -->
			</section>
			
			<!-- BEGIN .main-content-wrapper -->
			<section class="main-content-wrapper clearfix">
				
				<!-- BEGIN .single-full-width -->
				<section class="single-full-width clearfix">
					
					<p><?php echo $GetContentRecord["cms_details"];?></p>
					
				<!-- END .single-full-width -->
				</section>

			<!-- END .main-content-wrapper -->
			</section>
			
			<!-- BEGIN .main-footer-wrapper -->