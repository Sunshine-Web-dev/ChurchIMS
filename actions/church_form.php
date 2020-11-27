<?php
$mode	= "I";
//$objProductAttributeStatus = new Product;
$objAdminUser = new AdminUser;
$objAdminUser_2 = new AdminUser;
$objChurch		= new Member;
$objChurchAdmin	= new Member;
$objChurchImg	= new Member;
$objChurchImgUp	= new Member;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	#Call Core Classes
	$objRoute 			= new Route;
	
	#Action Mode (I/U)
	$mode 				= trim($_POST['mode']);
	
	$church_id			= trim($_POST['church_id']);
	$church_name		= trim($_POST['church_name']);
	$church_address 	= trim($_POST['church_address']);
	$church_city 		= trim($_POST['church_city']);
	$church_state		= trim($_POST['church_state']);
	$church_country		= trim($_POST['church_country']);
	$church_p_number	= trim($_POST['church_p_number']);
	$church_m_number	= trim($_POST['church_m_number']);
	//$created_date		= date('Y-m-d H:i:s');
	$created_date		= date('Y-m-d');
	$is_active 			= trim($_POST['is_active']);
	/**********************************************************/
	$member_id			= trim($_POST['member_id']);
	$member_email		= trim($_POST['member_email']);
	$member_pass		= trim($_POST['member_pass']);
	$first_name			= trim($_POST['first_name']);
	$last_name			= trim($_POST['last_name']);
	$address			= trim($_POST['address']);
	$phone				= trim($_POST['phone']);
	$mobile				= trim($_POST['mobile']);
	$member_type		= 2;
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("church_name", "Church Name is a required field.", "S");
	if($mode == "I"){
	$objValidate->setCheckField("member_email", "Church Admin Email is a required field.", "E");
	}
	if($mode == "U" && $member_pass!=''){
	$objValidate->setCheckField("member_pass", "Church Admin Password is a required field.", "S");
	}
	$vResult = $objValidate->doValidate();
	
	if(!$vResult){
		$church_id = ($mode == "U") ? $_POST['church_id'] : $objAdminUser->genCode("rs_tbl_church", "church_id");
		$objChurch->setProperty("church_id", $church_id);
		$objChurch->setProperty("church_name", $church_name);
		$objChurch->setProperty("church_address", $church_address);
		$objChurch->setProperty("church_city", $church_city);
		$objChurch->setProperty("church_state", $church_state);
		$objChurch->setProperty("church_country", $church_country);
		$objChurch->setProperty("church_p_number", $church_p_number);
		$objChurch->setProperty("church_m_number", $church_m_number);
		$objChurch->setProperty("created_date", $created_date);
		$objChurch->setProperty("is_active", 1);		
		if($objChurch->actChurch($mode)){
		
		$church_member_id = ($mode == "U") ? $_POST['church_member_id'] : $objAdminUser->genCode("rs_tbl_member", "member_id");
		$objChurchAdmin->setProperty("member_id", $church_member_id);
		if($mode == "I"){
		$objChurchAdmin->setProperty("member_email", $member_email);
		}
		if($mode == "U" && $member_pass!=''){
		$objChurchAdmin->setProperty("member_pass", $objEncData->encrypt($member_pass, ENCRYPTION_KEY));
		} else {
		$objChurchAdmin->setProperty("member_pass", $objEncData->encrypt($member_pass, ENCRYPTION_KEY));
		}
		$objChurchAdmin->setProperty("first_name", $first_name);
		$objChurchAdmin->setProperty("last_name", $last_name);
		$objChurchAdmin->setProperty("address", $address);
		$objChurchAdmin->setProperty("phone", $phone);
		$objChurchAdmin->setProperty("mobile", $mobile);
		$objChurchAdmin->setProperty("reg_date", date('Y-m-d'));
		$objChurchAdmin->setProperty("member_type", 2);
		$objChurchAdmin->setProperty("is_active", 1);
		$objChurchAdmin->setProperty("login_permission", 1);
		$objChurchAdmin->setProperty("church_id", $church_id);
		$objChurchAdmin->actMember($mode);
		
		if(is_uploaded_file($_FILES['churchlogo']['tmp_name'])){		
		$image_type = $objChurchImg->getExtentionValidate($_FILES['churchlogo']['type'], $customer_id);
				
		if($image_type==1)
		{
		
		$image_name = $objChurchImg->getImagename($_FILES['churchlogo']['type'], $customer_id);
		
		// Upload the large image
		if(move_uploaded_file($_FILES['churchlogo']['tmp_name'], CHURCH_IMG_PATH . $image_name)){
					/*
					$uploadfilefolder = PROFILE_IMG_PATH . $image_name;
					$uploaddir= PROFILE_THUMB_PATH;
					$uploadfileth = PROFILE_THUMB_PATH . $image_name;
					copy($uploadfilefolder, $uploadfileth);
					$imageful=new Thumbnail($uploadfileth, 300, 100);
					$imageful->save($uploadfileth);	
					*/
			}
		
		$objChurchImgUp->setProperty("church_id", $church_id);
		$objChurchImgUp->setProperty("church_logo", $image_name);
		$objChurchImgUp->actChurch("U");
		}
		
		}
			
			if($mode == "U"){
				$objCommon->setMessage("Church Content updated successfully.", 'Info');
			} else {
				$objCommon->setMessage("Church Content added successfully.",'Info');
			}

			$link = Route::_('show=church');
			redirect($link);
		}
	}
	
	extract($_POST);
} 
else{
	if(isset($_GET['ci']) && !empty($_GET['ci']))
		$church_id = $_GET['ci'];
	else if(isset($_POST['church_id']) && !empty($_POST['church_id']))
		$church_id = $_POST['church_id'];
	if(isset($church_id) && !empty($church_id)){
		$objMember->setProperty("church_id", DecData($church_id));
		$objMember->lstChurch();
		$data = $objMember->dbFetchArray(1);
		$mode	= "U";
		extract($data);
		
		$objChurchUser = new Member;
		$objChurchUser->setProperty("church_id", DecData($_GET['ci']));
		$objChurchUser->lstMember();
		$ChurchUserDetail = $objChurchUser->dbFetchArray(1);
	}
}
?>