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


	$transection_id 	= trim($_POST['transection_id']);
	$member_id			= trim($_POST['member_id']);
	$church_id			= trim($_POST['church_id']);
	$member_no 			= trim($_POST['member_no']);
	$collection_date 	= trim($_POST['collection_date']);
	$check_no			= trim($_POST['check_no']);
    $currency_type 		= trim($_POST['currency_type']);
	$amount_category	= trim($_POST['amount_category']);
	$receiving_amount	= trim($_POST['receiving_amount']);
	$transection_note 	= trim($_POST['transection_note']);
	$transection_type 	= trim($_POST['transection_type']);
	$entry_date			= date('Y-m-d');
	$is_active 			= trim($_POST['is_active']);
	/**********************************************************/
	list($MonthGt,$DayGt,$YearGT)=explode('/', $collection_date);
	$RtCollectionDate = $YearGT.'-'.$MonthGt.'-'.$DayGt;
	$objValidate->setArray($_POST);
	//$objValidate->setCheckField("member_no", "Member # is a required field.", "S");
    $objValidate->setCheckField("collection_date", "Collection date is a required field.", "S");
	$vResult = $objValidate->doValidate();
	
	if(!$vResult){
		$transection_id = ($mode == "U") ? DecData($_POST['transection_id']) : $objAdminUser->genCode("rs_tbl_transection_detail", "transection_id");
		$objChurch->setProperty("transection_id", $transection_id);
		$objChurch->setProperty("member_id", $member_id);
		$objChurch->setProperty("church_id", $church_id);
		$objChurch->setProperty("member_no", $member_no);
		$objChurch->setProperty("collection_date", $RtCollectionDate);
		$objChurch->setProperty("check_no", $check_no);
		$objChurch->setProperty("currency_type", $currency_type);		
		$objChurch->setProperty("amount_category", $amount_category);
		$objChurch->setProperty("receiving_amount", $receiving_amount);
		$objChurch->setProperty("transection_note", $transection_note);
		$objChurch->setProperty("transection_type", $transection_type);
		$objChurch->setProperty("entry_date", $entry_date);
		$objChurch->setProperty("is_active", $is_active);		
		if($objChurch->actTransectionDetail($mode)){
			if($transection_type==1){
			if($mode == "U"){
				$objCommon->setMessage("Contribution Content updated successfully.", 'Info');
			} else {
				$objCommon->setMessage("Contribution Content added successfully.",'Info');
			}

			$link = Route::_('show=contributing');
			redirect($link);
			} else {
			if($mode == "U"){
				$objCommon->setMessage("Expense Content updated successfully.", 'Info');
			} else {
				$objCommon->setMessage("Expense Content added successfully.",'Info');
			}

			$link = Route::_('show=expensing');
			redirect($link);
			}
		}
	}
	
	extract($_POST);
} 
else{
	
	    $objChurchUser = new Member;
		$objChurchUser->setProperty("church_id", DecData($_GET['ci']));
		$objChurchUser->lstMember();
		$ChurchUserDetail = $objChurchUser->dbFetchArray(1);
		
		$objGetDetail = new Member;	
	if(isset($_GET['ti']) && !empty($_GET['ti']))
		$transection_id = $_GET['ti'];
	else if(isset($_POST['transection_id']) && !empty($_POST['transection_id']))
		$transection_id = $_POST['transection_id'];
	if(isset($transection_id) && !empty($transection_id)){
		$objGetDetail->setProperty("transection_id", DecData($transection_id));
	    $objGetDetail->setProperty("member_id", $member_id);
		$objGetDetail->setProperty("church_id", $$ChurchUserDetail['church_id']);
		$objGetDetail->lstTransectionDetail();
		$data = $objGetDetail->dbFetchArray(1);
		$mode	= "U";
		extract($data);
	}
}
?>