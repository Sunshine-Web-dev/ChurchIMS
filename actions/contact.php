<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$email				= $_POST['email'];
	$fullname			= $_POST['fullname'];
	$address			= $_POST['address'];
	$country			= $_POST['country'];
	$subject			= $_POST['subject'];
	$message			= $_POST['message'];
	$security_cd		= $_POST['security_cd'];
	
	$adminemail 		= ADMIN_EMAIL;
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("email", _CONT_VLD_EMAIL, "E");
	$objValidate->setCheckField("fullname", _CONT_VLD_FULLNAME, "S");
	$objValidate->setCheckField("country", _CONT_VLD_COUNTRY, "S");
	$objValidate->setCheckField("subject", _CONT_VLD_SUBJECT, "S");
	$vResult = $objValidate->doValidate();
	
	// See if any error are not returned
	if(!$vResult){
		$country_name		= $objCommon->getCountryName($country);
			// Send mail to admin
			$content 		= '<table width="100%" border="0" cellpadding="3" cellspacing="1">
								  <tr>
									<td colspan="3">Following message has been posted from the contact page of ToutTwits.</td>
								  </tr>
								  <tr>
									<td width="19%">&nbsp;</td>
									<td width="1%">&nbsp;</td>
									<td width="80%">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left" valign="top">' . _E_MAIL . '</td>
									<td align="left" valign="top">:</td>
									<td align="left" valign="top">' . $email . '</td>
								  </tr>
								  <tr>
									<td align="left" valign="top">' . _FULLNAME . '</td>
									<td align="left" valign="top">:</td>
									<td align="left" valign="top">' . $fullname . '</td>
								  </tr>
								  <tr>
									<td align="left" valign="top">' . _ADDRESS . '</td>
									<td align="left" valign="top">:</td>
									<td align="left" valign="top">' . $address . '</td>
								  </tr>
								  <tr>
									<td align="left" valign="top">' . _COUNTRY . '</td>
									<td align="left" valign="top">:</td>
									<td align="left" valign="top">' . $country_name . '</td>
								  </tr>
								  <tr>
									<td align="left" valign="top">' . _MESSAGE . '</td>
									<td align="left" valign="top">&nbsp;</td>
									<td align="left" valign="top">' . $message . '</td>
								  </tr>
								</table>';
	
			$body 			= file_get_contents(TEMPLATE_URL . "template.php");
			$body			= str_replace("[BODY]", $content, $body);
				
			$objMail		= new Mail;
			$objMail->IsHTML(true);
			$objMail->setSender($email, $fullname);
			$objMail ->AddEmbeddedImage(TEMPLATE_PATH . "banner_email.jpg", 1, 'banner_email.jpg');
			$objMail->setSubject($subject);
			$objMail->AddEmbeddedImage("banner_email.jpg", 1);
			$objMail->setReciever($objCommon->getConfigValue("site_email"), SITE_NAME);
			$objMail->setBody($body);
			$objMail->Send();
			$link = Route::_('show=cms&content=get-help&ct=1&s=1');
			unset($_POST);
			redirect($link);
		}
	}
