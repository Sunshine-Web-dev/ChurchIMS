<?php
if($mode == "add"){
	// Get product price according to size selection
	$size_cd 	= 0;
	$product_cd = $_POST['product_id'];
	
	$add_date = date('Y-m-d H:i:s');
	
	$customer_cd = $objCustomer->customer_cd;
	$objCart->setProperty("customer_cd", $customer_cd);
	$objCart->setProperty("product_cd", $product_cd);
	
	// Check if the same product has been added in the wishlist
	$objCart->lstWishlist();
	
	if($objCart->totalRecords() == 0){
		$wishlist_cd = $objCommon->genCode("rs_tbl_wishlist", "wishlist_cd");
		$objCart->setProperty("wishlist_cd", $wishlist_cd);
		$objCart->setProperty("customer_cd", $customer_cd);
		$objCart->setProperty("product_cd", $product_cd);
		$objCart->setProperty("size_cd", $size_cd);
		$objCart->setProperty("add_date", $add_date);
		$objCart->actWishList("I");
	}
	$link = Route::_('show=wishlist');
	redirect($link);
}
if($_GET['mode'] == "delete"){
	$wishlist_cd = $_GET['wishlist_cd'];
	if($wishlist_cd){
		$objCart->setProperty("wishlist_cd", $wishlist_cd);
		$objCart->actWishList("D");
	}
	$link = Route::_('show=wishlist');
	redirect($link);
}
