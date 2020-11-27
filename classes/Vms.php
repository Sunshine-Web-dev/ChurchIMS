<?php

class Vms extends Database{

	private $_totalSql;

	public function __construct(){

		parent::__construct();

	}
	
	/**
	* This method is used to get image extension
	* @author Numan Tahir
	* @Date : 30 Dec, 2007
	* @modified : 30 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function getExtention($type){
		if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/pjpeg")
			return "jpg";
		elseif($type == "image/png")
			return "png";
		elseif($type == "image/gif")
			return "gif";
	}
	
	/**
 	* Product::getImagename()	
	* This method is used to get image name
	* @author Numan Tahir
	* @Date : 30 Dec, 2007
	* @modified : 30 Dec, 2007 by Numan Tahir
	* @return : bool
	*/

	public function getImagename($type, $product_cd = ''){
		$md5 		= md5(time());
		$filename 	=  substr($md5, rand(5, 25), 5);
		if($product_cd != ''){
			$filename = $filename . '-' . $product_cd . "." . $this->getExtention($type);
		}
		else{
			$filename = $filename . "." . $this->getExtention($type);
		}
		return $filename;
	}
	
	public function getExtentionValidate($type){

		if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/pjpeg" || $type=="image/png" || $type=="image/gif")
			
			return 1;
		
		else
			return 0;
	}
	
	public function lstVisitorCategory(){

		$Sql = "SELECT 
					vcat_id,
					vcat_name,
					vcat_status
				FROM
					rs_tbl_visitor_category
				WHERE 
					1=1";

		if($this->isPropertySet("vcat_id", "V"))
			$Sql .= " AND vcat_id='" . $this->getProperty("vcat_id") . "'";

		if($this->isPropertySet("vcat_name", "V"))
			$Sql .= " AND vcat_name='" . $this->getProperty("vcat_name") . "'";
		
		if($this->isPropertySet("vcat_status", "V"))
			$Sql .= " AND vcat_status='" . $this->getProperty("vcat_status") . "'";
		
		$Sql .= " ORDER BY vcat_name ASC ";
	
		return $this->dbQuery($Sql);
	}
	
	public function lstVisitor(){

		$Sql = "SELECT 
					visitor_id,
					first_name,
					last_name,
					gender,
					company,
					designation,
					phone_no,
					email_address,
					nic_no,
					address,
					category_id,
					visit_purpose,
					arrival_date,
					arrival_time,
					departure_date,
					departure_time,
					meet_to,
					department,
					card_number_id,
					note,
					no_of_visitor,
					visitor_status,
					user_id,
					date_time,
					visitor_img,
					entry_date
				FROM
					rs_tbl_visitor
				WHERE 
					1=1";

		if($this->isPropertySet("visitor_id", "V"))
			$Sql .= " AND visitor_id='" . $this->getProperty("visitor_id") . "'";
		
		if($this->isPropertySet("nic_no", "V"))
			$Sql .= " AND nic_no='" . $this->getProperty("nic_no") . "'";
			
		if($this->isPropertySet("arrival_date", "V"))
			$Sql .= " AND arrival_date='" . $this->getProperty("arrival_date") . "'";
			
		if($this->isPropertySet("departure_date", "V"))
			$Sql .= " AND departure_date='" . $this->getProperty("departure_date") . "'";	
			
		if($this->isPropertySet("department", "V"))
			$Sql .= " AND department='" . $this->getProperty("department") . "'";	
		
		if($this->isPropertySet("card_number_id", "V"))
			$Sql .= " AND card_number_id='" . $this->getProperty("card_number_id") . "'";	
		
		if($this->isPropertySet("visitor_status", "V"))
			$Sql .= " AND visitor_status='" . $this->getProperty("visitor_status") . "'";	
		
		if($this->isPropertySet("user_id", "V"))
			$Sql .= " AND user_id='" . $this->getProperty("user_id") . "'";	
		
		if($this->isPropertySet("st_date", "V"))
			$Sql .= " AND entry_date >='" . $this->getProperty("st_date") . "'";	

		if($this->isPropertySet("nd_date", "V"))
			$Sql .= " AND entry_date <='" . $this->getProperty("nd_date") . "'";	
		
		if($this->isPropertySet("entry_date", "V"))
			$Sql .= " AND entry_date='" . $this->getProperty("entry_date") . "'";	
		
		if($this->isPropertySet("ORDERBY", "V"))
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");
		
		if($this->isPropertySet("GROUPBY", "V"))
			$Sql .= " GROUP BY " . $this->getProperty("GROUPBY");
			
		if($this->isPropertySet("limit", "V"))
			$Sql .= $this->appendLimit($this->getProperty("limit"));
//			echo $Sql;
		return $this->dbQuery($Sql);
	}
	
	public function lstDepartment(){

		$Sql = "SELECT 
					department_id,
					department_name,
					department_detail,
					floor_no
				FROM
					rs_tbl_department
				WHERE 
					1=1";

		if($this->isPropertySet("department_id", "V"))
			$Sql .= " AND department_id='" . $this->getProperty("department_id") . "'";
		
		if($this->isPropertySet("department_name", "V"))
			$Sql .= " AND department_name='" . $this->getProperty("department_name") . "'";
		
		if($this->isPropertySet("floor_no", "V"))
			$Sql .= " AND floor_no='" . $this->getProperty("floor_no") . "'";
			
		if($this->isPropertySet("ORDERBY", "V"))
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");

		if($this->isPropertySet("limit", "V"))
			$Sql .= $this->appendLimit($this->getProperty("limit"));

		return $this->dbQuery($Sql);
	}
		
	public function lstVisitorCard(){

		$Sql = "SELECT 
					card_id,
					card_number,
					card_note,
					card_status,
					department_id
				FROM
					rs_tbl_card_number
				WHERE 
					1=1";

		if($this->isPropertySet("card_id", "V"))
			$Sql .= " AND card_id='" . $this->getProperty("card_id") . "'";
		
		if($this->isPropertySet("card_number", "V"))
			$Sql .= " AND card_number='" . $this->getProperty("card_number") . "'";
		
		if($this->isPropertySet("card_status", "V"))
			$Sql .= " AND card_status='" . $this->getProperty("card_status") . "'";
		
		if($this->isPropertySet("department_id", "V"))
			$Sql .= " AND department_id='" . $this->getProperty("department_id") . "'";
		
		$Sql .= " ORDER BY card_id ASC ";
	
		return $this->dbQuery($Sql);
	}

	public function lstReceiptSetting(){

		$Sql = "SELECT 
					setting_id,
					print_status,
					user_id
				FROM
					rs_tbl_setting
				WHERE 
					1=1";

		if($this->isPropertySet("setting_id", "V"))
			$Sql .= " AND setting_id='" . $this->getProperty("setting_id") . "'";
		
		if($this->isPropertySet("print_status", "V"))
			$Sql .= " AND print_status='" . $this->getProperty("print_status") . "'";
		
		if($this->isPropertySet("user_id", "V"))
			$Sql .= " AND user_id='" . $this->getProperty("user_id") . "'";
			
		return $this->dbQuery($Sql);
	}
	
	public function lstEmployee(){

		$Sql = "SELECT 
					employees_id,
					employees_name,
					employees_email,
					employees_phone,
					employees_address,
					employees_department,
					employees_date
				FROM
					rs_tbl_employees
				WHERE 
					1=1";

		if($this->isPropertySet("employees_id", "V"))
			$Sql .= " AND employees_id='" . $this->getProperty("employees_id") . "'";
		
		if($this->isPropertySet("employees_name", "V"))
			$Sql .= " AND employees_name='" . $this->getProperty("employees_name") . "'";
		
		if($this->isPropertySet("employees_email", "V"))
			$Sql .= " AND employees_email='" . $this->getProperty("employees_email") . "'";
		
		if($this->isPropertySet("employees_department", "V"))
			$Sql .= " AND employees_department='" . $this->getProperty("employees_department") . "'";
		
		$Sql .= " ORDER BY employees_name ASC ";
		
		return $this->dbQuery($Sql);
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//This function is used to perform DML (Delete/Update/Add)
	
	public function actEmployee($mode){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":

				$Sql = "INSERT INTO rs_tbl_employees(
					employees_id,
					employees_name,
					employees_email,
					employees_phone,
					employees_address,
					employees_department,
					employees_date) 
					VALUES(";
					
				$Sql .= $this->isPropertySet("employees_id", "V") ? $this->getProperty("employees_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("employees_name", "V") ? "'" . $this->getProperty("employees_name") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("employees_email", "V") ? "'" . $this->getProperty("employees_email") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("employees_phone", "V") ? "'" . $this->getProperty("employees_phone") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("employees_address", "V") ? "'" . $this->getProperty("employees_address") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("employees_department", "V") ? "'" . $this->getProperty("employees_department") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("employees_date", "V") ? "'" . $this->getProperty("employees_date") . "'" : "NULL";
				$Sql .= ")";
				break;

			case "U":

				$Sql = "UPDATE rs_tbl_employees SET ";
				if($this->isPropertySet("employees_name", "K")){
					$Sql .= "$cat employees_name='" . $this->getProperty("employees_name") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("employees_email", "K")){
					$Sql .= "$cat employees_email='" . $this->getProperty("employees_email") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("employees_phone", "K")){
					$Sql .= "$cat employees_phone='" . $this->getProperty("employees_phone") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("employees_address", "K")){
					$Sql .= "$cat employees_address='" . $this->getProperty("employees_address") . "'";
					$cat = ",";
				}
				if($this->isPropertySet("employees_department", "K")){
					$Sql .= "$cat employees_department='" . $this->getProperty("employees_department") . "'";
					$cat = ",";
				}
								
				$Sql .= " WHERE 1=1";
				$Sql .= " AND employees_id=" . $this->getProperty("employees_id");
				break;

			case "D":

				$Sql .= "DELETE FROM rs_tbl_employees WHERE 1=1 ";
				$Sql .= " AND employees_id=" . $this->getProperty("employees_id");
				break;

			default:
				break;
		}
		return $this->dbQuery($Sql);
	}
	
	public function actReceiptSetting($mode){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":

				$Sql = "INSERT INTO rs_tbl_setting(
					setting_id,
					print_status,
					user_id) 
					VALUES(";
					
				$Sql .= $this->isPropertySet("setting_id", "V") ? $this->getProperty("setting_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("print_status", "V") ? "'" . $this->getProperty("print_status") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("user_id", "V") ? "'" . $this->getProperty("user_id") . "'" : "NULL";
				$Sql .= ")";
				break;

			case "U":

				$Sql = "UPDATE rs_tbl_setting SET ";
				if($this->isPropertySet("print_status", "K")){
					$Sql .= "$cat print_status='" . $this->getProperty("print_status") . "'";
					$cat = ",";
				}
								
				$Sql .= " WHERE 1=1";
				$Sql .= " AND user_id=" . $this->getProperty("user_id");
				break;

			case "D":

				//$Sql .= "DELETE FROM rs_tbl_visitor_category WHERE 1=1 ";
				//$Sql .= " AND vcat_id=" . $this->getProperty("vcat_id");
				break;

			default:
				break;
		}
		return $this->dbQuery($Sql);
	}
	
	public function actVisitorCategory($mode){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":

				$Sql = "INSERT INTO rs_tbl_visitor_category(
					vcat_id,
					vcat_name,
					vcat_status) 
					VALUES(";
					
				$Sql .= $this->isPropertySet("vcat_id", "V") ? $this->getProperty("vcat_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("vcat_name", "V") ? "'" . $this->getProperty("vcat_name") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("vcat_status", "V") ? "'" . $this->getProperty("vcat_status") . "'" : "1";
				$Sql .= ")";
				break;

			case "U":

				$Sql = "UPDATE rs_tbl_visitor_category SET ";
				if($this->isPropertySet("vcat_name", "K")){
					$Sql .= "$cat vcat_name='" . $this->getProperty("vcat_name") . "'";
					$cat = ",";
				}
				
				if($this->isPropertySet("vcat_status", "K")){
					$Sql .= "$cat vcat_status='" . $this->getProperty("vcat_status") . "'";
					$cat = ",";
				}
				
				$Sql .= " WHERE 1=1";
				$Sql .= " AND vcat_id=" . $this->getProperty("vcat_id");
				break;

			case "D":

				$Sql .= "DELETE FROM rs_tbl_visitor_category WHERE 1=1 ";
				$Sql .= " AND vcat_id=" . $this->getProperty("vcat_id");
				break;

			default:
				break;
		}
		return $this->dbQuery($Sql);
	}
	
	public function actVisitor($mode){

		$mode = strtoupper($mode);

		switch($mode){

			case "I":

				$Sql = "INSERT INTO 
					rs_tbl_visitor(
					visitor_id,
					first_name,
					last_name,
					gender,
					company,
					designation,
					phone_no,
					email_address,
					nic_no,
					address,
					category_id,
					visit_purpose,
					arrival_date,
					arrival_time,
					departure_date,
					departure_time,
					meet_to,
					department,
					card_number_id,
					note,
					no_of_visitor,
					visitor_status,
					user_id,
					date_time,
					visitor_img,
					entry_date) 
					VALUES(";

				$Sql .= $this->isPropertySet("visitor_id", "V") ? $this->getProperty("visitor_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("first_name", "V") ? "'" . $this->getProperty("first_name") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("last_name", "V") ? "'" . $this->getProperty("last_name") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("gender", "V") ? "'" . $this->getProperty("gender") . "'" : "1";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("company", "V") ? "'" . $this->getProperty("company") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("designation", "V") ? "'" . $this->getProperty("designation") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("phone_no", "V") ? "'" . $this->getProperty("phone_no") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("email_address", "V") ? "'" . $this->getProperty("email_address") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("nic_no", "V") ? "'" . $this->getProperty("nic_no") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("address", "V") ? "'" . $this->getProperty("address") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("category_id", "V") ? "'" . $this->getProperty("category_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("visit_purpose", "V") ? "'" . $this->getProperty("visit_purpose") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("arrival_date", "V") ? "'" . $this->getProperty("arrival_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("arrival_time", "V") ? "'" . $this->getProperty("arrival_time") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("departure_date", "V") ? "'" . $this->getProperty("departure_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("departure_time", "V") ? "'" . $this->getProperty("departure_time") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("meet_to", "V") ? "'" . $this->getProperty("meet_to") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("department", "V") ? "'" . $this->getProperty("department") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("card_number_id", "V") ? "'" . $this->getProperty("card_number_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("note", "V") ? "'" . $this->getProperty("note") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("no_of_visitor", "V") ? "'" . $this->getProperty("no_of_visitor") . "'" : "1";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("visitor_status", "V") ? "'" . $this->getProperty("visitor_status") . "'" : "1";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("user_id", "V") ? "'" . $this->getProperty("user_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("date_time", "V") ? "'" . $this->getProperty("date_time") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("visitor_img", "V") ? "'" . $this->getProperty("visitor_img") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("entry_date", "V") ? "'" . $this->getProperty("entry_date") . "'" : "NULL";
				$Sql .= ")";
				break;

			case "U":

				$Sql = "UPDATE rs_tbl_visitor SET ";
				
				if($this->isPropertySet("first_name", "K")){
					$Sql .= "$pro first_name='" . $this->getProperty("first_name") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("last_name", "K")){
					$Sql .= "$pro last_name='" . $this->getProperty("last_name") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("gender", "K")){
					$Sql .= "$pro gender='" . $this->getProperty("gender") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("phone_no", "K")){
					$Sql .= "$pro phone_no='" . $this->getProperty("phone_no") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("nic_no", "K")){
					$Sql .= "$pro nic_no='" . $this->getProperty("nic_no") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("category_id", "K")){
					$Sql .= "$pro category_id='" . $this->getProperty("category_id") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("meet_to", "K")){
					$Sql .= "$pro meet_to='" . $this->getProperty("meet_to") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("department", "K")){
					$Sql .= "$pro department='" . $this->getProperty("department") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("card_number_id", "K")){
					$Sql .= "$pro card_number_id='" . $this->getProperty("card_number_id") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("visitor_status", "K")){
					$Sql .= "$pro visitor_status='" . $this->getProperty("visitor_status") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("departure_date", "K")){
					$Sql .= "$pro departure_date='" . $this->getProperty("departure_date") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("departure_time", "K")){
					$Sql .= "$pro departure_time='" . $this->getProperty("departure_time") . "'";
					$pro = ",";
				}
				
				$Sql .= " WHERE 1=1";
				
				if($this->isPropertySet("visitor_id", "K")){
					$Sql .= " AND visitor_id='" . $this->getProperty("visitor_id") . "'";
				}
				break;

			case "D":

				$Sql .= "DELETE FROM rs_tbl_visitor WHERE 1=1 ";
				$Sql .= " AND visitor_id=" . $this->getProperty("visitor_id");
				break;

			default:
				break;
		}
		return $this->dbQuery($Sql);
	}

	public function actDepartment($mode){
		$mode = strtoupper($mode);
		switch($mode){

			case "I":

				$Sql = "INSERT INTO rs_tbl_department(
					department_id,
					department_name,
					department_detail,
					floor_no)
						VALUES(";

				$Sql .= $this->isPropertySet("department_id", "V") ? $this->getProperty("department_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("department_name", "V") ? "'" . $this->getProperty("department_name") . "'" : "''";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("department_detail", "V") ? "'" . $this->getProperty("department_detail") . "'" : "''";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("floor_no", "V") ? "'" . $this->getProperty("floor_no") . "'" : "''";
				$Sql .= ")";
				break;

			case "U":

				$Sql = "UPDATE rs_tbl_department SET ";

				if($this->isPropertySet("department_name", "K")){
					$Sql .= "$pro department_name='" . $this->getProperty("department_name") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("department_detail", "K")){
					$Sql .= "$pro department_detail='" . $this->getProperty("department_detail") . "'";
					$pro = ",";
				}
				if($this->isPropertySet("floor_no", "K")){
					$Sql .= "$pro floor_no='" . $this->getProperty("floor_no") . "'";
					$pro = ",";
				}
				$Sql .= " WHERE 1=1";
				$Sql .= " AND department_id=" . $this->getProperty("department_id");
				break;

			case "D":

				$Sql .= "DELETE FROM rs_tbl_department WHERE 1=1 ";
				$Sql .= " AND department_id=" . $this->getProperty("department_id");
				break;

			default:
				break;

		}
		return $this->dbQuery($Sql);

	}
	
	public function actVisitorCard($mode){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":
				$Sql = "INSERT INTO rs_tbl_card_number(
					card_id,
					card_number,
					card_note,
					card_status,
					department_id) 
						VALUES(";
				$Sql .= $this->isPropertySet("card_id", "V") ? $this->getProperty("card_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("card_number", "V") ? "'" . $this->getProperty("card_number") . "'" : "''";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("card_note", "V") ? "'" . $this->getProperty("card_note") . "'" : "''";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("card_status", "V") ? "'" . $this->getProperty("card_status") . "'" : "''";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("department_id", "V") ? "'" . $this->getProperty("department_id") . "'" : "''";
				$Sql .= ")";
				break;

			case "U":

				$Sql = "UPDATE rs_tbl_card_number SET ";
				
				if($this->isPropertySet("card_number", "K")){
					$Sql .= "$pro card_number='" . $this->getProperty("card_number") . "'";
					$pro = ",";
				}
				
				if($this->isPropertySet("card_note", "K")){
					$Sql .= "$pro card_note='" . $this->getProperty("card_note") . "'";
					$pro = ",";
				}
				
				if($this->isPropertySet("department_id", "K")){
					$Sql .= "$pro department_id='" . $this->getProperty("department_id") . "'";
					$pro = ",";
				}

				if($this->isPropertySet("card_status", "K")){
					$Sql .= "$pro card_status='" . $this->getProperty("card_status") . "'";
					$pro = ",";
				}
				
				$Sql .= " WHERE 1=1";
				$Sql .= " AND card_id=" . $this->getProperty("card_id");
				break;

			case "D":

				$Sql .= "DELETE FROM rs_tbl_card_number WHERE 1=1 ";
				$Sql .= " AND card_id=" . $this->getProperty("card_id");
				break;

			default:
				break;

		}
		return $this->dbQuery($Sql);
	}

}