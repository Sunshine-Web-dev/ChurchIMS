<?php if(!$objMember->member_type==1){ include("656.php");die();} 
if($_POST["gen"]=="rpt"){
$CompleteDateRange = explode(' - ', $_POST["dtrang"]);
$ChurchStatus = $_POST["chst"];
$StartDate = dateFormate_9(trim($CompleteDateRange[0]));
$EndDate = dateFormate_9(trim($CompleteDateRange[1]));
$objChurchList = new Member;
$objChurchList->setProperty("start_date", $StartDate);
$objChurchList->setProperty("end_date", $EndDate);
if($ChurchStatus!=0){
$objChurchList->setProperty("is_active", $ChurchStatus);
}
$objChurchList->lstChurch();
}
?>
<div class="content-page"> 
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid"> 
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-title">Church Report</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
            <li class="breadcrumb-item active">Church Report</li>
          </ol>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box">
              <h4 class="m-t-0 header-title"><b>Selection Criteria</b></h4>
              <form action="" method="post" id="frmGenFilt" name="frmGenFilt">
                <input type="hidden" name="gen" value="rpt" />
                <div class="row">
                  <div class="col-md-6">
                    <div class="p-20">
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
                  </div>
                  <div class="col-md-6">
                    <div class="p-20">
                      <h5><b>Select the status </b></h5>
                      <p class="text-muted m-b-15 font-13"> Select the required status as per generate report. Select status from the below dropdown. </p>
                      <select class="form-control" maxlength="25" name="chst" id="church_status">
                        <option value="0" <?php if($_POST["chst"]==0){ echo 'selected="selected"';} else { echo '';}?>>All</option>
                        <option value="1" <?php if($_POST["chst"]==1){ echo 'selected="selected"';} else { echo '';}?>>Active</option>
                        <option value="2" <?php if($_POST["chst"]==2){ echo 'selected="selected"';} else { echo '';}?>>In Active</option>
                      </select>
                    </div>
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
            <h4 class="m-t-0 header-title"><b>Church Report [ Date Range : <?php echo $_POST["dtrang"];?> &nbsp;-::-&nbsp; Church Status: <?php echo CategoryStatus($_POST["chst"]);?>] </b></h4>
            <table id="datatable-12" class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Phone #</th>
                  <th>Admin Name</th>
                  <th align="center">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
								if($objChurchList->totalRecords() >= 1){
									$objChurchAdmin = new Member;
                                while($ChurchList = $objChurchList->dbFetchArray(1)){
									
										
										$objChurchAdmin->setProperty("church_id", $ChurchList["church_id"]);
										$objChurchAdmin->setProperty("member_type", 2);
										$objChurchAdmin->lstMember();
										$MemberDetail = $objChurchAdmin->dbFetchArray(1);
                                ?>
                <tr>
                  <td><?php echo $ChurchList["church_name"];?></td>
                  <td><?php echo $ChurchList["church_address"].', '.$ChurchList["church_city"];?></td>
                  <td><?php echo $ChurchList["church_p_number"];?></td>
                  <td><?php echo $MemberDetail["fullname"];?></td>
                  <td align="center"><?php echo CategoryStatus($ChurchList["is_active"]);?></td>
                </tr>
                <?php } } else {?>
                <tr>
                  <td colspan="4" align="center">No records found.</td>
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
