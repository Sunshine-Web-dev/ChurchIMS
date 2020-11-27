<?php 
if(!$objMember->member_type==1){ include("656.php");die();} 
if($_GET["report_id"]!=''){
	include_once($_GET["report_id"].'.report.php');
} else {
	$link = Route::_('');
	redirect($link);
}
?>