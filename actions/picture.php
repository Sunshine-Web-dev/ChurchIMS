<?php
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
if($_REQUEST['SavePicBtn']){
		
	$email				= trim($_POST['email']);
	$username			= trim($_POST['username']);
	$first_name			= trim($_POST['first_name']);
	$last_name			= trim($_POST['last_name']);
	$address			= trim($_POST['address']);
	$city				= trim($_POST['city']);
	$state				= trim($_POST['state']);
	$zip_code			= trim($_POST['zip_code']);
	$country			= trim($_POST['country']);
	$day_phone			= trim($_POST['day_phone']);
	$mobile				= trim($_POST['mobile']);
	$profile_img		= trim($_POST['profile_img']);
	$twitter_username	= trim($_POST['twitter_username']);
	$day_id				= trim($_POST['day_id']);
	$month_id			= trim($_POST['month_id']);
	$year_id			= trim($_POST['year_id']);
	$dob				= $year_id .'-'. $month_id .'-'. $day_id;
	$user_id			= trim($_POST['user_id']);
	$tf_id				= trim($_POST['tf_id']);

	
	$objValidate->setArray($_POST);
	
	if(!is_uploaded_file($_FILES['pro_imgae']['tmp_name'])){
		$vResult['pro_imgae'] = 'Please upload () images.';
		$link = Route::_('show=picture&saved=3');
		redirect($link);
		exit;
	}
	$GetPictureExten = $objLeagues->getExtention($_FILES['pro_imgae']['type']);
	if($GetPictureExten==''){
	$link = Route::_('show=picture&saved=4');
	redirect($link);
	exit;
	}
	
	//$objValidate->setCheckField("pro_imgae", 'Please upload () images.', "S");
	//$objValidate->setCheckField("last_name", _REG_LAST_NAME . _IS_REQUIRED_FLD, "S");
	$vResult = $objValidate->doValidate();
	
		if($dob==''){
			$DateOfBirth = '';	
		} else {
			$DateOfBirth = $dob;
		}
	
	# See if any error are not returned
	if(!$vResult){
		# Check whether the email address already exists/registered
			$full_name = $first_name . " " . $last_name;
			# Register the customer.

			if(is_uploaded_file($_FILES['pro_imgae']['tmp_name'])){
				include("classes/thumbnail.class.php");
			$image_name = $objLeagues->getImagename($_FILES['pro_imgae']['type'], $team_id);
			if(move_uploaded_file($_FILES['pro_imgae']['tmp_name'], USER_PROFILE_PATH . $image_name)){
			$uploadfilefolder = USER_PROFILE_PATH . $image_name;
			$uploaddir= USER_PROFILE_THUMB_PATH;
			$uploadfileth = USER_PROFILE_THUMB_PATH . $image_name;
			copy($uploadfilefolder, $uploadfileth);
			$imageful = new Thumbnail($uploadfileth, 165, 0, 100);
			$imageful->save($uploadfileth);						
			}
			$objCustomer->setProperty("profile_img", $image_name);
			}
			$objCustomer->setProperty("user_id", $user_id);
			
			
			if($objCustomer->actCustomer("U")){
							
				$link = Route::_('show=picture&saved=1');
				redirect($link);

			}
		}
	}
	
	
	
	
	
	
if($_REQUEST['SaveBioInfoBtn']){
		
	$user_id			= trim($_POST['user_id']);
	$website_url		= trim($_POST['website_url']);
	$bio_info			= trim($_POST['bio_info']);

	
	$objValidate->setArray($_POST);
	//$objValidate->setCheckField("first_name", _REG_FIRST_NAME . _IS_REQUIRED_FLD, "S");
	//$objValidate->setCheckField("last_name", _REG_LAST_NAME . _IS_REQUIRED_FLD, "S");
	$vResult = $objValidate->doValidate();
	
	# See if any error are not returned
	if(!$vResult){
		# Check whether the email address already exists/registered

			$objCustomer->setProperty("website_url", $website_url);
			$objCustomer->setProperty("bio_info", $bio_info);
			$objCustomer->setProperty("user_id", $user_id);
			if($objCustomer->actCustomer("U")){
							
				$link = Route::_('show=picture&saved=2');
				redirect($link);

			}
		}
	}
	
if($_REQUEST['UpdateNotification']){

$user_id			= trim($_POST['user_id']);
$DirectMsg			= trim($_POST['direct_msg_notification']);
$followerMsg		= trim($_POST['follower_msg_notification']);
	
			$objCustomer->setProperty("follower_msg_alt", $followerMsg);
			$objCustomer->setProperty("direct_msg_alt", $DirectMsg);
			$objCustomer->setProperty("user_id", $user_id);
			$objCustomer->actCustomer("U");
							
				$link = Route::_('show=picture&saved=5');
				redirect($link);
				
}