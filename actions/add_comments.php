<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$objAdminUser 		= new AdminUser;
	$customer_id		= trim($_POST['customer_id']);
	$product_id			= trim($_POST['product_id']);
	$my_comments		= trim($_POST['my_comments']);
	
	$objValidate->setArray($_POST);
	$objValidate->setCheckField("my_comments", 'Comment' . _IS_REQUIRED_FLD, "S");
	$vResult = $objValidate->doValidate();
	
	// See if any error are not returned
	if(!$vResult){
		
	$comment_id = $objAdminUser->genCode("rs_tbl_product_comments", "comment_id");
	$objProduct->setProperty("comment_id", $comment_id);
	$objProduct->setProperty("customer_id", $customer_id);
	$objProduct->setProperty("product_id", $product_id);
	$objProduct->setProperty("comment", $my_comments);
	$objProduct->setProperty("is_active", 1);
	$objProduct->setProperty("date", date('Y-m-d'));
	$objProduct->actProductComments('I');

		$link = Route::_('show=blog&product_id='.$product_id.'&save=1');
		redirect($link);
	}
}
?>