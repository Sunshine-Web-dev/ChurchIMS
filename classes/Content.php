<?php
/**
*
* This is a class Content
* @version 0.01
* @author Numan Tahir  <numan_tahir1@live.com>
* @Date 11 July, 2012
* @modified 11 July, 2012 by Numan Tahir
*
**/
class Content extends Database{
	/**
	* This is the constructor of the class Content
	* @author Numan Tahir
	* @Date 11 July, 2012
	* @modified 11 July, 2012 by Numan Tahir
	*/
	public function __construct(){
		parent::__construct();
	}
	
		
	/**
	* This method is used to the Help & Faq Category combo
	* @author Numan Tahir
	* @Date 11 July, 2012
	* @modified 11 July, 2012 by Numan Tahir
	*/
	public function FaqCombo($sel = "",$hfcategory){
		$opt = "";
		$Sql = "SELECT 
					faq_id,
					faq_title
				FROM
					rs_tbl_faq
				WHERE
					1=1 
					AND faq_status=1 AND faq_category_id='".$hfcategory."'";
		$this->dbQuery($Sql);
		while($rows = $this->dbFetchArray(1)){
			if($rows['faq_id'] == $sel)
				$opt .= "<option value=\"" . $rows['faq_id'] . "\" selected>" . $rows['faq_title'] . "</option>\n";
			else
				$opt .= "<option value=\"" . $rows['faq_id'] . "\">" . $rows['faq_title'] . "</option>\n";
		}
		return $opt;
	}
	
	/**
	* This method is used to get the content of site cms
	* @author Numan Tahir
	* @Date 11 July, 2012
	* @modified 11 July, 2012 by Numan Tahir
	*/
	public function getContent($type){
		$sql = "SELECT
					cms_id,
					cms_type,
					cms_title,
					cms_heading,
					cms_meta_keyword,
					cms_meta_description,
					cms_details,
					cms_date,
					cms_file,
					is_active
				FROM
					rs_tbl_contents
				WHERE
					1=1
					AND cms_type='" . $type . "'";
		
		$this->dbQuery($sql);
		$rows = $this->dbFetchArray(1);
		return $rows;
	}
	
	/**
	* This method is used to populate the CMS combo
	* @author Numan Tahir
	* @Date 11 July, 2012
	* @modified 11 July, 2012 by Numan Tahir
	*/
	public function CMSCombo($sel = "", $MainId){
		$opt = "";
		$Sql = "SELECT 
					cms_id,
					cms_title
				FROM
					rs_tbl_contents
				WHERE
					1=1 
					AND parent_id=0";
				
		if($MainId!=''){
			$Sql .= " AND cms_id!=" . $MainId;
		}
			
		$this->dbQuery($Sql);
		while($rows = $this->dbFetchArray(1)){
			if($rows['cms_id'] == $sel)
				$opt .= "<option value=\"" . $rows['cms_id'] . "\" selected>" . $rows['cms_title'] . "</option>\n";
			else
				$opt .= "<option value=\"" . $rows['cms_id'] . "\">" . $rows['cms_title'] . "</option>\n";
		}
		return $opt;
	}

	/**
	* This method is used to get the content of site cms
	* @author Numan Tahir
	* @Date 11 July, 2012
	* @modified 11 July, 2012 by Numan Tahir
	*/
	public function lstContent(){
		$Sql = "SELECT
					a.cms_id,
					a.parent_id,
					a.cms_type,
					a.cms_title,
					a.cms_heading,
					a.cms_meta_keyword,
					a.cms_meta_description,
					a.cms_details,
					a.cms_date,
					a.is_active,
					a.cms_file
				FROM
					rs_tbl_contents AS a
				WHERE
					1=1";
		if($this->isPropertySet("cms_id", "V"))
			$Sql .= " AND a.cms_id=" . $this->getProperty("cms_id");
		
		if($this->isPropertySet("parent_id", "V"))
			$Sql .= " AND a.parent_id=" . $this->getProperty("parent_id");
		
		if($this->isPropertySet("cms_type", "V"))
			$Sql .= " AND a.cms_type='" . $this->getProperty("cms_type") . "'";
		
		if($this->isPropertySet("cms_title", "V"))
			$Sql .= " AND a.cms_title='" . $this->getProperty("cms_title") . "'";
		
		if($this->isPropertySet("is_active", "V"))
			$Sql .= " AND a.is_active=" . $this->getProperty("is_active");
		
		if($this->isPropertySet("ORDERBY", "V"))
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");
		
		if($this->isPropertySet("limit", "V"))
			$Sql .= $this->appendLimit($this->getProperty("limit"));
		//echo $Sql;
		return $this->dbQuery($Sql);
	}
	
	/**
	* This method is used to get the faq of site
	* @author Numan Tahir
	* @Date 11 July, 2012
	* @modified 11 July, 2012 by Numan Tahir
	*/
	public function lstFAQ(){
		$Sql = "SELECT
					faq_id,
					faq_title,
					faq_answer,
					faq_country,
					faq_category_id,
					faq_date,
					faq_status
				FROM
					rs_tbl_faq
				WHERE
					1=1";
		if($this->isPropertySet("faq_id", "V"))
			$Sql .= " AND faq_id=" . $this->getProperty("faq_id");
		
		if($this->isPropertySet("faq_country", "V"))
			$Sql .= " AND faq_country=" . $this->getProperty("faq_country");
			
		if($this->isPropertySet("faq_category_id", "V"))
			$Sql .= " AND faq_category_id=" . $this->getProperty("faq_category_id");
			
		if($this->isPropertySet("faq_date", "V"))
			$Sql .= " AND faq_date='" . $this->getProperty("faq_date") . "'";
			
		if($this->isPropertySet("faq_status", "V"))
			$Sql .= " AND faq_status=" . $this->getProperty("faq_status");
			
		if($this->isPropertySet("ORDERBY", "V"))
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");
		
		if($this->isPropertySet("limit", "V"))
			$Sql .= $this->appendLimit($this->getProperty("limit"));

		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is used to perform DML (Delete/Update/Add)
	* on the table rr_tbl_contents the basis of property set
	* @author Numan Tahir
	* @Date 11 July, 2012
	* @modified 11 July, 2012 by Numan Tahir
	*/
	public function actContent($mode){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":
				$Sql = "INSERT INTO rs_tbl_contents(
							cms_id,
							parent_id,
							cms_type,
							cms_title,
							cms_heading,
							cms_meta_keyword,
							cms_meta_description,
							cms_details,
							cms_date,
							cms_file,
							is_active)
						VALUES(";
				$Sql .= $this->isPropertySet("cms_id", "V") ? $this->getProperty("cms_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("parent_id", "V") ? $this->getProperty("parent_id") : "0";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("cms_type", "V") ? "'" . $this->getProperty("cms_type") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("cms_title", "V") ? "'" . $this->getProperty("cms_title") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("cms_heading", "V") ? "'" . $this->getProperty("cms_heading") . "'" : "''";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("cms_meta_keyword", "V") ? "'" . $this->getProperty("cms_meta_keyword") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("cms_meta_description", "V") ? "'" . $this->getProperty("cms_meta_description") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("cms_details", "V") ? "'" . $this->getProperty("cms_details") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("cms_date", "V") ? "'" . $this->getProperty("cms_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("cms_file", "V") ? "'" . $this->getProperty("cms_file") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("is_active", "V") ? "'" . $this->getProperty("is_active") . "'" : "NULL";
				$Sql .= ")";
				break;
			case "U":
				$Sql = "UPDATE rs_tbl_contents SET ";
				if($this->isPropertySet("parent_id", "K")){
					$Sql .= "$cat parent_id='" . $this->getProperty("parent_id") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("cms_title", "K")){
					$Sql .= "$cat cms_title='" . $this->getProperty("cms_title") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("cms_heading", "K")){
					$Sql .= "$cat cms_heading='" . $this->getProperty("cms_heading") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("cms_meta_keyword", "K")){
					$Sql .= "$cat cms_meta_keyword='" . $this->getProperty("cms_meta_keyword") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("cms_meta_description", "K")){
					$Sql .= "$cat cms_meta_description='" . $this->getProperty("cms_meta_description") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("cms_details", "K")){
					$Sql .= "$cat cms_details='" . $this->getProperty("cms_details") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("cms_file", "K")){
					$Sql .= "$cat cms_file='" . $this->getProperty("cms_file") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("is_active", "K")){
					$Sql .= "$cat is_active='" . $this->getProperty("is_active") . "'";
					$cat = ",";
				}

				$Sql .= " WHERE 1=1";
				$Sql .= " AND cms_id=" . $this->getProperty("cms_id");
				break;
			case "D":
				$Sql = "DELETE FROM rs_tbl_contents 
						 WHERE 1=1";
				if($this->isPropertySet("cms_id", "K")){
					$Sql .= " AND cms_id=" . $this->getProperty("cms_id");
				}
				break;
			default:
				break;
		}
		
		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is used to perform FAQ (Delete/Update/Add)
	* on the table rs_tbl_faq the basis of property set
	* @author Numan Tahir
	* @Date 11 July, 2012
	* @modified 11 July, 2012 by Numan Tahir
	*/
	public function actFaq($mode){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":
				$Sql = "INSERT INTO rs_tbl_faq(
							faq_id,
							faq_title,
							faq_answer,
							faq_country,
							faq_category_id,
							faq_date,
							faq_status)
						VALUES(";
				$Sql .= $this->isPropertySet("faq_id", "V") ? $this->getProperty("faq_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("faq_title", "V") ? "'" . $this->getProperty("faq_title") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("faq_answer", "V") ? "'" . $this->getProperty("faq_answer") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("faq_country", "V") ? "'" . $this->getProperty("faq_country") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("faq_category_id", "V") ? "'" . $this->getProperty("faq_category_id") . "'" : "''";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("faq_date", "V") ? "'" . $this->getProperty("faq_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("faq_status", "V") ? "'" . $this->getProperty("faq_status") . "'" : "NULL";
				$Sql .= ")";
				break;
			case "U":
				$Sql = "UPDATE rs_tbl_faq SET ";
				if($this->isPropertySet("faq_title", "K")){
					$Sql .= "$cat faq_title='" . $this->getProperty("faq_title") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("faq_answer", "K")){
					$Sql .= "$cat faq_answer='" . $this->getProperty("faq_answer") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("faq_country", "K")){
					$Sql .= "$cat faq_country='" . $this->getProperty("faq_country") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("faq_category_id", "K")){
					$Sql .= "$cat faq_category_id='" . $this->getProperty("faq_category_id") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("faq_status", "K")){
					$Sql .= "$cat faq_status='" . $this->getProperty("faq_status") . "'";
					$cat = ",";
				}

				$Sql .= " WHERE 1=1";
				$Sql .= " AND faq_id=" . $this->getProperty("faq_id");
				break;
			case "D":
				$Sql = "DELETE FROM rs_tbl_faq 
						 WHERE 1=1";
				if($this->isPropertySet("faq_id", "K")){
					$Sql .= " AND faq_id=" . $this->getProperty("faq_id");
				}
				break;
			default:
				break;
		}
		
		return $this->dbQuery($Sql);
	}
}
?>