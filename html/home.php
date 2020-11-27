<?php
$objVmsCounter = new Vms;
$objVmsCounter->setProperty("user_id", $objCustomer->customer_id);
$objVmsCounter->lstReceiptSetting();
$SettingRecord = $objVmsCounter->dbFetchArray(1);

$GetINVisitorID = $objCommon->LoadWindows(); 
if($GetINVisitorID!='' && $SettingRecord["print_status"]==1){ ?>
<script type="text/javascript">
window.open("<?php echo SITE_URL.'print.php?in='.base64_encode($GetINVisitorID);?>");
</script>
<?php } ?>	
<script type="text/javascript">
function updateClock ( )
    {
    var currentTime = new Date ( );
    var currentHours = currentTime.getHours ( );
    var currentMinutes = currentTime.getMinutes ( );
    var currentSeconds = currentTime.getSeconds ( );
 
    // Pad the minutes and seconds with leading zeros, if required
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
 
    // Choose either "AM" or "PM" as appropriate
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
 
    // Convert the hours component to 12-hour format if needed
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
 
    // Convert an hours component of "0" to "12"
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;
 
    // Compose the string for display
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
     
     
    $("#clock").html(currentTimeString);
         
 }
 
$(document).ready(function()
{
   setInterval('updateClock()', 1000);
});
</script>	

            <!-- Right (content) side -->
			<div class="content-block" role="main">
			
				<div class="row">
					
					<!-- Data block -->
					<article class="span6 data-block">
						<div class="data-container">
							<header>
								<h2>In Visitors &nbsp; - &nbsp; <span id="clock"></span><?php //echo date('d-m-Y h:i');?></h2>
                                <ul class="data-header-actions">
									<li>
										<a class="btn btn-alt btn-inverse" href="<?php echo Route::_('show=in&inid='.date('hisdm'));?>">IN</a>
									</li>
								</ul>
							</header>
							<section>

                                <div class="tab-pane" id="dynamic">
								
									
									<table class="datatable table table-striped table-bordered table-hover" id="example-2">
										<thead>
											<tr>
												<th>Name</th>
												<th>InTime</th>
												<th>Department / Floor</th>
												<th>CNIC</th>
												<th>Visitor Card #</th>
                                                <th>OUT</th>
											</tr>
										</thead>
										<tbody>
					<?php
					$objVmsDepartment = new Vms;
					$objVisitorCard = new Vms;
					$objVms->setProperty("ORDERBY", "arrival_time DESC");
                    $objVms->setProperty("visitor_status", 1);
                    $objVms->lstVisitor();
                    while($InVisitor = $objVms->dbFetchArray(1)){
					list($InHour,$InMint,$InSec)= explode(':', $InVisitor["arrival_time"]);
					
					$objVmsDepartment->setProperty("department_id", $InVisitor["department"]);
                    $objVmsDepartment->lstDepartment();
                    $MeetDepartment = $objVmsDepartment->dbFetchArray(1);
					
					$objVisitorCard->setProperty("card_id", $InVisitor["card_number_id"]);
                    $objVisitorCard->lstVisitorCard();
                    $VisitorCardIssue = $objVisitorCard->dbFetchArray(1);
                    ?>
											<tr class="odd gradeX">
												<td><a href="<?php echo Route::_('show=vview&vvid='.base64_encode($InVisitor["visitor_id"]));?>"><?php echo $InVisitor["first_name"].' '.$InVisitor["last_name"];?></a></td>
												<td><?php echo date("g:i A", STRTOTIME($InHour.':'.$InMint));?></td>
												<td><?php echo $MeetDepartment["floor_no"].' - '.$MeetDepartment["department_name"];?></td>
												<td><?php echo $InVisitor["nic_no"];?></td>
												<td><?php echo $VisitorCardIssue["card_number"];?></td>
                                                <td><a href="<?php echo Route::_('show=out&oid='.base64_encode($InVisitor["visitor_id"]));?>">OUT</a></td>
											</tr>
					<?php } ?>
										</tbody>
									</table>
								</div>
							</section>
						</div>
					</article>
					<!-- /Data block -->

				</div>
                
				<!-- Grid row -->
				
				<!-- /Grid row -->
				<!-- Grid row -->
				
				<!-- /Grid row -->

				
			</div>
			<!-- /Right (content) side -->
			
		</section>
		<!-- /Main page container -->