<?php
$objAdminUser = new AdminUser;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	#Call Core Classes
	$objRoute 			= new Route;
	#Action Mode (I/U)
	$mode 				= trim($_POST['mode']);
	$admin_id			= trim($_POST['admin_id']);
	$mode				= trim($_POST['mode']);
	$print_status 		= trim($_POST['print_status']);
	
	$objValidate->setArray($_POST);
	$vResult = $objValidate->doValidate();
	//echo $card_note;
	//die();
	if(!$vResult){
		if($mode == "I"){
		$setting_id = $objAdminUser->genCode("rs_tbl_setting", "setting_id");	
		$objVms->setProperty("setting_id", $setting_id);
		}
		$objVms->setProperty("print_status", $print_status);
		$objVms->setProperty("user_id", $admin_id);
		if($objVms->actReceiptSetting($mode)){
			
			$objCommon->setMessage("Status updated successfully.", 'Info');

			$link = Route::_('show=setting');
			redirect($link);
		}
	}
	extract($_POST);
}
$objVmsCounter = new Vms;
$objVmsCounter->setProperty("user_id", $objCustomer->customer_id);
$objVmsCounter->lstReceiptSetting();
$SettingRecord = $objVmsCounter->dbFetchArray(1);
$CountRecord = $objVmsCounter->totalRecords();
if($CountRecord>=1){
	$ModeStatus = 'U';
} else {
	$ModeStatus = 'I';
}