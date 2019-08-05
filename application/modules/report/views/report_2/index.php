<section>
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<div class="box-body">
				<div class="container">
					<div class="col-md-6">
						<div class="form-group">
							<label>Month</label>
							<select class="form-control" id="f_month">
								<option value=""> - - - - - </option>
								<?php
									for ($i=1; $i <= count($this->Globalrules->data_bulan()); $i++) { 
										# code...
										if ($i == date('m')) {
											# code...
								?>
										<option value="<?=$i;?>" selected><?=$this->Globalrules->data_bulan()[$i]['nama'];?></option>											
								<?php														
										}
										else
										{
								?>
										<option value="<?=$i;?>"><?=$this->Globalrules->data_bulan()[$i]['nama'];?></option>											
								<?php
										}
									}
								?>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Year</label>
							<select class="form-control" id="f_year">
								<option value=""> - - - - - </option>
								<?php
									$now=date('Y');
									$past=$now-5;
									for ($a=$past;$a<=$now+5;$a++)
									{
										if ($a == $now) {
											# code...
											echo "<option value='$a' selected>$a</option>";														
										}
										else
										{
											echo "<option value='$a'>$a</option>";
										}
									}
								?>
							</select>
						</div>
					</div>
					
					<div class="col-md-12">
						<a class="btn btn-success pull-right" style="margin:5px;" id="btn_filter"><i class="fa fa-search"></i> Filter</a>
						<a class="btn btn-primary pull-right" style="margin:5px;" id="btn_export_excel"><i class="fa fa-print"></i> Export</a>						
					</div>					
				</div>
				<table class="table table-bordered table-striped table-view">
					<thead>
                        <tr>
                            <th>Jetty</th>
							<th>Vessel</th>
							<th>Activity</th>
							<th>Product</th>
							<th>Nominasi (KL)</th>
							<th>Tank Number</th>
							<th>Pump Number</th>
							<th>Pipeline</th>
							<th>Destination</th>
							<th>Rate Aggrement (KL/Hour)</th>
							<th>Process</th>
							<th>Date - Time</th>
							<th>Reason</th>
							<th>Remarks</th>																												
                        </tr>
                    </thead>
                    <tbody id="table_content">
                    </tbody>
				</table>
			</div>
        </div>
    </div>    
</section>
<script>
$(document).ready(function(){
    // $("#loadprosess").modal('hide');				    
	$("#btn_filter").click(function() {
		var select_month = $("#f_month").val();
		var select_year  = $("#f_year").val();		

		if (select_month.length <= 0 || select_year.length <= 0) {
			Lobibox.notify('warning', {
				title: 'Warning',
				msg: 'process has stopped working, Please select month and year'
			});                        			
		}
		else
		{
			var data_link = {
				'month'	: select_month,
				'year'	: select_year
			}			
			$.ajax({
				url :"<?php echo site_url()?>report/filter_report_2",
				type:"post",
				data: { data_sender : data_link},
				beforeSend:function(){
					$("#loadprosess").modal('show');
					$('.table-view').dataTable().fnDestroy();
					$(".table-view tbody tr").remove();
					var newrec  = '<tr">' +
										'<td colspan="5" class="text-center">Load Data</td>'
								'</tr>';
					$('.table-view tbody').append(newrec);
				},			
				success:function(msg){
					$(".table-view tbody tr").remove();
					$("#table_content").html(msg);
					$(".table-view").DataTable({
						"dom": "<'row'<'col-sm-6'f><'col-sm-6'l>>" +
								"<'row'<'col-sm-5'i><'col-sm-7'p>>" +
								"<'row'<'col-sm-12'tr>>" +
								"<'row'<'col-sm-5'i><'col-sm-7'p>>",
						"bSort": false
						// "dom": '<"top"f>rt'
						// "dom": '<"top"fl>rt<"bottom"ip><"clear">'
					});
					setTimeout(function(){
						$("#loadprosess").modal('hide');
					}, 500);
				},
				error:function(jqXHR,exception)
				{
					ajax_catch(jqXHR,exception);		
					$(".table-view tbody tr").remove();
					// var newrec  = '<tr">' +
					// 					'<td colspan="5" class="text-center">Load Data</td>'
					// 			'</tr>';
					// $('.table-view tbody').append(newrec);					
					$(".table-view").DataTable({
						"dom": "<'row'<'col-sm-6'f><'col-sm-6'l>>" +
								"<'row'<'col-sm-5'i><'col-sm-7'p>>" +
								"<'row'<'col-sm-12'tr>>" +
								"<'row'<'col-sm-5'i><'col-sm-7'p>>",
						"bSort": false
						// "dom": '<"top"f>rt'
						// "dom": '<"top"fl>rt<"bottom"ip><"clear">'
					});								
				}
			})
		}		
	})
})
</script>