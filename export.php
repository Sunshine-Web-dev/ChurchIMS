<?php
require_once("config/config.php");
error_reporting(0);
//require the langu452age file
require_once('lang/' . strtolower(SITE_LANG) . '/rs_lang.website.php');

$objCommon 		= new Common;
$objContent 	= new Content;
$objValidate 	= new Validate;
$objCustomer 	= new Customer;
$objTemplate 	= new Template;

$GetLoginUserID = base64_decode($_GET['ui']);
$GetReportExportStartDate = base64_decode($_GET["stdt"]);
$GetReportExportEndDate = base64_decode($_GET["endt"]);

function time_to_sec($time) {
    $hours = substr($time, 0, -6);
    $minutes = substr($time, -5, 2);
    $seconds = substr($time, -2);

    return $hours * 3600 + $minutes * 60 + $seconds;
}

function sec_to_time($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor($seconds % 3600 / 60);
    $seconds = $seconds % 60;
	//$returntime = $hours.' H & '.$minutes.' M';
    return sprintf("%d:%02d:%02d", $hours, $minutes, $seconds);
	//return $returntime;
} 


function timeDiff($firstTime,$lastTime)
{

// convert to seconds
$firstTime=time_to_sec($firstTime);
$lastTime=time_to_sec($lastTime);

// perform subtraction to get the difference (in seconds) between times
$timeDiff=$lastTime-$firstTime;

// return the difference
return sec_to_time($timeDiff);
}

//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Karachi');
//define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once 'PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Numan Tahir : Elanist (numan@elanist.com)");


// Add some data
//echo date('H:i:s') , " Add some data" , EOL;

$BorderSetting = array(
		  'borders' => array(
								'top'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'left'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)
		);
/********************************************************************/
/********************************************************************/
// Main Header of Excel File Start
/********************************************************************/
/********************************************************************/
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Visitor Management System Pro 2.3')
            ->setCellValue('A3', 'Sr#')
            ->setCellValue('B3', 'Visitor Name')
            ->setCellValue('C3', 'CNIC#')
			->setCellValue('D3', 'Visitor Card#')
			->setCellValue('E3', 'IN Time')
			->setCellValue('F3', 'OUT Time')
			->setCellValue('G3', 'Duration')
			->setCellValue('H3', 'Floor/Department')
			->setCellValue('I3', 'Visiting Who');

$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('A2:I2')->getFont()->setBold(false)->setSize(11);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);

$objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setWrapText(true);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:I1');

// Center Text
$objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D3:G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// Left Text
$objPHPExcel->getActiveSheet()->getStyle('B3:C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objPHPExcel->getActiveSheet()->getStyle('H3:I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$objPHPExcel->getActiveSheet()->getStyle('A3:I3')->applyFromArray(
		array(
			'font'    => array(
				'bold'      => true
			)
		)
);
$objPHPExcel->getActiveSheet()->getStyle('A1:I1')->applyFromArray(
		array(
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'EFEFEF')
			),
		  'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'top'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'left'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)
			)
);

$objPHPExcel->getActiveSheet()->getStyle('A3')->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('C3')->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('D3')->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('E3')->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('F3')->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('G3')->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('H3')->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('I3')->applyFromArray($BorderSetting);

$objPHPExcel->getActiveSheet()->getStyle('A2:I2')->applyFromArray($BorderSetting);
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:B2');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C2:D2');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('E2:G2');
$objVisitorCount = new Vms;
if($GetReportExportStartDate=='' && $GetReportExportEndDate==''){
	$objVisitorCount->setProperty("entry_date", date('Y-m-d'));
	$ReportDate = dateFormate_3(date('Y-m-d'));
} else {
	$objVisitorCount->setProperty("st_date", $GetReportExportStartDate);
	$objVisitorCount->setProperty("nd_date", $GetReportExportEndDate);
	$ReportDate = dateFormate_3($GetReportExportStartDate) .' - '. dateFormate_3($GetReportExportEndDate);
}

$objVisitorCount->setProperty("ORDERBY", "arrival_time DESC");
$objVisitorCount->setProperty("user_id", $objCustomer->customer_id);

$objVisitorCount->lstVisitor();
$GetTotalRecords = $objVisitorCount->totalRecords();
//$InVisitor = $objVms->dbFetchArray(1);
						
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A2', 'Login ID: '.$GetLoginUserID)
			->setCellValue('C2', 'Date: '.$ReportDate)
			->setCellValue('E2', 'Number of Visitor: '.$GetTotalRecords);
/********************************************************************/
/********************************************************************/
// Main Header of Excel File End
/********************************************************************/
/********************************************************************/
$objVisitorList = new Vms;
if($GetReportExportStartDate=='' && $GetReportExportEndDate==''){
	$objVisitorList->setProperty("entry_date", date('Y-m-d'));
} else {
	$objVisitorList->setProperty("st_date", $GetReportExportStartDate);
	$objVisitorList->setProperty("nd_date", $GetReportExportEndDate);
}

$objVmsDepartment = new Vms;
$objVmsCard = new Vms;
$objVisitorList->setProperty("ORDERBY", "arrival_time DESC");
$objVisitorList->setProperty("user_id", $objCustomer->customer_id);
$objVisitorList->lstVisitor();
//$GetTotalRecords = $objVisitorList->totalRecords();
$Counter = 3;
$SrCounter = 0;
while($VisitorRec = $objVisitorList->dbFetchArray(1)){
	$SrCounter++;
$Counter++;

$objVmsDepartment->setProperty("department_id", $VisitorRec["department"]);
$objVmsDepartment->lstDepartment();
$MeetDepartment = $objVmsDepartment->dbFetchArray(1);

$objVmsCard->setProperty("card_id", $VisitorRec["card_number_id"]);
$objVmsCard->lstVisitorCard();
$VisitorCardIssue = $objVmsCard->dbFetchArray(1);

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$Counter, $SrCounter)
            ->setCellValue('B'.$Counter, $VisitorRec['first_name'].' '.$VisitorRec['last_name'])
            ->setCellValue('C'.$Counter, $VisitorRec['nic_no'])
			->setCellValue('D'.$Counter, $VisitorCardIssue['card_number'])
			->setCellValue('E'.$Counter, VisitorTime($VisitorRec['arrival_time']))
			->setCellValue('F'.$Counter, VisitorTime($VisitorRec['departure_time']))
			->setCellValue('G'.$Counter, timeDiff($VisitorRec["arrival_time"], $VisitorRec["departure_time"]))
			->setCellValue('H'.$Counter, $MeetDepartment['floor_no'].'/'.$MeetDepartment['department_name'])
			->setCellValue('I'.$Counter, $VisitorRec['meet_to']);



$objPHPExcel->getActiveSheet()->getStyle('C'.$Counter)->getNumberFormat()->setFormatCode('0000');
// Center Text
$objPHPExcel->getActiveSheet()->getStyle('A'.$Counter)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D'.$Counter.':G'.$Counter)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
// Left Text
$objPHPExcel->getActiveSheet()->getStyle('B'.$Counter.':C'.$Counter)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
//$objPHPExcel->getActiveSheet()->getStyle('H'.$Counter.':I'.$Counter)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objPHPExcel->getActiveSheet()->getStyle('H'.$Counter)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
//$objPHPExcel->getActiveSheet()->getStyle('I'.$Counter)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
// Border Option
$objPHPExcel->getActiveSheet()->getStyle('A'.$Counter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('B'.$Counter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('C'.$Counter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('D'.$Counter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('E'.$Counter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('F'.$Counter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('G'.$Counter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('H'.$Counter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('I'.$Counter)->applyFromArray($BorderSetting);

//$objPHPExcel->getActiveSheet()->getStyle('H'.$Counter)->applyFromArray($BorderSetting);
//$objPHPExcel->getActiveSheet()->getStyle('I'.$Counter)->applyFromArray($BorderSetting);


/*$objPHPExcel->getActiveSheet()->getStyle('H'.$Counter)->applyFromArray(
array(
		  'borders' => array(
								'top'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'left'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)
			)
		);
$objPHPExcel->getActiveSheet()->getStyle('I'.$Counter)->applyFromArray(
		array(
		  'borders' => array(
								'top'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'left'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
							)
			)
		);*/
		
		
}
/*$AddCounter = $Counter + 1;

$objPHPExcel->getActiveSheet()->getStyle('A'.$AddCounter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('B'.$AddCounter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('C'.$AddCounter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('D'.$AddCounter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('E'.$AddCounter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('F'.$AddCounter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('G'.$AddCounter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('H'.$AddCounter)->applyFromArray($BorderSetting);
$objPHPExcel->getActiveSheet()->getStyle('I'.$AddCounter)->applyFromArray($BorderSetting);*/












$objPHPExcel->getActiveSheet()->setTitle(date('d-m-Y'));
$objPHPExcel->setActiveSheetIndex(0);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$FileNameonly = $objCustomer->customer_id.date('d-m-Y').date('His').'.xls';
$FileNameAndPath = 'download/'.$FileNameonly;
$objWriter->save($FileNameAndPath);


header('Content-Type: application/download');
header('Content-Disposition: attachment; filename="'.$FileNameonly.'"');
header("Content-Length: " . filesize($FileNameAndPath));
$fp = fopen($FileNameAndPath, "r");
fpassthru($fp);
fclose($fp);