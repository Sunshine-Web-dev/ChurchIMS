<?php
				$objContCat_1 = new Member;
				$objContCat_1->setProperty("tran_type", 1);
				$objContCat_1->setProperty("church_id", $MemberDetail["church_id"]);
				$objContCat_1->setProperty("not_deleted", 3);
				$objContCat_1->setProperty("tran_category_name", 'Worship Service');
				$objContCat_1->lstTransectionCategory();
				$ContCat_1 = $objContCat_1->dbFetchArray(1);
				
				$objContCat_2 = new Member;
				$objContCat_2->setProperty("tran_type", 1);
				$objContCat_2->setProperty("church_id", $MemberDetail["church_id"]);
				$objContCat_2->setProperty("not_deleted", 3);
				$objContCat_2->setProperty("tran_category_name", 'Sunday School');
				$objContCat_2->lstTransectionCategory();
				$ContCat_2 = $objContCat_2->dbFetchArray(1);
				
				$objContDetail_1_1 = new Member;
				$objContDetail_1_1->setProperty("this_month", 1);
				$objContDetail_1_1->setProperty("transection_type", 1);
				$objContDetail_1_1->setProperty("church_id", $MemberDetail["church_id"]);
				$objContDetail_1_1->setProperty("not_deleted", 3);
				$objContDetail_1_1->setProperty("amount_category", $ContCat_1['tran_category_id']);
				$objContDetail_1_1->lstTransectionDetail();
				$TotalContDetail_1_1 = 0;
				if($objContDetail_1_1->totalRecords() >= 1){
				while($ContDetail_1_1 = $objContDetail_1_1->dbFetchArray(1)){
					$TotalContDetail_1_1 +=$ContDetail_1_1["receiving_amount"];
				}
				}
				
				$objContDetail_2_1 = new Member;
				$objContDetail_2_1->setProperty("this_month", 1);
				$objContDetail_2_1->setProperty("transection_type", 1);
				$objContDetail_2_1->setProperty("church_id", $MemberDetail["church_id"]);
				$objContDetail_2_1->setProperty("not_deleted", 3);
				$objContDetail_2_1->setProperty("amount_category", $ContCat_2['tran_category_id']);
				$objContDetail_2_1->lstTransectionDetail();
				$TotalContDetail_2_1 = 0;
				if($objContDetail_2_1->totalRecords() >= 1){
				while($ContDetail_2_1 = $objContDetail_2_1->dbFetchArray(1)){
					$TotalContDetail_2_1 +=$ContDetail_2_1["receiving_amount"];
				}
				}
				
				$objContDetail_3_1 = new Member;
				$objContDetail_3_1->setProperty("this_month", 1);
				$objContDetail_3_1->setProperty("transection_type", 1);
				$objContDetail_3_1->setProperty("church_id", $MemberDetail["church_id"]);
				$objContDetail_3_1->setProperty("not_deleted", 3);
				$objContDetail_3_1->setProperty("category_id_arr_1", $ContCat_1['tran_category_id']);
				$objContDetail_3_1->setProperty("category_id_arr_2", $ContCat_2['tran_category_id']);
				$objContDetail_3_1->lstTransectionDetail();
				$TotalContDetail_3_1 = 0;
				if($objContDetail_3_1->totalRecords() >= 1){
				while($ContDetail_3_1 = $objContDetail_3_1->dbFetchArray(1)){
					$TotalContDetail_3_1 +=$ContDetail_3_1["receiving_amount"];
				}
				}
				
				
				$objContDetail_1_2 = new Member;
				$objContDetail_1_2->setProperty("this_month", 2);
				$objContDetail_1_2->setProperty("transection_type", 1);
				$objContDetail_1_2->setProperty("church_id", $MemberDetail["church_id"]);
				$objContDetail_1_2->setProperty("not_deleted", 3);
				$objContDetail_1_2->setProperty("amount_category", $ContCat_1['tran_category_id']);
				$objContDetail_1_2->lstTransectionDetail();
				$TotalContDetail_1_2 = 0;
				if($objContDetail_1_2->totalRecords() >= 1){
				while($ContDetail_1_2 = $objContDetail_1_2->dbFetchArray(1)){
					$TotalContDetail_1_2 +=$ContDetail_1_2["receiving_amount"];
				}
				}
				
				$objContDetail_2_2 = new Member;
				$objContDetail_2_2->setProperty("this_month", 2);
				$objContDetail_2_2->setProperty("transection_type", 1);
				$objContDetail_2_2->setProperty("church_id", $MemberDetail["church_id"]);
				$objContDetail_2_2->setProperty("not_deleted", 3);
				$objContDetail_2_2->setProperty("amount_category", $ContCat_2['tran_category_id']);
				$objContDetail_2_2->lstTransectionDetail();
				$TotalContDetail_2_2 = 0;
				if($objContDetail_2_2->totalRecords() >= 1){
				while($ContDetail_2_2 = $objContDetail_2_2->dbFetchArray(1)){
					$TotalContDetail_2_2 +=$ContDetail_2_2["receiving_amount"];
				}
				}
				
				$objContDetail_3_2 = new Member;
				$objContDetail_3_2->setProperty("this_month", 2);
				$objContDetail_3_2->setProperty("transection_type", 1);
				$objContDetail_3_2->setProperty("church_id", $MemberDetail["church_id"]);
				$objContDetail_3_2->setProperty("not_deleted", 3);
				$objContDetail_3_2->setProperty("category_id_arr_1", $ContCat_1['tran_category_id']);
				$objContDetail_3_2->setProperty("category_id_arr_2", $ContCat_2['tran_category_id']);
				$objContDetail_3_2->lstTransectionDetail();
				$TotalContDetail_3_2 = 0;
				if($objContDetail_3_2->totalRecords() >= 1){
				while($ContDetail_3_2 = $objContDetail_3_2->dbFetchArray(1)){
					$TotalContDetail_3_2 +=$ContDetail_3_2["receiving_amount"];
				}
				}
				
				
				
				$objContDetail_1_3 = new Member;
				$objContDetail_1_3->setProperty("this_month", 3);
				$objContDetail_1_3->setProperty("transection_type", 1);
				$objContDetail_1_3->setProperty("church_id", $MemberDetail["church_id"]);
				$objContDetail_1_3->setProperty("not_deleted", 3);
				$objContDetail_1_3->setProperty("amount_category", $ContCat_1['tran_category_id']);
				$objContDetail_1_3->lstTransectionDetail();
				$TotalContDetail_1_3 = 0;
				while($ContDetail_1_3 = $objContDetail_1_3->dbFetchArray(1)){
					$TotalContDetail_1_3 +=$ContDetail_1_3["receiving_amount"];
				}
				
				$objContDetail_2_3 = new Member;
				$objContDetail_2_3->setProperty("this_month", 3);
				$objContDetail_2_3->setProperty("transection_type", 1);
				$objContDetail_2_3->setProperty("church_id", $MemberDetail["church_id"]);
				$objContDetail_2_3->setProperty("not_deleted", 3);
				$objContDetail_2_3->setProperty("amount_category", $ContCat_2['tran_category_id']);
				$objContDetail_2_3->lstTransectionDetail();
				$TotalContDetail_2_3 = 0;
				while($ContDetail_2_3 = $objContDetail_2_3->dbFetchArray(1)){
					$TotalContDetail_2_3 +=$ContDetail_2_3["receiving_amount"];
				}
				
				$objContDetail_3_3 = new Member;
				$objContDetail_3_3->setProperty("this_month", 3);
				$objContDetail_3_3->setProperty("transection_type", 1);
				$objContDetail_3_3->setProperty("church_id", $MemberDetail["church_id"]);
				$objContDetail_3_3->setProperty("not_deleted", 3);
				$objContDetail_3_3->setProperty("category_id_arr_1", $ContCat_1['tran_category_id']);
				$objContDetail_3_3->setProperty("category_id_arr_2", $ContCat_2['tran_category_id']);
				$objContDetail_3_3->lstTransectionDetail();
				$TotalContDetail_3_3 = 0;
				while($ContDetail_3_3 = $objContDetail_3_3->dbFetchArray(1)){
					$TotalContDetail_3_3 +=$ContDetail_3_3["receiving_amount"];
				}
				
				
				

$TotalWordAmount = $TotalContDetail_1_1 + $TotalContDetail_1_2 + $TotalContDetail_1_3;
$TotalSchoolAmount = $TotalContDetail_2_1 + $TotalContDetail_2_2 + $TotalContDetail_2_3;		
				
				$objContExp = new Member;
				$objContExp->setProperty("transection_type", 2);
				$objContExp->setProperty("church_id", $MemberDetail["church_id"]);
				$objContExp->setProperty("not_deleted", 3);
				$objContExp->lstTransectionDetail();
				$TotalContExp = 0;
				while($ContExp = $objContExp->dbFetchArray(1)){
					$TotalContExp +=$ContExp["receiving_amount"];
				}
				
				$objContCont = new Member;
				$objContCont->setProperty("transection_type", 1);
				$objContCont->setProperty("church_id", $MemberDetail["church_id"]);
				$objContCont->setProperty("not_deleted", 3);
				$objContCont->lstTransectionDetail();
				$TotalContCont = 0;
				while($ContCont = $objContCont->dbFetchArray(1)){
					$TotalContCont +=$ContCont["receiving_amount"];
				}
				
$TotalProfile = $TotalContCont - $TotalContExp;
			?>
 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                     <!-- container -->
						<div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome to admin panel !</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-info pull-left">
                                        <i class="md md-attach-money text-white"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><span class="counter"><?php echo $TotalProfile;?></span></h3>
                                        <p class="text-muted mb-0">Total Revenue</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-pink pull-left">
                                        <i class="md md-add-shopping-cart text-white"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><span class="counter"><?php echo $TotalContExp;?></span></h3>
                                        <p class="text-muted mb-0">Total Expenses</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-purple pull-left">
                                        <i class="md md-equalizer text-white"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><span class="counter"><?php echo $TotalWordAmount;?></span></h3>
                                        <p class="text-muted mb-0">Worship Service Cntributions</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-success pull-left">
                                        <i class="md md-remove-red-eye text-white"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><span class="counter"><?php echo $TotalSchoolAmount;?></span></h3>
                                        <p class="text-muted mb-0">Sunday School Contributions</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            

                            <div class="col-lg-12 col-xl-12">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0"><?php echo $ChurchTop["church_name"];?> Analytics</h4>
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li class="list-inline-item">
                                                <h5><i class="fa fa-circle m-r-5" style="color: #2bbbad;"></i>Worship Contributions</h5>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Sunday School Contributions</h5>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5><i class="fa fa-circle m-r-5" style="color: #dcdcdc;"></i>Special Service/Events</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="morris-bar-stacked" style="height: 310px;"></div>
                                </div>
                            </div>



                        </div>
                        <!-- end row -->


                        
                        <!-- end row -->


                    </div>
                </div> <!-- content -->

                <footer class="footer text-right">
                    &copy; 2016 - <?php echo date("Y");?>. All rights reserved.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->