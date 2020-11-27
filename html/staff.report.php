<?php if(!$objMember->member_type==1){ include("656.php");die();} 
if($_POST["gen"]=="rpt"){
$CompleteDateRange = explode(' - ', $_POST["dtrang"]);
$ChurchStatus 	= $_POST["chst"];
$ChurchList 	= $MemberDetail["church_id"];
$StaffType 		= $_POST["staftyp"];
$StartDate 		= dateFormate_9(trim($CompleteDateRange[0]));
$EndDate 		= dateFormate_9(trim($CompleteDateRange[1]));
$objStaffMember = new Member;
$objChurchName = new Member;
$objStaffMember->setProperty("start_date", $StartDate);
$objStaffMember->setProperty("end_date", $EndDate);
$objStaffMember->setProperty("member_type_not", 1);
if($ChurchStatus!=0){
$objStaffMember->setProperty("is_active", $ChurchStatus);
}
if($ChurchList!=0){
$objStaffMember->setProperty("church_id", $ChurchList);
}
if($StaffType!=0){
$objStaffMember->setProperty("member_category_id", $StaffType);
}
$objStaffMember->lstMember();
}
?>
<div class="content-page"> 
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid"> 
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-title">Staff Member Report</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
            <li class="breadcrumb-item active">Staff Member Report</li>
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
                      <h5><b>Select Staff Type </b></h5>
                      <select class="form-control" maxlength="25" name="staftyp" id="church_status">
                        <option value="0">All</option>
						<?php 
                        $objStaffType = new Member;
                        $objStaffType->setProperty("ORDERBY", "category_name");
						$objStaffType->setProperty("church_id", $MemberDetail["church_id"]);
                        $objStaffType->lstMemberCategory();
						while($StaffType = $objStaffType->dbFetchArray(1)){
                        ?>
                        <option value="<?php echo $StaffType["member_category_id"];?>" <?php if($_POST["staftyp"]==$StaffType["member_category_id"]){ echo 'selected="selected"';} else { echo '';}?>><?php echo $StaffType["category_name"];?></option>
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
            <h4 class="m-t-0 header-title"><b>Staff Member Report [ Date Range : <?php echo $_POST["dtrang"];?> &nbsp;-::-&nbsp; Staff Status: <?php echo CategoryStatus($_POST["chst"]);?>] </b></h4>
            <table id="datatable-12" class="table table-bordered">
              <thead>
                <tr>
                  <th>Staff Name</th>
                  <th>Type</th>
                  <th>Phone</th>
                  <th>Entry Date</th>
                </tr>
              </thead>
              <tbody>
                <?php
								if($objStaffMember->totalRecords() >= 1){
									$objMemberType = new Member;
                                while($StaffMember = $objStaffMember->dbFetchArray(1)){
									
									$objMemberType->setProperty("member_category_id", $StaffMember["member_category_id"]);
									$objMemberType->lstMemberCategory();
									$MemberType = $objMemberType->dbFetchArray(1);
									if($StaffMember["member_type"]==2){
										$StaffType = 'Church Admin';
									} else {
										$StaffType = $MemberType['category_name'];
									}
                                ?>
                <tr>
                  <td><?php echo $StaffMember["fullname"];?></td>
                  <td><?php echo $StaffType;?></td>
                  <td><?php echo $StaffMember["mobile"];?></td>
                  <td align="center"><?php echo dateFormate_3($StaffMember["reg_date"]);?></td>
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
