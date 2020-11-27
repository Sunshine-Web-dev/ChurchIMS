<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

		

	$email				= trim($_POST['email']);

	$username			= trim($_POST['username']);

	$password			= trim($_POST['password']);

	$user_id			= trim($_POST['user_id']);

	

	$objValidate->setArray($_POST);

	$objValidate->setCheckField("email", 'Email ' . _IS_REQUIRED_FLD, "S");

//	$objValidate->setCheckField("password", 'Passowrd ' . _IS_REQUIRED_FLD, "S");

	$vResult = $objValidate->doValidate();

	

	# See if any error are not returned

	if(!$vResult){

		# Check whether the email address already exists/registered

		

			$objCustomer->setProperty("user_id", $user_id);

			$objCustomer->setProperty("email", $email);

			//$objCustomer->setProperty("pass", md5($password));

			

			if($objCustomer->actCustomer("EP")){

							

				$link = Route::_('show=myaccount');

				redirect($link);



			}

		}

	}