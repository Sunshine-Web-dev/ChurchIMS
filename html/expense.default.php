<?php include_once(ACTION_PATH . 'expense_dataquery.php');

if(!$objMember->member_type==1){ include("656.php");die();} print_r($ChurchUserDetail);?>

<?php 

                                $objMember    = new Member;

                                $objMember->setProperty("member_id", $objMember->member_id);

                                $objMember->lstMember();

                                $MemberDetail = $objMember->dbFetchArray(1);?>

<div class="content-page"> 

  <!-- Start content -->

  <div class="content">

    <div class="container-fluid"> 

      

      <!-- Page-Title -->

      <div class="row">

        <div class="col-sm-12">

          <h4 class="page-title">Add New Expense</h4>

          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>

            <li class="breadcrumb-item active">Add New Expense</li>

          </ol>

        </div>

      </div>

      <div class="row">

        <div class="col-12">

          <div class="card-box">

            <h4 class="m-t-0 header-title"><b>Expense Data Form</b></h4>

            <div class="row">

              <div class="col-12">

                <div class="p-20">

                  <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">

                  <input type="hidden" id="transection_id" name="transection_id" value="<?php echo EncData($transection_id);?>" />

                  <input type="hidden" id="church_id" name="church_id" value="<?php echo $church_id;?>" />

                  <input type="hidden" id="member_id" name="member_id" value="<?php echo $member_id, $MemberDetail['member_id'];?>" />

                   <input type="hidden" id="transection_type" name="transection_type" value="2" />

                  <input type="hidden" id="mode" name="mode" value="<?php echo $mode;?>" />

                    <div class="form-group row">

                      <label class="col-2 col-form-label">Member No</label>

                      <div class="col-10">

                        <input type="text" class="form-control" name="member_no" value="<?php echo $member_no;?>" placeholder="Type Member Number..." required>

                      </div>

                    </div>

                    <div class="form-group row">

                      <label class="col-2 col-form-label">Expense Date</label>

                      <div class="col-10">

                        <input type="text" class="form-control" value="<?php echo $collection_date;?>" name="collection_date" placeholder="Type Date... Day/Month/Year" required>

                      </div>

                    </div>

                    <div class="form-group row">

                      <label class="col-2 col-form-label">Check No</label>

                      <div class="col-10">

                        <input type="text" class="form-control" value="<?php echo $check_no;?>" name="check_no" placeholder="Type Check Number...">

                      </div>

                    </div>

                    <div class="form-group row">

                      <label class="col-2 col-form-label">Currency Paid Type</label>

                      <div class="col-10">

                        <input type="text" class="form-control" value="<?php echo $currency_type;?>" name="currency_type" placeholder="Type Currency Category...">

                      </div>

                    </div>

                         <div class="form-group row">

                      <label class="col-2 col-form-label">Expense Category</label>

                      <div class="col-10">

                        <input type="text" class="form-control" value="<?php echo $amount_category;?>" name="amount_category" placeholder="Type Expense Category...">

                      </div>

                    </div>

                     <div class="form-group row">

                      <label class="col-2 col-form-label">Amount</label>

                      <div class="col-10">

                        <input type="text" class="form-control" value="<?php echo $receiving_amount;?>" name="receiving_amount" placeholder="Type Amount...">

                      </div>

                    </div>

                    <div class="form-group row">

                      <label class="col-2 col-form-label">Expense Note</label>

                      <div class="col-10">

                        <input type="text" class="form-control" value="<?php echo $transection_note;?>" name="transection_note" placeholder="Type Expense Note...">

                      </div>

                    </div>                   

                    <div class="form-group row">

                     <label class="col-2 col-form-label">Status Type</label>

                      <div class="col-10">

                      <select class="form-control" maxlength="25" name="is_active" id="is_active">

                        <option value="1" <?php if($is_active==1){ echo 'selected="selected"';} else { echo '';}?>>Active</option>

                        <option value="2" <?php if($is_active==2){ echo 'selected="selected"';} else { echo '';}?>>In Active</option>

                      </select>

                  </div>

                    <br/>  <br/>  <br/> <br/> 

                    </div>

                    <div class="form-group text-right m-b-0">

                      <button class="btn btn-primary waves-effect waves-light" type="submit" > Submit </button> 

                      <button onclick="goBack()"class="btn btn-primary waves-effect waves-light" > Reset </button> 

                      <button onclick="goBack()" class="btn btn-secondary waves-effect m-l-5" > Cancel </button> 

                    </div>

                  </form>

                </div>

              </div>

            </div>

            <!-- end row --> 

            

          </div>

          <!-- end card-box --> 

        </div>

        <!-- end col --> 

      </div>

      <!-- end row --> 

    </div>

    <!-- container --> 

    

  </div>

  <!-- content -->

  

  <footer class="footer text-right"> &copy; 2016 - <?php echo date("Y");?>. All rights reserved. </footer>

</div>

