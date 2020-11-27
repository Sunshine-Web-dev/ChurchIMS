<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
		
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
	$objValidate->setCheckField("first_name", _REG_FIRST_NAME . _IS_REQUIRED_FLD, "S");
	$objValidate->setCheckField("last_name", _REG_LAST_NAME . _IS_REQUIRED_FLD, "S");
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
			$imageful = new Thumbnail($uploadfileth, 150, 0, 100);
			$imageful->save($uploadfileth);						
			}
			$objCustomer->setProperty("profile_img", $image_name);
			}
		
			$objCustomer->setProperty("user_id", $user_id);
			$objCustomer->setProperty("email", $email);
			$objCustomer->setProperty("username", $username);
			$objCustomer->setProperty("first_name", $first_name);
			$objCustomer->setProperty("last_name", $last_name);
			if($address!=''){
			$objCustomer->setProperty("address", $address);
			}
			if($city!=''){
			$objCustomer->setProperty("city", $city);
			}
			if($state!=''){
			$objCustomer->setProperty("state", $state);
			}
			if($zip_code!=''){
			$objCustomer->setProperty("zip_code", $zip_code);
			}
			if($country!=''){
			$objCustomer->setProperty("country", $country);
			}
			if($day_phone!=''){
			$objCustomer->setProperty("day_phone", $day_phone);
			}
			if($mobile!=''){
			$objCustomer->setProperty("mobile", $mobile);
			}
			if($DateOfBirth!=''){
			$objCustomer->setProperty("dob", $DateOfBirth);
			}
			$objCustomer->setProperty("twitter_username", $twitter_username);
			
			if($objCustomer->actCustomer("U")){
					if($tf_id!=''){
					$objLeagues = new Leagues;
					$objLeagues->setProperty("tf_id", $tf_id);
					$objLeagues->setProperty("tf_username", $twitter_username);
					$objLeagues->setProperty("tf_status", 2);
					$objLeagues->actTwitterFilter("U");
					}
			
							
				$link = Route::_('show=accountinfo&saved=1');
				redirect($link);

			}
		}
	}