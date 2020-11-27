<?php

/**

*

* This is a class Validate

* @version 0.01

* @author Numan Tahir  <numan_tahir1@live.com>

* @Date 15 March, 2008

* @modified 15 March, 2008 by Numan Tahir

*

**/

class Validate extends Database{

	protected $vResult = array();

	protected $form;

	protected $cValues = array();

	

	/**

	* This is the constructor of the class Validate

	* @author Numan Tahir

	* @Date 15 March, 2008

	* @modified 15 March, 2008 by Numan Tahir

	*/

	public function __construct(){

		parent::__construct();

	}

	

	/**

	* This is the method/function to set the array name to be checked (POST/GET/COOKIE/SESSION)

	* @author Numan Tahir

	* @Date 10 Aug, 2007

	* @modified 10 Aug, 2007 by Numan Tahir

	*/

	public function setArray($array){

		$this->form = $array;

	}

	

	/**

	* This is the method/function to set the keys and messages to be checked

	* @author Numan Tahir

	* @Date 10 Aug, 2007

	* @modified 10 Aug, 2007 by Numan Tahir

	*/

	public function setCheckField($key, $msg, $type = "S"){

		$this->cValues[$key]['type'] 	= strtoupper($type);

		$this->cValues[$key]['msg'] 	= $msg;

	}



	/**

	* This is the method/function to check whether passed value is a float or not

	* @author Numan Tahir

	* @Date 10 Aug, 2007

	* @modified 10 Aug, 2007 by Numan Tahir

	*/

	

	private function checkFloat($value){

		if(is_float($value) || ((float)$value < (int)$value || strlen($value) != strlen((int)$value)) && (int)$value != 0){

			return true;

		}

		else

			return false;

	}

	/**

	* This is the method/function to do validation all set values.

	* @author Numan Tahir

	* @Date 10 Aug, 2007

	* @modified 10 Aug, 2007 by Numan Tahir

	*/

	public function doValidate(){

		if(is_array($this->cValues) && isset($this->cValues) && isset($this->form)){

			foreach($this->cValues as $k=>$v){

				if($v['type'] == "S"){

					if($this->form[$k] == "" && empty($this->form[$k])){

						$this->vResult[$k] = $v['msg'];

					}

				}

				else if($v['type'] == "I"){

					if(!is_numeric($this->form[$k])){

						$this->vResult[$k] = $v['msg'];

					}

				}

				else if($v['type'] == "F"){

					if(!is_float((float) $this->form[$k])){

						$this->vResult[$k] = $v['msg'];

					}

				}

				else if($v['type'] == "E"){

					if(!$this->checkEmail($this->form[$k])){

						$this->vResult[$k] = $v['msg'];

					}

				}

			}

		}

		if(isset($this->vResult) && is_array($this->vResult)){

			return $this->vResult;

		}

		else{

			return false;

		}

	}

	

	/**

	* This is the method/function to check the passed email address is valid email or not

	* @author Numan Tahir

	* @Date 10 Aug, 2007

	* @param $email 

	* @modified 10 Aug, 2007 by Numan Tahir

	*/

	function checkEmail($email){

		# First,we check that there's one @ symbol, and that the lengths are right

		if(!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)){

			#  Email invalid because wrong number of characters in one section, or wrong number of @ symbols.

			return false;

		}

		# Split it into sections to make life easier

		$email_array = explode("@", $email);

		$local_array = explode(".", $email_array[0]);

		for($i = 0; $i < sizeof($local_array); $i++){

			if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])){

				return false;

			}

		}  

		if(!ereg("^\[?[0-9\.]+\]?$", $email_array[1])){ # Check if domain is IP. If not, it should be valid domain name

			$domain_array = explode(".", $email_array[1]);

			if(sizeof($domain_array) < 2){

				return false; # Not enough parts to domain

			}

			for($i = 0; $i < sizeof($domain_array); $i++){

				if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])){

					return false;

				}

			}

		}

		return true;

	}

}

?>