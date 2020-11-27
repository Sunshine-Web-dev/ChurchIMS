<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['doAction'] == 'Subscribe'){
	$geslacht			= $_POST['geslacht'];
	$voorletters		= $_POST['voorletters'];
	$email				= $_POST['email'];
	$woonplaats			= $_POST['woonplaats'];
	$fullname			= $_POST['fullname'];
	$security_cd		= $_POST['security_cd'];
	
	$confirm_cd			= md5(time());
	$subscriber_date 	= date('Y-m-d H:i:s');
	$status				= 'N';
	
	$objValidate 		= new Validate;
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("email", _VLD_EMAIL, "E");
	$objValidate->setCheckField("fullname", _VLD_NAME, "S");
	$objValidate->setCheckField("voorletters", _VLD_INITIALS, "S");
	$objValidate->setCheckField("woonplaats", _VLD_HOMETOWN, "S");
	$objValidate->setCheckField("security_cd", _SECURITY_CODE . _IS_REQUIRED_FLD, "S");
	
	$vResult = $objValidate->doValidate();
	
	# See if any error are not returned
	if(!$vResult){
		$objNewsletter = new Newsletter;
		$objNewsletter->setProperty('email', $email);
		if($objNewsletter->emailExists()){
			$objCommon->setMessage(_MSG_ALREADY_SUBSCRIBED, 'Info');
			redirect(SITE_URL . '?show=newsletter');
		} else if(strtolower($security_cd) != strtolower($_SESSION['security_code'])){
			$vResult['security_cd'] = _REG_INVALID_SECURITY_CD;
		}
		else{
			$objNewsletter = new Newsletter;
			$subcriber_cd = $objNewsletter->getMaxCode();
			
			$objNewsletter->setProperty('subcriber_cd', $subcriber_cd);
			$objNewsletter->setProperty('gender', $geslacht);
			$objNewsletter->setProperty('initials', $voorletters);
			$objNewsletter->setProperty('fullname', $fullname);
			$objNewsletter->setProperty('email', $email);
			$objNewsletter->setProperty('subscriber_date', $subscriber_date);
			$objNewsletter->setProperty('city', $woonplaats);
			$objNewsletter->setProperty('confirm_cd', $confirm_cd);
			$objNewsletter->setProperty('status', $status);
			$objNewsletter->actSubscriber('I');
			
			# Send mail to customer
			$objTemplate	= new Template;
			$content 		= $objTemplate->getTemplate('subscribe');
			$sender_name 	= $content['sender_name'];
			$sender_email 	= $content['sender_email'];
			$subject 		= $content['template_subject'];
			$content 		= $content['template_detail'];
			
			$content		= str_replace("[USER_NAME]", $fullname, $content);
			
			$link			= '<a target="_blank" href="' . SITE_URL . 'subscribe_confirm.php?confirm_cd=' . $confirm_cd . '">' . SITE_URL . 'subscribe_confirm.php?confirm_cd=' . $confirm_cd . '</a>';
			
			$content		= str_replace("[LINK]", $link, $content);
			
			$content		= str_replace("[SENDER_NAME]", $sender_name, $content);
			$content		= str_replace("[SITE_NAME]", SITE_NAME, $content);
			
			$body 			= file_get_contents(TEMPLATE_URL . "template.php");
			$body			= str_replace("[BODY]", $content, $body);
			
			$objMail		= new Mail;
			$objMail->IsHTML(true);
			$objMail->setSender($sender_email, $sender_name);
			$objMail->AddEmbeddedImage(TEMPLATE_PATH . "agro_email.jpg", 1, 'agro_email.jpg');
			$objMail->setSubject($subject);
			$objMail->AddEmbeddedImage("agro_email.jpg", 1);
			$objMail->setReciever($email, $fullname);
			$objMail->setBody($body);
			$objMail->Send();
			
			//$objCommon->setMessage(_MSG_SUCCESSFULLY_SUBSCRIBED, 'Info');
			
			redirect(SITE_URL . '?show=newsletter&s_sent=1');
		}
	}
}
else if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['doAction'] == 'Unsubscribe'){
	$email				= $_POST['email'];
	$objValidate 		= new Validate;
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("email", _VLD_EMAIL, "E");
	
	$vResult1 = $objValidate->doValidate();
	# See if any error are not returned
	if(!$vResult1){
		$objNewsletter = new Newsletter;
		$objNewsletter->setProperty('email', $email);
		$rows = $objNewsletter->emailExists();
		if($rows){
			extract($rows);
			
			$confirm_cd			= md5(time());
			
			$objNewsletterN = new Newsletter;
			$objNewsletterN->setProperty('email', $email);
			$objNewsletterN->setProperty('confirm_cd', $confirm_cd);
			$objNewsletterN->actSubscriber('U');
			
			# Send mail to customer
			$objTemplate	= new Template;
			$content 		= $objTemplate->getTemplate('unsubscribe');
			$sender_name 	= $content['sender_name'];
			$sender_email 	= $content['sender_email'];
			$subject 		= $content['template_subject'];
			$content 		= $content['template_detail'];
			
			$content		= str_replace("[USER_NAME]", $fullname, $content);
			
			$link			= '<a target="_blank" href="' . SITE_URL . 'unsubscribe_confirm.php?confirm_cd=' . $confirm_cd . '">' . SITE_URL . 'unsubscribe_confirm.php?confirm_cd=' . $confirm_cd . '</a>';
			
			$content		= str_replace("[LINK]", $link, $content);
			
			$content		= str_replace("[SENDER_NAME]", $sender_name, $content);
			$content		= str_replace("[SITE_NAME]", SITE_NAME, $content);
			
			$body 			= file_get_contents(TEMPLATE_PATH . "template.php");
			$body			= str_replace("[BODY]", $content, $body);
			
			$objMail		= new Mail;
			$objMail->IsHTML(true);
			$objMail->setSender($sender_email, $sender_name);
			$objMail->AddEmbeddedImage(TEMPLATE_PATH . "logo.gif", 1, 'logo.gif');
			$objMail->setSubject($subject);
			$objMail->AddEmbeddedImage("logo.jpg", 1);
			$objMail->setReciever($email, $fullname);
			$objMail->setBody($body);
			$objMail->Send();
			
			//$objCommon->setMessage(_MSG_UNSCRIBPTION_NEED_CONFIRM, 'Info');
			redirect(SITE_URL . '?show=newsletter&u_sent=1');
		}
		else{
			$vResult1['email'] = _EMAIL_NOT_FOUND;
		}
	}
}
?>