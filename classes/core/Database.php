<?php
/**
*
* This is a class which is the collection of database related methods
* @version 0.01
* @author Numan Tahir  <numan_tahir1@live.com>
*
**/
class Database extends Property{
	
	protected $dbCon;			/* member variable that holds the database connectivity resource */
	protected $rsResource;	/* member variable that holds the result/resource */
	protected $sql;
	//var @$dbResource;

	/**
	* This is the constructor of the class Database
	* which initializes the database connectivity
	* @author Numan Tahir
	*/
	public function __construct(){
		$this->dbCon = mysql_connect(HOST, DBUSER, DBPASSWD);
		if(!$this->dbCon)
			die('Could not connect to the server.Check in config.php');
		if(!mysql_select_db(DBNAME))
			die('Cannot select the database.');
	}

	/**
	* This method is used to execute the query
	* @author Numan Tahir
	* @param : $sql
	*/
	public function dbQuery($sql = ""){
		if(!$sql || $sql == ""){
			die('Empty SQL statement found!');
		}
		$this->rsResource = mysql_query($sql);
		if(!$this->rsResource){
			echo '<pre style="color:#FF000;">';
			echo isset($$sql);
			echo '</pre>';
			echo '<strong>system generated error:</strong><br>';
			die(mysql_error());
			return false;
		}
		else{
			$this->sql = $sql;
			return true;
		}
	}
	
	/**
	* This method is used to execute the query and return the resource
	* @author Numan Tahir
	* @param : $sql
	* @return : resource / result
	*/
	public function dbQueryReturn($sql = ""){
		if(!$sql || $sql == ""){
			die('Empty SQL statement found!');
		}
		$this->rsResource = mysql_query($sql);
		if($this->rsResource){
			$this->sql = $sql;
			return $this->rsResource;
		}
		else{
			return false;
		}
	}
	
	/**
	* This method is used to get the current sql;
	* @author Numan Tahir
	* @return : integer
	*/
	public function getSQL(){
		if(is_resource($this->rsResource) && $this->sql){
			return $this->sql;
		}
	}

	/**
	* This method is used to get the total records of a result
	* @author Numan Tahir
	* @return : integer
	*/
	public function totalRecords(){
		if(is_resource($this->rsResource)){
			return mysql_num_rows($this->rsResource);
		}
	}
	
	/**
	* This method is used to fetch the result/resource row as associative array
	* @author Numan Tahir
	* @param : $retType = return array type (1=ASSOC / 2 = NUM / 3 = OBJECT)
	* @param : $dbResource = query resource/result
	* @return : Array
	*/
	public function dbFetchArray($retType = 1){
		if(is_resource(@$dbResource)){
			if($retType == 1)
				return mysql_fetch_array(@$dbResource, MYSQL_ASSOC);
			else if($retType == 2)
				return mysql_fetch_assoc(@$dbResource);
			else if($retType == 3)
				return mysql_fetch_object(@$dbResource);
		}
		else if(is_resource($this->rsResource)){
			if($retType == 1)
				return mysql_fetch_array($this->rsResource, MYSQL_ASSOC);
			else if($retType == 2)
				return mysql_fetch_assoc($this->rsResource);
			else if($retType == 3)
				return mysql_fetch_object($this->rsResource);
		}
		else{
			die('Invalid resource!');
		}
	}
	
	/**
	* This method is used to free the database result/resource
	* @author Numan Tahir
	* @return : bool
	*/
	public function dbFree($dbResource){
		if(is_resource(@$dbResource)){
			mysql_free_result(@$dbResource);
		}
		else if(is_resource($this->rsResource)){
			mysql_free_result($this->rsResource);
		}
	}

	/**
	* This method is used to append the limiting sql
	* @author Numan Tahir
	* @return : bool
	*/
	public function appendLimit($perpage){
		$page = isset($_GET['page']) ? trim($_GET['page']) : 1;
		$start = (intval($page) - 1) * $perpage;
		$Sql = " LIMIT $start, $perpage";
		return $Sql;
	}
	
	/*
	* This method is used to append the limiting sql
	* @author Numan Tahir
	* @return : bool
	*/
	public function getTotal($sql){
		$result = mysql_query($sql) or die(mysql_error());
		$rows = mysql_fetch_array($result);
		if(!empty($rows['total_records']) && $rows['total_records'] >= 1){
			return $rows['total_records'];
		}
		else{
			return 0;
		}
	}
}