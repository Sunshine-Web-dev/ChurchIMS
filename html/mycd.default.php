<?php if(!$objMember->member_type==1){ include("656.php");die();} 
$objChurchDetail = new Member;
$objChurchDetail->setProperty("church_id", $MemberDetail["church_id"]);
$objChurchDetail->lstChurch();
$ChurchDetail = $objChurchDetail->dbFetchArray(1);

/*$objChurchAdmin = new Member;
$objChurchAdmin->setProperty("church_id", $MemberDetail["church_id"]);
$objChurchAdmin->setProperty("member_type", 2);
$objChurchAdmin->lstMember();
$MemberDetail = $objChurchAdmin->dbFetchArray(1);*/
//if($objChurchExpense->totalRecords() >= 1){
$objChurchStaff = new Member;
$objChurchStaff->setProperty("church_id", $MemberDetail["church_id"]);
$objChurchStaff->setProperty("member_type_in", '2,3');
$objChurchStaff->lstMember();
$TotalChurchStaff = $objChurchStaff->totalRecords();

$objChurchMember = new Member;
$objChurchMember->setProperty("church_id", $MemberDetail["church_id"]);
$objChurchMember->setProperty("member_type", 4);
$objChurchMember->setProperty("not_deleted", 3);
//$objChurchMember->setProperty("is_active", 4);
$objChurchMember->lstMember();
$TotalChurchMember = $objChurchMember->totalRecords();


$objChurchActiveMember = new Member;
$objChurchActiveMember->setProperty("church_id", $MemberDetail["church_id"]);
$objChurchActiveMember->setProperty("member_type", 4);
$objChurchActiveMember->setProperty("not_deleted", 3);
$objChurchActiveMember->setProperty("is_active", 1);
$objChurchActiveMember->lstMember();
$TotalChurchActiveMember = $objChurchActiveMember->totalRecords();

$objContAmount = new Member;
$objContAmount->setProperty("transection_type", 1);
$objContAmount->setProperty("church_id", $MemberDetail["church_id"]);
$objContAmount->lstTransectionDetail();
$ContTotalAmount = '';
while($ContAmount = $objContAmount->dbFetchArray(1)){
	$ContTotalAmount += $ContAmount["receiving_amount"];
}

$objExpAmount = new Member;
$objExpAmount->setProperty("transection_type", 2);
$objExpAmount->setProperty("church_id", $MemberDetail["church_id"]);
$objExpAmount->lstTransectionDetail();
$ExpTotalAmount = '';
while($ExpAmount = $objExpAmount->dbFetchArray(1)){
	$ExpTotalAmount += $ExpAmount["receiving_amount"];
}
?>
<div class="content-page"> 
 
 <!-- Start content -->
 
  <div class="content">
    <div class="container-fluid"> 
      
      <!-- Page-Title -->
      
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-title"><?php echo $ChurchDetail["church_name"];?></h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $ChurchDetail["church_name"];?></li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-lg-3">
          <div class="profile-detail card-box">
            <div>
              <?php if($ChurchDetail["church_logo"]!=''){?>
              <img src="<?php echo CHURCH_IMG_URL.$ChurchDetail["church_logo"];?>" alt="profile-image">
              <?php } else { ?>
              <img src="<?php echo SITE_URL;?>assets/images/users/chruch_logo_area.png" alt="profile-image">
              <?php } ?>
              <ul class="list-inline status-list m-t-20">
                <li class="list-inline-item">
                  <h3 class="text-primary m-b-5"><?php echo $TotalChurchStaff;?></h3>
                  <p class="text-muted">Number of Staff</p>
                </li>
                
                <li class="list-inline-item">
                  <h3 class="text-primary m-b-5"><?php echo $TotalChurchMember;?></h3>
                  <p class="text-muted">Number of Member</p>
                </li>
                
                <li class="list-inline-item">
                  <h3 class="text-primary m-b-5"><?php echo $TotalChurchActiveMember;?></h3>
                  <p class="text-muted">Number of Active Member</p>
                </li>
                
                
                <li class="list-inline-item">
                  <h3 class="text-primary m-b-5"><?php echo $ContTotalAmount;?></h3>
                  <p class="text-muted">Contribution Amount</p>
                </li>
                <li class="list-inline-item">
                  <h3 class="text-success m-b-5"><?php echo $ExpTotalAmount;?></h3>
                  <p class="text-muted">Church Expense</p>
                </li>
              </ul>
              <hr>
              
              <!--<ul class="nav nav-pills profile-pills m-t-10">

                                        <li>

                                            <a href="<?php echo Route::_('show=mycdmdy');?>"><i class="fa fa-pencil"></i></a>

                                        </li>

                                    </ul>--> 
              
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-8">
          <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Staff List</b> &nbsp; <small><a href="<?php echo Route::_('show=staffmembering');?>" style="float: right;">View All</a></small></h4>
            <table id="datatable-1" class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Phone #</th>
                </tr>
              </thead>
              <tbody>
                <?php
                                        $objStaffList = new Member;
                                        $objStaffList->setProperty("church_id", $MemberDetail["church_id"]);
                                        $objStaffList->setProperty("ORDERBY", "member_id DESC");
										$objStaffList->setProperty("member_type_in", '2,3');
										$objStaffList->setProperty("limit", '5');
                                        $objStaffList->lstMember();
										if($objStaffList->totalRecords() > 0){
                                        while($StaffList = $objStaffList->dbFetchArray(1)){
                                        ?>
                <tr>
                  <td><?php echo $StaffList["fullname"];?></td>
                  <td><?php echo $StaffList["address"];?></td>
                  <td><?php echo $StaffList["phone"];?></td>
                </tr>
                <?php }

										

										} else {

										 ?>
                <tr>
                  <td colspan="4" align="center">No data available in table</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <hr>
            <h4 class="m-t-0 header-title"><b>Contribution Member List</b> &nbsp; <small><a href="<?php echo Route::_('show=contributemember');?>" style="float: right;">View All</a></small></h4>
            <table id="datatable-1" class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Phone #</th>
                </tr>
              </thead>
              <tbody>
                <?php
                                        $objStaffList = new Member;
                                        $objStaffList->setProperty("church_id", $MemberDetail["church_id"]);
                                        $objStaffList->setProperty("ORDERBY", "member_id DESC");
										$objStaffList->setProperty("member_type", 4);
										$objStaffList->setProperty("limit", '5');
                                        $objStaffList->lstMember();
										if($objStaffList->totalRecords() > 0){
                                        while($StaffList = $objStaffList->dbFetchArray(1)){
                                        ?>
                <tr>
                  <td><?php echo $StaffList["fullname"];?></td>
                  <td><?php echo $StaffList["address"];?></td>
                  <td><?php echo $StaffList["phone"];?></td>
                </tr>
                <?php }

										

										} else {

										 ?>
                <tr>
                  <td colspan="4" align="center">No data available in table</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <hr>
            <h4 class="m-t-0 header-title"><b>Contribution List</b> &nbsp; <small><a href="<?php echo Route::_('show=contributing');?>" style="float: right;">View All</a></small></h4>
            <table id="datatable-1" class="table table-bordered">
              <thead>
                <tr>
                  <th>Member #</th>
                  <th>Amount</th>
                  <th>Collection date</th>
                  <th>Category</th>
                </tr>
              </thead>
              <tbody>
                <?php

                                            $objContList = new Member;

											$objContTypeList = new Member;

                                            $objContList->setProperty("transection_type", 1);

                                            $objContList->setProperty("church_id", $MemberDetail["church_id"]);

											$objContList->setProperty("limit", '5');

                                            $objContList->lstTransectionDetail();

											if($objContList->totalRecords() > 0){

                                            while($ContList = $objContList->dbFetchArray(1)){

												

												$objContTypeList->setProperty("tran_category_id", $ContList["amount_category"]);

												$objContTypeList->lstTransectionCategory();

												$DtContTypeList = $objContTypeList->dbFetchArray(1);

                                            ?>
                <tr>
                  <td><?php echo $ContList["member_no"];?></td>
                  <td><?php echo $ContList["receiving_amount"];?></td>
                  <td><?php echo dateFormate_3($ContList["collection_date"]);?></td>
                  <td><?php echo $DtContTypeList["tran_category_name"];?></td>
                </tr>
                <?php } } else {?>
                <tr>
                  <td colspan="5" align="center">No data available in table</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <hr>
            <h4 class="m-t-0 header-title"><b>Expense List</b> &nbsp; <small><a href="<?php echo Route::_('show=expensing');?>" style="float: right;">View All</a></small></h4>
            <table id="datatable-1" class="table table-bordered">
              <thead>
                <tr>
                  <th>Member #</th>
                  <th>Amount</th>
                  <th>Collection date</th>
                  <th>Category</th>
                </tr>
              </thead>
              <tbody>
                <?php

                                            $objExpList = new Member;

											$objExpTypeList = new Member;

                                            $objExpList->setProperty("transection_type", 2);

                                            $objExpList->setProperty("church_id", $MemberDetail["church_id"]);

											$objExpList->setProperty("limit", '5');

                                            $objExpList->lstTransectionDetail();

											if($objExpList->totalRecords() > 0){

                                            while($ExpList = $objExpList->dbFetchArray(1)){

												

												$objExpTypeList->setProperty("tran_category_id", $ExpList["amount_category"]);

												$objExpTypeList->lstTransectionCategory();

												$ExpTypeList = $objExpTypeList->dbFetchArray(1);

                                            ?>
                <tr>
                  <td><?php echo $ExpList["member_no"];?></td>
                  <td><?php echo $ExpList["receiving_amount"];?></td>
                  <td><?php echo dateFormate_3($ExpList["collection_date"]);?></td>
                  <td><?php echo $ExpTypeList["tran_category_name"];?></td>
                </tr>
                <?php } } else {?>
                <tr>
                  <td colspan="5" align="center">No data available in table</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- container --> 
    
  </div>
  <!-- content -->
  
  <footer class="footer text-right"> &copy; 2016 - 2017. All rights reserved. </footer>
</div>
