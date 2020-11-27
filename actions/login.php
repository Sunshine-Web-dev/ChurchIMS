<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
 	$adminlogin			= $_POST['member_email'];
 	$adminpassword		= $_POST['member_pass'];
//echo	 $objEncData->encrypt($adminpassword, ENCRYPTION_KEY);
	// die();
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("member_email", _VLD_INVALID_EMAIL, "S");
	$objValidate->setCheckField("member_pass", _VLD_PASSWORD, "S");
	$vResult = $objValidate->doValidate();
	
	// See if any error are not returned
	if(!$vResult){
		
		$objMember->setProperty("member_email", $adminlogin);
		
		$objMember->setProperty("member_pass", $objEncData->encrypt($adminpassword, ENCRYPTION_KEY));
		$objMember->checkMemberLogin();
		if($objMember->totalRecords() >= 1){
			$rows = $objMember->dbFetchArray(1);
			if($rows['is_active'] != 1){
				$vResult['invalid_login'] = _CUST_ACCOUNT_SUSPENDED;
			} elseif($rows['login_permission'] != 1){
				$vResult['invalid_login'] = _CUST_ACCOUNT_SUSPENDED;
			}
			else{
				//echo $rows['member_type'];
				//die();
				$objMemberNew = new Member;
				$objMemberNew->setProperty("member_id", $rows['member_id']);
				$objMemberNew->setProperty("member_email", $rows['member_email']);
				$objMemberNew->setProperty("login_time", date('Y-m-d H:i:s'));
				$objMemberNew->setProperty("fullname", $rows['fullname']);
				$objMemberNew->setProperty("first_name", $rows['first_name']);
				$objMemberNew->setProperty("member_type", $rows['member_type']);
				$objMemberNew->setLogin();
				
				$link = Route::_('');
				redirect($link);
			}
		}
		else{
		$vResult['invalid_login'] = _LOGIN_INVALID_LOGIN;
		}
	}
}