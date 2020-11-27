<?php
		
	if(MOD_REWRITE != 'false'){
		// content remove leading slash

		if(isset($_GET['content']))
			$_GET['content'] = str_replace('/', '', $_GET['content']);
		
		$site_title = _META_TITLE;
		if(isset($_GET['category']) && !empty($_GET['category'])):
			$_GET['category'] = str_replace('/', '', $_GET['category']);
			$objProductURL = new Product;
			$objProductURL->setProperty('url_key', $_GET['category']);
			$objProductURL->lstCategory();
			$rows_cat_url = $objProductURL->dbFetchArray(1);
			if($_GET['show']=='category'){
			$objProduct = new Product;
			$objProduct->setProperty('url_key', $_GET['category']);
			$objProduct->lstCategories();
			$row_prd = $objProduct->dbFetchArray(1);
			//$qstring .= '/' . $row_prd['url_key'];	
			//$_GET['category_cd'] = $rows_cat_url['sub_cat_id'];
			if(!empty($site_title)){
				$site_title .= ' >> ';
			}
			$site_title .= $rows_cat_url['category_name'];				
			
			} else {
			$_GET['category_cd'] = $rows_cat_url['sub_cat_id'];
			if(!empty($site_title)){
				$site_title .= ' >> ';
			}
			$site_title .= $rows_cat_url['category_name'];
			}
		endif;
		
		if(isset($_GET['product']) && !empty($_GET['product'])){
			$_GET['product'] = str_replace('/', '', $_GET['product']);
			$objProductURL = new Product;
			$objProductURL->setProperty('url_key', $_GET['product']);
			$objProductURL->lstProducts();
			$rows_prd_url = $objProductURL->dbFetchArray(1);
			$_GET['product_id'] = $rows_prd_url['product_id'];
			if(!empty($site_title)){
				//$site_title .= ' >> ' . $rows_prd_url['sub_cat_name'] . ' >> ' ;
				$site_title .= ' >> ' ;
			}
			
			$site_title .= $rows_prd_url['product_name'];
		}
		
	}
		
		
		if($_GET['show']=='report'){
			$objCommon = new Common;
			$site_title =  $objCommon->getConfigValue('meta_title');
			$site_title .= ' '. 'Report';
		}
		
		if($_GET['show']=='cms'){
				$objContents = new Content;
				$objContents->setProperty('cms_type', $_GET['content']);
				$objContents->lstContent();
				$row_Content = $objContents->dbFetchArray(1);
			$objCommon = new Common;
			$site_title =  $objCommon->getConfigValue('meta_title');
			$site_title .= ' '. $row_Content["cms_title"];
		}
		
		if($_GET['show']=='products' && $_GET['category_id']!=''){
				$objCategory = new Product;
				$objCategory->setProperty("category_id", $_GET['category_id']);
				$objCategory->lstCategories();
				$CategoryName = $objCategory->dbFetchArray(1);

			$site_title .= ' >> '. $CategoryName["category_name"];
		}
	
	if($_GET['show'] == 'zoeken'):
		$_GET['show'] = 'products';
	endif;
	
	if(empty($site_title)){
		//$site_title = _META_TITLE;
		$objCommon = new Common;
		$site_title =  $objCommon->getConfigValue('meta_title');
	}