<?php include_once(ACTION_PATH . 'church_form.php');

if(!$objMember->member_type==1){ include("656.php");die();} //?>

<div class="content-page"> 

  <!-- Start content -->

  <div class="content">

    <div class="container-fluid"> 

      

      <!-- Page-Title -->

      <div class="row">

        <div class="col-sm-12">

          <h4 class="page-title">Add New Staff Member</h4>

          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>

            <li class="breadcrumb-item active">Add New Staff Member Data</li>

          </ol>

        </div>

      </div>

      <div class="row">

        <div class="col-12">

          <div class="card-box">

            <h4 class="m-t-0 header-title"><b>Registeration Form</b></h4>

            <div class="row">

              <div class="col-12">

                <div class="p-20">

                  <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">

                  <input type="hidden" id="church_id" name="church_id" value="<?php echo $church_id;?>" />

                  <input type="hidden" id="church_member_id" name="church_member_id" value="<?php echo $ChurchUserDetail["member_id"];?>" />

                  <input type="hidden" id="mode" name="mode" value="<?php echo $mode;?>" />

                    <div class="form-group row">

                      <label class="col-2 col-form-label">First Name</label>

                      <div class="col-10">

                        <input type="text" class="form-control" name="church_name" value="<?php echo $church_name;?>" placeholder="Type Name..." required>

                      </div>

                    </div>

                       <div class="form-group row">

                      <label class="col-2 col-form-label">Address</label>

                      <div class="col-10">

                        <input type="text" class="form-control" name="church_name" value="<?php echo $church_name;?>" placeholder="Type Address..." required>

                      </div>

                    </div>

                    <div class="form-group row">

                      <label class="col-2 col-form-label">Location</label>

                      <div class="col-10">

                        <input type="text" class="form-control" value="<?php echo $church_address;?>" name="church_address" placeholder="Type Location..." required>

                      </div>

                    </div>

                     <div class="form-group row">

                      <label class="col-2 col-form-label">Phone #</label>

                      <div class="col-10">

                        <input type="text" class="form-control" value="<?php echo $church_p_number;?>" name="church_p_number" placeholder="Church Phone#">

                      </div>

                    </div>

                    <div class="form-group row">

                      <label class="col-2 col-form-label">Church Logo</label>

                      <div class="col-10">

                        <input type="file" placeholder="Select Church Logo" name="churchlogo">

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

                    

                    <div class="form-group text-right m-b-0">

                      <button class="btn btn-primary waves-effect waves-light" type="submit"> Submit </button>

                      <button onclick="goBack()" class="btn btn-secondary waves-effect m-l-5"> Cancel </button>

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

