<?php
$product_path = PRODUCT_PATH; # $_CONFIG['product_path'];
$mode	= "I";
$objProductSize = new Product;
$objProductSizeDelete = new Product;
$objProductColorDelete = new Product;
$objProductSizeStatus = new Product;
$objProductColor = new Product;
$objProductColorStatus = new Product;
$objProductGallery = new Product;
$objProductAttribute = new Product;
$objProductAttributeName = new Product;
$objProductAttributeValue = new Product;
$objProductAttributeStatus = new Product;
$objAdminUser = new AdminUser;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	#Call Core Classes
	$objRoute 			= new Route;
	$objProductSize		= new Product;
	#Action Mode (I/U)
	$mode 				= trim($_POST['mode']);
	#Product Form Fields
	$category_id		= trim($_POST['category_id']);
	$customer_id		= trim($_POST['customer_id']);
	$product_name 		= trim($_POST['product_name']);
	$product_price 		= trim($_POST['product_price']);
	$prodct_descritpion	= trim($_POST['prodct_descritpion']);
	$product_date		= date('Y-m-d H:i:s');
	$is_front 			= trim($_POST['is_front']);
	$is_active 			= 1;
	$product_type		= trim($_POST['product_type']);
	$country_id			= trim($_POST['country_id']);
	$condition_type		= trim($_POST['condition_type']);
	$condition_detail	= trim($_POST['condition_detail']);
	$size_id_mode_u		= $_POST['size_id'];
	$color_id_mode_u	= $_POST['color_id'];
	//$bid_min_value		= trim($_POST['bid_min_value']);
	//$bid_max_value		= trim($_POST['bid_max_value']);
	//$start_date			= trim($_POST['start_date']);
	//$end_date				= trim($_POST['end_date']);
	//$swap_value			= trim($_POST['swap_value']);
	//$swap_with			= trim($_POST['swap_with']);
	//$swap_detail			= trim($_POST['swap_detail']);
	#Product Size
	$size_value			= $_POST['size_value'];
	$size_is_active		= 1;
	#Product Color
	$product_color		= $_POST['color_value'];
	$color_is_active	= 1;
	#Product Gallery
	//$gallery_id			= $_POST['gallery_id'];
	#Product Attribute
	//$attribute_name		= $_POST['attribute_name'];
	//$attribute_value	= $_POST['attribute_value'];
	//$status_attribute	= $_POST['status_attribute'];
	
	$url_key			= $objRoute->getProductKey($_POST['product_name'], $_POST['product_id']);
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("category_id", VLD_PRD_CATEGORY, "I");
	$objValidate->setCheckField("product_name", VLD_PRD_NAME, "S");
	//$objValidate->setCheckField("country_id", VLD_PRD_COUNTRY, "I");
	$objValidate->setCheckField("prodct_descritpion", VLD_PRD_DESC, "S");
	$objValidate->setCheckField("product_price", VLD_PRD_PRICE, "F");
	$objValidate->setCheckField("condition_type", VLD_PRD_CONDITION, "I");
	$objValidate->setCheckField("product_type", VLD_PRD_TYPE, "I");
	$vResult = $objValidate->doValidate();
	
	if(!$vResult){
		$product_id = ($mode == "U") ? $_POST['product_id'] : $objAdminUser->genCode("rs_tbl_products", "product_id");
		$objProduct->setProperty("product_id", $product_id);
		$objProduct->setProperty("category_id", $category_id);
		$objProduct->setProperty("customer_id", $customer_id);
		$objProduct->setProperty("product_name", $product_name);
		$objProduct->setProperty("product_price", $product_price);
		$objProduct->setProperty("prodct_descritpion", $prodct_descritpion);
		$objProduct->setProperty("product_date", $product_date);
		$objProduct->setProperty("is_front", $is_front);
		$objProduct->setProperty("is_active", $is_active);
		$objProduct->setProperty("url_key", $url_key);
		$objProduct->setProperty("product_type", $product_type);
		$objProduct->setProperty("country_id", $country_id);
		$objProduct->setProperty("condition_type", $condition_type);
		$objProduct->setProperty("condition_detail", $condition_detail);
		/*$objProduct->setProperty("bid_min_value", $bid_min_value);
		$objProduct->setProperty("bid_max_value", $bid_max_value);
		$objProduct->setProperty("start_date", $start_date);
		$objProduct->setProperty("end_date", $end_date);
		$objProduct->setProperty("swap_value", $swap_value);
		$objProduct->setProperty("swap_with", $swap_with);
		$objProduct->setProperty("swap_detail", $swap_detail);*/
		
		if($objProduct->actProduct($mode)){
			
		$objProductSizeDelete->setProperty("product_id", $product_id);
		$objProductSizeDelete->actProductSize('D');
		
		$objProductColorDelete->setProperty("product_id", $product_id);
		$objProductColorDelete->actProductColor('D');
		
			# Product Size
			if(count($size_value) >= 1){
					$CountSize=0;
			foreach($size_value as $product_size_id => $product_size_value){				
					if($product_size_value!=''){
						$size_id = $objAdminUser->genCode("rs_tbl_product_size", "size_id");
						$objProductSize->setProperty("size_id", $size_id);
						$objProductSize->setProperty("size_value", $product_size_value);
						$objProductSize->setProperty("product_id", $product_id);
						$objProductSize->setProperty("customer_id", $customer_id);
						$objProductSize->setProperty("is_active", $size_is_active);
						$objProductSize->actProductSize('I');
					}	
				}
			}
			
			# Product Color
				if(count($product_color) >= 1){
			foreach($product_color as $product_color_id => $product_color_value){
					if($product_color_value!=''){
				$color_id = $objAdminUser->genCode("rs_tbl_product_color", "color_id");
				$objProductColor->setProperty("color_id", $color_id);
				$objProductColor->setProperty("color_value", $product_color_value);
				$objProductColor->setProperty("product_id", $product_id);
				$objProductColor->setProperty("customer_id", $customer_id);
				$objProductColor->setProperty("is_active", $color_is_active);
				$objProductColor->actProductColor('I');
						}
				}		
			}
			/*
			# product Gallery
				if(count($gallery_id) >= 1){
			foreach($gallery_id as $product_gallery_id => $product_gallery_value){
				//$objProductGallery->setProperty("gallery_id", $product_gallery_value);
				//$objProductGallery->setProperty("is_active", 2);
				//$objProductGallery->actProductGallery($mode);
			}	
				}
			#Product Attribute
				if(count($attribute_name) >=1){
			foreach($_POST['attribute_name'] as $attribute_id => $attribute_name){
				//$objProductAttributeName->setProperty("attribute_id", $attribute_id);
				//$objProductAttributeName->setProperty("attribute_name", $attribute_name);
				//$objProductAttributeName->actProductAttribute("U");
			}
			foreach($attribute_value as $attribute_value_id => $attribute_value){
				//$objProductAttributeValue->setProperty("attribute_id", $attribute_value_id);
				//$objProductAttributeValue->setProperty("attribute_value", $attribute_value);
				//$objProductAttributeValue->actProductAttribute("U");
			}
			foreach($status_attribute as $attribute_status_id => $attribute_status_value){
				//$objProductAttributeStatus->setProperty("attribute_id", $attribute_status_id);
				//$objProductAttributeStatus->setProperty("is_active", $attribute_status_value);
				//$objProductAttributeStatus->actProductAttribute("U");
			}
				}	
			*/
			if($mode == "U"){
				$objCommon->setMessage(RES_PRD_UPDATED, 'Info');
			} else {
				$objCommon->setMessage(RES_PRD_ADDED,'Info');
			}

			$link = Route::_('show=cpanel&callpage=products&ac=adpi&p='.EncData($product_id));
			redirect($link);
		}
	}
	
	extract($_POST);
} 
else{
	if(isset($_GET['pi']) && !empty($_GET['pi']))
		$product_id = $_GET['pi'];
	else if(isset($_POST['pi']) && !empty($_POST['pi']))
		$product_id = $_POST['pi'];
	if(isset($product_id) && !empty($product_id)){
		$objProduct->setProperty("product_id", $product_id);
		$objProduct->setProperty("customer_id", $objCustomer->customer_id);
		$objProduct->lstProducts();
		$data = $objProduct->dbFetchArray(1);
		$mode	= "U";
		extract($data);
	}
}
?>