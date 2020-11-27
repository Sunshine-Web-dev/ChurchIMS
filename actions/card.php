<?php
$mode	= "I";
$objAdminUser = new AdminUser;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	#Call Core Classes
	$objRoute 			= new Route;
	#Action Mode (I/U)
	$mode 				= trim($_POST['mode']);
	
	$card_id			= trim($_POST['card_id']);
	$card_number		= trim($_POST['card_number']);
	$card_note	 		= trim($_POST['card_note']);
	$card_status 		= trim($_POST['card_status']);
	$department_id		= trim($_POST["department_id"]);
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("card_number", REQ_CARD_NUMBER, "I");
	$objValidate->setCheckField("department_id", REQ_CARD_DEPARTMENT, "S");
	$vResult = $objValidate->doValidate();
	//echo $card_note;
	//die();
	if(!$vResult){
		$card_id = ($mode == "U") ? $_POST['card_id'] : $objAdminUser->genCode("rs_tbl_card_number", "card_id");
		$objVms->setProperty("card_id", $card_id);
		$objVms->setProperty("card_number", $card_number);
		$objVms->setProperty("card_note", $card_note);
		$objVms->setProperty("card_status", $card_status);
		$objVms->setProperty("department_id", $department_id);
		if($objVms->actVisitorCard($mode)){
			
			if($mode == "U"){
				$objCommon->setMessage(RES_CARD_UPDATED, 'Info');
			} else {
				$objCommon->setMessage(RES_CARD_ADDED,'Info');
			}

			$link = Route::_('show=card');
			redirect($link);
		}
	}
	extract($_POST);
}
else{
	$card_id = base64_decode($_GET['cid']);
	if(isset($card_id) && !empty($card_id)){
		$objVms->setProperty("card_id", $card_id);
		$objVms->lstVisitorCard();
		$data = $objVms->dbFetchArray(1);
		$mode	= "U";
		extract($data);
	}
}
?>