<?php
$objAdminUser = new AdminUser;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	#Call Core Classes
	$objRoute 			= new Route;
	#Action Mode (I/U)
	$mode 				= trim($_POST['mode']);
	
	$visitor_id			= trim($_POST['visitor_id']);
	$card_number_id		= trim($_POST['card_number_id']);
	$departure_date 	= date("Y-m-d");
	$departure_time 	= date("H:i:s");
	
		$objVms->setProperty("visitor_id", $visitor_id);
		$objVms->setProperty("card_number_id", $card_number_id);
		$objVms->setProperty("visitor_status", 2);
		$objVms->setProperty("departure_date", $departure_date);
		$objVms->setProperty("departure_time", $departure_time);
		if($objVms->actVisitor('U')){
			
			$objVisitorCard = new Vms;
			$objVisitorCard->setProperty("card_id", $card_number_id);
			$objVisitorCard->setProperty("card_status", 1);
			$objVisitorCard->actVisitorCard('U');
			
			if($mode == "U"){
				//$objCommon->setMessage(RES_CARD_UPDATED, 'Info');
			} else {
				//$objCommon->setMessage(RES_CARD_ADDED,'Info');
			}

			$link = Route::_('');
			redirect($link);
		}
	extract($_POST);
}
?>