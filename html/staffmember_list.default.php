<?php if(!$objMember->member_type==1){ include("656.php");die();} ?>
<div class="content-page">
              <!-- Start content -->
              <div class="content">
                  <div class="container-fluid">
                      <!-- Page-Title -->
                      <div class="row">
                          <div class="col-sm-12">
                          <div class="btn-group pull-right m-t-15">
                                   <a href="<?php echo Route::_('show=staffmember');?>" class="btn btn-default waves-effect waves-light">Add New Staff</a>
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
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          <th>Mobile #</th>
                                          <th>Phone #</th>
                                          <th>Address</th>
                                          <th>City</th>
                                          <th>State</th>
                                          <th>Country</th>
                                          <th>Church Member Category</th>
                                          <th>Status</th>
                                          <th>Email ID</th>
                                          <th>Password</th>
                                      </tr>
                                      </thead>


                                      <tbody>
							

              	<?php
                                $objMember    = new Member;
                                $objMember->setProperty("member_id", $objMember->member_id);
                                $objMember->lstMember();
                                $MemberDetail = $objMember->dbFetchArray(1);
                                
                                $objChurchList = new Member;
                                $objChurchList->lstMember();
                                while($ChurchList = $objChurchList->dbFetchArray(1)){
                                ?>   
                                      <tr>
                                          <td><a href="<?php echo Route::_('show=cnew&ci='.EncData($ChurchList["member_id"]));?>"><?php echo $ChurchList["first_name"];?></a></td>
                                          <td><a href="<?php echo Route::_('show=cnew&ci='.$MemberDetail["member_id"]);?>"><?php echo $ChurchList["last_name"];?></a></td>
                                          <td><?php echo $ChurchList["mobile"];?></td>
                                          <td><?php echo $ChurchList["phone"];?></td>
                                          <td><?php echo $ChurchList["currency_type"];?></td>
                                          <td><?php echo $ChurchList["address"];?></td>
                                          <td><?php echo $ChurchList["city"];?></td>
                                          <td><?php echo $ChurchList["state"];?></td> 
                                          <td><?php echo $ChurchList["country"];?></td>
                                          <td><?php echo $ChurchList["member_type"];?></td>
                                          <td><?php echo $ChurchList["member_email"];?></td>
                                          <td><?php echo $ChurchList["member_pass"];?></td> 
                                          <td align="center"><?php echo CategoryStatus($ChurchList["is_active"]);?></td>
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