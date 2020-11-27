<?php if(!$objMember->member_type==1){ include("656.php");die();} ?>
<div class="content-page">
              <!-- Start content -->
              <div class="content">
                  <div class="container-fluid">
                      <!-- Page-Title -->
                      <div class="row">
                          <div class="col-sm-12">
                          <div class="btn-group pull-right m-t-15">
                                   <a href="<?php echo Route::_('show=addchurch');?>" class="btn btn-default waves-effect waves-light">Add New Church</a>
                                </div>
                                
                              <h4 class="page-title">Church List</h4>
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
                                  <li class="breadcrumb-item active">Church List</li>
                              </ol>
                             

                       <!--  <div class="col-sm-12">
                                <div class="card-box">
                                    <form>
                                        <div class="form-group col-sm-5">
                                        <h4 class="header-title m-t-0">Select Date</h4>
                                    <p class="text-muted font-14 m-b-25">
                                       Select the start date and the end date </p>

                                            <label class="header-title m-t-0">With all options</label>
                                            <input type="text" id="reportrange" class="form-control" value="01/01/2015 - 01/31/2015" style="width:40%"> 
                                        </div>-->
                                       
                                       
                                       
                                      <!--  <div class="form-group col-sm-6">
                                        <label class="header-title m-t-0">Status</label>
                                            <select class="form-control">
                                            <option>Active</option>
                                            <option>In Active</option>
                                            </select>
                                        </div>
                                       </form> -->
              
   </div>
                       
                       <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Selection Criteria</b></h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <h5><b>Select Date</b></h5>
                                                <p class="text-muted m-b-15 font-13">
                                                    Select the start date and end date from the calender. Calender will show all the dates.  
                                                </p>
                                                <!--<input type="text" class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" />-->
                                           <input type="text" id="reportrange" class="form-control" value="01/01/2015 - 01/31/2015" >
 

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <h5><b>Select the status </b></h5>
                                                <p class="text-muted m-b-15 font-13">
                                                    Select the required status as per availability of the user. Select from the dropdown available.
                                                </p>
                                                <!--<input type="text" class="form-control" maxlength="25" name="alloptions" id="alloptions" />-->
                                    
                                        <!--<label class="header-title m-t-0">Status</label></br>-->
                                            <select class="form-control" maxlength="25" name="alloptions" id="alloptions">
                                            <option>Active</option>
                                            <option>In Active</option>
                                            </select>
                                      
                                            

                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                       
                       
                       
                       
                       
                       
                  
                          <div class="col-sm-12">
                              <div class="card-box table-responsive">
                                  <h4 class="m-t-0 header-title"><b>Church List</b></h4>

                                  <table id="datatable-12" class="table table-bordered">
                                      <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Location</th>
                                          <th>Phone #</th>
                                          <th>Registration date</th>
                                          <th>Status</th>
                                      </tr>
                                      </thead>


                                      <tbody>
								<?php
								$objChurchList = new Member;
                                $objChurchList->lstChurch();
                                while($ChurchList = $objChurchList->dbFetchArray(1)){
                                ?>
                                      <tr>
                                          <td><a href="<?php echo Route::_('show=cd&ci='.EncData($ChurchList["church_id"]));?>"><?php echo $ChurchList["church_name"];?></a></td>
                                          <td><?php echo $ChurchList["church_address"].', '.$ChurchList["church_city"];?></td>
                                          <td><?php echo $ChurchList["church_p_number"];?></td>
                                          <td align="center"><?php echo $ChurchList["created_date"];?></td>
                                          <td align="center"><?php echo CategoryStatus($ChurchList["is_active"]);?></td>
                                      </tr>
							<?php } ?>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                     <!-- </div>--> <!-- end row -->
                      
                      <!-- end row -->

                  </div> <!-- container -->
</div> <!--- container -->
              </div> <!-- content -->

              <footer class="footer text-right">
                  &copy; 2016 - 2017. All rights reserved.
              </footer>

          </div>