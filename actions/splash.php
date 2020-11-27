<?php
if($_REQUEST['registration_menu']){
$objRoute 			= new Route;
	$username			= $_POST['username'];
	$email				= $_POST['email'];
	$password			= $_POST['password'];
	$full_name			= $_POST['full_name'];
	//$last_name			= $_POST['last_name'];
	$address_1			= '';
	$address_2			= '';
	$city				= '';
	$state				= '';
	$zip_code			= '';
	$country			= $_POST['country'];
	$day_phone			= '';
	$mobile				= '';
	$reg_date			= date('Y-m-d H:i:s');
	$is_active			= 1;
	$refurl				= '';
	$security_cd		= '';
	$FullName			= $first_name.' '.$last_name;
	$CustomerType		= '';
	$company_name		= '';
	$fax				=  '';
	//$twitterUsername	= trim($_POST['twitter_name']);
	$twitterUsername	= '';
	$user_type			= $_POST['user_type'];
	$tfb_username		= $_POST['tfb_username'];
	$authcode			= $_POST['authcode'];
	$access_token		= $_POST['access_token'];
	$fb_code			= $_POST['fb_code'];
	$ses_type			= $_POST['ses_type'];
	
	$url_link  = $objRoute->getUserKey($username, $user_id);
	list($first_name, $last_name)= explode(' ', $full_name);
	$FullName			= $full_name;
	
	
	
	
	
		$full_name = $first_name . " " . $last_name;
				// Register the customer.
				$user_id = $objCommon->genCode("users", "user_id");
				$confirmation_cd = md5(time() . $customer_cd);
				$objCustomer->setProperty("user_id", $user_id);
				$objCustomer->setProperty("email", $email);
				$objCustomer->setProperty("username", $username);
				$objCustomer->setProperty("pass", md5($password));
				$objCustomer->setProperty("title", $title);
				$objCustomer->setProperty("first_name", $first_name);
				$objCustomer->setProperty("last_name", $last_name);
				$objCustomer->setProperty("address", $address);
				$objCustomer->setProperty("city", $city);
				$objCustomer->setProperty("state", $state);
				$objCustomer->setProperty("zip_code", $zip_code);
				$objCustomer->setProperty("country", $country);
				$objCustomer->setProperty("day_phone", $day_phone);
				$objCustomer->setProperty("mobile", $mobile);
				$objCustomer->setProperty("dob", $dob);
				$objCustomer->setProperty("reg_date", $reg_date);
				$objCustomer->setProperty("is_active", $is_active);
				$objCustomer->setProperty("twitter_username", $twitterUsername);
				$objCustomer->setProperty("url_link", $url_link);
				if($objCustomer->actCustomer("I")){
				
				
				if($user_type==1){
					$objLeagues = new Leagues;
					$objAdminUser 	= new AdminUser;
					$tf_id = $objAdminUser->genCode("stream_filter", "tf_id");
					$objLeagues->setProperty("tf_id", $tf_id);
					$objLeagues->setProperty("tf_username",'');
					$objLeagues->setProperty("user_id", $user_id);
					$objLeagues->setProperty("user_type", 4);
					$objLeagues->setProperty("tf_status", 1);
					$objLeagues->setProperty("filter_id", 1);
					$objLeagues->setProperty("oauth_token", '');
					$objLeagues->setProperty("twitter_id", '');
					$objLeagues->actTwitterFilter("I");
					} elseif($user_type==2){
					$objLeagues = new Leagues;
					$objAdminUser 	= new AdminUser;
					$tf_id = $objAdminUser->genCode("stream_filter", "tf_id");
					$objLeagues->setProperty("tf_id", $tf_id);
					if($ses_type==1){
					$objLeagues->setProperty("fb_username",$tfb_username);
					} elseif($ses_type==2){
					$objLeagues->setProperty("tf_username",$tfb_username);
					}
					$objLeagues->setProperty("user_id", $user_id);
					$objLeagues->setProperty("user_type", 4);
					$objLeagues->setProperty("tf_status", 1);
					$objLeagues->setProperty("filter_id", 1);
					$objLeagues->setProperty("oauth_token", $authcode);
					$objLeagues->setProperty("oauth_code", $fb_code);
					$objLeagues->setProperty("accesstoken", $access_token);
					$objLeagues->setProperty("twitter_id", '');
					$objLeagues->actTwitterFilter("I");
					}
					
					/*$content 		= $objTemplate->getTemplate('registration');
					$sender_name 	= $content['sender_name'];
					$sender_email 	= $content['sender_email'];
					$subject 		= $content['template_subject'];
					$content 		= $content['template_detail'];
					
					$content		= str_replace("[USER_NAME]", $first_name . " " . $last_name, $content);
					$content		= str_replace("[SITE_NAME]", SITE_NAME, $content);
					$content		= str_replace("[CURRENT_DATE]", date('F d, Y'), $content);
					
					$content		= str_replace("[EMAIL_ADD]", $email, $content);
					$content		= str_replace("[PASSWORD]", $password, $content);
					
					$content		= str_replace("[SENDER_NAME]", $sender_name, $content);
					
					$body 			= file_get_contents(TEMPLATE_URL . "template.php");
					$body			= str_replace("[BODY]", $content, $body);
					
					$objMail		= new Mail;
					$objMail->IsHTML(true);
					$objMail->setSender($sender_email, $sender_name);
					$objMail ->AddEmbeddedImage(TEMPLATE_PATH . "banner_email.jpg", 1, 'banner_email.jpg');
					$objMail->setSubject($subject);
					$objMail->AddEmbeddedImage("banner_email.jpg", 1);
					$objMail->setReciever($email, $first_name . " " . $last_name);
					$objMail->setBody($body);*/
					
					$objCustomerNew = new Customer;
					$objCustomerNew->setProperty("user_id", $user_id);
					$objCustomerNew->setProperty("username", $username);
					$objCustomerNew->setProperty("login_time", date('Y-m-d H:i:s'));
					$objCustomerNew->setProperty("fullname", $FullName);
					$objCustomerNew->setProperty("first_name", $first_name);
					$objCustomerNew->setLogin();
										
						$link = Route::_('show=myaccount');
						//$link = Route::_('show=login');
						redirect($link);
				
				}
				
				
}
?>