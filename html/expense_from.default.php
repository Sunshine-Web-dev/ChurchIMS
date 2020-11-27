<?php include_once(ACTION_PATH . 'contribution.php');
if(!$objMember->member_type==1){ include("656.php");die();} ?>
<?php
$objCurrencyList = new Member;
$objCurrencyList->setProperty("church_id", $MemberDetail["church_id"]);
$objCurrencyList->setProperty("not_deleted", 3);
$objCurrencyList->lstCurrency();
$CountCurrency = $objCurrencyList->totalRecords();

$objContTypeList = new Member;
$objContTypeList->setProperty("tran_type", 2);
$objContTypeList->setProperty("is_active", 1);
$objContTypeList->setProperty("not_deleted", 3);
$objContTypeList->setProperty("church_id", $MemberDetail["church_id"]);
$objContTypeList->lstTransectionCategory();
$CountContTypeList = $objContTypeList->totalRecords();
?>
<div class="content-page"> 
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid"> 
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-title">Expense Form</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
            <li class="breadcrumb-item active">Expense  Form</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Expense Form</b></h4>
            <div class="row">
              <div class="col-12">
                <div class="p-20">
                  <?php if($CountCurrency > 0 && $CountContTypeList > 0){?>
                  <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                  <input type="hidden" id="transection_id" name="transection_id" value="<?php echo EncData($transection_id);?>" />
                  <input type="hidden" id="church_id" name="church_id" value="<?php echo $MemberDetail["church_id"];?>" />
                  <input type="hidden" id="member_id" name="member_id" value="<?php echo $objMember->member_id;?>" />
                  <input type="hidden" id="transection_type" name="transection_type" value="2" />
                  <input type="hidden" id="mode" name="mode" value="<?php echo $mode;?>" />
                    
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Member No</label>
                      <div class="col-10">
                        <select class="form-control select2" name="member_no">
                            <option value="">Select Member No.</option>
							<?php                                
                            $objMemberNo = new Member;
                            $objMemberNo->setProperty("church_id", $MemberDetail["church_id"]);
                            $objMemberNo->setProperty("member_type_in", '2,3');
							$objMemberNo->setProperty("not_deleted", 3);
						    //$objMemberNo->setProperty("member_type", 4);
                            $objMemberNo->lstMember();
                            while($MemberNo = $objMemberNo->dbFetchArray(1)){
                            ?>
                            <option value="<?php echo $MemberNo["member_no"];?>" <?php if($member_no==$MemberNo["member_no"]){ echo ' selected="selected"'; } else { echo ''; }?>><?php echo $MemberNo["fullname"] . ' - ' . $MemberNo["member_no"];?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Collection Date</label>
                      <div class="col-10">
                      <?php list($YearRt,$MonthRt,$DayRt)=explode('-', $collection_date);?>
                        <input type="text" class="form-control" value="<?php echo $MonthRt.'/'.$DayRt.'/'.$YearRt;?>" name="collection_date" id="datepicker-autoclose" placeholder="Select Collection Date..." readonly="readonly" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Check No</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $check_no;?>" name="check_no" placeholder="Type Number...">
                      </div>
                    </div>
						     
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Currency Type</label>
                      <div class="col-10">
                       <select class="form-control" maxlength="25" name="currency_type" id="currency_type">
                       <?php
                        while($CurrencyList = $objCurrencyList->dbFetchArray(1)){
                        ?>
                        <option value="<?php echo $CurrencyList["currency_type_id"];?>" 
						<?php if($CurrencyList["currency_type_id"]==$currency_type){ echo 'selected="selected"';} else { echo '';}?>>
                        <?php echo $CurrencyList["currency_name"];?></option>
                         <?php }?>
                      </select>
                      </div>
                    </div>
                   
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Amount</label>
                      <div class="col-10">
                        <input type="text" required class="form-control" value="<?php echo $receiving_amount;?>" name="receiving_amount" placeholder="Type Amount...">
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Receiving Fund Category</label>
                      <div class="col-10">
                       <select class="form-control" maxlength="25" name="amount_category" id="amount_category">
                       <?php
                        while($ContTypeList = $objContTypeList->dbFetchArray(1)){
                        ?>
                        <option value="<?php echo $ContTypeList["tran_category_id"];?>" 
						<?php if($ContTypeList["tran_category_id"]==$amount_category){ echo 'selected="selected"';} else { echo '';}?>>
                        <?php echo $ContTypeList["tran_category_name"];?></option>
                         <?php }?>
                      </select>
                      </div>
                    </div>
                    
                     <div class="form-group row">
                      <label class="col-2 col-form-label">Expense Note</label>
                      <div class="col-10">
                       <textarea class="form-control" name="transection_note" placeholder="Type Revenue Note..."><?php echo $transection_note;?></textarea>
                      </div>
                    </div>               
                     <div class="form-group row">
                     <label class="col-2 col-form-label">Status</label>
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
                      <button onclick="goBack()" class="btn btn-secondary waves-effect m-l-5" > Cancel </button> 
                    </div>
                  </form>
                  <?php } else { if($CountCurrency == 0){ ?>
                  <p style="color:#F00; text-align:center"><strong>Currency Type Required</strong><br />
                  We didn't find any currency type... <br /><a href="<?php echo Route::_('show=currencylist');?>">Click here to add new currency type.</a>
                  </p>
                  <?php } elseif($CountContTypeList == 0){ ?>
					  <p style="color:#F00; text-align:center"><strong>Expense Category Required</strong><br />
                  We didn't find any Expense Category... <br /><a href="<?php echo Route::_('show=expcatlist');?>">Click here to add new Expense Category.</a>
                  </p>
				  <?php }}?>
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
