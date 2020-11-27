<?php
/**
*
* This is a class Member
* @version 0.01
* @author Numan Tahir <numan_tahir1@yahoo.com>
* @Date 14 April, 2008
* @modified 14 April, 2008 by Numan Tahir
*
**/
class Member extends Database{
	public $member_login;
	public $member_id;
	public $email;
	public $fullname;
	public $first_name;
	public $login_time;
	public $member_type;
	
	/**
	* This is the constructor of the class Member
	* @author Numan Tahir <numan_tahir1@yahoo.com>
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function __construct(){
		parent::__construct();

		if($_SESSION['member_login']){
			$this->member_login 	= $_SESSION['member_login'];
			$this->member_id		= $_SESSION['member_id'];
			$this->email	 		= $_SESSION['member_email'];
			$this->fullname			= $_SESSION['fullname'];
			$this->login_time		= $_SESSION['login_time'];
			$this->first_name		= $_SESSION['first_name']; 
			$this->member_type		= $_SESSION['member_type']; 
		}
	}

	/**
	* This is the function to set the member logged in
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function setLogin(){
		$_SESSION['member_login'] 	= true;
		
		# Logged in member's member code
		if($this->isPropertySet("member_id", "V"))
			$_SESSION['member_id'] = $this->getProperty("member_id");
		
		# Logged in member's email
		if($this->isPropertySet("member_email", "V"))
			$_SESSION['member_email'] = $this->getProperty("member_email");
		
		# Logged in member's logged in time
		if($this->isPropertySet("login_time", "V"))
			$_SESSION['login_time'] 	= $this->getProperty("login_time");
		
		# Logged in member's fullname
		if($this->isPropertySet("fullname", "V"))
			$_SESSION['fullname'] = $this->getProperty("fullname");
		
		# Logged in member's first name
		if($this->isPropertySet("first_name", "V"))
			$_SESSION['first_name'] = $this->getProperty("first_name");
		
		# Logged in member's Type
		if($this->isPropertySet("member_type", "V"))
			$_SESSION['member_type'] = $this->getProperty("member_type");
	}
	
	
	/**
	* This method is used to get image extension
	* @author Numan Tahir
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
	
	public function getExtentionValidate($type){
		if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/pjpeg" || $type=="image/png" || $type=="image/gif")
			return 1;
		else
			return 0;
	}
	
	/**
 	* Product::getImagename()	
	* This method is used to get image name
	* @author Numan Tahir
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
	
	
	/**
	* This function is used to check whether the member has been logged in or not.
	* @author Numan Tahir
	* @Date 10 July, 2012
	* @modified 10 July, 2012 by Numan Tahir
	*/
	public function checkLogin(){
		if($this->member_login){
			return true;
		}
		else{
			return false;
		}
	}
	
	/**
	* This function is used to prepare the Month List
	* @author Numan Tahir
	* @Date 15 Feb, 2011
	* @modified 15 Feb, 2011 by Numan Tahir
	*/
	public function MonthList($Month_id){
			$MonthList = '';
			if($Month_id==1){
			$MonthList .= '<option value="1" selected>Jan</option>';
			} else {
			$MonthList .= '<option value="1">Jan</option>';
			}
			if($Month_id==2){
			$MonthList .= '<option value="2" selected>Feb</option>';
			} else {
			$MonthList .= '<option value="2">Feb</option>';
			}
			if($Month_id==3){
			$MonthList .= '<option value="3" selected>Mar</option>';
			} else {
			$MonthList .= '<option value="3">Mar</option>';
			}
			if($Month_id==4){
			$MonthList .= '<option value="4" selected>Apr</option>';
			} else {
			$MonthList .= '<option value="4">Apr</option>';
			}
			if($Month_id==5){
			$MonthList .= '<option value="5" selected>May</option>';
			} else {
			$MonthList .= '<option value="5">May</option>';
			}
			if($Month_id==6){
			$MonthList .= '<option value="6" selected>Jun</option>';
			} else {
			$MonthList .= '<option value="6">Jun</option>';
			}
			if($Month_id==7){
			$MonthList .= '<option value="7" selected>Jul</option>';
			} else {
			$MonthList .= '<option value="7">Jul</option>';
			}
			if($Month_id==8){
			$MonthList .= '<option value="8" selected>Aug</option>';
			} else {
			$MonthList .= '<option value="8">Aug</option>';
			}
			if($Month_id==9){
			$MonthList .= '<option value="9" selected>Sep</option>';
			} else {
			$MonthList .= '<option value="9">Sep</option>';
			}
			if($Month_id==10){
			$MonthList .= '<option value="10" selected>Oct</option>';
			} else {
			$MonthList .= '<option value="10">Oct</option>';
			}
			if($Month_id==11){
			$MonthList .= '<option value="11" selected>Nov</option>';
			} else {
			$MonthList .= '<option value="11">Nov</option>';
			}
			if($Month_id==12){
			$MonthList .= '<option value="12" selected>Dec</option>';
			} else {
			$MonthList .= '<option value="12">Dec</option>';
			}
		return $MonthList;	
	}
	
	/**
	* This function is used to prepare the Days List
	* @author Numan Tahir
	* @Date 15 Feb, 2011
	* @modified 15 Feb, 2011 by Numan Tahir
	*/
	public function DayList($Day_id){
			$Day_list = '';
			for($i=1; $i<=31; $i++){
			if($i == $Day_id){
			$Day_list .= '<option value="' . $i . '" selected>' . $i . '</option>';
			} else {
			$Day_list .= '<option value="' . $i . '">' . $i . '</option>';
			}
			}
		return $Day_list;
	}
	
	/**
	* This function is used to prepare the Year List
	* @author Numan Tahir
	* @Date 15 Feb, 2011
	* @modified 15 Feb, 2011 by Numan Tahir
	*/
	public function YearList($Year_id){
			$Year_list = '';
			
			for($y=1905; $y<=2011; $y++){
			if($y == $Year_id){
			$Year_list .= '<option value="' . $y . '" selected>' . $y . '</option>';
			} else {
			$Year_list .= '<option value="' . $y . '">' . $y . '</option>';
			}
			}
		return $Year_list;
	}
	
	public function CheckEmail(){
		$Sql = "SELECT 
					member_id,
					member_email
				FROM
					rs_tbl_member
				WHERE 
					1=1";
		if($this->isPropertySet("member_email", "V"))
			$Sql .= " AND member_email='" . $this->getProperty("member_email") . "'";
		
		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is used to check the member login
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function checkMemberLogin(){
		$Sql = "SELECT 
					member_id,
					member_email,
					member_pass,
					first_name,
					last_name,
					CONCAT(first_name,' ',last_name) AS fullname,
					is_active,
					member_type,
					login_permission
				FROM
					rs_tbl_member
				WHERE 
					1=1";
		if($this->isPropertySet("member_email", "V"))
			$Sql .= " AND member_email='" . $this->getProperty("member_email") . "'";
		
		if($this->isPropertySet("member_pass", "V"))
			$Sql .= " AND member_pass='" . $this->getProperty("member_pass") . "'";
		
		return $this->dbQuery($Sql);
	}

	/**
	* This function is used to check the member login
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function MemberActivate(){
		$Sql = "UPDATE rs_tbl_member SET
					is_active=1
				WHERE 
					1=1";
					
		if($this->isPropertySet("member_id", "V"))
			$Sql .= " AND member_id=" . $this->getProperty("member_id");
		
		return $this->dbQuery($Sql);
	}
	
	/**
	* This method is used to the members combo
	* @author Numan Tahir
	* @Date 27 April, 2008
	* @modified 27 April, 2008 by Numan Tahir
	*/
	public function memberCombo($sel = ""){
		$opt = "";
		$Sql = "SELECT 
					member_id,
					CONCAT(first_name, ' ', last_name) as fullname
				FROM
					rs_tbl_member
				WHERE
					1=1 
					AND is_active=1";
		$this->dbQuery($Sql);
		while($rows = $this->dbFetchArray(1)){
			if($rows['member_id'] == $sel)
				$opt .= "<option value=\"" . $rows['member_id'] . "\" selected>" . $rows['fullname'] . "</option>\n";
			else
				$opt .= "<option value=\"" . $rows['member_id'] . "\">" . $rows['fullname'] . "</option>\n";
		}
		return $opt;
	}	
	
	/**
	* This function is used to list the users
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function lstMember(){
		$Sql = "SELECT 
					member_id,
					member_email,
					member_pass,
					first_name,
					last_name,
					CONCAT(first_name,' ',last_name) AS fullname,
					address,
					city,
					state,
					zip_code,
					country,
					phone,
					mobile,
					reg_date,
					is_active,
					member_type,
					profile_image,
					member_category_id,
					login_permission,
					church_id,
					member_no
				FROM
					rs_tbl_member 
				WHERE 
					1=1";
		
		if($this->isPropertySet("member_id", "V"))
			$Sql .= " AND member_id=" . $this->getProperty("member_id");
		
		if($this->isPropertySet("member_email", "V"))
			$Sql .= " AND member_email='" . $this->getProperty("member_email") . "'";
		
		if($this->getProperty("member_type_not")!=''){
			$Sql .= " AND member_type!='" . $this->getProperty("member_type_not") ."'";
		}
		
		if($this->getProperty("is_active")!=''){
			$Sql .= " AND is_active='" . $this->getProperty("is_active") ."'";
		}
		
		if($this->getProperty("not_deleted")!='')
			$Sql .= " AND is_active!='" . $this->getProperty("not_deleted") ."'";
		
		if($this->getProperty("country")!=''){
			$Sql .= " AND country='" . $this->getProperty("country") ."'";
		}
		
		if($this->getProperty("member_type")!=''){
			$Sql .= " AND member_type='" . $this->getProperty("member_type") ."'";
		}
		
		if($this->isPropertySet("member_type_in", "V"))
			$Sql .= " AND member_type IN (" . $this->getProperty("member_type_in") . ")";
		
		if($this->getProperty("member_category_id")!=''){
			$Sql .= " AND member_category_id='" . $this->getProperty("member_category_id") ."'";
		}
		
		if($this->getProperty("login_permission")!=''){
			$Sql .= " AND login_permission='" . $this->getProperty("login_permission") ."'";
		}
		
		if($this->getProperty("start_date", "V"))
			$Sql .= " AND reg_date >='" . $this->getProperty("start_date") ."'";
		
		if($this->getProperty("end_date", "V"))
			$Sql .= " AND reg_date <='" . $this->getProperty("end_date") ."'";
		
		if($this->getProperty("church_id")!=''){
			$Sql .= " AND church_id='" . $this->getProperty("church_id") ."'";
		}
		
		if($this->getProperty("member_no")!=''){
			$Sql .= " AND member_no='" . $this->getProperty("member_no") ."'";
		}
		
		if($this->isPropertySet("ORDERBY", "V")){
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");
		}
		
		if($this->isPropertySet("limit", "V"))
			$Sql .= $this->appendLimit($this->getProperty("limit"));
		
		//$this->dbQuery($Sql);
		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is used to list the Member Category List
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function lstMemberCategory(){
		$Sql = "SELECT 
					member_category_id,
					category_name,
					church_id,
					member_id,
					entery_date,
					is_active
				FROM
					rs_tbl_member_category 
				WHERE 
					1=1";
		
		if($this->isPropertySet("member_category_id", "V"))
			$Sql .= " AND member_category_id=" . $this->getProperty("member_category_id");
		
		if($this->isPropertySet("category_name", "V"))
			$Sql .= " AND category_name='" . $this->getProperty("category_name") . "'";
		
		if($this->isPropertySet("church_id", "V"))
			$Sql .= " AND church_id='" . $this->getProperty("church_id") . "'";
		
		if($this->isPropertySet("member_id", "V"))
			$Sql .= " AND member_id='" . $this->getProperty("member_id") . "'";
		
		if($this->getProperty("is_active")!='')
			$Sql .= " AND is_active='" . $this->getProperty("is_active") ."'";
		
		if($this->getProperty("not_deleted")!='')
			$Sql .= " AND is_active!='" . $this->getProperty("not_deleted") ."'";
			
		if($this->isPropertySet("ORDERBY", "V"))
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");
		
		if($this->isPropertySet("limit", "V"))
			$Sql .= $this->appendLimit($this->getProperty("limit"));
		$this->dbQuery($Sql);
	}
	
	
	/**
	* This function is used to list the Transection Category
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function lstTransectionCategory(){
		$Sql = "SELECT 
					tran_category_id,
					tran_category_name,
					church_id,
					member_id,
					tran_type,
					entry_date,
					is_active
				FROM
					rs_tbl_transection_category
				WHERE 
					1=1";
		
		if($this->isPropertySet("tran_category_id", "V"))
			$Sql .= " AND tran_category_id=" . $this->getProperty("tran_category_id");
		
		if($this->isPropertySet("tran_category_name", "V"))
			$Sql .= " AND tran_category_name='" . $this->getProperty("tran_category_name") . "'";
			
		if($this->isPropertySet("tran_type", "V"))
			$Sql .= " AND tran_type='" . $this->getProperty("tran_type") . "'";
		
		if($this->isPropertySet("church_id", "V"))
			$Sql .= " AND church_id='" . $this->getProperty("church_id") . "'";
			
		if($this->isPropertySet("member_id", "V"))
			$Sql .= " AND member_id='" . $this->getProperty("member_id") . "'";
		
		if($this->getProperty("is_active")!='')
			$Sql .= " AND is_active='" . $this->getProperty("is_active") ."'";
		
		if($this->getProperty("not_deleted")!='')
			$Sql .= " AND is_active!='" . $this->getProperty("not_deleted") ."'";
			
		if($this->isPropertySet("ORDERBY", "V"))
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");
		
		if($this->isPropertySet("limit", "V"))
			$Sql .= $this->appendLimit($this->getProperty("limit"));
		

		$this->dbQuery($Sql);
	}
	
	/**
	* This function is used to list the Transection Detail
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function lstTransectionDetail(){
		$Sql = "SELECT 
					transection_id,
					member_id,
					church_id,
					member_no,
					collection_date,
					check_no,
					currency_type,
					amount_category,
					receiving_amount,
					transection_note,
					transection_type,
					entry_date,
					is_active
				FROM
					rs_tbl_transection_detail
				WHERE 
					1=1";
		
		if($this->isPropertySet("transection_id", "V"))
			$Sql .= " AND transection_id=" . $this->getProperty("transection_id");
		
		if($this->isPropertySet("member_id", "V"))
			$Sql .= " AND member_id='" . $this->getProperty("member_id") . "'";
				
		if($this->isPropertySet("church_id", "V"))
			$Sql .= " AND church_id='" . $this->getProperty("church_id") . "'";
		
		if($this->isPropertySet("category_id_arr_1", "V"))
			$Sql .= " AND (amount_category!='" . $this->getProperty("category_id_arr_1") . "'";
		
		if($this->isPropertySet("category_id_arr_2", "V"))
			$Sql .= " AND amount_category!='" . $this->getProperty("category_id_arr_2") . "')";
			
		if($this->isPropertySet("transection_type", "V"))
			$Sql .= " AND transection_type='" . $this->getProperty("transection_type") . "'";
		
		if($this->getProperty("is_active")!='')
			$Sql .= " AND is_active='" . $this->getProperty("is_active") ."'";
		
		if($this->getProperty("amount_category")!='')
			$Sql .= " AND amount_category='" . $this->getProperty("amount_category") ."'";
			
		if($this->getProperty("this_month")!='')
			$Sql .= " AND MONTH(collection_date) = '" . $this->getProperty("this_month") ."'";
			
		if($this->getProperty("not_deleted")!='')
			$Sql .= " AND is_active!='" . $this->getProperty("not_deleted") ."'";
		
		


		$start_dateSTI	= $this->getProperty("start_date");
		$end_dateSTI	=$this->getProperty("end_date");

		if($start_dateSTI!='--')
		{	
			if($this->getProperty("start_date", "V"))
			$Sql .= " AND entry_date >='" . $this->getProperty("start_date") ."'";
		}else
		{
			$Sql .= " AND entry_date >='1980-01-01'";
		}	

		if($end_dateSTI!='--')	
		{
			if($this->getProperty("end_date", "V"))
			$Sql .= " AND entry_date <='" . $this->getProperty("end_date") ."'";
		}
		else{
			if($this->getProperty("end_date", "V"))
			$Sql .= " AND entry_date <='" . date('Y-m-d') ."'";
		}	

		
		



			
		if($this->isPropertySet("ORDERBY", "V"))
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");
		
		if($this->isPropertySet("limit", "V"))
			$Sql .= $this->appendLimit($this->getProperty("limit"));

		// echo $Sql;
		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is used to list the Church Detail
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function lstChurch(){
		$Sql = "SELECT 
					church_id,
					church_name,
					church_address,
					church_city,
					church_state,
					church_country,
					church_p_number,
					church_m_number,
					church_logo,
					created_date,
					is_active
				FROM
					rs_tbl_church
				WHERE 
					1=1";
		
		if($this->isPropertySet("church_id", "V"))
			$Sql .= " AND church_id=" . $this->getProperty("church_id");
		
		if($this->getProperty("is_active", "V"))
			$Sql .= " AND is_active='" . $this->getProperty("is_active") ."'";
		
		if($this->getProperty("not_deleted")!='')
			$Sql .= " AND is_active!='" . $this->getProperty("not_deleted") ."'";
			
		if($this->getProperty("start_date", "V"))
			$Sql .= " AND created_date >='" . $this->getProperty("start_date") ."'";
		
		if($this->getProperty("end_date", "V"))
			$Sql .= " AND created_date <='" . $this->getProperty("end_date") ."'";
			
		if($this->isPropertySet("ORDERBY", "V"))
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");
		
		if($this->isPropertySet("limit", "V"))
			$Sql .= $this->appendLimit($this->getProperty("limit"));
		//	echo $Sql;
		$this->dbQuery($Sql);
	}
	
	/**
	* This function is used to list the Currency
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function lstCurrency(){
		$Sql = "SELECT 
					currency_type_id,
					church_id,
					member_id,
					currency_name,
					currency_symbl,
					entry_date,
					is_active
				FROM
					rs_tbl_currency
				WHERE 
					1=1";
		
		if($this->isPropertySet("currency_type_id", "V"))
			$Sql .= " AND currency_type_id=" . $this->getProperty("currency_type_id");
		
		if($this->getProperty("church_id")!='')
			$Sql .= " AND church_id='" . $this->getProperty("church_id") ."'";
		
		if($this->getProperty("member_id")!='')
			$Sql .= " AND member_id='" . $this->getProperty("member_id") ."'";
			
		if($this->getProperty("is_active")!='')
			$Sql .= " AND is_active='" . $this->getProperty("is_active") ."'";
		
		if($this->getProperty("not_deleted")!='')
			$Sql .= " AND is_active!='" . $this->getProperty("not_deleted") ."'";
			
		if($this->isPropertySet("ORDERBY", "V"))
			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");
		
		if($this->isPropertySet("limit", "V"))
			$Sql .= $this->appendLimit($this->getProperty("limit"));
		
		$this->dbQuery($Sql);
	}
	
	/**
	* This function is used to check the email address already exists or not.
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function emailExists(){
		$Sql = "SELECT 
					member_id,
					member_email,
					first_name
				FROM
					rs_tbl_member
				WHERE 
					1=1";
		if($this->isPropertySet("member_email", "V"))
			$Sql .= " AND member_email='" . $this->getProperty("member_email") . "'";
			
		if($this->isPropertySet("member_type", "V"))
			$Sql .= " AND member_type=" . $this->getProperty("member_type");
			
		if($this->isPropertySet("member_id", "V"))
			$Sql .= " AND member_id!=" . $this->getProperty("member_id");
		
		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is used to check current password in change password
	* @author Numan Tahir
	* @Date 24 April, 2008
	* @modified 24 April, 2008 by Numan Tahir
	*/
	public function checkPassword(){
		$Sql = "SELECT
					member_id
				FROM
					rs_tbl_member 
				WHERE 
					1=1";
		$Sql .= " AND member_id='" . $this->member_id . "'";
		$Sql .= " AND member_pass='" . $this->getProperty("cpassword") . "'";
		
		$this->dbQuery($Sql);
		if($this->totalRecords() >= 1)
			return true;
		else
			return false;
	}
	
	
	public function getMemberNameByMemberNo($member_no,$church_id){
		$Sql = "SELECT
					first_name,last_name
				FROM
					rs_tbl_member 
				WHERE 
					1=1";
		$Sql .= " AND member_no='" . $member_no . "'";
		$Sql .= " AND church_id='" . $church_id . "'";
		
		return $this->dbQuery($Sql);
		
	}	


	/**        
	* This function is used to check current member Number
	* @author Numan Tahir
	* @Date 15 Feb, 2018
	* @modified 15 Feb, 2018 by Numan Tahir
	*/
	public function checkMemberNo($member_type,$church_id){
		$Sql = "SELECT
					member_id
				FROM
					rs_tbl_member 
				WHERE 
					1=1";
		$Sql .= " AND member_no='" . $this->getProperty("member_no") . "'";
		$Sql .=" AND member_type='" . $member_type . "'";
		$Sql .=" AND church_id='" . $church_id . "'";

		$this->dbQuery($Sql);
		if($this->totalRecords() >= 1)
			return 1;
		else
			return 0;
	}
	
	
	/********************************************************************************/
	/********************************************************************************/
	/********************************************************************************/
	
	
	
	/**
	* This function is Member to perform DML (Delete/Update/Add)
	* @author Numan Tahir
	* @Date 14 April, 2008
	* @modified 14 April, 2008 by Numan Tahir
	*/
	public function actMember($mode = "I"){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":
				$Sql = "INSERT INTO rs_tbl_member(
						member_id,
						member_email,
						member_pass,
						first_name,
						last_name,
						dob,
						address,
						city,
						state,
						zip_code,
						country,
						phone,
						mobile,
						reg_date,
						is_active,
						member_type,
						profile_image,
						member_category_id,
						login_permission,
						church_id,
						member_no) 
						VALUES(";
				$Sql .= $this->isPropertySet("member_id", "V") ? $this->getProperty("member_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("member_email", "V") ? "'" . $this->getProperty("member_email") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("member_pass", "V") ? "'" . $this->getProperty("member_pass") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("first_name", "V") ? "'" . $this->getProperty("first_name") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("last_name", "V") ? "'" . $this->getProperty("last_name") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("dob", "V") ? "'" . $this->getProperty("dob") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("address", "V") ? "'" . $this->getProperty("address") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("city", "V") ? "'" . $this->getProperty("city") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("state", "V") ? "'" . $this->getProperty("state") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("zip_code", "V") ? "'" . $this->getProperty("zip_code") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("country", "V") ? $this->getProperty("country") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("phone", "V") ? "'" . $this->getProperty("phone") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("mobile", "V") ? "'" . $this->getProperty("mobile") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("reg_date", "V") ? "'" . $this->getProperty("reg_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("is_active", "V") ? $this->getProperty("is_active") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("member_type", "V") ? "'" . $this->getProperty("member_type") . "'" : "1";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("profile_image", "V") ? "'" . $this->getProperty("profile_image") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("member_category_id", "V") ? "'" . $this->getProperty("member_category_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("login_permission", "V") ? "'" . $this->getProperty("login_permission") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_id", "V") ? "'" . $this->getProperty("church_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("member_no", "V") ? "'" . $this->getProperty("member_no") . "'" : "NULL";
				$Sql .= ")";
				break;
			case "U":
				$Sql = "UPDATE rs_tbl_member SET ";
				if($this->isPropertySet("first_name", "K")){
					$Sql .= "$con first_name='" . $this->getProperty("first_name") . "'";
					$con = ",";
				}
				if($this->isPropertySet("last_name", "K")){
					$Sql .= "$con last_name='" . $this->getProperty("last_name") . "'";
					$con = ",";
				}
				if($this->isPropertySet("member_pass", "K")){
					$Sql .= "$con member_pass='" . $this->getProperty("member_pass") . "'";
					$con = ",";
				}
				if($this->isPropertySet("dob", "K")){
					$Sql .= "$con dob='" . $this->getProperty("dob") . "'";
					$con = ",";
				}
				if($this->isPropertySet("address", "K")){
					$Sql .= "$con address='" . $this->getProperty("address") . "'";
					$con = ",";
				}
				if($this->isPropertySet("city", "K")){
					$Sql .= "$con city='" . $this->getProperty("city") . "'";
					$con = ",";
				}
				if($this->isPropertySet("state", "K")){
					$Sql .= "$con state='" . $this->getProperty("state") . "'";
					$con = ",";
				}
				if($this->isPropertySet("zip_code", "K")){
					$Sql .= "$con zip_code='" . $this->getProperty("zip_code") . "'";
					$con = ",";
				}
				if($this->isPropertySet("country", "K")){
					$Sql .= "$con country=" . $this->getProperty("country");
					$con = ",";
				}
				if($this->isPropertySet("phone", "K")){
					$Sql .= "$con phone='" . $this->getProperty("phone") . "'";
					$con = ",";
				}
				if($this->isPropertySet("mobile", "K")){
					$Sql .= "$con mobile='" . $this->getProperty("mobile") . "'";
					$con = ",";
				}
				if($this->isPropertySet("reg_date", "K")){
					$Sql .= "$con reg_date='" . $this->getProperty("reg_date") . "'";
					$con = ",";
				}
				if($this->isPropertySet("is_active", "K")){
					$Sql .= "$con is_active=" . $this->getProperty("is_active");
					$con = ",";
				}
				if($this->isPropertySet("member_type", "K")){
					$Sql .= "$con member_type='" . $this->getProperty("member_type") . "'";
					$con = ",";
				}
				if($this->isPropertySet("profile_image", "K")){
					$Sql .= "$con profile_image='" . $this->getProperty("profile_image") . "'";
					$con = ",";
				}
				if($this->isPropertySet("member_category_id", "K")){
					$Sql .= "$con member_category_id='" . $this->getProperty("member_category_id") . "'";
					$con = ",";
				}
				if($this->isPropertySet("login_permission", "K")){
					$Sql .= "$con login_permission='" . $this->getProperty("login_permission") . "'";
					$con = ",";
				}
				if($this->isPropertySet("church_id", "K")){
					$Sql .= "$con church_id='" . $this->getProperty("church_id") . "'";
					$con = ",";
				}
				if($this->isPropertySet("member_no", "K")){
					$Sql .= "$con member_no='" . $this->getProperty("member_no") . "'";
					$con = ",";
				}
				
				$Sql .= " WHERE 1=1";
				
				if($this->isPropertySet("member_email", "V"))
					$Sql .= " AND member_email='" . $this->getProperty("member_email") . "'";
				else
					$Sql .= " AND member_id=" . $this->getProperty("member_id");
				break;

			/** ** ** Inactive Member ** ** **/
			case "R":
				$Sql = "UPDATE rs_tbl_member SET 
							is_active=0
						WHERE
							1=1";
				$Sql .= " AND member_id=" . $this->getProperty("member_id");
				break;
			/** ** ** Delete Member ** ** **/
			case "D":
				$Sql = "DELETE FROM rs_tbl_member
						WHERE
							1=1";
				$Sql .= " AND member_id=" . $this->getProperty("member_id");
				break;
			/** ** ** Suspend Member ** ** **/
			case "SP":
				$Sql = "UPDATE rs_tbl_member SET ";
				if($this->isPropertySet("password", "K")){
					$Sql .= "$con member_pass='" . $this->getProperty("password") . "'";
					$con = ",";
				}
				if($this->isPropertySet("is_active", "K")){
					$Sql .= "$con is_active='" . $this->getProperty("is_active") . "'";
					$con = ",";
				}
				if($this->isPropertySet("member_email", "K")){
					$Sql .= "$con member_email='" . $this->getProperty("member_email") . "'";
					$con = ",";
				}
				
				$Sql .= " WHERE 1=1";
					$Sql .= " AND member_id=" . $this->getProperty("member_id");
				break;
			/** ** ** Change Member Email Address ** ** **/
			case "EP":
				$Sql = "UPDATE users SET ";
				if($this->isPropertySet("member_email", "K")){
					$Sql .= "$con member_email='" . $this->getProperty("member_email") . "'";
					$con = ",";
				}
				
				$Sql .= " WHERE 1=1";
					$Sql .= " AND member_id=" . $this->getProperty("member_id");
				break;
			default:
				break;
		}
		
		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is Member Category (Delete/Update/Add)
	* @author Numan Tahir
	* @Date 16 Fed, 2011
	* @modified 16 Fed, 2011 by Numan Tahir
	*/
	public function actMemberCategory($mode = "I"){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":
				$Sql = "INSERT INTO rs_tbl_member_category(
						member_category_id,
						category_name,
						church_id,
						member_id,
						entery_date,
						is_active) 
						VALUES(";
				$Sql .= $this->isPropertySet("member_category_id", "V") ? $this->getProperty("member_category_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("category_name", "V") ? "'" . $this->getProperty("category_name") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_id", "V") ? "'" . $this->getProperty("church_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("member_id", "V") ? "'" . $this->getProperty("member_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("entery_date", "V") ? "'" . $this->getProperty("entery_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("is_active", "V") ? $this->getProperty("is_active") : "1";
				$Sql .= ")";
				break;
			case "U":
				$Sql = "UPDATE rs_tbl_member_category SET ";
				
				if($this->isPropertySet("category_name", "K")){
					$Sql .= "$con category_name='" . $this->getProperty("category_name") . "'";
					$con = ",";
				}
				if($this->isPropertySet("is_active", "K")){
					$Sql .= "$con is_active=" . $this->getProperty("is_active");
					$con = ",";
				}
				$Sql .= " WHERE 1=1";
				
				if($this->isPropertySet("member_category_id", "V"))
					$Sql .= " AND member_category_id=" . $this->getProperty("member_category_id");
				
				break;
			case "D":
				$Sql = "DELETE FROM rs_tbl_member_category
						WHERE
							1=1";
				$Sql .= " AND member_category_id=" . $this->getProperty("member_category_id");
				break;
			default:
				break;
		}
		
		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is Transection Category (Delete/Update/Add)
	* @author Numan Tahir
	* @Date 16 Fed, 2011
	* @modified 16 Fed, 2011 by Numan Tahir
	*/
	public function actTransectionCategory($mode = "I"){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":
				$Sql = "INSERT INTO rs_tbl_transection_category(
						tran_category_id,
						tran_category_name,
						church_id,
						member_id,
						tran_type,
						entry_date,
						is_active) 
						VALUES(";
				$Sql .= $this->isPropertySet("tran_category_id", "V") ? $this->getProperty("tran_category_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("tran_category_name", "V") ? "'" . $this->getProperty("tran_category_name") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_id", "V") ? "'" . $this->getProperty("church_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("member_id", "V") ? "'" . $this->getProperty("member_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("tran_type", "V") ? "'" . $this->getProperty("tran_type") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("entery_date", "V") ? "'" . $this->getProperty("entery_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("is_active", "V") ? $this->getProperty("is_active") : "1";
				$Sql .= ")";
				break;
			case "U":
				$Sql = "UPDATE rs_tbl_transection_category SET ";
				
				if($this->isPropertySet("tran_category_name", "K")){
					$Sql .= "$con tran_category_name='" . $this->getProperty("tran_category_name") . "'";
					$con = ",";
				}
				if($this->isPropertySet("tran_type", "K")){
					$Sql .= "$con tran_type='" . $this->getProperty("tran_type") . "'";
					$con = ",";
				}
				if($this->isPropertySet("is_active", "K")){
					$Sql .= "$con is_active=" . $this->getProperty("is_active");
					$con = ",";
				}
				$Sql .= " WHERE 1=1";
				
				if($this->isPropertySet("tran_category_id", "V"))
					$Sql .= " AND tran_category_id=" . $this->getProperty("tran_category_id");
				
				break;
			case "D":
				$Sql = "DELETE FROM rs_tbl_transection_category
						WHERE
							1=1";
				$Sql .= " AND tran_category_id=" . $this->getProperty("tran_category_id");
				break;
			default:
				break;
		}
		
		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is Transection Detail (Delete/Update/Add)
	* @author Numan Tahir
	* @Date 16 Fed, 2011
	* @modified 16 Fed, 2011 by Numan Tahir
	*/
	public function actTransectionDetail($mode = "I"){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":
				$Sql = "INSERT INTO rs_tbl_transection_detail(
						transection_id,
						member_id,
						church_id,
						member_no,
						collection_date,
						check_no,
						currency_type,
						amount_category,
						receiving_amount,
						transection_note,
						transection_type,
						entry_date,
						is_active) 
						VALUES(";
				$Sql .= $this->isPropertySet("transection_id", "V") ? $this->getProperty("transection_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("member_id", "V") ? "'" . $this->getProperty("member_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_id", "V") ? "'" . $this->getProperty("church_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("member_no", "V") ? "'" . $this->getProperty("member_no") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("collection_date", "V") ? "'" . $this->getProperty("collection_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("check_no", "V") ? "'" . $this->getProperty("check_no") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("currency_type", "V") ? "'" . $this->getProperty("currency_type") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("amount_category", "V") ? "'" . $this->getProperty("amount_category") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("receiving_amount", "V") ? "'" . $this->getProperty("receiving_amount") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("transection_note", "V") ? "'" . $this->getProperty("transection_note") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("transection_type", "V") ? "'" . $this->getProperty("transection_type") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("entry_date", "V") ? "'" . $this->getProperty("entry_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("is_active", "V") ? $this->getProperty("is_active") : "1";
				$Sql .= ")";
				break;
			case "U":
				$Sql = "UPDATE rs_tbl_transection_detail SET ";
				
				if($this->isPropertySet("member_no", "K")){
					$Sql .= "$con member_no='" . $this->getProperty("member_no") . "'";
					$con = ",";
				}
				if($this->isPropertySet("collection_date", "K")){
					$Sql .= "$con collection_date='" . $this->getProperty("collection_date") . "'";
					$con = ",";
				}
				if($this->isPropertySet("check_no", "K")){
					$Sql .= "$con check_no='" . $this->getProperty("check_no") . "'";
					$con = ",";
				}
				if($this->isPropertySet("currency_type", "K")){
					$Sql .= "$con currency_type='" . $this->getProperty("currency_type") . "'";
					$con = ",";
				}
				if($this->isPropertySet("amount_category", "K")){
					$Sql .= "$con amount_category='" . $this->getProperty("amount_category") . "'";
					$con = ",";
				}
				if($this->isPropertySet("receiving_amount", "K")){
					$Sql .= "$con receiving_amount='" . $this->getProperty("receiving_amount") . "'";
					$con = ",";
				}
				if($this->isPropertySet("transection_note", "K")){
					$Sql .= "$con transection_note='" . $this->getProperty("transection_note") . "'";
					$con = ",";
				}
				if($this->isPropertySet("transection_type", "K")){
					$Sql .= "$con transection_type='" . $this->getProperty("transection_type") . "'";
					$con = ",";
				}
				if($this->isPropertySet("is_active", "K")){
					$Sql .= "$con is_active=" . $this->getProperty("is_active");
					$con = ",";
				}
				$Sql .= " WHERE 1=1";
				
				if($this->isPropertySet("transection_id", "V"))
					$Sql .= " AND transection_id=" . $this->getProperty("transection_id");
				
				if($this->isPropertySet("church_id", "V"))
					$Sql .= " AND church_id=" . $this->getProperty("church_id");
				
				break;
			case "D":
				$Sql = "DELETE FROM rs_tbl_transection_detail
						WHERE
							1=1";
				$Sql .= " AND transection_id=" . $this->getProperty("transection_id");
				break;
			default:
				break;
		}
		//echo $Sql;
		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is Church Detail (Delete/Update/Add)
	* @author Numan Tahir
	* @Date 16 Fed, 2011
	* @modified 16 Fed, 2011 by Numan Tahir
	*/
	public function actChurch($mode = "I"){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":
				$Sql = "INSERT INTO rs_tbl_church(
						church_id,
						church_name,
						church_address,
						church_city,
						church_state,
						church_country,
						church_p_number,
						church_m_number,
						church_logo,
						created_date,
						is_active) 
						VALUES(";
				$Sql .= $this->isPropertySet("church_id", "V") ? $this->getProperty("church_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_name", "V") ? "'" . $this->getProperty("church_name") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_address", "V") ? "'" . $this->getProperty("church_address") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_city", "V") ? "'" . $this->getProperty("church_city") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_state", "V") ? "'" . $this->getProperty("church_state") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_country", "V") ? "'" . $this->getProperty("church_country") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_p_number", "V") ? "'" . $this->getProperty("church_p_number") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_m_number", "V") ? "'" . $this->getProperty("church_m_number") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_logo", "V") ? "'" . $this->getProperty("church_logo") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("created_date", "V") ? "'" . $this->getProperty("created_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("is_active", "V") ? $this->getProperty("is_active") : "1";
				$Sql .= ")";
				break;
			case "U":
				$Sql = "UPDATE rs_tbl_church SET ";
				
				if($this->isPropertySet("church_name", "K")){
					$Sql .= "$con church_name='" . $this->getProperty("church_name") . "'";
					$con = ",";
				}
				if($this->isPropertySet("church_address", "K")){
					$Sql .= "$con church_address='" . $this->getProperty("church_address") . "'";
					$con = ",";
				}
				if($this->isPropertySet("church_city", "K")){
					$Sql .= "$con church_city='" . $this->getProperty("church_city") . "'";
					$con = ",";
				}
				if($this->isPropertySet("church_state", "K")){
					$Sql .= "$con church_state='" . $this->getProperty("church_state") . "'";
					$con = ",";
				}
				if($this->isPropertySet("church_country", "K")){
					$Sql .= "$con church_country='" . $this->getProperty("church_country") . "'";
					$con = ",";
				}
				if($this->isPropertySet("church_p_number", "K")){
					$Sql .= "$con church_p_number='" . $this->getProperty("church_p_number") . "'";
					$con = ",";
				}
				if($this->isPropertySet("church_m_number", "K")){
					$Sql .= "$con church_m_number='" . $this->getProperty("church_m_number") . "'";
					$con = ",";
				}
				if($this->isPropertySet("church_logo", "K")){
					$Sql .= "$con church_logo='" . $this->getProperty("church_logo") . "'";
					$con = ",";
				}
				if($this->isPropertySet("is_active", "K")){
					$Sql .= "$con is_active=" . $this->getProperty("is_active");
					$con = ",";
				}
				$Sql .= " WHERE 1=1";
				
				if($this->isPropertySet("church_id", "V"))
					$Sql .= " AND church_id=" . $this->getProperty("church_id");
				
				break;
			case "D":
				$Sql = "DELETE FROM rs_tbl_church
						WHERE
							1=1";
				$Sql .= " AND church_id=" . $this->getProperty("church_id");
				break;
			default:
				break;
		}
		
		return $this->dbQuery($Sql);
	}
	
	
	/**
	* This function is Currency (Delete/Update/Add)
	* @author Numan Tahir
	* @Date 16 Fed, 2017
	* @modified 16 Fed, 2017 by Numan Tahir
	*/
	public function actChurchCurrency($mode = "I"){
		$mode = strtoupper($mode);
		switch($mode){
			case "I":
				$Sql = "INSERT INTO rs_tbl_currency(
						currency_type_id,
						church_id,
						member_id,
						currency_name,
						currency_symbl,
						entry_date,
						is_active) 
						VALUES(";
				$Sql .= $this->isPropertySet("currency_type_id", "V") ? $this->getProperty("currency_type_id") : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("church_id", "V") ? "'" . $this->getProperty("church_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("member_id", "V") ? "'" . $this->getProperty("member_id") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("currency_name", "V") ? "'" . $this->getProperty("currency_name") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("currency_symbl", "V") ? "'" . $this->getProperty("currency_symbl") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("entry_date", "V") ? "'" . $this->getProperty("entry_date") . "'" : "NULL";
				$Sql .= ",";
				$Sql .= $this->isPropertySet("is_active", "V") ? $this->getProperty("is_active") : "1";
				$Sql .= ")";
				break;
			case "U":
				$Sql = "UPDATE rs_tbl_currency SET ";
				
				if($this->isPropertySet("currency_name", "K")){
					$Sql .= "$con currency_name='" . $this->getProperty("currency_name") . "'";
					$con = ",";
				}
				if($this->isPropertySet("currency_symbl", "K")){
					$Sql .= "$con currency_symbl='" . $this->getProperty("currency_symbl") . "'";
					$con = ",";
				}
				if($this->isPropertySet("is_active", "K")){
					$Sql .= "$con is_active='" . $this->getProperty("is_active") . "'";
					$con = ",";
				}
				
				$Sql .= " WHERE 1=1";
				
				if($this->isPropertySet("currency_type_id", "V"))
					$Sql .= " AND currency_type_id=" . $this->getProperty("currency_type_id");
									
				break;
			case "D":
				$Sql = "DELETE FROM rs_tbl_currency
						WHERE
							1=1";
				if($this->isPropertySet("currency_type_id", "V"))
					$Sql .= " AND currency_type_id=" . $this->getProperty("currency_type_id");
				
				break;
			default:
				break;
		}
		
		return $this->dbQuery($Sql);
	}
	
	/**
	* This function is used to change the password
	* @author Numan Tahir
	* @Date 24 April, 2008
	* @modified 24 April, 2008 by Numan Tahir
	*/
	public function changePassword(){
		$Sql = "UPDATE rs_tbl_member SET
					member_pass='" . $this->getProperty("npassword") . "' 
				WHERE 
					1=1";
		$Sql .= " AND member_id='" . $this->getProperty("member_id") . "'";

		return $this->dbQuery($Sql);
	}




}
?>