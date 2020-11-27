<?php
$mode	= "I";
$objAdminUser = new AdminUser;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	#Call Core Classes
	$objRoute 			= new Route;
	#Action Mode (I/U)
	$mode 				= trim($_POST['mode']);
	
	$department_id		= trim($_POST['department_id']);
	$department_name	= trim($_POST['department_name']);
	$department_detail	= trim($_POST['department_detail']);
	$floor_no 			= trim($_POST['floor_no']);
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("department_name", REQ_DEPT_NAME, "S");
	$objValidate->setCheckField("floor_no", REQ_DEPT_FLOOR, "S");
	$vResult = $objValidate->doValidate();

	if(!$vResult){
		$department_id = ($mode == "U") ? $_POST['department_id'] : $objAdminUser->genCode("rs_tbl_department", "department_id");
		$objVms->setProperty("department_id", $department_id);
		$objVms->setProperty("department_name", $department_name);
		$objVms->setProperty("department_detail", $department_detail);
		$objVms->setProperty("floor_no", $floor_no);
		if($objVms->actDepartment($mode)){
			
			if($mode == "U"){
				$objCommon->setMessage(RES_DEPT_UPDATED, 'Info');
			} else {
				$objCommon->setMessage(RES_DEPT_ADDED,'Info');
			}

			$link = Route::_('show=department');
			redirect($link);
		}
	}
	extract($_POST);
}
else{
	$department_id = base64_decode($_GET['did']);
	if(isset($department_id) && !empty($department_id)){
		$objVms->setProperty("department_id", $department_id);
		$objVms->lstDepartment();
		$data = $objVms->dbFetchArray(1);
		$mode	= "U";
		extract($data);
	}
}
?>