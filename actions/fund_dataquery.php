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
	
	$church_id		= trim($_POST['church_id']);
	$member_id		= trim($_POST['member_id']);
	$member_id		= $_SESSION['member_id'];
	$category_name 	= trim($_POST['tran_category_name']);
	$transac_type 	= trim($_POST['tran_type']);
	$enter_date		= trim($_POST['entry_date']);
	//$created_date		= date('Y-m-d H:i:s');
	$created_date		= date('Y-m-d');
	$is_active 			= trim($_POST['is_active']);
	/**********************************************************/

	$objValidate->setArray($_POST);
	$objValidate->setCheckField("tran_category_name", "Category is a required field.", "S");
	$vResult = $objValidate->doValidate();
	
	if(!$vResult){
		$tran_category_id = ($mode == "U") ? DecData($_POST['tran_category_id']) : $objAdminUser->genCode("rs_tbl_transection_category", "tran_category_id");
		$objChurch->setProperty("tran_category_id", $tran_category_id);
		$objChurch->setProperty("church_id", $church_id);
		$objChurch->setProperty("member_id", $member_id);
		$objChurch->setProperty("tran_category_name", $category_name);
		$objChurch->setProperty("tran_type", $transac_type);
		$objChurch->setProperty("entry_date", $enter_date);
		$objChurch->setProperty("is_active", 1);		
		if($objChurch->actTransectionCategory($mode)){
			
			if($mode == "U"){
				$objCommon->setMessage("Fund Category Content updated successfully.", 'Info');
			} else {
				$objCommon->setMessage("Fund Category Content added successfully.",'Info');
			}

			$link = Route::_('show=expensecategory_list');
			redirect($link);
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
	if(isset($_GET['tci']) && !empty($_GET['tci']))
		$tran_category_id = $_GET['tci'];
	else if(isset($_POST['tran_category_id']) && !empty($_POST['tran_category_id']))
		$tran_category_id = $_POST['tran_category_id'];
	if(isset($tran_category_id) && !empty($tran_category_id)){
		$objGetDetail->setProperty("tran_category_id", DecData($tran_category_id));
		$objGetDetail->setProperty("member_id", $member_id);
		$objGetDetail->setProperty("church_id", $$ChurchUserDetail['church_id']);
		$objGetDetail->lstTransectionCategory();
	
		$data = $objGetDetail->dbFetchArray(1);
		//print_r($_POST[$tran_category_id]);
		//print_r($data);
		$mode	= "U";
		extract($data);
	}
}
?>