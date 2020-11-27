<?php
$mode	= "I";
$objAdminUser = new AdminUser;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	#Call Core Classes
	$objRoute 			= new Route;
	#Action Mode (I/U)
	$mode 				= trim($_POST['mode']);
	
	$nic_no				= trim($_POST['nic_no']);
	$card_number_id		= trim($_POST['card_number_id']);
	$first_name	 		= trim($_POST['first_name']);
	$last_name 			= trim($_POST['last_name']);
	$gender 			= trim($_POST['gender']);
	$phone_no 			= trim($_POST['phone_no']);
	$address 			= trim($_POST['address']);
	$email_address 		= trim($_POST['email_address']);
	$category_id 		= trim($_POST['category_id']);
	$company 			= trim($_POST['company']);
	$designation 		= trim($_POST['designation']);
	$visit_purpose 		= trim($_POST['visit_purpose']);
	$meet_to 			= trim($_POST['meet_to']);
	$department 		= trim($_POST['department']);
	$note 				= trim($_POST['note']);
	$user_id 			= $objCustomer->customer_id;
	$date_time	 		= date("Y-m-d H:i:s");
	$visitor_status		= 1;
	$arrival_date 		= date("Y-m-d");
	$arrival_time 		= date("H:i:s");
	$visitor_img		= trim($_POST["visitor_img"]);
	$entry_date			= date("Y-m-d");
	
	//$nic_no
	$CountCNICNO = strlen($nic_no);
	if($CountCNICNO > 13){
		
	}
	$VisitorImageFilePath = SITE_URL.'uploads/'.$visitor_img.'.jpg';
	$objValidate->setArray($_POST);
	if(!file_exists($VisitorImageFilePath)){
	//	die('Error');
	//$objValidate->setCheckField("vimg", REQ_VISITOR_IMG, "S");	
	}
	$objValidate->setCheckField("nic_no", REQ_VISITOR_CNIC, "I");
	$objValidate->setCheckField("department", 'Department is a required field.', "I");
	$objValidate->setCheckField("first_name", 'First Name is a required field.', "S");
	$objValidate->setCheckField("last_name", 'Last Name is a required field.', "S");
	$objValidate->setCheckField("card_number_id", 'Visitor Card Number is a required field.', "I");
	$vResult = $objValidate->doValidate();
	if(!$vResult){
		$visitor_id = $objAdminUser->genCode("rs_tbl_visitor", "visitor_id");
		$objVms->setProperty("visitor_id", $visitor_id);
		$objVms->setProperty("nic_no", $nic_no);
		$objVms->setProperty("card_number_id", $card_number_id);
		$objVms->setProperty("first_name", $first_name);
		$objVms->setProperty("last_name", $last_name);
		$objVms->setProperty("gender", $gender);
		$objVms->setProperty("phone_no", $phone_no);
		$objVms->setProperty("address", $address);
		$objVms->setProperty("email_address", $email_address);
		$objVms->setProperty("category_id", $category_id);
		$objVms->setProperty("company", $company);
		$objVms->setProperty("designation", $designation);
		$objVms->setProperty("visit_purpose", $visit_purpose);
		$objVms->setProperty("meet_to", $meet_to);
		$objVms->setProperty("department", $department);
		$objVms->setProperty("note", $note);
		$objVms->setProperty("user_id", $user_id);
		$objVms->setProperty("date_time", $date_time);
		$objVms->setProperty("visitor_status", $visitor_status);
		$objVms->setProperty("arrival_date", $arrival_date);
		$objVms->setProperty("arrival_time", $arrival_time);
		$objVms->setProperty("visitor_img", $visitor_img);
		$objVms->setProperty("entry_date", $entry_date);
		if($objVms->actVisitor($mode)){
			
			$objVisitorCard = new Vms;
			$objVisitorCard->setProperty("card_id", $card_number_id);
			$objVisitorCard->setProperty("card_status", 3);
			$objVisitorCard->actVisitorCard('U');
			
			if($mode == "U"){
				//$objCommon->setMessage(RES_CARD_UPDATED, 'Info');
			} else {
				//$objCommon->setMessage(RES_CARD_ADDED,'Info');
				$objCommon->setMessage($visitor_id,'WIN');
			}
			/*echo '
			<script type="text/javascript">
			window.open("http://javascript.info/")
			</script>
			';*/
			$link = Route::_('');
			redirect($link);
		}
	}
	extract($_POST);
}
else{
	$card_id = base64_decode($_GET['cid']);
	if(isset($card_id) && !empty($card_id)){
		$objVms->setProperty("card_id", $card_id);
		$objVms->lstVisitorCard();
		$data = $objVms->dbFetchArray(1);
		$mode	= "U";
		extract($data);
	}
}
?>