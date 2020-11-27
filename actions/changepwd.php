<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$newpass		= trim($_POST['new_pass']);
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("new_pass", _CP_CURRENT_PWD . _IS_REQUIRED_FLD, "S");
	$objValidate->setCheckField("new_pass_2", _CP_NEW_PWD . _IS_REQUIRED_FLD, "S");
	$vResult = $objValidate->doValidate();
	
	// See if any error are not returned
	if(!$vResult){
		$objMember->setProperty("npassword", $objEncData->encrypt($newpass, ENCRYPTION_KEY));
		//$objMember->setProperty("npassword", $newpass);
		$objMember->setProperty("member_id", $objMember->member_id);
		if($objMember->changePassword()){
			$link = Route::_('show=logout');
			redirect($link);
		}
	}
}
