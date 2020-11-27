		</div>
        <!-- END wrapper -->
        <script>
            var resizefunc = [];
        </script>
            <!-- jQuery  -->
            <script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script>
            <script src="<?php echo SITE_URL;?>assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
            <script src="<?php echo SITE_URL;?>assets/js/bootstrap.min.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/detect.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/fastclick.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/jquery.slimscroll.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/jquery.blockUI.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/waves.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/wow.min.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/jquery.nicescroll.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/jquery.scrollTo.min.js"></script>
            <!-- Required datatable js -->
            <script src="<?php echo SITE_URL; ?>plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
            <!-- Buttons examples -->
            <script src="<?php echo SITE_URL; ?>plugins/datatables/dataTables.buttons.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/datatables/jszip.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/datatables/pdfmake.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/datatables/vfs_fonts.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/datatables/buttons.html5.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/datatables/buttons.print.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/datatables/buttons.colVis.min.js"></script>
            <!-- Responsive examples -->
            <script src="<?php echo SITE_URL; ?>plugins/datatables/dataTables.responsive.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/datatables/responsive.bootstrap4.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/peity/jquery.peity.min.js"></script>
            <!-- jQuery  -->
            <script src="<?php echo SITE_URL; ?>plugins/waypoints/lib/jquery.waypoints.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/counterup/jquery.counterup.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/morris/morris.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/raphael/raphael-min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/jquery-knob/jquery.knob.js"></script>
            <!--<script src="<?php echo SITE_URL; ?>assets/pages/jquery.dashboard.js"></script>-->
			<script src="<?php echo SITE_URL; ?>plugins/moment/moment.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/timepicker/bootstrap-timepicker.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
            <script src="<?php echo SITE_URL; ?>plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
			<script src="<?php echo SITE_URL; ?>assets/js/jquery.core.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/jquery.app.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/bootstrap.min.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/pages/jquery.form-pickers.init.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/pages/jquery.date-picker.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/fastclick.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/jquery.nicescroll.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/detect.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/jquery.slimscroll.js"></script>
            <script src="<?php echo SITE_URL; ?>assets/js/jquery.scrollTo.min.js"></script>
	        <script src="<?php echo SITE_URL; ?>assets/pages/jquery.form-pickers.init.js"></script>
            <?php echo $MemberDetail["church_id"];?>
        <script type="text/javascript">
			<?php if($objMember->member_type!=1){?>
			
			!function($) {
				"use strict";
			
				var Dashboard1 = function() {
					this.$realData = []
				};
				
				//creates Stacked chart
				Dashboard1.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
					Morris.Bar({
						element: element,
						data: data,
						xkey: xkey,
						ykeys: ykeys,
						stacked: true,
						labels: labels,
						hideHover: 'auto',
						resize: true, //defaulted to true
						gridLineColor: '#eeeeee',
						barColors: lineColors
					});
				},
			
				//creates area chart with dotted
				Dashboard1.prototype.createAreaChartDotted = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, Pfillcolor, Pstockcolor, lineColors) {
					Morris.Area({
						element: element,
						pointSize: 0,
						lineWidth: 0,
						data: data,
						xkey: xkey,
						ykeys: ykeys,
						labels: labels,
						hideHover: 'auto',
						pointFillColors: Pfillcolor,
						pointStrokeColors: Pstockcolor,
						resize: true,
						gridLineColor: '#eef0f2',
						lineColors: lineColors
					});
			
			   },
				
				Dashboard1.prototype.init = function() {
			
					//creating Stacked chart
					var $stckedData  = [
						{ y: 'JAN', a: <?php echo $TotalContDetail_1_1;?>, b: <?php echo $TotalContDetail_2_1;?>, c: <?php echo $TotalContDetail_3_1;?> },
						{ y: 'FEB', a: <?php echo $TotalContDetail_1_2;?>,  b: <?php echo $TotalContDetail_2_2;?>, c: <?php echo $TotalContDetail_3_2;?> },
						{ y: 'MAR', a: <?php echo $TotalContDetail_1_3;?>, b: <?php echo $TotalContDetail_2_3;?>, c: <?php echo $TotalContDetail_3_3;?> },
						{ y: 'APR', a: 0,  b: 0, c: 0 },
						{ y: 'MAY', a: 0,  b: 0, c: 0 },
						{ y: 'JUN', a: 0,  b: 0, c: 0 },
						{ y: 'JUL', a: 0,  b: 0, c: 0 },
						{ y: 'AUG', a: 0,  b: 0, c: 0 },
						{ y: 'SEP', a: 0,  b: 0, c: 0 },
						{ y: 'OCT', a: 0,  b: 0, c: 0 },
						{ y: 'NOV', a: 0,  b: 0, c: 0 },
						{ y: 'DEC', a: 0,  b: 0, c: 0 }
					];
					this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b', 'c'], ['Worship Contributions', 'Sunday School Contributions', 'Special Service/Events'], ['#5fbeaa', '#5d9cec', '#ebeff2']);
			
				},
				//init
				$.Dashboard1 = new Dashboard1, $.Dashboard1.Constructor = Dashboard1
			}(window.jQuery),
			
			//initializing 
			function($) {
				"use strict";
				$.Dashboard1.init();
			}(window.jQuery);
		
		
		<?php } ?>
		
            $(document).ready(function() {
                $('.form-horizontal-1').parsley();
            });
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
                $(".knob").knob();
            });
        </script>
 <script>
          var resizefunc = [];
      </script>
      <script type="text/javascript">
          $(document).ready(function() {
              $('#datatable').DataTable();
              //Buttons examples
              var table = $('#datatable-buttons').DataTable({
                  lengthChange: false
                  /*buttons: ['copy', 'excel', 'pdf']*/
              });
              table.buttons().container()
                      .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
          } );
      </script>

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
    </script>
    </body>
</html>