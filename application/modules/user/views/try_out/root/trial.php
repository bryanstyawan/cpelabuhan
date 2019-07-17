<section id="viewdata">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-body" id="table_fill">
				<table class="table table-bordered table-striped table-view">
					<thead>
				<tr>
					<th>No</th>
					<th>Materi</th>
					<th>Sub Materi</th>					
					<th>Pre Test</th>
					<th>Video Materi</th>					
					<th>Quiz</th>
					<th>Analisis</th>					
				</tr>
				</thead>
				<tbody>
				<?php 
					if ($list != array()) {
						# code...
						for ($i=0; $i < count($list); $i++) { 
							# code...
							// $child = $this->Allcrud->getData('mr_materi',array('id_parent'=>$list[$i]['id']))->result_array();
							$child = $this->Allcrud->getData('mr_materi',array('id_parent'=>$list[$i]['id']))->result_array();														
							for ($ii=0; $ii < count($child); $ii++) { 
								# code...
				?>
								<tr>
									<td><?=$ii+1;?></td>
									<td><?php echo $list[$i]['name'];?></td>									
									<td><?php echo $child[$ii]['name'];?></td>
				<?php
									$type = $this->Allcrud->listData('lt_tipe_bimbingan_belajar')->result_array();
									for ($j=0; $j < count($type); $j++) { 
										# code...
										$text    = "";
										$display = "";
										if ($type[$j]['id'] == 1) {
											# code...
											$text = "Mulai";
										}
										elseif ($type[$j]['id'] == 2) {
											# code...
											$text = "Lihat video materi";											
										}
										elseif ($type[$j]['id'] == 3) {
											# code...
											$text = "Mulai";											
										}
										elseif ($type[$j]['id'] == 4) {
											# code...
											$text = "Lihat analisis";											
										}

										$check_data  = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_tipe_bimbel'=>$type[$j]['id'],'id_materi'=>$child[$ii]['id']))->result_array();										
										if ($check_data == array()) {
											# code...
											$display = "display:none;";
											if ($type[$j]['id'] == 1) {
												# code...
												if ($ii == 0) {
													# code...
													$display = "";
												}
												else {
													# code...
													$check_data_next  = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_tipe_bimbel'=>3,'id_materi'=>$child[$ii-1]['id']))->result_array();													
													if ($check_data_next != array()) {
														# code...
														if ($check_data_next[0]['status'] == 1) {
															# code...
															$display = "";															
														}
													}
												}
											}																							
										}
				?>
										<td><a class="btn btn-primary" style="<?=$display;?>" href="<?=base_url();?>user/bimbingan_belajar/<?php echo $type[$j]['name'];?>/<?php echo $type[$j]['id'];?>/<?php echo $child[$ii]['id'];?>"><i class="fa fa-hourglass-start"></i> <?=$text;?></a></td>
				<?php
									}
				?>		
								</tr>
				<?php								
							}							
						}
					}
				?>
				</tbody>
				</table>
				
			</div><!-- /.box-body -->
			</div><!-- /.box -->
	</div>
</section>