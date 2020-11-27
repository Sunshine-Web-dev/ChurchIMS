<?php if(!$objMember->member_type==1){ include("656.php");die();} 
$objChurchDetail = new Member;
$objChurchDetail->setProperty("church_id", DecData($_GET["ci"]));
$objChurchDetail->lstChurch();
$ChurchDetail = $objChurchDetail->dbFetchArray(1);

$objChurchAdmin = new Member;
$objChurchAdmin->setProperty("church_id", $ChurchDetail["church_id"]);
$objChurchAdmin->setProperty("member_type", 2);
$objChurchAdmin->lstMember();
$MemberDetail = $objChurchAdmin->dbFetchArray(1);
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
                                    <li class="breadcrumb-item"><a href="<?php echo Route::_('show=church');?>">Church List</a></li>
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
                                                <h3 class="text-primary m-b-5">0</h3>
                                                <p class="text-muted">Number of Staff</p>
                                            </li>

                                            <li class="list-inline-item">
                                                <h3 class="text-success m-b-5">0</h3>
                                                <p class="text-muted">Contributions Member</p>
                                            </li>
											
											<li class="list-inline-item">
                                                <h3 class="text-primary m-b-5">0</h3>
                                                <p class="text-muted">Contribution Amount</p>
                                            </li>
											
											<li class="list-inline-item">
                                                <h3 class="text-success m-b-5">0</h3>
                                                <p class="text-muted">Church Expense</p>
                                            </li>
                                        </ul>

                                        <hr>
                                        
										<div class="text-left">
                                            <p class="text-muted font-13"><strong>Admin Name :</strong> <span class="m-l-15"><?php echo $MemberDetail["fullname"];?></span></p>

                                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="m-l-15"><?php echo $MemberDetail["mobile"];?></span></p>

                                            <p class="text-muted font-13"><strong>Email :</strong> <span class="m-l-15"><?php echo $MemberDetail["member_email"];?></span></p>

                                            <p class="text-muted font-13"><strong>Location :</strong> <span class="m-l-15"><?php echo $MemberDetail["address"];?></span></p>

                                        </div>
										<hr>
										<ul class="nav nav-pills profile-pills m-t-10">
                                        <li>
                                            <a href="<?php echo Route::_('show=addchurch&ci='.$_GET["ci"]);?>"><i class="fa fa-pencil"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                    </div>

                                </div>

                                
                            </div>


                            <div class="col-lg-9 col-md-8">
                                <div class="card-box">
                                    
                       
                                  <h4 class="m-t-0 header-title"><b>Staff List</b> &nbsp; <small><a href="javascript:void(0);" style="float: right;">View All</a></small></h4>
                                    <table id="datatable-1" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Phone #</th>
                                            <th>Designation</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                            <td colspan="4" align="center">No data available in table</td>
                                          </tr>
                                        
                                        </tbody>
                                    </table>
                                    
                                    <hr>
                                    
                                    <h4 class="m-t-0 header-title"><b>Contributions Member List</b> &nbsp; <small><a href="javascript:void(0);" style="float: right;">View All</a></small></h4>
                                    <table id="datatable-1" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Phone #</th>
                                            <th>Mobile #</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                            <td colspan="4" align="center">No data available in table</td>
                                          </tr>
                                        
                                        </tbody>
                                    </table>
                                    
                                    <hr>
                                    <h4 class="m-t-0 header-title"><b>Contribution List</b> &nbsp; <small><a href="javascript:void(0);" style="float: right;">View All</a></small></h4>
                                    <table id="datatable-1" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Person Name</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Collection date</th>
                                            <th>Category</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                            <td colspan="5" align="center">No data available in table</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                    
                                    <hr>
                                    <h4 class="m-t-0 header-title"><b>Expense List</b> &nbsp; <small><a href="javascript:void(0);" style="float: right;">View All</a></small></h4>
                                    <table id="datatable-1" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Expense Category</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>Expense date</th>
                                            <th>Membor No</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <tr>
                                            <td colspan="5" align="center">No data available in table</td>
                                          </tr>
                                        
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>

                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    &copy; 2016 - 2017. All rights reserved.
                </footer>

            </div>