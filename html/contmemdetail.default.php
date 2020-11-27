<?php if(!$objMember->member_type==1){ include("656.php");die();} 
$objStaffDetail = new Member;
$objStaffDetail->setProperty("member_id", DecData($_GET["mi"]));
$objStaffDetail->lstMember();
$StaffDetail = $objStaffDetail->dbFetchArray(1);
?>
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                
                                <h4 class="page-title"><?php echo $StaffDetail["fullname"];?></h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo Route::_('show=contributemember');?>">Contribute List</a></li>
                                    <li class="breadcrumb-item active"><?php echo $StaffDetail["fullname"];?></li>
                                </ol>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-md-8">
                                <div class="card-box">
                                    
                       
                                  <h4 class="m-t-0 header-title"><b>Member Detail</b> &nbsp;</h4>
                                    <table id="datatable-1" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Member No.</th>
                                            <td><?php echo $StaffDetail["member_no"];?></td>
                                        </tr>
                                        <tr>
                                            <th>Full Name</th>
                                            <td><?php echo $StaffDetail["fullname"];?></td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td><?php echo valuechecker($StaffDetail["address"]);?></td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td><?php echo valuechecker($StaffDetail["city"]);?></td>
                                        </tr>
                                        <tr>
                                            <th>State</th>
                                            <td><?php echo valuechecker($StaffDetail["state"]);?></td>
                                        </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td><?php echo $objCommon->getCountryName($StaffDetail["country"]);?></td>
                                        </tr>
                                        <tr>
                                            <th>Zip Code</th>
                                            <td><?php echo valuechecker($StaffDetail["zip_code"]);?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone #</th>
                                            <td><?php echo valuechecker($StaffDetail["phone"]);?></td>
                                        </tr>
                                        <tr>
                                            <th>Mobile #</th>
                                            <td><?php echo valuechecker($StaffDetail["mobile"]);?></td>
                                        </tr>                                        
                                         <tr>
                                            <th>Email</th>
                                            <td><?php echo valuechecker($StaffDetail["member_email"]);?></td>
                                        </tr>
                                        </thead>
                                    </table>
                                    
                                </div>
                            </div>

                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    &copy; 2016 - <?php echo date("Y");?>. All rights reserved.
                </footer>

            </div>