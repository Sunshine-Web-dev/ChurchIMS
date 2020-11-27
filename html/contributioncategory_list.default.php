<?php if(!$objMember->member_type==1){ include("656.php");die();} ?>
<div class="content-page">
              <!-- Start content -->
              <div class="content">
                  <div class="container-fluid">
                      <!-- Page-Title -->
                      <div class="row">
                          <div class="col-sm-12">
                          <div class="btn-group pull-right m-t-15">
                                   <a href="<?php echo Route::_('show=contributecateogry_form');?>" class="btn btn-default waves-effect waves-light">Add New Contribution Category</a>
                                </div>
                                
                              <h4 class="page-title">Contribution List</h4>
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
                                  <li class="breadcrumb-item active">Contribution List</li>
                              </ol>
                              
                          </div>
                      </div>


                      <div class="row">
                          <div class="col-12">
                              <div class="card-box table-responsive">
                                  <h4 class="m-t-0 header-title"><b>Contribution List</b></h4>

                                  <table id="datatable" class="table table-bordered">
                                      <thead>
                                      <tr>
                                          <th>Transaction Category ID</th>
                                          <th>Transaction Category Name</th>
                                    <!--  <th>Church ID</th>
                                          <th>Member ID</th>
                                          <th>Transaction Type</th>
                                          <th>Entry Date</th>-->
                                          <th>Status</th>
                                      </tr>
                                      </thead>


                                      <tbody>
								           <?php
                                $objMember    = new Member;
                                $objMember->setProperty("member_id", $objMember->member_id);
                                $objMember->lstMember();
                                $MemberDetail = $objMember->dbFetchArray(1);

								                $objChurchList = new Member;
                                $objChurchList->lstTransectionCategory();
                                while($ChurchList = $objChurchList->dbFetchArray(1)){
                                ?>
                                      <tr>
                                          <td><a href="<?php echo Route::_('show=cnew&tci='.EncData($tran_category_id["tran_category_id"]));?>"><?php echo $category_name["tran_category_name"];?></a></td>
                                          <td><?php echo $tran_type["transac_type"];?></td>
                                          <td align="center"><?php echo CategoryStatus($is_active["is_active"]);?></td>
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