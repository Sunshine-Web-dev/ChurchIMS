<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	
	$objRoute 			= new Route;
	$objAdminUser 		= new AdminUser;
	$objAttribute	 	= new Customer;
	$objAttributeValue 	= new Customer;
	$email				= $_POST['customer_email'];
	$password			= $_POST['new_password'];
	$first_name			= $_POST['first_name'];
	$last_name			= $_POST['lastname'];
	$address_1			= '';
	$address_2			= '';
	$city				= '';
	$state				= '';
	$zip_code			= '';
	$country			= '';
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
	$customer_type		= 1;
	
	$GetUserUrlKey = list($username,$OtherInfo)= explode('@', $email);
	
	$url_link  = $objRoute->getUserKey($username, $user_id);
	
	$objValidate->setArray($_POST);
	//$objValidate->setCheckField("first_name", _REG_FIRST_NAME . _IS_REQUIRED_FLD, "E");
	//$objValidate->setCheckField("lastname", _REG_LAST_NAME . _IS_REQUIRED_FLD, "S");
	//$objValidate->setCheckField("customer_email", _REG_EMAIL . _IS_REQUIRED_FLD, "S");
	//$objValidate->setCheckField("user_password", _REG_PASSWD . _IS_REQUIRED_FLD, "S");
	//$objValidate->setCheckField("confirmpassword", _REG_CONFIRM_PASSWD . _IS_REQUIRED_FLD, "S");
	$vResult = $objValidate->doValidate();
	
	// See if any error are not returned
	if(!$vResult){
		//Check whether the email address already exists/registered
		//$objCustomerNew = new Customer;
		//$objCustomerNew->setProperty("email", $email);
		//$objCustomerNew->emailExists();
		
		$objUserUsername = new Customer;
		$objUserUsername->setProperty("email", $email);
		$objUserUsername->CheckEmail();
		$CountEmailAddress = $objUserUsername->totalRecords();
		//echo $CountEmailAddress.'-'.$email;
		//die();
			if($CountEmailAddress < 1){
				// Register the customer.
				$customer_id = $objAdminUser->genCode("rs_tbl_customer", "customer_id");
				
				$objCustomer->setProperty("customer_id", $customer_id);
				$objCustomer->setProperty("email", $email);
				$objCustomer->setProperty("password", md5($password));
				$objCustomer->setProperty("first_name", $first_name);
				$objCustomer->setProperty("last_name", $last_name);
				$objCustomer->setProperty("is_active", $is_active);
				$objCustomer->setProperty("customer_type", $customer_type);
				$objCustomer->setProperty("url_key", $url_link);
				if($objCustomer->actCustomer("I")){
					
					
					
					$objAttribute->setProperty("attribute_status", 1);
					$objAttribute->lstCustomerAttribute();
					while($AttributeList = $objAttribute->dbFetchArray(1)){
							$attribute_value_id = $objAdminUser->genCode("rs_tbl_customer_attribute_value", "attribute_value_id");
							$objAttributeValue->setProperty("attribute_value_id", $attribute_value_id);
							$objAttributeValue->setProperty("attribute_id", $AttributeList["attribute_id"]);
							$objAttributeValue->setProperty("attribute_value", $AttributeList['attribute_default_value']);
							$objAttributeValue->setProperty("customer_id", $customer_id);
							$objAttributeValue->setProperty("attribute_status", 1);
							$objAttributeValue->setProperty("attribute_date", date("Y-m-d"));
							$objAttributeValue->actCustomerAttributeValue("I");
					}
					

					// Send mail to customer
					$content 		= $objTemplate->getTemplate('registration');
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
					$objMail->setBody($body);
					$objMail->Send();
					
					
					$objCustomerNew = new Customer;
					$objCustomerNew->setProperty("customer_id", $customer_id);
					$objCustomerNew->setProperty("email", $email);
					$objCustomerNew->setProperty("login_time", date('Y-m-d H:i:s'));
					$objCustomerNew->setProperty("fullname", $FullName);
					$objCustomerNew->setProperty("first_name", $first_name);
					$objCustomerNew->setLogin();
										
						$link = Route::_('show=cpanel&callpage=products');
						redirect($link);
					
				}
				
			} else {
				$link = Route::_('show=register&error='.$CountEmailAddress);
						redirect($link);
			}
				
			}
		}