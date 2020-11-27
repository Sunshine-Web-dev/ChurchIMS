<?php
session_start();
session_destroy();
unset(
	$_SESSION['member_login'],
	$_SESSION['member_id'],
	$_SESSION['username'],
	$_SESSION['fullname'],
	$_SESSION['login_time'],
	$_SESSION['first_name']);	
$link = Route::_('');
redirect($link);