<?php include_once(ACTION_PATH . 'delete_action.php');

if(!$objMember->member_type==1){ include("656.php");die();}?>

<div class="content-page"> 

  <!-- Start content -->

  <div class="content">

    <div class="container-fluid"> 

      <!-- Page-Title -->

      <div class="row">

        <div class="col-sm-12">

          <div class="btn-group pull-right m-t-15"> <a href="<?php echo Route::_('show=contribute_from');?>" class="btn btn-default waves-effect waves-light">Add New Contribution</a> </div>

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

                  <th>Member #</th>

                  <th>Collection Date</th>

                  <th>Amount</th>

                  <th>Status</th>

                  <th>Action</th>

                </tr>

              </thead>

              <tbody>

					<?php

                      $objContList = new Member;

                      


                    $objContList->setProperty("transection_type", 1);

					$objContList->setProperty("church_id", $MemberDetail["church_id"]);

					$objContList->setProperty("not_deleted", 3);

                    $objContList->lstTransectionDetail();

                    while($ContList = $objContList->dbFetchArray(1)){

                    ?>

                <tr>

                  <td><a href="<?php echo Route::_('show=contdetail&ti='.EncData($ContList["transection_id"]));?>">

				  <?php echo valuechecker($ContList["member_no"]);?></a>

                  </td>

                  <td><?php echo dateFormate_3($ContList["collection_date"]);?></td>

                  <td><?php echo $ContList["receiving_amount"];?></td>

                  <td><?php echo CategoryStatus($ContList["is_active"]);?></td>

                  <td align="center" style="color:#62a3ff;">

                  <a href="<?php echo Route::_('show=contribute_from&ti='.EncData($ContList["transection_id"]));?>">

                  <i class="fa fa-pencil"></i></a>

                  &nbsp;&nbsp;  | &nbsp;&nbsp;

                  <a href="<?php echo Route::_('show=contributing&mode=delete&ti='.EncData($ContList["transection_id"]));?>">

                  <i class="fa fa-close"></i></a>

                  

                  

                     </td>

                </tr>

                <?php } ?>

              </tbody>

            </table>

          </div>

        </div>

      </div>

      <!-- end row --> 

      

      <!-- end row --> 

      

    </div>

    <!-- container --> 

    

  </div>

  <!-- content -->

  

  <footer class="footer text-right">

                  &copy; 2017 - <?php echo date("Y");?>. All rights reserved.

              </footer>

</div>

