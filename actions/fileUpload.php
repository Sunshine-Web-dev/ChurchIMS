<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$customer_id			= trim($_POST['customer_id']);
	$color_cd			= 0;
	$is_promo			= trim($_POST['is_promo']);
	$promo_error		= true;
	
	if(!is_uploaded_file($_FILES['profile_image']['tmp_name'])){
		$vResult['large_image'] = 'Please upload () images.';
	}
	
	if($_POST['profile_image']=="")
	{
			$msg = '<div class="successfulMessageDiv" style="float:left; width:100%; height:55px;">No file selected</div>';
	}
	// Upload large image
	if(!$vResult){
		$image_type = $objProduct->getExtentionValidate($_FILES['profile_image']['type'], $customer_id);
		
		if($image_type==1)
		{
			$image_name = $objProduct->getImagename($_FILES['profile_image']['type'], $customer_id);
		
		// Upload the large image
		if(move_uploaded_file($_FILES['profile_image']['tmp_name'], PROFILE_IMG_PATH . $image_name)){
		
			$uploadfilefolder = PROFILE_IMG_PATH . $image_name;

						$uploaddir= PROFILE_THUMB_PATH;
						$uploadfileth = PROFILE_THUMB_PATH . $image_name;
						copy($uploadfilefolder, $uploadfileth);
						$imageful=new Thumbnail($uploadfileth, 200, 100);
						$imageful->save($uploadfileth);	

			}
		
		// see if any images are there
		$objCustomer = new Customer();
		$objCustomer->setProperty('customer_id', $customer_id);
		$objCustomer->lstCustomerGallery();
		
		$objCustomer->resetProperty();
		$objCustomer->setProperty("customer_id", $customer_id);
		$objCustomer->setProperty("profile_image", $image_name);
		$objCustomer->actCustomer("U");
		
		$msg = '<div class="successfulMessageDiv" style="float:left; width:100%; height:55px;">Image uploaded successfully</div>';
		$link = Route::_('show=cpanel&callpage=setting&cp=pi&s=1');
	}
	 else{
		$msg = '<div class="errorMessageDiv" style="float:left; width:500px;">Only jpg,png,gif files are allowed to upload</div>';
		$link = Route::_('show=cpanel&callpage=setting&cp=pi&s=2');
	}
	
	redirect($link);
		}
}
?>