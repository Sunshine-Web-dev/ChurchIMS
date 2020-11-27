<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
$ArrBlocked = $_POST['unblocked'];

		for($CC=0;$CC<=count($ArrBlocked);$CC++){
		if($ArrBlocked[$CC]!=''){
		
		$objCustomerapprove = new Customer;
		$objCustomerapprove->setProperty("friend_list_id", $ArrBlocked[$CC]);
		$objCustomerapprove->setProperty("status", 1);
		$objCustomerapprove->actUserFriend('U');
		
		
		}
		}
		
		$link = Route::_('show=blocked&saved=1');
		redirect($link);
	
}

?>