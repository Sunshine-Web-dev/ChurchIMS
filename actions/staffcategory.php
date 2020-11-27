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
	
	$member_category_id	= trim($_POST['member_category_id']);
	$category_name		= trim($_POST['category_name']);
	$church_id		 	= trim($_POST['church_id']);
	$member_id		 	= trim($_POST['member_id']);
	$entry_date			= date('Y-m-d H:i:s');
	$is_active 			= trim($_POST['is_active']);
	/**********************************************************/

	$objValidate->setArray($_POST);
	$objValidate->setCheckField("category_name", "Category Name is a required field.", "S");
	$vResult = $objValidate->doValidate();
	
	if(!$vResult){
		$member_category_id = ($mode == "U") ? DecData($_POST['member_category_id']) : $objAdminUser->genCode("rs_tbl_member_category", "member_category_id");
		$objChurch->setProperty("member_category_id", $member_category_id);
		$objChurch->setProperty("category_name", $category_name);
		$objChurch->setProperty("church_id", $church_id);
		$objChurch->setProperty("member_id", $member_id);
		$objChurch->setProperty("entry_date", $entry_date);
		$objChurch->setProperty("is_active", $is_active);		
		if($objChurch->actMemberCategory($mode)){
			
			if($mode == "U"){
				$objCommon->setMessage("Staff Category Content updated successfully.", 'Info');
			} else {
				$objCommon->setMessage("Staff Category Content added successfully.",'Info');
			}
						
			$link = Route::_('show=staffcategory');
			redirect($link);
		}
	}
	
	extract($_POST);
} 
else{
	if(isset($_GET['mci']) && !empty($_GET['mci']))
		$member_category_id = $_GET['mci'];
	else if(isset($_POST['member_category_id']) && !empty($_POST['member_category_id']))
		$member_category_id = $_POST['member_category_id'];
	if(isset($member_category_id) && !empty($member_category_id)){
		$objGetDetail = new Member;
		$objGetDetail->setProperty("member_category_id", DecData($member_category_id));
		$objGetDetail->lstMemberCategory();
		$data = $objGetDetail->dbFetchArray(1);
		$mode	= "U";
		extract($data);
	}
}
?>