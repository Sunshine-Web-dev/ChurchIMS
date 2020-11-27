<?php
	ob_start();
	session_cache_expire(30);
	session_start();
	//error_reporting(E_ALL);
	error_reporting(0);
	//error_reporting(E_ALL ^ E_DEPRECATED);
	$dbCfg = array();
	include_once(dirname(__FILE__) . '/global_config.php');
	// database configuration
	if($_SERVER['HTTP_HOST'] == "localhost"){
		$dbCfg['host']			= "localhost";
		$dbCfg['db_user']		= "root";
		$dbCfg['db_passwd']		= "";
		$dbCfg['db_name']		= "zflexsof_churchdb";
		$dbCfg['pro_key']		= '';
	}else{
		$dbCfg['host']			= "localhost";
		$dbCfg['db_user']		= "zflexsof_churchu";
		$dbCfg['db_passwd']		= "ellight!@@!";
		$dbCfg['db_name']		= "zflexsof_churchdb";
		$dbCfg['pro_key']		= '';
	}

	/************************/
	
	/**
	 * import()
	 *
	 * @param mixed $className
	 * @return
	 */
	function import($className){
		if($className && $className != ""){
			$className = "classes/class." . $className . ".php";
			if(file_exists(SITE_PATH . $className)){
				require_once(SITE_PATH . $className);
			}
		}
	}
	
	/**
	 * getImage()
	 *
	 * @param string $imagename
	 * @param string $ext
	 * @return
	 */
	function getimage($imagename, $ext){
		return $imagename . '_' . strtolower(SITE_LANG) . '.' . $ext;
	}
	
	/**
	 * importJs()
	 *
	 * @param mixed $jsFile
	 * @return
	 */
	function importJs($jsFile){
		if($jsFile && $jsFile != ""){
			$jsFile = "jscript/Js" . $jsFile . ".js";
			if(file_exists(SITE_PATH . $jsFile)){
				echo "<script language=\"javascript\" type=\"text/javascript\" src=\"" . SITE_URL . $jsFile . "\"></script>\n";
			}
		}
	}
	
	/**
	 * printArray()
	 *
	 * @param array $arr
	 * @return
	 */
	function printPre($str, $exit = false){
		echo '<pre style="text-align:left;">' . $str . '</pre>';
		if($exit){
			exit();
		}
	}
	
	/**
	 * printArray()
	 *
	 * @param array $arr
	 * @return
	 */
	function printArray($arr, $exit = false){
		echo '<pre style="text-align:left;">';
		//print_r($arr);
		echo '</pre>';
		if($exit){
			exit();
		}
	}
	
	/**
	 * importCss()
	 *
	 * @param mixed $cssFile
	 * @return
	 */
	function importCss($cssFile){
		if($cssFile && $cssFile != ""){
			$cssFile = "css/Css" . $cssFile . ".css";
			if(file_exists(SITE_PATH . $cssFile)){
				echo "<link href=\"" . SITE_URL . $cssFile . "\" rel=\"stylesheet\" type=\"text/css\" />\n";
			}
		}
	}
	
	/**
	 * buildUrl()
	 *
	 * @param string $url
	 * @param integer $refSecond
	 * @return
	 */
	function buildUrl($url = ""){
		header("Location:" . $url);
		die();
	}
	
	/**
	 * redirect()
	 *
	 * @param string $url
	 * @param integer $refSecond
	 * @return
	 */
	function redirect($url = "", $refSecond = 0){
		header("Location:" . $url);
		die();
	}
	
	/**
	 * doDefine()
	 *
	 * @param mixed $configs
	 * @return
	 */
	function doDefine($configs){
		$str = "";
		if($configs){
			foreach($configs as $key=>$value){
				$str .= "define(\"" . strtoupper($key) . "\",\"" . $value . "\");\n";
			}
		}
		return $str;
	}
	
	/*********** Define the values *********/
	$defines = doDefine($_CONFIG);
	echo eval($defines);
	
	/**
	 * __autoload()
	 *
	 * @param string $class_name
	 * @return
	 */
	function __autoload($class_name){
		// class directories
		$dirs = array(
			'classes/',
			'classes/core/',
			'classes/utfexport/'
		);
		
		// for each directory
		foreach($dirs as $dir){
			// see if the file exsists
			//echo $class_name;
			if(file_exists(SITE_PATH . $dir . $class_name . '.php')){
				require_once(SITE_PATH . $dir . $class_name . '.php');
				// only require the class once, so quit after to save effort (if you got more, then name them something else
			return;
			}
		}
	}
	
	/**
	 * getPage()
	 *
	 * @param string $log_module
	 * @return
	 */
	function getPage($page){
		if(isset($page) && !empty($page)){
			$filename = HTML_PATH . ($page) . '.default' . '.php';
			if(file_exists($filename))
				return HTML_PATH . ($page) . '.default' . '.php';
			else
				return HTML_PATH . '404' . '.php';
		}
		else{
			return HTML_PATH . 'default.php';
		}
	}
	
	function getDomain(){
		$host = $_SERVER["HTTP_HOST"];
		$host = str_replace('www.', '', $host);
		return '.' . $host;
	}
	
	function getPageName(){
		$PageName = $_GET['category_cd'];
		return $PageName;
	}
	
	function GetEncptBKL(){
		$Back_Link = $_SERVER['HTTP_REFERER'];
		$En_BKLINK = base64_encode($Back_Link);
		return $En_BKLINK;
	}
	
	function GetDecptBKL($BLK){
		$De_BKLINK = base64_decode($BLK);
		return $De_BKLINK;
	}
	
	function dateFormate($GetDate){
	list($Year,$Month,$Day)= explode('-', $GetDate);
	$FinalDate = $Day .'/'. $Month;
		return $FinalDate;	
	}
	
	function dateFormate_2($GetDate){
	list($Year,$Month,$Day)= explode('-', $GetDate);
	$FinalDate = $Day .' / '. $Month .' <br> '. $Year;
		return $FinalDate;	
	}
	
	function dateFormate_3($GetDate){
	list($Year,$Month,$Day)= explode('-', $GetDate);
	$FinalDate = $Day .'/'. $Month .'/'. $Year;
		return $FinalDate;	
	}
	
	function dateFormate_9($GetDate){
	list($Month,$Day,$Year)= explode('/', $GetDate);
	$FinalDate = $Year .'-'. $Month .'-'. $Day;
		return $FinalDate;	
	}
	
	function dateFormate_4($GetDate){
	list($GTDate,$GTTime)= explode(' ', $GetDate);
	list($Year,$Month,$Day)= explode('-', $GTDate);
	$FinalDate = $Day .'/'. $Month .'/'. $Year;
		return $FinalDate;	
	}
	
	function dateFormate_7($GetDate){
	list($GTDate,$GTTime)= explode(' ', $GetDate);
	list($Year,$Month,$Day)= explode('-', $GTDate);
	$FinalDate = $Day .'/'. $Month .'/'. substr($Year,2,4);
		return $FinalDate;	
	}
	
	function dateFormate_6($GetDate){
	list($Year,$Month,$Day)= explode('-', $GetDate);
	$FinalDate = date("M") .'-'. $Day;
		return $FinalDate;	
	}
	
	function GetMonth($Month){
		if($Month=='Jan'){
			$MonthM = 1;
			} elseif($Month=='Feb'){
				$MonthM = 2;
				} elseif($Month=='Mar'){
					$MonthM = 3;
					} elseif($Month=='Apr'){
						$MonthM = 4;
						} elseif($Month=='May'){
							$MonthM = 5;
							} elseif($Month=='Jun'){
								$MonthM = 6;
								} elseif($Month=='Jul'){
									$MonthM = 7;
									} elseif($Month=='Aug'){
										$MonthM = 8;
										} elseif($Month=='Sep'){
											$MonthM = 9;
											 } elseif($Month=='Oct'){
												  $MonthM = 10;
												   } elseif($Month=='Nov'){
													   $MonthM = 11;
													    } elseif($Month=='Dec'){
															$MonthM = 12;
															}
		return $MonthM;
	}
	
	function dateFormate_8($GetDate){
	list($Year,$Month,$Day)= explode('-', $GetDate);
		if($Month==1){
			$MonthM = 'Jan';
			} elseif($Month==2){
				$MonthM = 'Feb';
				} elseif($Month==3){
					$MonthM = 'Mar';
					} elseif($Month==4){
						$MonthM = 'Apr';
						} elseif($Month==5){
							$MonthM = 'May';
							} elseif($Month==6){
								$MonthM = 'Jun';
								} elseif($Month==7){
									$MonthM = 'Jul';
									} elseif($Month==8){
										$MonthM = 'Aug';
										} elseif($Month==9){
											$MonthM = 'Sep';
											 } elseif($Month==10){
												  $MonthM = 'Oct';
												   } elseif($Month==11){
													   $MonthM = 'Nov';
													    } elseif($Month==12){
															$MonthM = 'Dec';
															}
	$FinalDate = $MonthM .' '. $Day.', '. $Year;
		return $FinalDate;	
	}
	
	function SupportTicketCode($STID){
		$Day = date('d');
		$Hr = date('h');
		$Mint = date('i');
		$Secnd = date('s');
		$Month = date('m');
		$TicketCode = $Day . $Hr + $Mint + $Secnd + $Month . $STID;
	return $TicketCode;
	}
	
	function GetGrandTotal($GetProPrice){
		$GrandTotal += $GetProPrice;
		return $GrandTotal;
	}
	function relativeTime($dt,$precision=2){
	$times=array(	365*24*60*60	=> "year",
					30*24*60*60		=> "month",
					7*24*60*60		=> "week",
					24*60*60		=> "day",
					60*60			=> "hour",
					60				=> "minute",
					1				=> "second");
	
	$passed=time()-$dt;
	
	if($passed<5)
	{
		$output='less than 5 seconds ago';
	}
	else
	{
		$output=array();
		$exit=0;
		
		foreach($times as $period=>$name)
		{
			if($exit>=$precision || ($exit>0 && $period<60)) break;
			
			$result = floor($passed/$period);
			if($result>0)
			{
				$output[]=$result.' '.$name.($result==1?'':'s');
				$passed-=$result*$period;
				$exit++;
			}
			else if($exit>0) $exit++;
		}
				
		$output=implode(' and ',$output).' ago';
	}
	
	return $output;
	}

	function PaymentType($PBID){
		if($PBID==1){
			$ResultBack = 'Cash';
			} elseif($PBID==2){
				$ResultBack = 'Cheque';
				}
	return $ResultBack;	
	}
	
	function PickBoxResult($PBID){
		if($PBID==1){
			$ResultBack = 'Win';
			} elseif($PBID==2){
				$ResultBack = 'Loss';
				}
	return $ResultBack;	
	}
	
	function GetOrderBy($Query, $Order,$Cap, $type){
		$GetOrder = base64_decode($Order);
		if($Order==''){
		$ReturnBackQuery = '<a href="'.$Query.'&OY='.base64_encode('ASC').'&tp='.base64_encode($type).'">'.$Cap.'</a>';
		} elseif($GetOrder=='ASC'){
			$ReturnBackQuery = '<a href="'.$Query.'&OY='.base64_encode('DESC').'&tp='.base64_encode($type).'">'.$Cap.'</a>';
			} elseif($GetOrder=='DESC'){
				$ReturnBackQuery = '<a href="'.$Query.'&OY='.base64_encode('ASC').'&tp='.base64_encode($type).'">'.$Cap.'</a>';
			}
		return $ReturnBackQuery;
	}
	
	function CardStatus($CardSTID){
		if($CardSTID==1) {
			$CardSTName = 'Active';
		} elseif($CardSTID==2) {
				$CardSTName = 'Expire';
			} elseif($CardSTID==3) {
					$CardSTName = 'InUsed';
				}
		return $CardSTName;	
	}
	
	function VisitorDateTime($VDate,$VTime){
		if($VDate !='' && $VTime!=''){
		list($VTYear,$VTMonth,$VTDate)= explode('-', $VDate);
		list($VTHours,$VTMint,$VTSecond)= explode(':', $VTime);
		$VTDateTime = $VTDate.'-'.$VTMonth.'-'.$VTYear.' - '.DATE("g:i A", STRTOTIME(VisitorTime($VTHours.':'.$VTMint)));
		} else {
			$VTDateTime = '';
		}
		return $VTDateTime;	
	}
	
	function VisitorTime($VTime){
		if($VTime!=''){
		list($VTHours,$VTMint,$VTSecond)= explode(':', $VTime);
		$VTDateTime = $VTHours.':'.$VTMint;
		} else {
			$VTDateTime = '';
		}
		return $VTDateTime;	
	}
	
	function CategoryStatus($CategorySTID){
		if($CategorySTID==1) {
			$CategorySTName = 'Active';
		} elseif($CategorySTID==2) {
				$CategorySTName = 'InActive';
			} elseif($CategorySTID==0) {
				$CategorySTName = 'All';
			}
		return $CategorySTName;	
	}
	
	function VisitorStatus($VS){
		if($VS==1) {
			$StatusName = 'IN';
		} elseif($VS==2) {
				$StatusName = 'OUT';
			}
		return $StatusName;	
	}
	
	function VisitorGendor($Gendor){
		if($Gendor==1) {
			$ReturnGendor = 'Male';
		} elseif($Gendor==2) {
				$ReturnGendor = 'Female';
			}
		return $ReturnGendor;	
	}
	
	function CronName($CronID){
		if($CronID==1) {
			$CronName = 'Twitter Streaming Fetch Cron';
		} elseif($CronID==2) {
				$CronName = '';
			} elseif($CronID==3) {
					$CronName = '';
			}
		return $CronName;	
	}
	
	function CronStatus($CronSTID){
		if($CronSTID==1) {
			$CronSTName = 'Unable Streaming';
		} elseif($CronSTID==2) {
				$CronSTName = 'Temporary Stop';
			} elseif($CronSTID==3) {
					$CronSTName = 'Working (Active)';
				} elseif($CronSTID==4) {
						$CronSTName = 'No User Streaming List';
					}
		return $CronSTName;	
	}
	
	function EncData($Data){
		$stp_1 = base64_encode($Data);
			$stp_2 = base64_encode($stp_1);
				$stp_3 = base64_encode($stp_2);
					$stp_4 = base64_encode($stp_3);
						$stp_5 = base64_encode($stp_4);
		return $stp_5;
	}
	
	function DecData($Data){
		$stp_1 = base64_decode($Data);
			$stp_2 = base64_decode($stp_1);
				$stp_3 = base64_decode($stp_2);
					$stp_4 = base64_decode($stp_3);
						$stp_5 = base64_decode($stp_4);
		return $stp_5;
	}
	
	function MulValue($Value,$type){
		if($type==1){
		$EncValue = $Value * 12321;
		} elseif($type==2){
		$EncValue = $Value / 12321;
		}
		return $EncValue;
	}
	
	function GetTypeName($TypeID){

		if($TypeID==1){
			$TypeName = 'Player';
		} elseif($TypeID==2){
				$TypeName = 'Team';
			} elseif($TypeID==3){
					$TypeName = 'League';
				} elseif($TypeID==4){
						$TypeName = 'User';
						} elseif($TypeID==5){
							$TypeName = 'Sub Division';
							} elseif($TypeID==6){
								$TypeName = 'Conference';
								} elseif($TypeID==7){
									$TypeName = 'Weight class';
									} elseif($TypeID==8){
										$TypeName = 'Fighters';
					} else {
						$TypeName = 'User';
						}
		return $TypeName;
	}
	
	function GetBackPageName($bk){
		
		if($bk=='lm'){
			$BPageName = 'league_mgmt';
		} elseif($bk=='sdm'){
				$BPageName = 'sub_division_mgmt';
			} elseif($bk=='fm'){
					$BPageName = 'fighters_mgmt';
				} elseif($bk=='wcm'){
						$BPageName = 'weight_class_mgmt';
					} elseif($bk=='cm'){
							$BPageName = 'conference_mgmt';
						} elseif($bk=='tm'){
								$BPageName = 'team_mgmt';
						}
						
		return $BPageName;
	}
	
	function GetReturnMessage($bk){
		
		if($bk=='lm'){
			$BPageName = LEAGUES_HASHTAGS_MSG_SUCCESS;
		} elseif($bk=='sdm'){
				$BPageName = SUB_DIVISION_HASHTAGS_MSG_SUCCESS;
			} elseif($bk=='fm'){
					$BPageName = FIGHTERS_HASHTAGS_MSG_SUCCESS;
				} elseif($bk=='wcm'){
						$BPageName = WEIGHT_CLASS_HASHTAGS_MSG_SUCCESS;
					} elseif($bk=='cm'){
							$BPageName = CONFERENCE_HASHTAGS_MSG_SUCCESS;
						} elseif($bk=='tm'){
								$BPageName = TEAM_HASHTAGS_MSG_SUCCESS;
						}
						
		return $BPageName;
	}
	
	function StatusName($StatusID){
		if($StatusID==0){
			$BackStatus = 'InActive';
			} elseif($StatusID==1){
				$BackStatus = 'Active';
				} elseif($StatusID==2){
					$BackStatus = 'InActive';
					}
		return $BackStatus;
	}
	
	function HourPlus($HP){
		$GetHourBack = date("h:i:s", strtotime("-".$HP." hour"));
		return $GetHourBack;
	}
	
	function StreamTypeName($Type){	
		if($Type==1){
			$BackType = 'Twitter';
			} elseif($Type==2){
				//$BackType = 'Facebook';
				}
		return $BackType;
	}
	
	function StreamTypeList($Type){	
		$BackList = '';
		if($Type==1){
			$BackList .= "<option value=\"1\" selected># Twitter</option>\n";
			//$BackList .= "<option value=\"2\">facebook</option>\n";
			} elseif($Type==2){
				$BackList .= "<option value=\"1\"># Twitter</option>\n";
				//$BackList .= "<option value=\"2\" selected>facebook</option>\n";
				} else {
					$BackList .= "<option value=\"1\"># Twitter</option>\n";
					//$BackList .= "<option value=\"2\">facebook</option>\n";
					}
		return $BackList;
	}
	
	function SecQuestion($QusID){
		if($QusID==1){
		$secquestion = 'Question #1';
		} elseif($QusID==2){
		$secquestion = 'Question #2';
		} elseif($QusID==3){
		$secquestion = 'Question #3';
		}
		return $secquestion;
	}
	
	function conditiontype($condition_id){
		if($condition_id==1){
			$ConditionDetail = 'New';
		} else {
			$ConditionDetail = 'Used';
		}
		return $ConditionDetail;
	}
	
	function valuechecker($value){
		if($value==''){
			$returnvalue = 'NULL';
		} else {
			$returnvalue = $value;
		}
		return $returnvalue;
	}
	
	function producttype($product_type_id){
		if($product_type_id==1){
			$ProTypeDetail = 'Sale';
		} elseif($product_type_id==2){
			$ProTypeDetail = 'Bid';
		} elseif($product_type_id==3){
			$ProTypeDetail = 'Swap';
		} elseif($product_type_id==4){
			$ProTypeDetail = 'Sale + Swap';
		}
		return $ProTypeDetail;
	}
	
	function checkvalue($GetValue, $Type){
		//1=> Email
		//2=> Text
		//3=> WebSite URl
		
			if($GetValue==''){
				$ReturnValue = 'Null';
			} else {
				if($Type==1){
					$ReturnValue = '<a href="mailto:'.$GetValue.'">'.$GetValue.'</a>';
				} elseif($Type==2){
						$ReturnValue = $GetValue;
					} elseif($Type==3){
							$ReturnValue = '<a href="http://'.$GetValue.'" target="_new">'.$GetValue.'</a>';
						}
			}
		return $ReturnValue;
	}
	
	

	// see if language is changed.

	if($_SESSION['allsite_lang']==''){
		$_SESSION['allsite_lang'] = $_CONFIG['lang'];
		$_CONFIG['lang'] = 'NL';
		setcookie('allsite_lang', $_CONFIG['lang'], time() + 31536000); // store the language in cookie for 1 year (365 days)
	} elseif($_REQUEST['C']=='LNG'){
		$_CONFIG['lang'] = $_REQUEST['lang'];
		$_SESSION['allsite_lang'] = $_REQUEST['lang'];
		setcookie('allsite_lang', $_CONFIG['lang'], time() + 31536000); // store the language in cookie for 1 year (365 days)
		$link = $_SERVER["HTTP_REFERER"];
		redirect($link);
	}
	
	define('SITE_LANG', $_SESSION['allsite_lang']);
	//define("PERPAGE", 50);
	
	/*********** Define the values *********/
	define("HOST", $dbCfg['host']);
	define("DBUSER", $dbCfg['db_user']);
	define("DBPASSWD", $dbCfg['db_passwd']);
	define("DBNAME", $dbCfg['db_name']);
	
	define("SITE_URL", ROOT_HOST);

?>