<section id="viewdata">
	<?=$this->load->view('templates/sidebar/main');?>
	<div class="col-xs-10">
		<div class="box" style="background: transparent;border-top: none;box-shadow: none;">
			<div class="box-body" id="table_fill">

				<div class="col-lg-6">
					<div class="box box-warning" style="box-shadow: none;background: none;">
						<div class="box-header with-border text-center" style="background: #f39c12;color: #fff;">
							<h3 class="box-title"><?=$list[0]['name'];?></h3>
						</div>
						<div class="box-body no-padding" style="display: block;">
							
							<?php
								$child = $this->Allcrud->getData('mr_materi',array('id_parent'=>$list[0]['id']))->result_array();
								for ($ii=0; $ii < count($child); $ii++) 
								{ 
									# code...
									$arg_video  = "";
									$id_video   = "";
									$file_video = "";
									$lock       = '<a style="color:#000;" href="'.base_url().'user/bimbingan_belajar"><i class="fa fa-lock" style="font-size: 41px;"></i></a>';
									$btn_arr    = "";						
									$type       = $this->Allcrud->listData('lt_tipe_bimbingan_belajar')->result_array();
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
											if ($type[$j]['id'] == 1) {
												# code...
												if ($ii == 0) {
													# code...
													$display    = "";
													$lock       = '';										
													$btn_arr .= '<a class="btn btn-primary" style="'.$display.'" href="'.base_url()."user/bimbingan_belajar/".$type[$j]['name']."/".$type[$j]['id']."/".$child[$ii]['id'].'"><i class="fa fa-hourglass-start"></i>&nbsp;'.$text.'</a>&nbsp;';
												}
												else {
													# code...
													$check_data_next  = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_tipe_bimbel'=>3,'id_materi'=>$child[$ii-1]['id']))->result_array();													
													if ($check_data_next != array()) {
														# code...
														if ($check_data_next[0]['status'] == 1) {
															# code...
															$display    = "margin-right: 10px;";															
															$lock       = '<a style="color:#000;" href="'.base_url().'user/bimbingan_belajar"><i class="fa fa-lock" style="font-size: 41px;"></i></a>';
														}
													}
												}
											}																							
										}
										else
										{
											$display    = "margin-right: 10px;";
											$lock       = '';										
											$btn_arr .= '<a class="btn btn-primary" style="'.$display.'" href="'.base_url()."user/bimbingan_belajar/".$type[$j]['name']."/".$type[$j]['id']."/".$child[$ii]['id'].'"><i class="fa fa-hourglass-start"></i>&nbsp;'.$text.'</a>';								
										}
									}
							?>
							<div class="row" style="margin-left: 0px;cursor: pointer;">                
								<div class="col-lg-12" style="padding-left: 0px;">
									<div class="box box-solid" style="height: 120px;">
										<div class="box-header with-border text-center" style="border-bottom: transparent;">
											<h3 class="box-title"><?=$child[$ii]['name'];?></h3>
										</div>        
										<div class="box-body">
											<div class="row text-center">
											<?=$lock;?>
											<?=$btn_arr;?>								
											</div>
										</div>
									</div>
								</div>
							</div>                
							<?php
								}                                            
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="box box-warning" style="box-shadow: none;background: none;">
						<div class="box-header with-border text-center" style="background: #f39c12;color: #fff;">
							<h3 class="box-title"><?=$list[1]['name'];?></h3>
						</div>
						<div class="box-body no-padding" style="display: block;">
							
							<?php
								$child = $this->Allcrud->getData('mr_materi',array('id_parent'=>$list[1]['id']))->result_array();
								for ($ii=0; $ii < count($child); $ii++) 
								{ 
									# code...
									$arg_video  = "";
									$id_video   = "";
									$file_video = "";
									$lock       = '<a style="color:#000;" href="'.base_url().'user/bimbingan_belajar"><i class="fa fa-lock" style="font-size: 41px;"></i></a>';
									$btn_arr    = "";						
									$type       = $this->Allcrud->listData('lt_tipe_bimbingan_belajar')->result_array();
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
											if ($type[$j]['id'] == 1) {
												# code...
												if ($ii == 0) {
													# code...
													$display    = "";
													$lock       = '';										
													$btn_arr .= '<a class="btn btn-primary" style="'.$display.'" href="'.base_url()."user/bimbingan_belajar/".$type[$j]['name']."/".$type[$j]['id']."/".$child[$ii]['id'].'"><i class="fa fa-hourglass-start"></i>&nbsp;'.$text.'</a>&nbsp;';
												}
												else {
													# code...
													$check_data_next  = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_tipe_bimbel'=>3,'id_materi'=>$child[$ii-1]['id']))->result_array();													
													if ($check_data_next != array()) {
														# code...
														if ($check_data_next[0]['status'] == 1) {
															# code...
															$display    = "margin-right: 10px;";															
															$lock       = '<a style="color:#000;" href="'.base_url().'user/bimbingan_belajar"><i class="fa fa-lock" style="font-size: 41px;"></i></a>';
														}
													}
												}
											}																							
										}
										else
										{
											$display    = "margin-right: 10px;";
											$lock       = '';										
											$btn_arr .= '<a class="btn btn-primary" style="'.$display.'" href="'.base_url()."user/bimbingan_belajar/".$type[$j]['name']."/".$type[$j]['id']."/".$child[$ii]['id'].'"><i class="fa fa-hourglass-start"></i>&nbsp;'.$text.'</a>';								
										}
									}
							?>
							<div class="row" style="margin-left: 0px;cursor: pointer;">                
								<div class="col-lg-12" style="padding-left: 0px;">
									<div class="box box-solid" style="height: 120px;">
										<div class="box-header with-border text-center" style="border-bottom: transparent;">
											<h3 class="box-title"><?=$child[$ii]['name'];?></h3>
										</div>        
										<div class="box-body">
											<div class="row text-center">
											<?=$lock;?>
											<?=$btn_arr;?>								
											</div>
										</div>
									</div>
								</div>
							</div>                
							<?php
								}                                            
							?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>