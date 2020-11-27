<?php
/**
*
* This is a class AdminUser
* @version 0.01
* @author Numan Tahir  <numan_tahir1@live.com>
* @Date 10 Aug, 2007
* @modified 10 Aug, 2007 by Numan Tahir
*
**/
class AdminUser extends Database{
	public $is_login;
	public $admin_id;
	public $user_name;
	public $fullname_name;
	public $logged_in_time;
	public $mem_type;

	/*
	* This is the constructor of the class AdminUser
	* @author Numan Tahir  <numan_tahir1@live.com>
	* @Date 10 Aug, 2007
	* @modified 10 Aug, 2007 by Numan Tahir
	*/
	public function __construct(){
		parent::__construct();
		if(isset($_SESSION['is_login']) == true){
			$this->is_login 		= $_SESSION['is_login'];
			$this->admin_id 		= $_SESSION['admin_id'];
			$this->username 		= $_SESSION['username'];

			$this->mem_type 		= $_SESSION['mem_type'];

			$this->fullname_name 	= $_SESSION['fullname_name'];

			$this->logged_in_time 	= $_SESSION['logged_in_time'];

		}

	}



	/*

	* This is the function to set the admin user logged in

	* @author Numan Tahir

	* @Date 13 Dec, 2007

	* @modified 13 Dec, 2007 by Numan Tahir

	*/

	public function setAdminLogin(){

		$_SESSION['is_login'] 	= true;

		if($this->isPropertySet("admin_id", "V"))

			$_SESSION['admin_id'] 		= $this->getProperty("admin_id");

		if($this->isPropertySet("username", "V"))

			$_SESSION['username'] 		= $this->getProperty("username");

		if($this->isPropertySet("logged_in_time", "V"))

			$_SESSION['logged_in_time'] 	= $this->getProperty("logged_in_time");

		if($this->isPropertySet("mem_type", "V"))

			$_SESSION['mem_type'] 		= $this->getProperty("mem_type");

		if($this->isPropertySet("fullname_name", "V"))

			$_SESSION['fullname_name'] 		= $this->getProperty("fullname_name");

	}

	

	/*

	* This is the function to unset the session variables

	* @author Numan Tahir

	* @Date 13 Dec, 2007

	* @modified 13 Dec, 2007 by Numan Tahir

	*/

	public function setLogout(){

		unset(

				$_SESSION['is_login'], 

				$_SESSION['admin_id'], 

				$_SESSION['username'], 

				$_SESSION['logged_in_time'], 

				$_SESSION['mem_type'], 

				$_SESSION['fullname_name']

			);

	}

	

	/*

	* This function is used to list the admin admin

	* @author Numan Tahir

	* @Date 20 Dec, 2007

	* @modified 20 Dec, 2007 by Numan Tahir

	*/

	public function lstAdminUser(){

		$Sql = "SELECT 

					admin_id,

					username,

					pass,

					first_name,

					last_name,

					CONCAT(first_name,' ',last_name) AS fullname,

					email,

					phone,

					designation,

					last_login_date,

					last_login_ip,

					menu_id,

					mem_type

				FROM

					rs_tbl_admin

				WHERE 

					1=1";

		if($this->isPropertySet("admin_id", "V"))

			$Sql .= " AND admin_id=" . $this->getProperty("admin_id");

		if($this->isPropertySet("username", "V"))

			$Sql .= " AND username='" . $this->getProperty("username") . "'";

		if($this->isPropertySet("pass", "V"))

			$Sql .= " AND pass='" . $this->getProperty("pass") . "'";

		if($this->isPropertySet("limit", "V"))

			$Sql .= $this->appendLimit($this->getProperty("limit"));



		$this->dbQuery($Sql);

	}

	

	/*

	* This function is used to perform DML (Delete/Update/Add)

	* @author Numan Tahir

	* @Date 20 Dec, 2007

	* @modified 20 Dec, 2007 by Numan Tahir

	*/

	public function actAdminUser($mode){

		$mode = strtoupper($mode);

		switch($mode){

			case "I":

				$Sql = "INSERT INTO rs_tbl_admin(

						admin_id,

						username,

						pass,

						first_name,

						last_name,

						email,

						phone,

						designation,

						last_login_date,

						menu_id,

						mem_type) 

						VALUES(";

				$Sql .= $this->isPropertySet("admin_id", "V") ? $this->getProperty("admin_id") : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("username", "V") ? "'" . $this->getProperty("username") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("pass", "V") ? "'" . $this->getProperty("pass") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("first_name", "V") ? "'" . $this->getProperty("first_name") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("last_name", "V") ? "'" . $this->getProperty("last_name") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("email", "V") ? "'" . $this->getProperty("email") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("phone", "V") ? "'" . $this->getProperty("phone") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("designation", "V") ? "'" . $this->getProperty("designation") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("last_login_date", "V") ? "'" . $this->getProperty("last_login_date") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("menu_id", "V") ? "'" . $this->getProperty("menu_id") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("mem_type", "V") ? "'" . $this->getProperty("mem_type") . "'" : "NULL";

				

				$Sql .= ")";

				break;

			case "U":

				$Sql = "UPDATE rs_tbl_admin SET ";

				if($this->isPropertySet("username", "K")){

					$Sql .= "username='" . $this->getProperty("username") . "'";

					$con = ",";

				}

				if($this->isPropertySet("email", "K")){

					$Sql .= "$con email='" . $this->getProperty("email") . "'";

					$con = ",";

				}

				if($this->isPropertySet("first_name", "K")){

					$Sql .= "$con first_name='" . $this->getProperty("first_name") . "'";

					$con = ",";

				}

				if($this->isPropertySet("last_name", "K")){

					$Sql .= "$con last_name='" . $this->getProperty("last_name") . "'";

					$con = ",";

				}

				if($this->isPropertySet("phone", "K")){

					$Sql .= "$con phone='" . $this->getProperty("phone") . "'";

					$con = ",";

				}

				if($this->isPropertySet("designation", "K")){

					$Sql .= "$con designation='" . $this->getProperty("designation") . "'";

					$con = ",";

				}

				if($this->isPropertySet("last_login_date", "K")){

					$Sql .= "$con last_login_date='" . $this->getProperty("last_login_date") . "'";

					$con = ",";

				}

				if($this->isPropertySet("last_login_ip", "K")){

					$Sql .= "$con last_login_ip='" . $this->getProperty("last_login_ip") . "'";

					$con = ",";

				}

				if($this->isPropertySet("menu_id", "K")){

					$Sql .= "$con menu_id='" . $this->getProperty("menu_id") . "'";

					$con = ",";

				}

				if($this->isPropertySet("mem_type", "K")){

					$Sql .= "$con mem_type='" . $this->getProperty("mem_type") . "'";

					$con = ",";

				}

				$Sql .= " WHERE 1=1";

				$Sql .= " AND admin_id=" . $this->getProperty("admin_id");

				break;

			case "D":

				$Sql = "DELETE FROM rs_tbl_admin 

						WHERE

							1=1";

				$Sql .= " AND admin_id=" . $this->getProperty("admin_id");

				break;

			default:

				break;

		}

		return $this->dbQuery($Sql);

	}



	/*

	* This function is used to check the username already exists or not.

	* @author Numan Tahir

	* @Date Dec 05, 2007

	* @modified Dec 05, 2007 by Numan Tahir

	*/

	public function checkAdminUsername(){

		$Sql = "SELECT 

					username

				FROM

					rs_tbl_admin

				WHERE 

					1=1";

		if($this->isPropertySet("username", "V"))

			$Sql .= " AND username='" . $this->getProperty("username") . "'";

		if($this->isPropertySet("admin_id", "V"))

			$Sql .= " AND admin_id!=" . $this->getProperty("admin_id");

		return $this->dbQuery($Sql);

	}

	

	/**

	* This function is used to check the email address already exists or not.

	* @author Numan Tahir

	* @Date 20 Dec, 2007

	* @modified 20 Dec, 2007 by Numan Tahir

	*/

	public function checkAdminEmailAddress(){

		$Sql = "SELECT 

					admin_id,

					username,

					email,

					CONCAT(first_name,' ',last_name) AS fullname

				FROM

					rs_tbl_admin

				WHERE 

					1=1";

		if($this->isPropertySet("email", "V"))

			$Sql .= " AND email='" . $this->getProperty("email") . "'";

		if($this->isPropertySet("admin_id", "V"))

			$Sql .= " AND admin_id!=" . $this->getProperty("admin_id");

		

		return $this->dbQuery($Sql);

	}

	

	/**

	* This function is used to change the password

	* @author Numan Tahir

	* @Date 20 Dec, 2007

	* @modified 20 Dec, 2007 by Numan Tahir

	*/

	public function changePassword(){

		$Sql = "UPDATE rs_tbl_admin SET

					pass='" . $this->getProperty("pass") . "' 

				WHERE 

					1=1 

					AND admin_id=" . $this->getProperty("admin_id") . " 

					AND username='" . $this->getProperty("username") . "'";

		return $this->dbQuery($Sql);

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