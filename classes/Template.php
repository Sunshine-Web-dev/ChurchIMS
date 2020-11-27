<?php

/**

*

* This is a class Template

* @version 0.01

* @author Numan Tahir  <numan_tahir1@live.com>

* @Date 10 Aug, 2007

* @modified 10 Aug, 2007 by Numan Tahir

*

**/

class Template extends Database{

	/**

	* This is the constructor of the class Template

	* @author Numan Tahir

	* @Date 10 Aug, 2007

	* @modified 10 Aug, 2007 by Numan Tahir

	*/

	public function __construct(){

		parent::__construct();

	}



	/**

	* This method is used to get the content of site cms

	* @author Numan Tahir

	* @Date 11 Aug, 2007

	* @modified 11 Aug, 2007 by Numan Tahir

	*/

	public function getTemplate($title){

		$sql = "SELECT

					template_id,

					template_title,

					template_detail,

					sender_name,

					template_subject,

					sender_email

				FROM

					rs_tbl_etemplates

				WHERE

					1=1

					AND template_title='" . $title . "'";

		$this->dbQuery($sql);

		$data = $this->dbFetchArray(1);

		$data = array_map("stripslashes", $data);

		return $data;

	}



	/**

	* This method is used to list the email templates

	* @author Numan Tahir

	* @Date 26 Dec, 2007

	* @modified 26 Dec, 2007 by Numan Tahir

	*/

	public function lstETemplate(){

		$Sql = "SELECT

					template_id,

					template_title,

					template_detail,

					sender_name,

					template_subject,

					sender_email

				FROM

					rs_tbl_etemplates

				WHERE

					1=1";

		if($this->isPropertySet("template_id", "V"))

			$Sql .= " AND template_id=" . $this->getProperty("template_id");

		if($this->isPropertySet("cms_type", "V"))

			$Sql .= " AND template_title='" . $this->getProperty("template_title") . "'";

		if($this->isPropertySet("sender_name", "V"))

			$Sql .= " AND sender_name='" . $this->getProperty("sender_name") . "'";

		if($this->isPropertySet("sender_email", "V"))

			$Sql .= " AND sender_email='" . $this->getProperty("sender_email") . "'";

		if($this->isPropertySet("ORDERBY", "V"))

			$Sql .= " ORDER BY " . $this->getProperty("ORDERBY");

		if($this->isPropertySet("limit", "V"))

			$Sql .= $this->appendLimit($this->getProperty("limit"));



		return $this->dbQuery($Sql);

	}



	/**

	* This function is used to perform DML (Delete/Update/Add)

	* on the table etemplates the basis of property set

	* @author Numan Tahir

	* @Date 25 Dec, 2007

	* @modified 25 Dec, 2007 by Numan Tahir

	*/

	public function actETemplate($mode){

		$mode = strtoupper($mode);

		switch($mode){

			case "I":

				$Sql = "INSERT INTO rs_tbl_etemplates(

						template_id,

						template_title,

						template_detail,

						sender_name,

						template_subject,

						sender_email)

						VALUES(";

				$Sql .= $this->isPropertySet("template_id", "V") ? $this->getProperty("template_id") : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("template_title", "V") ? "'" . $this->getProperty("template_title") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("template_detail", "V") ? "'" . $this->getProperty("template_detail") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("sender_name", "V") ? "'" . $this->getProperty("sender_name") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("template_subject", "V") ? "'" . $this->getProperty("template_subject") . "'" : "NULL";

				$Sql .= ",";

				$Sql .= $this->isPropertySet("sender_email", "V") ? "'" . $this->getProperty("sender_email") . "'" : "NULL";



				$Sql .= ")";

				break;

			case "U":

				$Sql = "UPDATE rs_tbl_etemplates SET ";

				if($this->isPropertySet("template_title", "K"))

					$Sql .= "template_title='" . $this->getProperty("template_title") . "'";

				if($this->isPropertySet("template_detail", "K"))

					$Sql .= ",template_detail='" . $this->getProperty("template_detail") . "'";

				if($this->isPropertySet("sender_name", "K"))

					$Sql .= ",sender_name='" . $this->getProperty("sender_name") . "'";

				if($this->isPropertySet("template_subject", "K"))

					$Sql .= ",template_subject='" . $this->getProperty("template_subject") . "'";

				if($this->isPropertySet("sender_email", "K"))

					$Sql .= ",sender_email='" . $this->getProperty("sender_email") . "'";

				$Sql .= " WHERE 1=1";

				$Sql .= " AND template_id=" . $this->getProperty("template_id");

				break;

			case "D":

				break;

			default:

				break;

		}

		return $this->dbQuery($Sql);

	}

	

}

?>