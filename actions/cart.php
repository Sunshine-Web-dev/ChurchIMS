<?php
$objCart->resetProperty();

// If the cart is to be updated (FORM POSTED)
if(isset($_POST['btnUpdate'])){
	// see if any are to be deleted

	$CartNote = $_POST["cart_note"];
	
	$objCartN = new Cart;
	$objCartNote = new Cart;
	$objlstCartNote = new Cart;
	$order_id = $objCart->getOrderCode();
	$objCart->setProperty("order_id", $order_id);
	$objCart->showCart();
	if($objCart->totalRecords() >= 1){
		while($rows = $objCart->dbFetchArray(1)){

			if($_POST['cart_' . $rows['cart_id']]){
				$objCartN->setProperty("cart_id", $rows['cart_id']);
				$objCartN->setProperty("quantity", $_POST['cart_' . $rows['cart_id']]);
				$objCartN->actCart("U");
			}
		}
	}
	
	$objlstCartNote->setProperty("order_id", $order_id);
	$objlstCartNote->lstCartNote();
	if($objlstCartNote->totalRecords() >= 1){
	$objCartNote->setProperty("order_id", $order_id);
	$objCartNote->setProperty("cart_note", $CartNote);
	$objCartNote->actCartNote("U");
	} else {
	$cart_note_id =	$objCommon->genCode("rs_tbl_cart_note", "cart_note_id");
	$objCartNote->setProperty("cart_note_id", $cart_note_id);
	$objCartNote->setProperty("order_id", $order_id);
	$objCartNote->setProperty("cart_note", $CartNote);
	$objCartNote->actCartNote("I");	
	}
				
	$link = Route::_('show=cart');
	redirect($link);
}

if(isset($_POST['btnContinue'])){
	$link = Route::_('show=products');
	redirect($link);
}

if(isset($_POST['btnCheckout'])){
	$link = Route::_('show=checkout');
	redirect($link);
}

if(isset($_POST['btnWishlist'])){
	if(!$objCustomer->customer_login){
		$link = Route::_('show=login');
		redirect($link);
	}
	$mode = 'add';
	require_once(dirname(__FILE__) . '/wishlist.php');
}

// add to cart

if(isset($_POST['btnCart'])){
	// Get product price according to size selection
	$size_id 		= $_POST['size_id'];
	$color_id 		= $_POST['color_id'];	

	// Get Product details first
	$product_id 	= $_POST['product_id'];
	$objProduct->setProperty("product_id", $product_id);
	$objProduct->lstProducts();
	$rows_prd = $objProduct->dbFetchArray(1);
	$price 			= $rows_prd['product_price'];

	// Get card code/id
	$cart_id 		= $objCommon->genCode("rs_tbl_cart", "cart_id");
	$order_id 		= $objCart->getOrderCode();
	if(!$order_id)
		$order_id 	= $objCart->genOrderCode($cart_id);
	
	$customer_id 	= ($objCustomer->customer_id) ? $objCustomer->customer_id : 0;
	if($_POST['pro_qty']=='' or $_POST['pro_qty']==0){
		$quantity 		= 1;
	} else {
		$quantity 		= $_POST['pro_qty'];
	}
	
	$add_date 		= date('Y-m-d H:i:s');
	$objGetSeller	= new Product;
	$seller_id 		= $objGetSeller->GetSellerId($product_id);
	$objCart->setProperty("order_id", $order_id);
	$objCart->setProperty("product_id", $product_id);
	// Check if the same product has been added in the cart
	// update if already added and add new if not
	$objCart->showCart();
	
	if($objCart->totalRecords() >= 1){
		$t = 1;
		$objCartAct = new Cart;
		$rows_u 	= $objCart->dbFetchArray(1);
		$quantity 	= $rows_u['quantity'] + 1;
		$objCartAct->setProperty("cart_id", $rows_u['cart_id']);
		$objCartAct->setProperty("quantity", $quantity);
		$objCartAct->actCart("U");
	}
	else{
		$t = 2;
		$objCartAct = new Cart;
		$objCartAct->setProperty("cart_id", $cart_id);
		$objCartAct->setProperty("order_id", $order_id);
		$objCartAct->setProperty("customer_id", $customer_id);
		$objCartAct->setProperty("seller_id", $seller_id);
		$objCartAct->setProperty("product_id", $product_id);
		$objCartAct->setProperty("size_id", $size_id);
		$objCartAct->setProperty("color_id", $color_id);
		$objCartAct->setProperty("quantity", $quantity);
		$objCartAct->setProperty("price", $price);
		$objCartAct->setProperty("add_date", $add_date);
		$objCartAct->setProperty("cart_lng", $_SESSION['allsite_lang']);
		$objCartAct->actCart("I");
	}
	//die('-------'.$objCart->totalRecords().'-------');
	//$link = Route::_('show=cart&p='.$product_id.'&c='.$order_id.'&t='.$t);
	$link = Route::_('show=cart');
	redirect($link);
}

// add to cart By Request

//if(isset($_POST['btnCart'])){
if($_REQUEST['Add']=='CT'){
	// Get product price according to size selection
	$size_id 		= 0;
	$color_id 		= 0;

	// Get Product details first
	$product_id 	= $_GET['CTID'];
	$objProduct->setProperty("product_id", $product_id);
	$objProduct->lstProducts();
	$rows_prd = $objProduct->dbFetchArray(1);
	
	// Check if the product is in sale
	//$price 			= ('Y' == $rows_prd['is_sale']) ? $rows_prd['product_sale_price'] : $rows_prd['product_price'];
	
	if($rows_prd['is_sale'] == 'Y'){

	if($objProduct->printPrice($rows_prd['product_sale_price'])!='' && $rows_prd['product_sale_price']!='0.00' && $objProduct->printPrice($rows_prd['product_sale_price'])!=$objProduct->printPrice($rows_prd['product_price'])){
	$price 			= $rows_prd['product_sale_price'];	
	} else {
	$price 			= $rows_prd['product_price'];
	}
		} else {
		$price 			= $rows_prd['product_price'];
		}
	
	
	$objProductPrice = new Product;
	$prices = $objProductPrice->getPrice($product_cd);
	//$price = $prices['discounted_price'];
	
	// Get card code/id
	$cart_id 		= $objCommon->genCode("rs_tbl_cart", "cart_id");
	$order_id 		= $objCart->getOrderCode();
	
	if(!$order_id)
		$order_id 	= $objCart->genOrderCode($cart_id);
	
	$customer_id 	= ($objCustomer->customer_id) ? $objCustomer->customer_id : 0;
	$quantity 		= 1;
	$add_date 		= date('Y-m-d H:i:s');
	
	$objCart->setProperty("order_id", $order_id);
	$objCart->setProperty("product_id", $product_id);
	
	// Check if the same product has been added in the cart
	// update if already added and add new if not
	$objCart->showCart();
	if($objCart->totalRecords() >= 1){
		$objCartAct = new Cart;
		$rows_u 	= $objCart->dbFetchArray(1);
		$quantity 	= $rows_u['quantity'] + 1;
		$objCartAct->setProperty("cart_id", $rows_u['cart_id']);
		$objCartAct->setProperty("quantity", $quantity);
		$objCartAct->actCart("U");
	}
	else{
		$objCartAct = new Cart;
		$objCartAct->setProperty("cart_id", $cart_id);
		$objCartAct->setProperty("order_id", $order_id);
		$objCartAct->setProperty("customer_id", $customer_id);
		$objCartAct->setProperty("product_id", $product_id);
		$objCartAct->setProperty("size_id", 0);
		$objCartAct->setProperty("color_id", 0);
		$objCartAct->setProperty("quantity", $quantity);
		$objCartAct->setProperty("price", $price);
		$objCartAct->setProperty("add_date", $add_date);
		$objCartAct->setProperty("cart_lng", $_SESSION['allsite_lang']);
		$objCartAct->actCart("I");
	}
	$link = Route::_('show=cart');
	redirect($link);
}

// delete cart item
if("delete" == $_GET['mode']){
	$cart_id = $_GET['cart_id'];
	if($cart_id){
		$objCart->setProperty("cart_id", $cart_id);
		$objCart->actCart("D");
	}
	$link = Route::_('show=cart');
	redirect($link);
}

if($_REQUEST['del']=='item' && $_REQUEST['co']!='' && $_REQUEST['ci']!=''){
	$cart_id = DecData($_REQUEST['ci']);
	if($cart_id){
		$objCart->setProperty("cart_id", $cart_id);
		$objCart->actCart("D");
	}
	$link = Route::_('show=cart');
	redirect($link);
}