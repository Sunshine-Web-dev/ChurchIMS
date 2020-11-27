<?php include_once(ACTION_PATH . 'contmemfrm.php');
if(!$objMember->member_type==1){ include("656.php");die();}?>
<div class="content-page"> 
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid"> 
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-title">Contribution Member Data</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
            <li class="breadcrumb-item active">Add New Contribution Member</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Contribution Member Data Form</b></h4>
            <div class="row">
              <div class="col-12">
                <div class="p-20">
                  <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" id="church_id" name="church_id" value="<?php echo $MemberDetail["church_id"];?>" />
                    <input type="hidden" id="member_id" name="member_id" value="<?php echo DecData($member_id);?>" />
                    <input type="hidden" id="member_type" name="member_type" value="4" />
                    <input type="hidden" id="mode" name="mode" value="<?php echo $mode;?>" />
                    <div class="form-group row">
                    	
                      <label class="col-2 col-form-label">Member No.</label>
                      <div class="col-10">
                        <input type="text" class="form-control" name="member_no" value="<?php echo $member_no;?>" placeholder="Type Member No..." required>
                        <?php if($vResult["member_no_c"]!=''){ ?>
                    		<span class="error"><?php echo $vResult["member_no_c"];?></span>
                    	<?php } ?>
                      </div>
                      
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-2 col-form-label">First Name</label>
                      <div class="col-10">
                        <input type="text" class="form-control" name="first_name" value="<?php echo $first_name;?>" placeholder="Type First Name..." required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Last Name</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $last_name;?>" name="last_name" placeholder="Type Last Name..." required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Email ID</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $member_email;?>" name="member_email" placeholder="Type Email...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Mobile #</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $data['mobile'];?>" name="mobile" placeholder="Type Number...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Phone #</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $phone;?>" name="phone" placeholder="Type Number...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Address</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $address;?>" name="address" placeholder="Type Address...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">City</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $city;?>" name="city" placeholder="Type Address...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">State</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $state;?>" name="state" placeholder="Type Address...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Country</label>
                      <div class="col-10">
                        <select class="form-control" name="country">
                          <?php echo $objCommon->countryCombo($country);?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Status Type</label>
                      <div class="col-10">
                        <select class="form-control" maxlength="25" name="is_active" id="is_active">
                          <option value="1" <?php if($is_active==1){ echo 'selected="selected"';} else { echo '';}?>>Active</option>
                          <option value="2" <?php if($is_active==2){ echo 'selected="selected"';} else { echo '';}?>>In Active</option>
                          <option value="3" <?php if($is_active==3){ echo 'selected="selected"';} else { echo '';}?>>Non-Member</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group text-right m-b-0">
                      <button class="btn btn-primary waves-effect waves-light" type="submit" > Submit </button>
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
