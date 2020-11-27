<?php
$mode	= "I";
$objAdminUser = new AdminUser;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	#Call Core Classes
	$objRoute 			= new Route;
	#Action Mode (I/U)
	$mode 				= trim($_POST['mode']);
	
	$vcat_id			= trim($_POST['vcat_id']);
	$vcat_name			= trim($_POST['vcat_name']);
	$vcat_status		= trim($_POST['vcat_status']);
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("vcat_name", REQ_VCARD_NAME, "S");
	$vResult = $objValidate->doValidate();

	if(!$vResult){
		$vcat_id = ($mode == "U") ? $_POST['vcat_id'] : $objAdminUser->genCode("rs_tbl_visitor_category", "vcat_id");
		$objVms->setProperty("vcat_id", $vcat_id);
		$objVms->setProperty("vcat_name", $vcat_name);
		$objVms->setProperty("vcat_status", $vcat_status);
		if($objVms->actVisitorCategory($mode)){
			
			if($mode == "U"){
				$objCommon->setMessage(RES_DEPT_UPDATED, 'Info');
			} else {
				$objCommon->setMessage(RES_DEPT_ADDED,'Info');
			}

			$link = Route::_('show=visitorcategory');
			redirect($link);
		}
	}
	extract($_POST);
}
else{
	$vcat_id = base64_decode($_GET['vcid']);
	if(isset($vcat_id) && !empty($vcat_id)){
		$objVms->setProperty("vcat_id", $vcat_id);
		$objVms->lstVisitorCategory();
		$data = $objVms->dbFetchArray(1);
		$mode	= "U";
		extract($data);
	}
}
?>