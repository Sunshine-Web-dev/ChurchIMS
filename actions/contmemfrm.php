<?php
$mode = "I";
//$objProductAttributeStatus = new Product;
$objAdminUser 		= new AdminUser;
$objChurch    		= new Member;
$objChurchAdmin 	= new Member;
$objMemborNumber 	= new Member;

if($_SERVER['REQUEST_METHOD'] == "POST"){
  
  #Call Core Classes
  $objRoute       = new Route;  
  #Action Mode (I/U)
  $mode         = trim($_POST['mode']);

  $member_id 		= trim($_POST['member_id']);
  $member_email    	= trim($_POST['member_email']);
  $member_pass    	= trim($_POST['member_pass']);
  $first_name  		= trim($_POST['first_name']);
  $last_name  		= trim($_POST['last_name']);
  $address 			= trim($_POST['address']);
  $city   			= trim($_POST['city']);
  $state   			= trim($_POST['state']);
  $zip_code   		= trim($_POST['zip_code']);
  $country   		= trim($_POST['country']);
  $phone   			= trim($_POST['phone']);
  $mobile      		= trim($_POST['mobile']);
  $reg_date   		= date('Y-m-d H:i:s');
  $is_active  		= trim($_POST['is_active']);
  $member_type  	= 4;
  $login_permission = 2;
  $church_id  		= trim($_POST['church_id']);
  $member_no		= trim($_POST["member_no"]);
  /**********************************************************/

	$objValidate->setArray($_POST);
	$objValidate->setCheckField("member_no", "Member No is a required field.", "S");
	$objValidate->setCheckField("first_name", "Name is a required field.", "S");
	$objValidate->setCheckField("last_name", "Name is a required field.", "S");
 	
	$objMemborNumber->setProperty("member_no", $member_no);

	if($objMemborNumber->checkMemberNo($member_type,$church_id)){
	   
	$objValidate->setCheckField("member_no_c", "Member No already in use.", "S");
	}
	
  $vResult = $objValidate->doValidate();
  
  if(!$vResult){
    $member_id = ($mode == "U") ? $_POST['member_id'] : $objAdminUser->genCode("rs_tbl_member", "member_id");
    $objChurch->setProperty("member_id", $member_id);
    $objChurch->setProperty("member_email", $member_email);
    $objChurch->setProperty("member_pass", $member_pass);
    $objChurch->setProperty("first_name", $first_name);
    $objChurch->setProperty("last_name", $last_name);
    $objChurch->setProperty("address", $address);
    $objChurch->setProperty("city", $city);
    $objChurch->setProperty("state", $state);
    $objChurch->setProperty("country", $country);
    $objChurch->setProperty("phone", $phone);
	$objChurch->setProperty("mobile", $mobile);
    $objChurch->setProperty("reg_date", $reg_date);
    $objChurch->setProperty("member_type", $member_type);
	$objChurch->setProperty("login_permission", $login_permission);
	$objChurch->setProperty("church_id", $church_id);
	$objChurch->setProperty("is_active", $is_active);
	$objChurch->setProperty("member_no", $member_no);
    if($objChurch->actMember($mode)){
      
      if($mode == "U"){
        $objCommon->setMessage("Contribute member data updated successfully.", 'Info');
      } else {
        $objCommon->setMessage("Contribute member data added successfully.",'Info');
      }

      $link = Route::_('show=contributemember');
      redirect($link);
    }
  }
  
  extract($_POST);
} 
else{
  if(isset($_GET['mci']) && !empty($_GET['mci']))
    $member_id = $_GET['mci'];
  else if(isset($_POST['member_id']) && !empty($_POST['member_id']))
    $member_id = $_POST['member_id'];
  if(isset($member_id) && !empty($member_id)){
    $objMember->setProperty("member_id", DecData($member_id));
    $objMember->lstMember();
    $data = $objMember->dbFetchArray(1);
    $mode = "U";
    extract($data);
  }
}
?>