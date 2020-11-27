<?php include_once(ACTION_PATH . 'changepwd.php'); ?>

<div class="content-page"> 

  <!-- Start content -->

  <div class="content">

    <div class="container-fluid"> 

      

      <!-- Page-Title -->

      <div class="row">

        <div class="col-sm-12">

          <h4 class="page-title">Change Password</h4>

          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>

            <li class="breadcrumb-item active">Change Password</li>

          </ol>

        </div>

      </div>

      <div class="row">

        <div class="col-12">

          <div class="card-box">

            <h4 class="m-t-0 header-title"><b>Change Password</b></h4>

            <div class="row">

              <div class="col-12">

                <div class="p-20">

                  <form class="form-horizontal-1" role="form" method="post" action="" enctype="multipart/form-data">

                  <input type="hidden" id="church_id" name="church_id" value="<?php echo $church_id;?>" />

                  <input type="hidden" id="church_member_id" name="church_member_id" value="<?php echo $ChurchUserDetail["member_id"];?>" />

                  <input type="hidden" id="mode" name="mode" value="<?php echo $mode;?>" />

                    

                    

                    <div class="form-group">

                    <label for="pass1">Password<span class="text-danger">*</span></label>

                    <input id="pass1" type="password" name="new_pass" placeholder="Password" required class="form-control" value="">

                    </div>

                    <div class="form-group">

                    <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>

                    <input data-parsley-equalto="#pass1" name="new_pass_2" type="password" required placeholder="Password" value="" class="form-control" id="passWord2">

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