<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$email				= $_POST['email'];
	$title				= $_POST['title'];
	$first_name			= $_POST['first_name'];
	$last_name			= $_POST['last_name'];
	$address_1			= $_POST['address_1'];
	$address_2			= $_POST['address_2'];
	$city				= $_POST['city'];
	$provience			= $_POST['provience'];
	$postal_zip			= $_POST['postal_zip'];
	$country			= $_POST['country'];
	$day_phone			= $_POST['day_phone'];
	$mobile				= $_POST['mobile'];
	
	$saddress_1			= $_POST['saddress_1'];
	$saddress_2			= $_POST['saddress_2'];
	$scity				= $_POST['scity'];
	$sprovience			= $_POST['sprovience'];
	$spostal_zip		= $_POST['spostal_zip'];
	$scountry			= $_POST['scountry'];
	$scontact_phone		= $_POST['sday_phone'];
	$CustomerType		= $_POST['CustomerType'];
	$company_name		= $_POST['company_name'];
	$kvk_number			= $_POST['kvk_number'];
	$tax_number			= $_POST['tax_number'];
	$fax				= $_POST['fax'];
	
	$refurl				= base64_decode($_POST['refurl']);
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("email", _REG_EMAIL . _IS_REQUIRED_FLD, "E");
	$objValidate->setCheckField("first_name", _REG_FIRST_NAME . _IS_REQUIRED_FLD, "S");
	$objValidate->setCheckField("last_name", _REG_LAST_NAME . _IS_REQUIRED_FLD, "S");
	
	$objValidate->setCheckField("address_1", _REG_ADD_1 . _IS_REQUIRED_FLD, "S");
	$objValidate->setCheckField("city", _REG_CITY . _IS_REQUIRED_FLD, "S");
	$objValidate->setCheckField("provience", _REG_COUNTY . _IS_REQUIRED_FLD, "S");
	$objValidate->setCheckField("postal_zip", _REG_ZIP . _IS_REQUIRED_FLD, "S");
	$objValidate->setCheckField("country", _REG_COUNTRY . _IS_REQUIRED_FLD, "S");
	$objValidate->setCheckField("day_phone", _REG_DAY_PHONE . _IS_REQUIRED_FLD, "S");
	$vResult = $objValidate->doValidate();
	
	# See if any error are not returned
	if(!$vResult){
		# Check whether the email address already exists/registered
		$objCustomerNew = new Customer;
		$customer_cd = $objCustomerNew->customer_cd;
		$objCustomerNew->setProperty("email", $email);
		$objCustomerNew->setProperty("customer_cd", $customer_cd);
		$objCustomerNew->emailExists();
		
		if($objCustomerNew->totalRecords() >= 1){
			$vResult['email'] = _REG_EMAIL_ALREADY_EXISTS;
		}
		else{
			$full_name = $first_name . " " . $last_name;
			# Register the customer.
			
			$objCustomer->setProperty("customer_cd", $customer_cd);
			$objCustomer->setProperty("email", $email);
			$objCustomer->setProperty("title", $title);
			$objCustomer->setProperty("first_name", $first_name);
			$objCustomer->setProperty("last_name", $last_name);
			$objCustomer->setProperty("address_1", $address_1);
			$objCustomer->setProperty("address_2", $address_2);
			$objCustomer->setProperty("city", $city);
			$objCustomer->setProperty("provience", $provience);
			$objCustomer->setProperty("postal_zip", $postal_zip);
			$objCustomer->setProperty("country", $country);
			$objCustomer->setProperty("day_phone", $day_phone);
			$objCustomer->setProperty("mobile", $mobile);
			$objCustomer->setProperty("CustomerType", $CustomerType);
				$objCustomer->setProperty("company_name", $company_name);
				$objCustomer->setProperty("kvk_number", $kvk_number);
				$objCustomer->setProperty("tax_number", $tax_number);
				$objCustomer->setProperty("fax", $fax);
			
			if($objCustomer->actCustomer("U")){
				# Shipping information
				$objCustomerS = new Customer;
				$objCustomerS->setProperty("customer_cd", $customer_cd);
				$objCustomerS->setProperty("saddress_1", $saddress_1);
				$objCustomerS->setProperty("saddress_2", $saddress_2);
				$objCustomerS->setProperty("scity", $scity);
				$objCustomerS->setProperty("sprovience", $sprovience);
				$objCustomerS->setProperty("spostal_zip", $spostal_zip);
				$objCustomerS->setProperty("scountry", $scountry);
				$objCustomerS->setProperty("scontact_phone", $scontact_phone);

				$objCustomerS->actShippingInfo("U");
				
				if($refurl){
					redirect($refurl);
				}
				else{
					$link = Route::_('show=myaccount&saved=1');
					redirect($link);
				}
			}
		}
	}
}
