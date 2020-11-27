<?php
$mode	= "I";
//$objProductAttributeStatus = new Product;
$objAdminUser = new AdminUser;
$objAdminUser_2 = new AdminUser;
$objChurch		= new Member;
$objChurchAdmin	= new Member;
/*$objChurchImg	= new Member;
$objChurchImgUp	= new Member;*/
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	#Call Core Classes
	$objRoute 			= new Route;
	
	#Action Mode (I/U)
	$mode 				= trim($_POST['mode']);
	
	$currency_type_id	= trim($_POST['currency_type_id']);
	$currency_name		= trim($_POST['currency_name']);
	$currency_symbl 	= trim($_POST['currency_symbl']);
	$church_id		 	= trim($_POST['church_id']);
	$member_id		 	= trim($_POST['member_id']);
	$entry_date			= date('Y-m-d H:i:s');
	$is_active 			= trim($_POST['is_active']);
	/**********************************************************/

	$objValidate->setArray($_POST);
	$objValidate->setCheckField("currency_name", "Currency Name is a required field.", "S");
	$objValidate->setCheckField("currency_symbl", "Currency Symbl is a required field.", "S");
	$vResult = $objValidate->doValidate();
	
	if(!$vResult){
		$currency_type_id = ($mode == "U") ? DecData($_POST['currency_type_id']) : $objAdminUser->genCode("rs_tbl_currency", "currency_type_id");
		$objChurch->setProperty("currency_type_id", $currency_type_id);
		$objChurch->setProperty("currency_name", $currency_name);
		$objChurch->setProperty("currency_symbl", $currency_symbl);
		$objChurch->setProperty("church_id", $church_id);
		$objChurch->setProperty("member_id", $member_id);
		$objChurch->setProperty("entry_date", $entry_date);
		$objChurch->setProperty("is_active", $is_active);		
		if($objChurch->actChurchCurrency($mode)){
			
			if($mode == "U"){
				$objCommon->setMessage("Currency Content updated successfully.", 'Info');
			} else {
				$objCommon->setMessage("Currency Content added successfully.",'Info');
			}
						
			$link = Route::_('show=currencylist');
			redirect($link);
		}
	}
	
	extract($_POST);
} 
else{
	if(isset($_GET['cti']) && !empty($_GET['cti']))
		$currency_type_id = $_GET['cti'];
	else if(isset($_POST['currency_type_id']) && !empty($_POST['currency_type_id']))
		$currency_type_id = $_POST['currency_type_id'];
	if(isset($currency_type_id) && !empty($currency_type_id)){
		$objGetDetail = new Member;
		$objGetDetail->setProperty("currency_type_id", DecData($currency_type_id));
		$objGetDetail->lstCurrency();
		$data = $objGetDetail->dbFetchArray(1);
		$mode	= "U";
		extract($data);
	}
}
?>