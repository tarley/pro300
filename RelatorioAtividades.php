<!DOCTYPE html>
<html lang="en">

<head>
        <?php include("includes/header.php") ?>
</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <?php include("includes/menu.php") ?>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">

          
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
               <div class="row x_title">
								<div class="col-md-6">
									<h3>Relatorio Atividades <small></small></h3>
								</div>
								<div class="col-md-6">

								</div>
							</div>


				  

									  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
				  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nome Aluno</th>
                        <th>RA</th>
                        <th>Nota Prova</th>
                        <th>Nota P-300</th>
                        <th>Total</th>
						<th>Indice Melhoria</th>
                        <th>Outras Informações</th>
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Aaron</td>
                        <td>1415415</td>
                        <td>16</td>
                        <td>25</td>
                        <td>25</td>
                        <td>15%</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Aaron">
                                <i class="fa fa-navicon"></i>
                            </button>
                            <div class="modal fade Aaron" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Avaliação Aaron</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Nota das avaliações realizadas</h4>
                                            <table class="table responsive">
                                                <thead>
                                                <tr>
                                                    <th>Nome Aluno</th>
                                                    <th>Ra Aluno</th>
                                                    <th>Avaliação Ajudante</th>
                                                    <th>Avalição Ajudado</th>
                                                    <th>Media de valor das avaliações</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Shank</td>
                                                    <td>1415415</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>3</td>

                                                </tr>
                                                <tr>
                                                    <td>Geraldo</td>
                                                    <td>Teste</td>
                                                    <td>1415415</td>
                                                    <td>4</td>
                                                    <td>4</td>
                                                    <td>4</td>
                                                </tr>
                                                <tr>
                                                    <td>Nemo</td>
                                                    <td>1415415</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                </tr>
                                                <tr>
                                                    <td>Eduardo</td>
                                                    <td>1415415</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Shank</td>
                        <td>1415415
                        <td>16</td>
                        <td>25</td>
                        <td>25</td>
                        <td>15%</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Shank">
                                <i class="fa fa-navicon"></i>
                            </button>
                            <div class="modal fade Shank" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Avaliação Shank</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Nota das avaliações realizadas</h4>
                                            <table class="table responsive">
                                                <thead>
                                                <tr>
                                                    <th>Nome Aluno</th>
                                                    <th>Sobrenome Aluno</th>
                                                    <th>Ra Aluno</th>
                                                    <th>Avaliação Ajudante</th>
                                                    <th>Avalição Ajudado</th>
                                                    <th>Media de valor das avaliações</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Aaron</td>
                                                    <td>1415415</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Geraldo</td>
                        <td>1415415</td>
                        <td>16</td>
                        <td>25</td>
                        <td>25</td>
                        <td>15%</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".geraldo">
                                <i class="fa fa-navicon"></i>
                            </button>
                            <div class="modal fade geraldo" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Avaliação Geraldo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Nota das avaliações realizadas</h4>
                                            <table class="table responsive">
                                                <thead>
                                                <tr>
                                                    <th>Nome Aluno</th>
                                                    <th>Ra Aluno</th>
                                                    <th>Avaliação Ajudante</th>
                                                    <th>Avalição Ajudado</th>
                                                    <th>Media de valor das avaliações</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Aaron</td>
                                                    <td>1415415</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nemo</td>
                        <td>1415415</td>
                        <td>16</td>
                        <td>25</td>
                        <td>25</td>
                        <td>15%</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Nemo">
                                <i class="fa fa-navicon"></i>
                            </button>
                            <div class="modal fade Nemo" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Avaliação Nemo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Nota das avaliações realizadas</h4>
                                            <table class="table responsive">
                                                <thead>
                                                <tr>
                                                    <th>Nome Aluno</th>
                                                    <th>Ra Aluno</th>
                                                    <th>Avaliação Ajudante</th>
                                                    <th>Avalição Ajudado</th>
                                                    <th>Media de valor das avaliações</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Aaron</td>
                                                    <td>1415415</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Eduardo</td>
                        <td>1415415</td>
                        <td>16</td>
                        <td>25</td>
                        <td>25</td>
                        <td>15%</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Eduardo5">
                                <i class="fa fa-navicon"></i>
                            </button>
                            <div class="modal fade Eduardo5" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Avaliação Eduardo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Nota das avaliações realizadas</h4>
                                            <table class="table responsive">
                                                <thead>
                                                <tr>
                                                    <th>Nome Aluno</th>
                                                    <th>Ra Aluno</th>
                                                    <th>Avaliação Ajudante</th>
                                                    <th>Avalição Ajudado</th>
                                                    <th>Media de valor das avaliações</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Aaron</td>
                                                    <td>1415415</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                    <td>5</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
              </div>
              <!-- footer content -->
              <footer>
                <div class="copyright-info">
                  <p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                  </p>
                </div>
                <div class="clearfix"></div>
              </footer>
              <!-- /footer content -->

            </div>
            <!-- /page content -->
          </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
          <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
          </ul>
          <div class="clearfix"></div>
          <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>
		
		<!-- daterangepicker -->
	<script type="text/javascript" src="js/moment/moment.min.js"></script>
	<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>


        <script src="js/custom.js"></script>


        <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
  <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>
			<!-- datepicker -->
	<script type="text/javascript">
		$(document).ready(function() {

			var cb = function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				//alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
			}

			var optionSet1 = {
				startDate: moment().subtract(29, 'days'),
				endDate: moment(),
				minDate: '01/01/2012',
				maxDate: '12/31/2015',
				dateLimit: {
					days: 60
				},
				showDropdowns: true,
				showWeekNumbers: true,
				timePicker: false,
				timePickerIncrement: 1,
				timePicker12Hour: true,
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				opens: 'left',
				buttonClasses: ['btn btn-default'],
				applyClass: 'btn-small btn-primary',
				cancelClass: 'btn-small',
				format: 'MM/DD/YYYY',
				separator: ' to ',
				locale: {
					applyLabel: 'Submit',
					cancelLabel: 'Clear',
					fromLabel: 'From',
					toLabel: 'To',
					customRangeLabel: 'Custom',
					daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
					monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
					firstDay: 1
				}
			};
			$('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
			$('#reportrange').daterangepicker(optionSet1, cb);
			$('#reportrange').on('show.daterangepicker', function() {
				console.log("show event fired");
			});
			$('#reportrange').on('hide.daterangepicker', function() {
				console.log("hide event fired");
			});
			$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
				console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
			});
			$('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
				console.log("cancel event fired");
			});
			$('#options1').click(function() {
				$('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
			});
			$('#options2').click(function() {
				$('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
			});
			$('#destroy').click(function() {
				$('#reportrange').data('daterangepicker').remove();
			});
		});
	</script>

	<!-- datepicker -->
	<script type="text/javascript">
		$(document).ready(function() {

			var cb = function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
				$('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				//alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
			}

			var optionSet1 = {
				startDate: moment().subtract(29, 'days'),
				endDate: moment(),
				minDate: '01/01/2012',
				maxDate: '12/31/2015',
				dateLimit: {
					days: 60
				},
				showDropdowns: true,
				showWeekNumbers: true,
				timePicker: false,
				timePickerIncrement: 1,
				timePicker12Hour: true,
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				opens: 'right',
				buttonClasses: ['btn btn-default'],
				applyClass: 'btn-small btn-primary',
				cancelClass: 'btn-small',
				format: 'MM/DD/YYYY',
				separator: ' to ',
				locale: {
					applyLabel: 'Submit',
					cancelLabel: 'Clear',
					fromLabel: 'From',
					toLabel: 'To',
					customRangeLabel: 'Custom',
					daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
					monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
					firstDay: 1
				}
			};

			$('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

			$('#reportrange_right').daterangepicker(optionSet1, cb);

			$('#reportrange_right').on('show.daterangepicker', function() {
				console.log("show event fired");
			});
			$('#reportrange_right').on('hide.daterangepicker', function() {
				console.log("hide event fired");
			});
			$('#reportrange_right').on('apply.daterangepicker', function(ev, picker) {
				console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
			});
			$('#reportrange_right').on('cancel.daterangepicker', function(ev, picker) {
				console.log("cancel event fired");
			});

			$('#options1').click(function() {
				$('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
			});

			$('#options2').click(function() {
				$('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
			});

			$('#destroy').click(function() {
				$('#reportrange_right').data('daterangepicker').remove();
			});

		});
	</script>
	<!-- datepicker -->
	<script type="text/javascript">
		$(document).ready(function() {

			var cb = function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				//alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
			}

			var optionSet1 = {
				startDate: moment().subtract(29, 'days'),
				endDate: moment(),
				minDate: '01/01/2012',
				maxDate: '12/31/2015',
				dateLimit: {
					days: 60
				},
				showDropdowns: true,
				showWeekNumbers: true,
				timePicker: false,
				timePickerIncrement: 1,
				timePicker12Hour: true,
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				opens: 'left',
				buttonClasses: ['btn btn-default'],
				applyClass: 'btn-small btn-primary',
				cancelClass: 'btn-small',
				format: 'MM/DD/YYYY',
				separator: ' to ',
				locale: {
					applyLabel: 'Submit',
					cancelLabel: 'Clear',
					fromLabel: 'From',
					toLabel: 'To',
					customRangeLabel: 'Custom',
					daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
					monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
					firstDay: 1
				}
			};
			$('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
			$('#reportrange').daterangepicker(optionSet1, cb);
			$('#reportrange').on('show.daterangepicker', function() {
				console.log("show event fired");
			});
			$('#reportrange').on('hide.daterangepicker', function() {
				console.log("hide event fired");
			});
			$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
				console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
			});
			$('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
				console.log("cancel event fired");
			});
			$('#options1').click(function() {
				$('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
			});
			$('#options2').click(function() {
				$('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
			});
			$('#destroy').click(function() {
				$('#reportrange').data('daterangepicker').remove();
			});
		});
	</script>
	<!-- /datepicker -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#single_cal1').daterangepicker({
				singleDatePicker: true,
				calender_style: "picker_1"
			}, function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
			});
			$('#single_cal2').daterangepicker({
				singleDatePicker: true,
				calender_style: "picker_2"
			}, function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
			});
			$('#single_cal3').daterangepicker({
				singleDatePicker: true,
				calender_style: "picker_3"
			}, function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
			});
			$('#single_cal4').daterangepicker({
				singleDatePicker: true,
				calender_style: "picker_4"
			}, function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#reservation').daterangepicker(null, function(start, end, label) {
				console.log(start.toISOString(), end.toISOString(), label);
			});
		});
	</script>
	<!-- /datepicker -->


	<script>
		NProgress.done();
	</script>
	<!-- /datepicker -->
</body>

</html>
