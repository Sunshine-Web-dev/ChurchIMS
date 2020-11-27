<?php

/**

*

* This is a class Help

* @version 0.01

* @author Numan Tahir  <numan_tahir1@live.com>

* @Date 10 Aug, 2007

* @modified 10 Aug, 2007 by Numan Tahir

*

**/

class Help extends Database{

	/**

	* This is the constructor of the class Help

	* @author Numan Tahir

	* @Date 02 Mar, 2011

	* @modified 02 Mar, 2011 by Numan Tahir

	*/

	public function __construct(){

		parent::__construct();

	}



	/**

	* This method is used to get the Help of site cms

	* @author Numan Tahir

	* @Date 02 Mar, 2011

	* @modified 02 Mar, 2011 by Numan Tahir

	*/

	public function getHelp($type){

		$sql = "SELECT

					help_type,

					help_title,

					help_details,

					help_date

				FROM

					rs_tbl_help_doc

				WHERE

					1=1 AND is_active=1

					AND help_type='" . $type . "'";

		

		$this->dbQuery($sql);

		$rows = $this->dbFetchArray(1);

		return $rows;

	}



	/**

	* This method is used to get the Help of site cms

	* @author Numan Tahir

	* @Date 02 Mar, 2011

	* @modified 02 Mar, 2011 by Numan Tahir

	*/

	public function lstHelp(){

		$Sql = "SELECT

					a.help_id,

					a.help_type,

					a.help_title,

					a.help_details,

					a.help_date,

					a.is_active

				FROM

					rs_tbl_help_doc AS a

				WHERE

					1=1";

		if($this->isPropertySet("help_id", "V"))

			$Sql .= " AND a.help_id=" . $this->getProperty("help_id");

		

		if($this->isPropertySet("help_type", "V"))

			$Sql .= " AND a.help_type='" . $this->getProperty("help_type") . "'";

		

		if($this->isPropertySet("help_title", "V"))

			$Sql .= " AND a.help_title='" . $this->getProperty("help_title") . "'";

		

		if($this->isPropertySet("is_active", "V"))

			$Sql .= " AND a.is_active=" . $this->getProperty("is_active");

		

		if($this->isPropertySet("ORDERBY", "V"))

			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");

		

		if($this->isPropertySet("limit", "V"))

			$Sql .= $this->appendLimit($this->getProperty("limit"));



		return $this->dbQuery($Sql);

	}

	/**
	* This method is used to populate the Site Help combo
	* @author Numan Tahir
	* @Date 27 July, 2011
	* @modified 27 July, 2011 by Numan Tahir
	*/
	public function SiteHelpCombo($sel = "", $MainId){
		$opt = "";
		$Sql = "SELECT 
					help_id,
					help_title
				FROM
					rs_tbl_help
				WHERE
					1=1";
				
		if($MainId!=''){
			$Sql .= " AND help_id!=" . $MainId;
		}
			
		$this->dbQuery($Sql);
		while($rows = $this->dbFetchArray(1)){
			if($rows['help_id'] == $sel)
				$opt .= "<option value=\"" . $rows['help_id'] . "\" selected>" . $rows['help_title'] . "</option>\n";
			else
				$opt .= "<option value=\"" . $rows['help_id'] . "\">" . $rows['help_title'] . "</option>\n";
		}
		return $opt;
	}

	/**
	* This function is used to perform DML (Delete/Update/Add)

	* on the table rr_tbl_Helps the basis of property set

	* @author Numan Tahir

	* @Date 02 Mar, 2011

	* @modified 02 Mar, 2011 by Numan Tahir

	*/

	public function actHelp($mode){

		$mode = strtoupper($mode);

		switch($mode){

			case "I":

				$Sql = "INSERT INTO rs_tbl_help_doc(

							help_id,

							help_type,

							help_title,

							help_details,

							help_date,

							is_active)

						VALUES(";

				$Sql .= $this->isPropertySet("help_id", "V") ? $this->getProperty("help_id") : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("help_type", "V") ? "'" . $this->getProperty("help_type") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("help_title", "V") ? "'" . $this->getProperty("help_title") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("help_details", "V") ? "'" . $this->getProperty("help_details") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("help_date", "V") ? "'" . $this->getProperty("help_date") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("is_active", "V") ? "'" . $this->getProperty("is_active") . "'" : "NULL";

				$Sql .= ")";

				break;

			case "U":

				$Sql = "UPDATE rs_tbl_help_doc SET ";

				if($this->isPropertySet("help_type", "K")){

					$Sql .= "$cat help_type='" . $this->getProperty("help_type") . "'";

					$cat = ",";

				}

				if($this->isPropertySet("help_title", "K")){

					$Sql .= "$cat help_title='" . $this->getProperty("help_title") . "'";

					$cat = ",";

				}

				if($this->isPropertySet("help_details", "K")){

					$Sql .= "$cat help_details='" . $this->getProperty("help_details") . "'";

					$cat = ",";

				}

				if($this->isPropertySet("is_active", "K")){

					$Sql .= "$cat is_active='" . $this->getProperty("is_active") . "'";

					$cat = ",";

				}

				$Sql .= " WHERE 1=1";

				$Sql .= " AND help_id=" . $this->getProperty("help_id");

				break;

			case "D":

				$Sql = "DELETE FROM rs_tbl_help_doc 

						 WHERE 1=1";

				if($this->isPropertySet("help_id", "K")){

					$Sql .= " AND help_id=" . $this->getProperty("help_id");

				}

				break;

			default:

				break;

		}

		

		return $this->dbQuery($Sql);

	}
}

?>