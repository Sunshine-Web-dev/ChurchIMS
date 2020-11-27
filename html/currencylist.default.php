<?php include_once(ACTION_PATH . 'delete_action.php');
if(!$objMember->member_type==1){ include("656.php");die();} ?>
<div class="content-page"> 
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid"> 
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <div class="btn-group pull-right m-t-15"> <a href="<?php echo Route::_('show=currency_form');?>" class="btn btn-default waves-effect waves-light">Add New Currency</a> </div>
          <h4 class="page-title">Currency List</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>
            <li class="breadcrumb-item active">Currency List</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Currency List</b></h4>
            <table id="datatable" class="table table-bordered">
              <thead>
                <tr>
                  <th>Currency Name</th>
                  <th>Currency Symbol</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
				<?php
                $objCurrencyList = new Member;
                $objCurrencyList->setProperty("church_id", $MemberDetail["church_id"]);
				$objCurrencyList->setProperty("not_deleted", 3);
                $objCurrencyList->lstCurrency();
                while($CurrencyList = $objCurrencyList->dbFetchArray(1)){
                ?>
                <tr>
                  <td><?php echo $CurrencyList["currency_name"];?></td>
                  <td><?php echo $CurrencyList["currency_symbl"];?></td>
                  <td align="center"><?php echo CategoryStatus($CurrencyList["is_active"]);?></td>
                  <td align="center"><a href="<?php echo Route::_('show=currency_form&cti='.EncData($CurrencyList["currency_type_id"]));?>"> <i class="fa fa-pencil"></i></a>
                  
                   &nbsp;&nbsp;  | &nbsp;&nbsp;
                  <a href="<?php echo Route::_('show=currencylist&mode=delete&cti='.EncData($CurrencyList["currency_type_id"]));?>">
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
  <footer class="footer text-right"> &copy; 2017 - <?php echo date("Y");?>. All rights reserved. </footer>
</div>