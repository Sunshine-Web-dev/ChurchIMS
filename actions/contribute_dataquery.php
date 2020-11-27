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


	$transection_id = trim($_POST['transection_id']);
	$member_id		= trim($_POST['member_id']);
	$church_id		= trim($_POST['church_id']);
	$member_no 	= trim($_POST['member_no']);
	$collection_date 	= trim($_POST['collection_date']);
	$check_no		= trim($_POST['check_no']);
	//$created_date		= date('Y-m-d H:i:s');
    $currency_type = trim($_POST['currency_type']);
	$amount_category		= trim($_POST['amount_category']);
	$receiving_amount		= trim($_POST['receiving_amount']);
	$transection_note 	= trim($_POST['transection_note']);
	$transection_type 	= trim($_POST['transection_type']);
	$entry_date		= trim($_POST['entry_date']);
	$is_active 			= trim($_POST['is_active']);
	/**********************************************************/

	$objValidate->setArray($_POST);
	$objValidate->setCheckField("member_no", "Member # is a required field.", "S");
    $objValidate->setCheckField("collection_date", "Collection date is a required field.", "S");
    $objValidate->setCheckField("check_no", "Check # is a required field.", "S");
    $objValidate->setCheckField("currency_type", "Currency type is a required field.", "S");
    $objValidate->setCheckField("amount_category", "Fund category is a required field.", "S");
    $objValidate->setCheckField("transection_note", "Transection note is a required field.", "S");

	$vResult = $objValidate->doValidate();
	
	if(!$vResult){
		$tran_category_id = ($mode == "U") ? $_POST['tran_category_id'] : $objAdminUser->genCode("rs_tbl_transection_detail", "transection_id");
		$objChurch->setProperty("member_id", $member_id);
		$objChurch->setProperty("church_id", $church_id);
		$objChurch->setProperty("member_no", $member_no);
		$objChurch->setProperty("collection_date", $collection_date);
		$objChurch->setProperty("check_no", $check_no);
		$objChurch->setProperty("currency_type", $currency_type);		
		$objChurch->setProperty("amount_category", $amount_category);
		$objChurch->setProperty("receiving_amount", $receiving_amount);
		$objChurch->setProperty("transection_note", $transection_note);
		$objChurch->setProperty("transection_type", $transection_type);
		$objChurch->setProperty("entry_date", $entry_date);
		$objChurch->setProperty("is_active", 1);		
		if($objChurch->actTransectionCategory($mode)){
			
			if($mode == "U"){
				$objCommon->setMessage("Category Content updated successfully.", 'Info');
			} else {
				$objCommon->setMessage("Category Content added successfully.",'Info');
			}

			$link = Route::_('show=contributing');
			redirect($link);
		}
	}
	
	extract($_POST);
} 
else{
	if(isset($_GET['tcci']) && !empty($_GET['tcci']))
		$transection_id = $_GET['tcci'];
	else if(isset($_POST['transection_id']) && !empty($_POST['transection_id']))
		$transection_id = $_POST['transection_id'];
	if(isset($transection_id) && !empty($transection_id)){
		$objMember->setProperty("transection_id", DecData($transection_id));
		$objMember->lstTransectionDetail();
		$data = $objMember->dbFetchArray(1);
		$mode	= "U";
		extract($data);
	}
}
?>