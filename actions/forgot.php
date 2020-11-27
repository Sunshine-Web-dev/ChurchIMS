<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$email				= $_POST['email'];
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("email", _VLD_INVALID_EMAIL, "E");
	$vResult = $objValidate->doValidate();
	
	# See if any error are not returned
	if(!$vResult){
		# Check whether the email address exists
		$objCustomer->setProperty("email", $email);
		$objCustomer->emailExists();
		if($objCustomer->totalRecords() >= 1){
			
			$rows = $objCustomer->dbFetchArray(1);
			$user_id = $rows['customer_id'];
			$first_name = $rows['first_name'];
			 
			 # Generate new password
			$newpwd = $objCommon->genPassword();
			
			# change the password
			$objCustomerNew = new Customer;
			$objCustomerNew->setProperty("customer_id", $user_id);
			$objCustomerNew->setProperty("npassword", md5($newpwd));
			$objCustomerNew->changePassword();
			
			# Send mail to customer
			$content 		= $objTemplate->getTemplate('forgot_password');
			$sender_name 	= $content['sender_name'];
			$sender_email 	= $content['sender_email'];
			$subject 		= $content['template_subject'];
			$content 		= $content['template_detail'];
			
			$content		= str_replace("[USER_NAME]", $first_name, $content);
			$content		= str_replace("[USERNAME]", $email, $content);
			$content		= str_replace("[EMAIL_ADD]", $email, $content);
			$content		= str_replace("[PASSWORD]", $newpwd, $content);
			
			$content		= str_replace("[SITE_NAME]", SITE_NAME, $content);
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
//			redirect(SITE_URL . "?show=forgot&sent=1");
		$link = Route::_('show=forgot&sent=1');
			redirect($link);
		}
		else{
			$vResult['email'] = _FORGOT_EMAIL_NOT_VALID;
		}
	}
}