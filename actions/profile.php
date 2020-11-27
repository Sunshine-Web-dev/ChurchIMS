<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$customer_skype		= trim($_POST['customer_skype']);
	$customer_phone		= trim($_POST['customer_phone']);
	$customer_address	= trim($_POST['customer_address']);
	$customer_country	= trim($_POST['customer_country']);
	$customer_website	= trim($_POST['customer_website']);
	$customer_id		= $objCustomer->customer_id;
	
	
	$customer_skype_id		= trim($_POST["customer_skype_id"]);
	$customer_website_id	= trim($_POST["customer_website_id"]);
	
	$objCustomerSkype	= new Customer;
	$objCustomerwebsite	= new Customer;
	
	$objValidate->setArray($_POST);
	$vResult = $objValidate->doValidate();
	
	# See if any error are not returned
	if(!$vResult){
			
			$objCustomerSkype->setProperty("attribute_value_id", $customer_skype_id);
			$objCustomerSkype->setProperty("customer_id", $customer_id);
			$objCustomerSkype->setProperty("attribute_value", $customer_skype);
			$objCustomerSkype->actCustomerAttributeValue("U");
			//////////////////////////////////////////////////////////////////////////
			$objCustomerwebsite->setProperty("attribute_value_id", $customer_website_id);
			$objCustomerwebsite->setProperty("customer_id", $customer_id);
			$objCustomerwebsite->setProperty("attribute_value", $customer_website);
			$objCustomerwebsite->actCustomerAttributeValue("U");
			
			
					
			$objCustomer->setProperty("customer_id", $customer_id);
			$objCustomer->setProperty("phone", $customer_phone);
			$objCustomer->setProperty("country", $customer_country);
			$objCustomer->setProperty("address", $customer_address);
			if($objCustomer->actCustomer("U")){
					$link = Route::_('show=profile&profile_id='.$customer_id.'&saved=1');
					redirect($link);
		}
	}
}
?>