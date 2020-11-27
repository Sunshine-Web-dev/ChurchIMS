<?php
$mode	= "I";
$objAdminUser = new AdminUser;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	#Call Core Classes
	$objRoute 			= new Route;
	#Action Mode (I/U)
	$mode 				= trim($_POST['mode']);
	
	$employees_id			= trim($_POST['employees_id']);
	$employees_name			= trim($_POST['employees_name']);
	$employees_email		= trim($_POST['employees_email']);
	$employees_phone 		= trim($_POST['employees_phone']);
	$employees_address 		= trim($_POST['employees_address']);
	$employees_department 	= trim($_POST['employees_department']);
	$employees_date 		= date('Y-m-d');
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("employees_name", REQ_EMPLOYEE_NAME, "S");
	$objValidate->setCheckField("employees_email", REQ_EMPLOYEE_EMAIL, "S");
	$vResult = $objValidate->doValidate();

	if(!$vResult){
		$employees_id = ($mode == "U") ? $_POST['employees_id'] : $objAdminUser->genCode("rs_tbl_employees", "employees_id");
		$objVms->setProperty("employees_id", $employees_id);
		$objVms->setProperty("employees_name", $employees_name);
		$objVms->setProperty("employees_email", $employees_email);
		$objVms->setProperty("employees_phone", $employees_phone);
		$objVms->setProperty("employees_address", $employees_address);
		$objVms->setProperty("employees_department", $employees_department);
		$objVms->setProperty("employees_date", $employees_date);
		if($objVms->actEmployee($mode)){
			
			if($mode == "U"){
				//$objCommon->setMessage(RES_EMPLOYEE_UPDATED, 'Info');
			} else {
				//$objCommon->setMessage(RES_EMPLOYEE_ADDED,'Info');
			}

			$link = Route::_('show=employees');
			redirect($link);
		}
	}
	extract($_POST);
}
else{
	$employees_id = base64_decode($_GET['eid']);
	if(isset($employees_id) && !empty($employees_id)){
		$objVms->setProperty("employees_id", $employees_id);
		$objVms->lstEmployee();
		$data = $objVms->dbFetchArray(1);
		$mode	= "U";
		extract($data);
	}
}
?>