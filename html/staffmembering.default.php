<?php include_once(ACTION_PATH . 'delete_action.php');
//staffmembering
if(!$objMember->member_type==1){ include("656.php");die();} ?>
<div class="content-page">
              <!-- Start content -->
              <div class="content">
                  <div class="container-fluid">
                      <!-- Page-Title -->
                      <div class="row">
                          <div class="col-sm-12">
                          <div class="btn-group pull-right m-t-15">
                                   <a href="<?php echo Route::_('show=staffmember');?>" class="btn btn-default waves-effect waves-light">Add New Staff Member</a>
                                </div>
                                
                              <h4 class="page-title">Staff Member List</h4>
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
                                  <li class="breadcrumb-item active">Staff Member List</li>
                              </ol>
                              
                          </div>
                      </div>


                      <div class="row">
                          <div class="col-12">
                              <div class="card-box table-responsive">
                                  <h4 class="m-t-0 header-title"><b>Staff Member List</b></h4>

                                  <table id="datatable" class="table table-bordered">
                                      <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Mobile #</th>
                                          <th>Category</th>
                                          <th>Member No.</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                      </tr>
                                      </thead>


                                      <tbody>
								<?php                                
                                $objChurchList = new Member;
								$objStaffCategory = new Member;
								$objChurchList->setProperty("church_id", $MemberDetail["church_id"]);
								$objChurchList->setProperty("member_type_in", '2,3');
								$objChurchList->setProperty("not_deleted", 3);
                                $objChurchList->lstMember();
                                while($ChurchList = $objChurchList->dbFetchArray(1)){
									if($ChurchList["member_category_id"]==0){
									$StaffMemberCatName = 'NONE';	
									} else {
									$objStaffCategory->setProperty("member_category_id", $ChurchList["member_category_id"]);
									$objStaffCategory->lstMemberCategory();
									$StaffCategory = $objStaffCategory->dbFetchArray(1);
									$StaffMemberCatName = $StaffCategory["category_name"];
									}
                                ?>
                                      <tr>
                                          <td><a href="<?php echo Route::_('show=staffdetail&mi='.EncData($ChurchList["member_id"]));?>"><?php echo $ChurchList["fullname"];?></a></td>
                                          <td><?php echo $ChurchList["mobile"];?></td>
                                          <td><?php echo $StaffMemberCatName;?></td>
                                          <td><?php echo $ChurchList["member_no"];?></td>
                                          <td align="center"><?php echo CategoryStatus($ChurchList["is_active"]);?></td>
                                          <td align="center">
                                          <a href="<?php echo Route::_('show=staffmember&mci='.EncData($ChurchList["member_id"]));?>"> <i class="fa fa-pencil"></i></a>
                                          
                                          &nbsp;&nbsp;  | &nbsp;&nbsp;
                  <a href="<?php echo Route::_('show=staffmembering&mode=delete&mci='.EncData($ChurchList["member_id"]));?>">
                  <i class="fa fa-close"></i></a>
                                          
                                          </td>
                                      </tr>
							<?php } ?>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div> <!-- end row -->
                      
                      <!-- end row -->

                  </div> <!-- container -->

              </div> <!-- content -->

              <footer class="footer text-right">
                  &copy; 2016 - 2017. All rights reserved.
              </footer>

          </div>