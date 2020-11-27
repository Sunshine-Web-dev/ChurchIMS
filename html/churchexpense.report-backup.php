<?php if(!$objMember->member_type==1){ include("656.php");die();} 
if($_POST["gen"]=="rpt"){
$CompleteDateRange = explode(' - ', $_POST["dtrang"]);
$ChurchStatus = $_POST["chst"];
$ContType = $_POST["cnttyp"];
$StartDate = dateFormate_9(trim($CompleteDateRange[0]));
$EndDate = dateFormate_9(trim($CompleteDateRange[1]));
$objChurchExpense = new Member;
$objChurchExpense->setProperty("start_date", $StartDate);
$objChurchExpense->setProperty("end_date", $EndDate);
$objChurchExpense->setProperty("transection_type", 2);
$objChurchExpense->setProperty("church_id", $MemberDetail["church_id"]);
if($ChurchStatus!=0){
$objChurchExpense->setProperty("is_active", $ChurchStatus);
}
if($ContType!=0){
$objChurchExpense->setProperty("amount_category", $ContType);
}

$objChurchExpense->lstTransectionDetail();
}
?>
<div class="content-page"> 
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid"> 
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-title">Church Expense Report</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
            <li class="breadcrumb-item active">Church Expense Report</li>
          </ol>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box">
              <h4 class="m-t-0 header-title"><b>Selection Criteria</b></h4>
              <form action="" method="post" id="frmGenFilt" name="frmGenFilt">
                <input type="hidden" name="gen" value="rpt" />
                <div class="row">
                  <div class="col-md-12">
                      <h5><b>Select the Expense Type </b></h5>
                      <select class="form-control" maxlength="25" name="cnttyp" id="church_status">
                        <option value="0">All</option>
						<?php 
                        $objContriType = new Member;
                        $objContriType->setProperty("ORDERBY", "tran_category_name");
						$objContriType->setProperty("tran_type", 2);
                        $objContriType->lstTransectionCategory();
						while($ContriType = $objContriType->dbFetchArray(1)){
                        ?>
                        <option value="<?php echo $ContriType["tran_category_id"];?>" <?php if($_POST["cnttyp"]==$ContriType["tran_category_id"]){ echo 'selected="selected"';} else { echo '';}?>><?php echo $ContriType["tran_category_name"];?></option>
                        <?php } ?>
                      </select>
                  </div>
                  <div class="col-md-6">
                      <h5><b>Select Date</b></h5>
                      <p class="text-muted m-b-15 font-13"> Select the start date and end date from the calender. Calender will show all the dates. </p>
                      <?php
						if($_POST["dtrang"]!=''){
						$addvalue = 'value="'.$_POST["dtrang"].'"';
						} else {
						$addvalue = '';	
						}
						?>
                      <input type="text"<?php echo $addvalue;?> id="reportrange" name="dtrang" class="form-control" readonly="readonly" >
                  </div>
                  <div class="col-md-6">
                      <h5><b>Select the status </b></h5>
                      <p class="text-muted m-b-15 font-13"> Select the required status as per generate report.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                      <select class="form-control" maxlength="25" name="chst" id="church_status">
                        <option value="0" <?php if($_POST["chst"]==0){ echo 'selected="selected"';} else { echo '';}?>>All</option>
                        <option value="1" <?php if($_POST["chst"]==1){ echo 'selected="selected"';} else { echo '';}?>>Active</option>
                        <option value="2" <?php if($_POST["chst"]==2){ echo 'selected="selected"';} else { echo '';}?>>In Active</option>
                      </select>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="btn-group pull-right m-t-15">
                      <button type="submit"class="btn btn-default waves-effect waves-light">Generate Report</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php if($_POST["gen"]=="rpt"){ ?>
        <div class="col-sm-12">
          <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Church Expense Report [ Date Range : <?php echo $_POST["dtrang"];?> &nbsp;-::-&nbsp; Status: <?php echo CategoryStatus($_POST["chst"]);?>] </b></h4>
            <table id="datatable-12" class="table table-bordered">
              <thead>
                <tr>
                  <th>Member No</th>
                  <th>Collection Date</th>
                  <th>Check No</th>
                  <th>Currency</th>
                  <th>Category</th>
                  <th>Amount</th>
                  
                </tr>
              </thead>
              <tbody>
						<?php
						$objTransectionCategory = new Member;
						$objCurrency = new Member;
                        if($objChurchExpense->totalRecords() >= 1){
                        while($ChurchExpense = $objChurchExpense->dbFetchArray(1)){
                        
						$objTransectionCategory->setProperty("tran_category_id", $ChurchExpense["amount_category"]);
                        $objTransectionCategory->lstTransectionCategory();
                        $TransectionCategory = $objTransectionCategory->dbFetchArray(1);
						
						$objCurrency->setProperty("currency_type_id", $ChurchExpense["currency_type"]);
                        $objCurrency->lstCurrency();
                        $DCurrency = $objCurrency->dbFetchArray(1);
                        ?>
                <tr>
                  <td><?php echo $ChurchExpense["member_no"];?></td>
                  <td><?php echo dateFormate_3($ChurchExpense["entry_date"]);?></td>
                  <td><?php echo $ChurchExpense["check_no"];?></td>
                  <td><?php echo $DCurrency["currency_symbl"];?></td>
                  
                  <td><?php echo $TransectionCategory["tran_category_name"];?></td>
                  <td><?php echo $ChurchExpense["receiving_amount"];?></td>
                  
                </tr>
                <?php } } else {?>
                <tr>
                  <td colspan="5" align="center">No records found.</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- </div>--> <!-- end row -->
        <?php } ?>
        <!-- end row --> 
        
      </div>
      <!-- container --> 
    </div>
    <!--- container --> 
  </div>
  <!-- content -->
  
  <footer class="footer text-right"> &copy; 2016 - <?php echo date("Y");?>. All rights reserved. </footer>
</div>
