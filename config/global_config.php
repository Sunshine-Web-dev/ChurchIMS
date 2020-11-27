<?php
// Global configuration
$_CONFIG['site_name'] 			= "zFlex";
$_CONFIG['site_short_name'] 	= "zFlex";
$_CONFIG['admin_email'] 		= "numantahir1@gmail.com";

if($_SERVER['HTTP_HOST'] == "localhost"){# For local

	$_CONFIG['site_url'] 		= "http://localhost/zflex/";
	$_CONFIG['site_path'] 		= $_SERVER['DOCUMENT_ROOT'] . "/zflex/";
	
} else { # For Web

	$_CONFIG['site_url']          = "http://".$_SERVER['SERVER_NAME']."/";
	$_CONFIG['site_path']         = $_SERVER['DOCUMENT_ROOT'] . "/";

}
$_CONFIG['cipher_key']			= 'hM)!Ej@fg^SW(Tt#GL)';
$_CONFIG['domain_code'] 		= "0";
$_CONFIG['file_ext'] 			= ".html";
$_CONFIG['site_folder'] 		= "/"; //  change this to only / if the site is in LIVE without any folder.
$_CONFIG['html_path'] 			= $_CONFIG['site_path'] . "html/";
$_CONFIG['html_url'] 			= $_CONFIG['site_url'] . "html/";
$_CONFIG['ajax_path'] 			= $_CONFIG['site_path'] . "ajax_html/";
$_CONFIG['ajax_url'] 			= $_CONFIG['site_url'] . "ajax_html/";
$_CONFIG['inc_path'] 			= $_CONFIG['site_path'] . "includes/";

// Action pages path
$_CONFIG['action_path'] 		= $_CONFIG['site_path'] . "actions/";
$_CONFIG['action_url'] 			= $_CONFIG['site_url'] . "actions/";

// Classses pages path
$_CONFIG['class_path']   = $_CONFIG['site_path'] . "classes/";
$_CONFIG['class_url']    = $_CONFIG['site_url'] . "classes/";

$_CONFIG['images_url'] 			= $_CONFIG['site_url'] . "images/";

// Security/Captcha path
$_CONFIG['sec_path'] 			= $_CONFIG['site_path'] . "security/";
$_CONFIG['sec_url'] 			= $_CONFIG['site_url'] . "security/";

// Editor path
$_CONFIG['editor_path'] 		= $_CONFIG['site_url'] . "jscript/";

// Editor path
$_CONFIG['security_path'] 		= $_CONFIG['site_path'] . "security/";
$_CONFIG['security_url'] 		= $_CONFIG['site_url'] . "security/";

// Template paths
$_CONFIG['template_url'] 		= $_CONFIG['site_url'] . "email_template/";
$_CONFIG['template_path'] 		= $_CONFIG['site_path'] . "email_template/";

// Church Image
$_CONFIG['church_img_url'] 		= $_CONFIG['site_url'] . "church/";
$_CONFIG['church_img_path']		= $_CONFIG['site_path'] . "church/";

// Profile Image
$_CONFIG['profile_img_url'] 		= $_CONFIG['site_url'] . "profile/";
$_CONFIG['profile_img_path']		= $_CONFIG['site_path'] . "profile/";
$_CONFIG['profile_thumb_url'] 	= $_CONFIG['profile_img_url'] . "thumb/";
$_CONFIG['profile_thumb_path']	= $_CONFIG['profile_img_path'] . "thumb/";

// Slider Path
$_CONFIG['slider_url'] 			= $_CONFIG['site_url'] . "slider/";
$_CONFIG['slider_path'] 		= $_CONFIG['site_path'] . "slider/";

// Gallery path
$_CONFIG['gallery_url'] 		= $_CONFIG['site_url'] . "gallery/";
$_CONFIG['gallery_path'] 		= $_CONFIG['site_path'] . "gallery/";
$_CONFIG['gallery_small_url'] 	= $_CONFIG['gallery_url'] . "small/";
$_CONFIG['gallery_small_path']	= $_CONFIG['gallery_path'] . "small/";
$_CONFIG['gallery_thumb_url'] 	= $_CONFIG['gallery_url'] . "thumb/";
$_CONFIG['gallery_thumb_path']	= $_CONFIG['gallery_path'] . "thumb/";

// Product Path
$_CONFIG['product_url'] 		= $_CONFIG['site_url'] . "product_image/";
$_CONFIG['product_path'] 		= $_CONFIG['site_path'] . "product_image/";
$_CONFIG['product_large_url']	= $_CONFIG['product_url'] . "large/";
$_CONFIG['product_large_path']	= $_CONFIG['product_path'] . "large/";

$_CONFIG['product_470_url']		= $_CONFIG['product_url'] . "470/";
$_CONFIG['product_470_path']		= $_CONFIG['product_path'] . "470/";

$_CONFIG['product_210_url']		= $_CONFIG['product_url'] . "210/";
$_CONFIG['product_210_path']	= $_CONFIG['product_path'] . "210/";
$_CONFIG['product_120_url']		= $_CONFIG['product_url'] . "120/";
$_CONFIG['product_120_path']	= $_CONFIG['product_path'] . "120/";
$_CONFIG['product_80_url']		= $_CONFIG['product_url'] . "80/";
$_CONFIG['product_80_path']		= $_CONFIG['product_path'] . "80/";
$_CONFIG['product_50_url']		= $_CONFIG['product_url'] . "50/";
$_CONFIG['product_50_path']		= $_CONFIG['product_path'] . "50/";



// Country
$_CONFIG['SITE_COUNTRY'] 		= $_SESSION['site_country'];

// Date format
$_CONFIG['date_format'] 		= 'Y-m-d'; # should be PHP supported date formats

// Product Image
$_CONFIG['prd_full_image_w'] 	= 340;
$_CONFIG['prd_full_image_h'] 	= 340;
$_CONFIG['prd_thumb_image_w'] 	= 75;
$_CONFIG['prd_thumb_image_h'] 	= 75;
$_CONFIG['prd_admin_image_w'] 	= 150;
$_CONFIG['prd_admin_image_h'] 	= 150;

// Facebook config
$_CONFIG['facebook_url']		= 'http://divartist.com/return_frm_fb.php';
$_CONFIG['PAYPAL_URL']			= 'https://www.paypal.com/cgi-bin/webscr';

// Action Path
$_CONFIG['action_path'] 		= $_CONFIG['site_path'] . "actions/";
$_CONFIG['action_url'] 			= $_CONFIG['site_url'] . "actions/";

// 
$_CONFIG['lang'] 				= 'EN';
$_CONFIG['site_currency'] 		= 'USD'; # EUR | GBP | 
$_CONFIG['currency_symbol'] 	= '$'; # EUR | GBP | 
$_CONFIG['code_length'] 		= 6;

$_CONFIG['ProDes_Limit']		= "150";
$_CONFIG['PERPAGE']				= "20";
$_CONFIG['per_page_data'] 		= 24;
$_CONFIG['offset'] 				= 10;
$_CONFIG['TT_DATA']		 		= 10;
$_CONFIG['REPROT_LIMIT'] 		= 5;

// Image
$_CONFIG['d_full_image_max_w'] 	= 340;
$_CONFIG['d_thumb_w'] 			= 340;

$_CONFIG['mod_rewrite'] 		= 'true'; // false | true

//Product Taxes
$_CONFIG['pro_taxes'] 			= 0.19;

?>