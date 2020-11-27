<?php include_once(ACTION_PATH . 'church_form.php');

if(!$objMember->member_type==1){ include("656.php");die();} ?>

<div class="content-page"> 

  <!-- Start content -->

  <div class="content">

    <div class="container-fluid"> 

      

      <!-- Page-Title -->

      <div class="row">

        <div class="col-sm-12">

          <h4 class="page-title">Revenue Fund Category Types</h4>

          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>

            <li class="breadcrumb-item active">Add New Revenue Fund</li>

          </ol>

        </div>

      </div>

      <div class="row">

        <div class="col-12">

          <div class="card-box">

            <h4 class="m-t-0 header-title"><b>Revenue Fund Data Form</b></h4>

            <div class="row">

              <div class="col-12">

                <div class="p-20">

                  <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">

                  <input type="hidden" id="church_id" name="church_id" value="<?php echo $church_id;?>" />

                  <input type="hidden" id="church_member_id" name="church_member_id" value="<?php echo $ChurchUserDetail["member_id"];?>" />

                  <input type="hidden" id="mode" name="mode" value="<?php echo $mode;?>" />

                      <div class="form-group row">

                      <label class="col-2 col-form-label">Expense Category Type</label>

                      <div class="col-10">

                        <input type="text" class="form-control" value="<?php echo $church_p_number;?>" name="church_p_number" placeholder="Type Expense Category">

                      </div>

                    </div><br/>

                     <div class="form-group row">

                     <label class="col-2 col-form-label">Status Type</label>

                      <div class="col-10">

                      <select class="form-control" maxlength="25" name="chst" id="church_status1">

                        <option value="0" <?php if($_POST["chst"]==0){ echo 'selected="selected"';} else { echo '';}?>>All Types</option>

                        <option value="1" <?php if($_POST["chst"]==1){ echo 'selected="selected"';} else { echo '';}?>>Active</option>

                        <option value="2" <?php if($_POST["chst"]==2){ echo 'selected="selected"';} else { echo '';}?>>In Active</option>

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

