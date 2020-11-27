<?php
				// My Account Actions
				$objCustomer->setProperty("user_id", $objCustomer->user_id);
				$objCustomer->lstUsers();
				$TwitterUserName = $objCustomer->dbFetchArray(1);
				
				$Twtiiter_Username_Print = $TwitterUserName["username"];

				$objOuthRzCods = new Leagues;
				$objOuthRzCods->setProperty("user_id", $TwitterUserName["user_id"]);
				$objOuthRzCods->setProperty("user_type", 4);
				$objOuthRzCods->lstTwitterFilter();
				$AuthCode = $objOuthRzCods->dbFetchArray(1);
				$TwitterCode = $AuthCode["oauth_token"];
				$FacebookCode = $AuthCode["oauth_code"];
					if($TwitterCode!=''){
						if($_SESSION['t_checked']==1){
					$TwitterChecked = ' checked="checked"';
						} elseif($_SESSION['t_checked']==2){
					$TwitterChecked = '';	
						} else {
					$TwitterChecked = ' checked="checked"';
						}
					} else {
					//$TwitterChecked = ' onclick="javascript:twitter_chkbx.checked=false; window.open(\' '. SITE_URL .'redirect.php?st=y&show='.$_SERVER['QUERY_STRING'].'&MT='. EncData("Redirect|Twitter").'\', \'Twitter\', \'menubar=no,width=790,height=420,toolbar=no\');"';
					}
					if($FacebookCode!=''){
						if($_SESSION['f_checked']==1){
					$FacebookChecked = ' checked="checked"';
						} elseif($_SESSION['f_checked']==2){
					$FacebookChecked = '';	
						} else {
					$FacebookChecked = ' checked="checked"';
						}
					} else {
					//$FacebookChecked = ' onclick="javascript:facebook_chkbx.checked=false; window.open(\''. SITE_URL.'redirect.php?st=y&show='.$_SERVER['QUERY_STRING'].'&MT='. EncData("Redirect|Facebook").'\', \'Facebook\', \'menubar=no,width=790,height=420,toolbar=no\');"';
					}

?>