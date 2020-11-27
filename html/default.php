<?php 

$objCommon 		= new Common;

$objContent 	= new Content;

$objValidate 	= new Validate;

$objMember 		= new Member;

$objEncData		= new Crypt_Blowfish('CBC');

$objEncData->setKey(CIPHER_KEY);

//print_r($objMember);

//die();

$objMember->setProperty("member_id", $objMember->member_id);

$objMember->lstMember();

$MemberDetail = $objMember->dbFetchArray(1);

if($objMember->member_login && $objMember->member_id!=''){
/************************************************************************/

//  If Admin Login 

	if($objMember->member_type==1){

/************************************************************************/

/************************************************************************/

		include_once(INC_PATH . 'header.php');

		include_once(INC_PATH . 'admin_menu.php');

		include_once(INC_PATH . 'admin_left.php');

		// Main Inner Body

		if(!isset($_GET['show']) || empty($_GET['show']))

			include_once(HTML_PATH . 'admin_home.php');

		else{

			$inc_page = getPage($_GET['show']);

			include_once($inc_page);

		}

		// Footer

		include_once(INC_PATH . 'footer.php');

/************************************************************************/

/************************************************************************/

	} else {

//  If User Login 

/************************************************************************/

//	include_once(HTML_PATH . 'under_construction.php');



/******************************************************************/

		include_once(INC_PATH . 'header.php');

		include_once(INC_PATH . 'staff_menu.php');

		include_once(INC_PATH . 'staff_left.php');

		// Main Inner Body

		if(!isset($_GET['show']) || empty($_GET['show']))

			include_once(HTML_PATH . 'staff_home.php');

		else{

			$inc_page = getPage($_GET['show']);

			include_once($inc_page);

		}

		// Footer

		include_once(INC_PATH . 'footer.php');



















/************************************************************************/

/************************************************************************/

	}







} else {

	

	if($_GET['show']!=''){

		$link = Route::_('');

			redirect($link);

	} else {

	include_once(HTML_PATH . 'login.default.php');

	}

}

?>