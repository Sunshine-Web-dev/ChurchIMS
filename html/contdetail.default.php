<?php if(!$objMember->member_type==1){ include("656.php");die();} ?>
<?php
$objContList = new Member;
$objContList->setProperty("transection_id", DecData($_GET["ti"]));
$objContList->setProperty("church_id", $MemberDetail["church_id"]);
$objContList->lstTransectionDetail();
$ContDetail = $objContList->dbFetchArray(1);

$objCurrencyList = new Member;
$objCurrencyList->setProperty("currency_type_id", $ContDetail["currency_type"]);
$objCurrencyList->lstCurrency();
$CurrencyDetail = $objCurrencyList->dbFetchArray(1);

$objContTypeList = new Member;
$objContTypeList->setProperty("tran_category_id", $ContDetail["amount_category"]);
$objContTypeList->lstTransectionCategory();
$DtContTypeList = $objContTypeList->dbFetchArray(1);

$objContMemDetail = new Member;
$objContMemDetail->setProperty("member_no", $ContDetail["member_no"]);
$objContMemDetail->lstMember();
$ContMemDetail = $objContMemDetail->dbFetchArray(1);
?>

<div class="content-page"> 

  <!-- Start content -->

  <div class="content">

    <div class="container-fluid"> 

      <!-- Page-Title -->

      <div class="row">

        <div class="col-sm-12">

          <h4 class="page-title">Contribution Detail</h4>

          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?php echo SITE_URL;?>">Home</a></li>

            <li class="breadcrumb-item"><a href="<?php echo Route::_('show=contcatlist');?>">Contribution List</a></li>

            <li class="breadcrumb-item active"><?php echo $ContDetail["member_no"];?></li>

          </ol>

        </div>

      </div>

      <div class="row">

        <div class="col-12">

          <div class="card-box table-responsive">

            <table id="datatable-1" class="table table-bordered">

              <tbody>

                <tr>

                  <th>Membor #</th>

                  <td><?php echo $ContDetail["member_no"];?></td>

                  </tr>
                  
                   <tr>

                  <th>Name</th>

                  <td><?php echo $ContMemDetail["fullname"];?></td>

                  </tr>
                  
                
                  <tr>

                  <th>Collection Date</th>

                  <td><?php echo $ContDetail["collection_date"];?></td>

                  </tr>

                  <tr>

                  <th>Check No</th>

                  <td><?php echo $ContDetail["check_no"];?></td>

                  </tr>

                  <tr>

                  <th>Currency </th>

                  <td><?php echo $CurrencyDetail["currency_name"];?> (<?php echo $CurrencyDetail["currency_symbl"];?>)</td>

                  </tr>

                  <tr>

                  <th>Category</th>

                  <td><?php echo $DtContTypeList["tran_category_name"];?></td>

                  </tr>

                  <tr>

                  <th>Receiving Amount</th>

                  <td><?php echo $ContDetail["receiving_amount"];?></td>

                  </tr>

                  <tr>

                  <th>Note</th>

                  <td><?php echo $ContDetail["transection_note"];?></td>

                  </tr>

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

