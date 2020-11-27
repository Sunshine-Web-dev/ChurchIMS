<?php include_once(ACTION_PATH . 'church_form.php');
if(!$objMember->member_type==1){ include("656.php");die();}?>
<div class="content-page"> 
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid"> 
      
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-title">Add New Church</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
            <li class="breadcrumb-item active">Add New Church</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Church Form</b></h4>
            <div class="row">
              <div class="col-12">
                <div class="p-20">
                  <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                  <input type="hidden" id="church_id" name="church_id" value="<?php echo $church_id;?>" />
                  <input type="hidden" id="church_member_id" name="church_member_id" value="<?php echo $ChurchUserDetail["member_id"];?>" />
                  <input type="hidden" id="mode" name="mode" value="<?php echo $mode;?>" />
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Church Name</label>
                      <div class="col-10">
                        <input type="text" class="form-control" name="church_name" value="<?php echo $church_name;?>" placeholder="Type Church Name..." required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Location</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $church_address;?>" name="church_address" placeholder="Church Location..." required="required">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">City</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $church_city;?>" name="church_city" placeholder="Church City...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">State</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $church_state;?>" name="church_state" placeholder="Church State...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Country</label>
                      <div class="col-10">
                        <select class="form-control" name="church_country">
                          <option>Country List</option>
                           <?php echo $objCommon->countryCombo($church_country);?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Phone #</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $church_p_number;?>" name="church_p_number" placeholder="Church Phone#">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Mobile #</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $church_m_number;?>" name="church_m_number" placeholder="Church Mobile#">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Church Logo</label>
                      <div class="col-10">
                        <input type="file" placeholder="Select Church Logo" name="churchlogo">
                      </div>
                    </div>
                    <hr />
                    <h4 class="m-t-0 header-title"><b>Church Admin Detail</b></h4>
                    <hr />
                    <div class="form-group row">
                      <label class="col-2 col-form-label">First Name</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $ChurchUserDetail["first_name"];?>" name="first_name" placeholder="Admin First Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Last Name</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $ChurchUserDetail["last_name"];?>" name="last_name" placeholder="Admin Last Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label" for="example-email">Email</label>
                      <div class="col-10">
                        <input type="email" id="member_email" name="member_email" value="<?php echo $ChurchUserDetail["member_email"];?>" class="form-control" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Password</label>
                      <div class="col-10">
                        <input type="password" class="form-control" value="" name="member_pass">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Phone #</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $ChurchUserDetail["phone"];?>" name="phone" placeholder="Church Admin Phone#">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Mobile #</label>
                      <div class="col-10">
                        <input type="text" class="form-control" value="<?php echo $ChurchUserDetail["mobile"];?>" name="mobile" placeholder="Church Admin Mobile#">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-2 col-form-label">Address</label>
                      <div class="col-10">
                        <input type="text" class="form-control" placeholder="Church Admin Address" value="<?php echo $ChurchUserDetail["address"];?>" name="address">
                      </div>
                    </div>
                    <div class="form-group text-right m-b-0">
                      <button class="btn btn-primary waves-effect waves-light" type="submit"> Submit </button>
                      <button type="reset" class="btn btn-secondary waves-effect m-l-5"> Cancel </button>
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
