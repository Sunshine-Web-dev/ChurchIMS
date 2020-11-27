<?php include_once(ACTION_PATH . 'delete_action.php');

if(!$objMember->member_type==1){ include("656.php");die();} ?>

<div class="content-page">

              <!-- Start content -->

              <div class="content">

                  <div class="container-fluid">

                      <!-- Page-Title -->

                      <div class="row">

                          <div class="col-sm-12">

                          <div class="btn-group pull-right m-t-15">

                                   <a href="<?php echo Route::_('show=contmemfrm');?>" class="btn btn-default waves-effect waves-light">Add New Contribute Member</a>

                                </div>

                                

                              <h4 class="page-title">Contribute Member List</h4>

                              <ol class="breadcrumb">

                                  <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>

                                  <li class="breadcrumb-item active">Contribute Member List</li>

                              </ol>

                              

                          </div>

                      </div>





                      <div class="row">

                          <div class="col-12">

                              <div class="card-box table-responsive">

                                  <h4 class="m-t-0 header-title"><b>Contribute Member List</b></h4>



                                  <table id="datatable" class="table table-bordered">

                                      <thead>

                                      <tr>

                                          <th>Name</th>

                                          <th>Mobile #</th>

                                          <th>Member No.</th>

                                          <th>Status</th>

                                          <th>Action</th>

                                      </tr>

                                      </thead>





                                      <tbody>

								<?php                                

                                $objChurchList = new Member;
								$objChurchList->setProperty("church_id", $MemberDetail["church_id"]);
								$objChurchList->setProperty("member_type", 4);
								$objChurchList->setProperty("not_deleted", 3);
                                $objChurchList->lstMember();

                                while($ChurchList = $objChurchList->dbFetchArray(1)){

                                ?>

                                      <tr>

                                          <td><a href="<?php echo Route::_('show=contmemdetail&mi='.EncData($ChurchList["member_id"]));?>"><?php echo $ChurchList["fullname"];?></a></td>

                                          <td><?php echo $ChurchList["mobile"];?></td>

                                          <td><?php echo $ChurchList["member_no"];?></td>

                                          <td align="center"><?php echo CategoryStatus($ChurchList["is_active"]);?></td>

                                          <td align="center"><a href="<?php echo Route::_('show=contmemfrm&mci='.EncData($ChurchList["member_id"]));?>"> <i class="fa fa-pencil"></i></a>

                                          &nbsp;&nbsp;  | &nbsp;&nbsp;

                  <a href="<?php echo Route::_('show=contributemember&mode=delete&mci='.EncData($ChurchList["member_id"]));?>">

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