<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$Common		= new Common;
	$product_key		= trim($_POST['product_key']);
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("product_key", 'Product key is a required field.', "S");
	$vResult = $objValidate->doValidate();
	
	if(!$vResult){
	
	$Common->setProperty("config_value", $product_key);
	$Common->setProperty("config_key", 'pro_key');
	$Common->actConfig('U');
	
	$files = glob('key/*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
			unlink($file); // delete file
	}

		$link = Route::_('');
		redirect($link);
	}
}