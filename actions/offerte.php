<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$gender				= $_POST['gender'];
	$first_name			= $_POST['first_name'];
	$last_name			= $_POST['last_name'];
	$email				= $_POST['email'];
	$telephone			= $_POST['telephone'];
	$mobile				= $_POST['mobile'];
	$desc				= $_POST['desc'];
	
	$security_cd		= $_POST['security_cd'];
	
	$adminemail 		= ADMIN_EMAIL;
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("email", _OFFERTE_EMAIL . _IS_REQUIRED_FLD, "E");
	$objValidate->setCheckField("telephone", _OFFERTE_TELE . _IS_REQUIRED_FLD, "S");
	$objValidate->setCheckField("security_cd", _SECURITY_CODE . _IS_REQUIRED_FLD, "S");
	$vResult = $objValidate->doValidate();
	
	if(empty($_POST['gender']) || empty($_POST['first_name']) || empty($_POST['last_name'])){
		$vResult['first_name'] = _OFFERTE_NAAM . _IS_REQUIRED_FLD;
	}
	
	$qty			= $_POST['qty'];
	$brand			= $_POST['brand'];
	$details		= $_POST['details'];
	$size			= $_POST['size'];
	$color			= $_POST['color'];
	$product_num	= $_POST['product_num'];
	
	$product_details = '
						<table width="100%" cellspacing="0" cellpadding="3" style="font-family: Verdana; font-size: 10px;">
					  		<tr>
					  			<th style="width:10%;text-align:left;">' . _OFFERTE_QTY . '</th>
					  			<th style="width:20%;text-align:left;">' . _OFFERTE_BRAND . '</th>
					  			<th style="width:40%;text-align:left;">' . _OFFERTE_INFO . '</th>
					  			<th style="width:10%;text-align:left;">' . _OFFERTE_SIZE . '</th>
					  			<th style="width:10%;text-align:left;">' . _OFFERTE_COLOR . '</th>
					  			<th style="width:10%;text-align:left;">' . _OFFERTE_PRD_NO . '</th>
							</tr>';
	$products = false;
	if(count($qty) >= 1 && count($qty) == count($brand)){
		for($i = 0; $i < count($qty); $i++){
			if(!empty($qty[$i]) && !empty($brand[$i]) && !empty($details[$i]) && !empty($product_num[$i])){
				$products = true;
				$product_details .= '
								<tr>
						  			<td>' . $qty[$i] . '</td>
						  			<td>' . $brand[$i] . '</td>
						  			<td>' . $details[$i] . '</td>
						  			<td>' . $size[$i] . '</td>
						  			<td>' . $color[$i] . '</td>
						  			<td>' . $product_num[$i] . '</td>
								</tr>';
			}
		}
	}
	$product_details .= '</table>';
	
	if($products !== true){
		$vResult['products'] = _OFFERTE_VLD_PRODUCTS;
	}
	// See if any error are not returned
	if(!$vResult){
		$fullname = $gender . ' ' . $first_name . ' ' . $last_name;
		if(strtolower($security_cd) != strtolower($_SESSION['security_code'])){
			$vResult['security_cd'] = _CONT_VLD_INVALID_SECURITY_CODE;
		}
		else{
			// Send mail to admin
			$content 		= '
								<table width="900" border="0" cellpadding="3" cellspacing="1" style="font-family: Verdana; font-size: 10px;">
								  <tr><th width="20%">' . _OFFERTE_NAAM . '</th><td width="80%">' . $fullname . '</td></tr>
								  <tr><th align="left">' . _OFFERTE_EMAIL . '</th><td align="left" valign="top">' . $email . '</td></tr>
								  <tr><th align="left">' . _OFFERTE_TELE . '</th><td align="left" valign="top">' . $telephone . '</td></tr>
								  <tr><th align="left">' . _OFFERTE_MOBILE . '</th><td align="left" valign="top">' . $mobile . '</td></tr>
								  <tr><th colspan="2" align="left">' . _OFFERTE_PRODUCT_INFO . '</th></tr>
								  <tr><td colspan="2" align="left">' . $product_details . '</td></tr>
								  <tr><th colspan="2" align="left">' . _OFFERTE_DESC . '</th></tr>
								  <tr><td colspan="2" align="left">' . $desc . '</td></tr>
								</table>';
	
			$body 			= file_get_contents(TEMPLATE_URL . "template.php");
			$body			= str_replace("[BODY]", $content, $body);
			$subject 		= _OFFERTE_SUBJECT;
			
			$objMail		= new Mail;
			$objMail->IsHTML(true);
			$objMail->setSender($email, $fullname);
			$objMail ->AddEmbeddedImage(TEMPLATE_PATH . "agro_email.jpg", 1, 'agro_email.jpg');
			$objMail->setSubject($subject);
			$objMail->AddEmbeddedImage("agro_email.jpg", 1);
			$objMail->setReciever($adminemail, SITE_NAME);
			$objMail->setBody($body);
			$objMail->Send();
			$link = Route::_('show=offerte&sent=1');
			redirect($link);
		}
	}
}
