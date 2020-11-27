<?php
/**
*
* This is a class Common
* @version 0.01
* @author Numan Tahir <numan_tahir1@yahoo.com>
* @Date 17 April, 2008
* @modified 17 April, 2008 by Numan Tahir
*
**/
class Common extends Database{
	public $mTextbox = array();
	public $mTextarea = array();
	public $mRadioYesNo = array();
	public $mSelect = array();
	
	/**
	* This is the constructor of the class Common
	* @author Numan Tahir <numan_tahir1@yahoo.com>
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function __construct(){
		parent::__construct();
		$this->mTextbox = array('max_amount_for_shipping', 'tax_charge','shipping_charge','site_email','email_from', 'delivery_time', 'code', 'consumer_key', 'consumer_secret', 'facebook_api_id', 'facebook_secret');
		$this->mTextarea = array('site_name','meta_title','meta_keywords','meta_desc', 'shipping_types');
		$this->mRadioYesNo = array('seo_url', 'front_image_click');
	}
	
	/**
	* This function is used to get the page to be included
	* @author Numan Tahir <numan_tahir1@yahoo.com>
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function getPage($page){
		if(isset($page) && !empty($page)){
			$filename = HTML_PATH . ($page) . '.default' . '.php';
			if(file_exists($filename))
				require_once(HTML_PATH . ($page) . '.default' . '.php');
			else
				require_once(HTML_PATH . '404' . '.php');
		}
		else{
			require_once(HTML_PATH . 'default.php');
		}
	}
	
	/**
	* This method is used to get a particular configuration value
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function getConfigValue($key){
		if($key){
			$sql = "SELECT
						config_value
					FROM
						rs_tbl_config
					WHERE
						config_key='" . $key . "'";
			$this->dbQuery($sql);
			$rows = $this->dbFetchArray(1);
			return $rows['config_value'];
		}
		else{
			return false;
		}
	}
	
	/**
	* This method is used to list the configurations
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function lstConfig(){
		$Sql = "SELECT
					config_id,
					config_category,
					config_caption,
					config_key,
					config_value,
					config_order
				FROM
					rs_tbl_config
				WHERE
					1=1";
		if($this->isPropertySet("config_id", "V"))
			$Sql .= " AND config_id=" . $this->getProperty("config_id");
		
		if($this->isPropertySet("config_category", "V"))
			$Sql .= " AND config_category='" . $this->getProperty("config_category") . "'";
		
		if($this->isPropertySet("config_key", "V"))
			$Sql .= " AND config_key='" . $this->getProperty("config_key") . "'";
		
		if($this->isPropertySet("config_id_not", "V"))
			$Sql .= " AND config_id!=" . $this->getProperty("config_id_not");
			
		$Sql .= " ORDER BY config_order ASC";
		return $this->dbQuery($Sql);
	}

	/**
	* This function is used to perform DML (Delete/Update/Add)
	* on the table config the basis of property set
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function actConfig($mode){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":
				$Sql = "INSERT INTO rs_tbl_config(
						config_id,
						config_category,
						config_caption,
						config_key,
						config_value,
						config_order)
						VALUES(";
				$Sql .= $this->isPropertySet("config_id", "V") ? $this->getProperty("config_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("config_category", "V") ? "'" . $this->getProperty("config_category") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("config_caption", "V") ? "'" . $this->getProperty("config_caption") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("config_key", "V") ? "'" . $this->getProperty("config_key") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("config_value", "V") ? "'" . $this->getProperty("config_value") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("config_order", "V") ? $this->getProperty("config_order") : "NULL";

				$Sql .= ")";
				break;
			case "U":
				$Sql = "UPDATE rs_tbl_config SET ";
				if($this->isPropertySet("config_value", "K")){
					$Sql .= "config_value='" . $this->getProperty("config_value") . "'";
				}
				$Sql .= " WHERE 1=1";
				if($this->isPropertySet("config_key", "V"))
					$Sql .= " AND config_key='" . $this->getProperty("config_key") . "'";
				else
					$Sql .= " AND config_id=" . $this->getProperty("config_id");
				break;
			case "D":
				break;
			default:
				break;
		}
		return $this->dbQuery($Sql);
	}
	
	/**
	* This method is used to populate the country combo
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function countryCombo($sel){
		$opt = "";
		$Sql = "SELECT 
					country_id,
					country_name,
					iso_code_2,
					iso_code_3
				FROM
					rs_tbl_countries
				WHERE
					1=1";
		$this->dbQuery($Sql);
		while($rows = $this->dbFetchArray(1)){
			if($rows['country_id'] == $sel)
				$opt .= "<option value=\"" . $rows['country_id'] . "\" selected>" . $rows['country_name'] . "</option>\n";
			else
				$opt .= "<option value=\"" . $rows['country_id'] . "\">" . $rows['country_name'] . "</option>\n";
		}
		return $opt;
	}
	
	/**
	* This method is used to get the country name
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function getCountryName($id){
		if($id!=''){
		$opt = "";
		$Sql = "SELECT 
					country_name
				FROM
					rs_tbl_countries
				WHERE
					1=1 
					AND country_id=" . $id;
		$this->dbQuery($Sql);
		$rows = $this->dbFetchArray(1);
		$CountryNamePass = $rows['country_name'];
		} else {
		$CountryNamePass = 'Non';
		}
		return $CountryNamePass;
	}
	
	/**
	* This method is used to get the country name
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function getCountryNameCODE($code){
		$opt = "";
		$Sql = "SELECT 
					country_name,
					iso_code_3
				FROM
					rs_tbl_countries
				WHERE
					1=1 
					AND iso_code_3='" . $code . "'";
		$this->dbQuery($Sql);
		$rows = $this->dbFetchArray(1);

		return $rows['country_name'];
	}
	
	
	
	
	
	/**
	* This method is used to get the country name
	* @author Numan Tahir
	* @Date 13 July, 2011
	* @modified 13 July, 2011 by Numan Tahir
	*/
	public function lstCountryName(){
		$opt = "";
		$Sql = "SELECT 
					country_id,
					country_name,
					iso_code_2,
					iso_code_3
				FROM
					rs_tbl_countries
				WHERE
					1=1";
		
		if($this->isPropertySet("country_id", "V"))
			$Sql .= " AND country_id=" . $this->getProperty("country_id");
			
		if($this->isPropertySet("iso_code_3", "V"))
			$Sql .= " AND iso_code_3='" . $this->getProperty("iso_code_3") . "'";
		
		if($this->isPropertySet("ORDERBY", "V"))
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");
			
		return $this->dbQuery($Sql);
	}
	
	

	/**
	* This method is used to get the admin including page
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function getAdminPage($page){
		if($page && $page != ""){
			$this->pageName = $page;
			$page = preg_replace("/\./", "\/", $page);
			$page = "pages/" . $page . ".php";
			if(!file_exists($page)){
				$page = "../html/404.php";
			}
		}
		else{
			$page = "pages/home.php";
		}
		return $page;
	}

	/**
	* This method is used to set the message
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function setMessage($msg = NULL, $type = 'status'){
		if($msg){
			if(!isset($_SESSION['msg'])){
				$_SESSION['msg'] = array();
			}
			if(!isset($_SESSION['msg'][$type])){
				$_SESSION['msg'][$type] = array();
			}
			$_SESSION['msg'][$type][] = $msg;
		}
		return isset($_SESSION['msg']) ? $_SESSION['msg'] : NULL;
	}
	
	/**
	* This method is used to get the message
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function getMassage(){
		if ($msg = $this->setMessage()){
			unset($_SESSION['msg']);
		}
		return $msg;
	}

	/**
	* This method is used to display the message
	* @author Numan Tahir
	* @Date 14 Dec, 2007
	* @modified 14 Dec, 2007 by Numan Tahir
	*/
	public function displayMessage($flag = true){
		if($data = $this->getMassage()){
			$output = '';
			//$output = 	'<div style="margin:5px;border:1px #639ecb solid;text-align:left;width:50%; *padding:10px 4px 0px 0px; *margin:0px 2px; color:#000; padding-left:10px; margin-left:12px;">';
			$output = 	'<div style="width:97%; *padding:10px 4px 0px 0px; *margin:0px 2px; margin-left:12px;"><p class="info" id="success"><span class="info_inner">';
			foreach($data as $type => $msg){
				if(count($msg) >= 1 && $type == 'Error'){
					foreach($msg as $msg){
						$output .=	$msg ;
					}
				}
				else if(count($msg) > 1 && $type == 'Info'){
					foreach($msg as $msg){
						$output .= $msg;
					}
				}
		  		else{
					$output .= $msg[0];
		  		}
			}
			$output .=	'</span></p></div>';
		}
		return $output;
	}
	
	/**
	* This method is used to display the message
	* @author Numan Tahir
	* @Date 14 Dec, 2007
	* @modified 14 Dec, 2007 by Numan Tahir
	*/
	public function LoadWindows($flag = true){
		if($data = $this->getMassage()){
			$output = '';
			foreach($data as $type => $msg){
				if(count($msg) >= 1 && $type == 'Error'){
					foreach($msg as $msg){
						$output .=	$msg ;
					}
				}
				else if(count($msg) > 1 && $type == 'Info'){
					foreach($msg as $msg){
						$output .= $msg;
					}
				}
		  		else{
					$output .= $msg[0];
		  		}
			}
		}
		return $output;
	}
	
	/**
	* This method is used to display the Login message
	* @author Numan Tahir
	* @Date 14 Dec, 2007
	* @modified 14 Dec, 2007 by Numan Tahir
	*/
	public function DisplayLoginMessage($flag = true){
		if($data = $this->getMassage()){
			$output = '';
			
			foreach($data as $type => $msg){
				if(count($msg) >= 1 && $type == 'Error'){
					foreach($msg as $msg){
						$output .= 	'<div style="width:97%; *padding:10px 4px 0px 0px; *margin:0px 2px; margin-left:12px;"><p class="info" id="error"><span class="info_inner">';
						$output .=	$msg ;
					}
				}
				else if(count($msg) > 1 && $type == 'Info'){
					foreach($msg as $msg){
						$output .= 	'<div style="width:97%; *padding:10px 4px 0px 0px; *margin:0px 2px; margin-left:12px;"><p class="info" id="warning"><span class="info_inner">';
						$output .= $msg;
					}
				}
		  		else{
					$output .= 	'<div style="width:97%; *padding:10px 4px 0px 0px; *margin:0px 2px; margin-left:12px;"><p class="info" id="success"><span class="info_inner">';
					$output .= $msg[0];
		  		}
			}
			$output .=	'</span></p></div>';
		}
		return $output;
	}
	
	/**
	* This method is used to get the new passowrd characters
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function genPassword($char = 6){
		$md5 = md5(time());
		return substr($md5, rand(5, 25), $char);
	}
	
	/**
	* This method is used to print date
	* @author Numan Tahir
	* @Date 26 April, 2008
	* @modified 26 April, 2008 by Numan Tahir
	*/
	public function printDate($date){
		return date(DATE_FORMAT, strtotime($date));
	}
	
	/**
	* This method is used to return the tinyMCE header information
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
	*/
	public function tinyMCEHeader($objName){
		$content = '<script language="javascript" type="text/javascript">
			tinyMCE.init({
				mode : "exact",
				elements : "' . $objName . '",
				theme : "advanced",
				theme_advanced_buttons1 : "bold,italic,underline,fontselect,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,forecolor,backcolor,removeformat,cleanup,code",
				theme_advanced_buttons2 : "",
				theme_advanced_buttons3 : "",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
				theme_advanced_resizing : true,
				theme_advanced_resize_horizontal : true
			});
		</script>
		';
		return $content;
	}
	
	/**
	* This method is used to check single-line inputs
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
 	* @return true if text contains newline character
	*/
	public function hasNewLines($text) {
		return preg_match("/(%0A|%0D|\n+|\r+)/i", $text);
	}
	 
	/**
	* This method is used to Check multi-line inputs
	* @author Numan Tahir
	* @Date 17 April, 2008
	* @modified 17 April, 2008 by Numan Tahir
 	* @return true if text contains newline followed by email-header specific string
	*/
	public function hasEmailHeaders($text) {
		return preg_match("/(%0A|%0D|\n+|\r+)(content-type:|to:|cc:|bcc:)/i", $text);
	}
	
	/**
	* This method is used to get the new code/id for the table.
	* @author Numan Tahir
	* @Date : 18 July, 2012
	* @modified :  18 July, 2012 by Numan Tahir
	* @return : bool
	*/
	public function genCode($table, $field){
		$Sql = "SELECT 
					MAX(" . $field . ") + 1 AS MaxValueR
				FROM 
					" . $table . "
				WHERE
					1=1";
		$this->dbQuery($Sql);
		$rows = $this->dbFetchArray(1);
		if($rows['MaxValueR'] != NULL && $rows['MaxValueR'] != "")
			return $rows['MaxValueR'];
		else
			return 1;
	}
}
?>