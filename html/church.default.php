<?php if(!$objMember->member_type==1){ include("656.php");die();} ?>
<div class="content-page">
              <!-- Start content -->
              <div class="content">
                  <div class="container-fluid">
                      <!-- Page-Title -->
                      <div class="row">
                          <div class="col-sm-12">
                          <div class="btn-group pull-right m-t-15">
                                   <a href="<?php echo Route::_('show=addchurch');?>" class="btn btn-default waves-effect waves-light">Add New Church</a>
                                </div>
                                
                              <h4 class="page-title">Church List</h4>
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
                                  <li class="breadcrumb-item active">Church List</li>
                              </ol>
                              
                          </div>
                      </div>


                      <div class="row">
                          <div class="col-12">
                              <div class="card-box table-responsive">
                                  <h4 class="m-t-0 header-title"><b>Church List</b></h4>

                                  <table id="datatable" class="table table-bordered">
                                      <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Location</th>
                                          <th>Phone #</th>
                                          <th>Registration date</th>
                                          <th>Status</th>
                                      </tr>
                                      </thead>


                                      <tbody>
								<?php
								$objChurchList = new Member;
                                $objChurchList->lstChurch();
                                while($ChurchList = $objChurchList->dbFetchArray(1)){
                                ?>
                                      <tr>
                                          <td><a href="<?php echo Route::_('show=cd&ci='.EncData($ChurchList["church_id"]));?>"><?php echo $ChurchList["church_name"];?></a></td>
                                          <td><?php echo $ChurchList["church_address"].', '.$ChurchList["church_city"];?></td>
                                          <td><?php echo $ChurchList["church_p_number"];?></td>
                                          <td align="center"><?php echo $ChurchList["created_date"];?></td>
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