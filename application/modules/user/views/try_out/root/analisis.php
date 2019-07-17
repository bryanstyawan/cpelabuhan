<style>
.row_viewanalisis > div
{
    padding: 15px;
}

.row_viewanalisis > div > div > span
{
    font-size: 18px;
}
</style>
<?=$this->load->view('templates/sidebar/main');?>
<?php
    if ($this->uri->segment(4) != '') {
        # code...
        if ($this->uri->segment(5) != '') {
            # code...
?>
            <div class="col-lg-10" id="viewpembahasan" style="display:none;">
                <div class="row">
                    <div class="col-lg-12">
                        <a onclick="go('close')" class="btn btn-danger pull-right follow-scroll"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="col-lg-7">
            <?php
                $try_out_true_tbi      = 0;
                $try_out_false_tbi     = 0;
                $try_out_empty_tbi     = 0;
                $try_out_value_tbi     = 0;
                $try_out_parameter_tbi = 0;

                $try_out_true_tpa      = 0;
                $try_out_false_tpa     = 0;
                $try_out_empty_tpa     = 0;
                $try_out_value_tpa     = 0;
                $try_out_parameter_tpa = 0;

                $try_out_true_twk      = 0;
                $try_out_false_twk     = 0;
                $try_out_empty_twk     = 0;
                $try_out_value_twk     = 0;
                $try_out_parameter_twk = 0;

                $try_out_true_tiu      = 0;
                $try_out_false_tiu     = 0;
                $try_out_empty_tiu     = 0;
                $try_out_value_tiu     = 0;
                $try_out_parameter_tiu = 0;
                
                $try_out_empty_tkk     = 0;
                $try_out_value_tkk     = 0;
                $try_out_parameter_tkk = 0;
                $end_result            = '';
                if ($list_soal != array()) {
                    # code...
                    for ($i=0; $i < count($list_soal); $i++) { 
                        # code...
            ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box" id="div_soal_<?=$list_soal[$i]['id'];?>">
                                    <div class="box-body">
                                        <div class="row">
                                            <h2 class="col-lg-1 text-center"><?=$i+1;?>.</h2>    
                                            <h3 id="p_soal"><?=($list_soal[$i]['image'] == '') ? $list_soal[$i]['name'] : '<img src="'.base_url().'public/soal/'.$list_soal[$i]['image'].'">';?></h3>                                                                    
                                            <!-- <h2 class="col-lg-11 text-center"><?=$list_soal[$i]['name'];?></h2> -->
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                            <?php
                                                $get_data_detail = $this->Allcrud->getData('mr_try_out_soal_detail',array('id_soal'=>$list_soal[$i]['id']))->result_array();
                                                if ($get_data_detail != array()) {
                                                    # code...
                                                    $check_data   = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$list_soal[$i]['id_parent'],'id_paket'=>$list_soal[$i]['id_paket'],'id_soal'=>$list_soal[$i]['id']))->result_array();
                                                    $check_choice = $this->Allcrud->getData('mr_try_out_soal_detail',array('id_soal'=>$list_soal[$i]['id'],'jawaban'=>'true'))->result_array();
                                                    for ($ii=0; $ii < count($get_data_detail); $ii++) { 
                                                        # code...
                                                        $style_background       = "";
                                                        $style_background_false = "";
                                                        
                                                        if ($check_data != array()) {
                                                            # code...
                                                            if ($check_data[0]['id_jawaban'] == $get_data_detail[$ii]['id']) {
                                                                # code...
                                                                $style_background = "background-color:#4CAF50;"; 
                                                                if ($list_soal[$i]['id_type'] == 5) {
                                                                    # code...
                                                                    $try_out_value_tkk += $get_data_detail[$ii]['bobot']; 
                                                                }
                                                            }
                                                        }

                                                        if ($check_choice != array()) {
                                                            # code...
                                                            if ($check_data != array()) {
                                                                # code...
                                                                if ($get_data_detail[$ii]['id'] == $check_choice[0]['id']) {
                                                                    # code...
                                                                    if ($check_choice[0]['id'] == $check_data[0]['id_jawaban']) {
                                                                        # code...
                                                                        $style_background = "background-color:#4CAF50;";											
                                                                        if ($list_soal[$i]['id_type'] == 1) {
                                                                            # code...
                                                                            $try_out_true_tpa += 1;                                                                
                                                                            $try_out_value_tpa += 4;
                                                                        }
                                                                        elseif ($list_soal[$i]['id_type'] == 2) {
                                                                            # code...
                                                                            $try_out_true_tbi += 1; 
                                                                            $try_out_value_tbi +=4;                                                               
                                                                        }
                                                                        elseif ($list_soal[$i]['id_type'] == 3) {
                                                                            # code...
                                                                            $try_out_true_twk += 1;
                                                                            $try_out_value_twk += 5;                                                                
                                                                        }
                                                                        elseif ($list_soal[$i]['id_type'] == 4) {
                                                                            # code...
                                                                            $try_out_true_tiu += 1; 
                                                                            $try_out_value_tiu += 5;                                                               
                                                                        }
                                                                    }
                                                                    else {
                                                                        # code...
                                                                        $style_background_false = "background-color:red;";											
                                                                        if ($list_soal[$i]['id_type'] == 1) {
                                                                            # code...
                                                                            $try_out_false_tpa += 1;                                                                
                                                                            $try_out_value_tpa -= 1;
                                                                        }
                                                                        elseif ($list_soal[$i]['id_type'] == 2) {
                                                                            # code...
                                                                            $try_out_false_tbi += 1;
                                                                            $try_out_value_tbi -= 1;
                                                                        }
                                                                        elseif ($list_soal[$i]['id_type'] == 3) {
                                                                            # code...
                                                                            $try_out_false_twk += 1;
                                                                            $try_out_value_twk += 0;                                                                
                                                                        }
                                                                        elseif ($list_soal[$i]['id_type'] == 4) {
                                                                            # code...
                                                                            $try_out_false_tiu += 1; 
                                                                            $try_out_value_tiu += 0;                                                               
                                                                        }
                                                                    }
                                                                }																						
                                                            }
                                                            else {
                                                                # code...
                                                                if ($get_data_detail[$ii]['id'] == $check_choice[0]['id']) {
                                                                    # code...
                                                                    //tidak dijawab
                                                                    $style_background_false = "background-color:red;";											
                                                                    if ($list_soal[$i]['id_type'] == 1) {
                                                                        # code...
                                                                        $try_out_empty_tpa += 1;                                                                
                                                                        $try_out_value_tpa += 0;
                                                                    }
                                                                    elseif ($list_soal[$i]['id_type'] == 2) {
                                                                        # code...
                                                                        $try_out_empty_tbi += 1;
                                                                        $try_out_value_tbi += 0;
                                                                    }
                                                                    elseif ($list_soal[$i]['id_type'] == 3) {
                                                                        # code...
                                                                        $try_out_empty_twk += 1;
                                                                        $try_out_value_twk += 0;                                                                
                                                                    }
                                                                    elseif ($list_soal[$i]['id_type'] == 4) {
                                                                        # code...
                                                                        $try_out_empty_tiu += 1; 
                                                                        $try_out_value_tiu += 0;                                                               
                                                                    }
                                                                }
                                                            }
                                                        }								                                            
                                            ?>
                                                        <div class="row row_choice" id="row_<?=$get_data_detail[$ii]['id'];?>" style="padding:10px;<?=$style_background.$style_background_false;?>">
                                                            <div class="col-lg-2 col-xs-3 text-center"><?=$get_data_detail[$ii]['choice'];?></div>                                                            
                                                            <div class="col-lg-10" style="padding-left: 0px;"><?=($get_data_detail[$ii]['image'] == '') ? $get_data_detail[$ii]['name'] : '<img src="'.base_url().'public/jawaban/'.$get_data_detail[$ii]['image'].'">';?></div>                                        
                                                        </div>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </div>
                                        </div>   
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3 style="text-align:justify" id="p_soal"><?=($list_soal[$i]['image_desc'] == '') ? $list_soal[$i]['desc_pembahasan'] : '<img src="'.base_url().'public/pembahasan/'.$list_soal[$i]['image_desc'].'">';?></h3>                                                                                            
                                            </div>
                                        </div>                         
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php            
                    }
                }

                if ($try_out_value_tbi < 67) {
                    # code...
                    $try_out_parameter_tbi = "Tidak Lulus";
                }
                else
                {
                    $try_out_parameter_tbi = "Lulus";
                }

                if ($try_out_value_tpa < 30) {
                    # code...
                    $try_out_parameter_tpa = "Tidak Lulus";
                }
                else
                {
                    $try_out_parameter_tpa = "Lulus";
                }    

                if ($try_out_value_twk < 70) {
                    # code...
                    $try_out_parameter_twk = "Tidak Lulus";
                }
                else
                {
                    $try_out_parameter_twk = "Lulus";
                }   
                
                if ($try_out_value_tiu < 85) {
                    # code...
                    $try_out_parameter_tiu = "Tidak Lulus";
                }
                else
                {
                    $try_out_parameter_tiu = "Lulus";
                }       

                if ($try_out_value_tkk < 143) {
                    # code...
                    $try_out_parameter_tkk = "Tidak Lulus";
                }
                else
                {
                    $try_out_parameter_tkk = "Lulus";
                }       


            ?>
                </div>            
                <div class="col-lg-5 follow-scroll" id="counter">
                    <div class="col-lg-12">
                        <?php
                            $counter_soal_x = 0;
                            if ($list_soal != array()) {
                                # code...
                                for ($i=0; $i < count($list_soal); $i++) { 
                                    # code...
                                    $background_color = '';
                                    $color            = "";
                                    $check_choice     = $this->Allcrud->getData('mr_try_out_soal_detail',array('id_soal'=>$list_soal[$i]['id'],'jawaban'=>'true'))->result_array();                                    
                                    $check_data       = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$list_soal[$i]['id_parent'],'id_paket'=>$list_soal[$i]['id_paket'],'id_soal'=>$list_soal[$i]['id']))->result_array();
                                    if ($check_choice != array()) {
                                        # code...
                                        if ($check_data != array()) {
                                            # code...
                                            if ($check_choice[0]['id'] == $check_data[0]['id_jawaban']) {
                                                # code...
                                                $color            = "color:#fff;";
                                                $background_color = "background-color:#4CAF50;";												
                                            }
                                            else {
                                                # code...
                                                $color            = "color:#fff;";
                                                $background_color = "background-color:red;";											
                                            }
                                        }										
    
                                    }
                                     // $data_soal        = $this->Allcrud->getdata('mr_try_out_soal',array('id'=>$list_soal[$i]['id']))->result_array();
                                    
                                    $counter = ($i < 10) ? str_pad($i+1,2,"0",STR_PAD_LEFT) : $i + 1;
                        ?>
                                    <a href="#div_soal_<?=$list_soal[$i]['id'];?>" class="btn btn-default" style="<?=$background_color;?><?=$color;?>"><?=$counter;?></a>
                        <?php
                                }								
                            }
                        ?>
                    </div>
                </div>

            </div>

            <div class="container col-lg-9" id="viewanalisisheader">
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <h2 class="box-title col-lg-12 text-center"><u>SELEKSI KEMAMPUAN DASAR</u></h2>            
                        </div>
                        <div class="box-body">
                            <?php
                                if ($parent == 2) {
                                    # code...
                            ?>
                                <div class="row">
                                    <div class="col-lg-12 row_viewanalisis">
                                        <div class="row text-center">
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-2"><span>Benar</span></div>
                                            <div class="col-lg-2"><span>Salah</span></div>
                                            <div class="col-lg-2"><span>Kosong</span></div>                            
                                            <div class="col-lg-2"><span>Nilai</span></div>                            
                                            <div class="col-lg-2"></div>                            
                                        </div>                    
                                        <div class="row text-center">
                                            <div class="col-lg-2">
                                                <span class="label label-success">TEST KEWARGANEGARAAN</span>
                                            </div>
                                            <div class="col-lg-2"><span><?=$try_out_true_twk;?></span></div>
                                            <div class="col-lg-2"><span><?=$try_out_false_twk;?></span></div>
                                            <div class="col-lg-2"><span><?=$try_out_empty_twk;?></span></div>                            
                                            <div class="col-lg-2"><span><?=$try_out_value_twk;?></span></div>                            
                                            <div class="col-lg-2"><span><?=$try_out_parameter_twk;?></span></div>                            
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-lg-2">
                                                <span class="label label-success">TEST INTELEGENSI UMUM</span>
                                            </div>                            
                                            <div class="col-lg-2"><span><?=$try_out_true_tiu;?></span></div>
                                            <div class="col-lg-2"><span><?=$try_out_false_tiu;?></span></div>
                                            <div class="col-lg-2"><span><?=$try_out_empty_tiu;?></span></div>                            
                                            <div class="col-lg-2"><span><?=$try_out_value_tiu;?></span></div>                            
                                            <div class="col-lg-2"><span><?=$try_out_parameter_tiu;?></span></div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-lg-2">
                                                <span class="label label-success">TEST KEMAMPUAN PRIBADI</span>
                                            </div>                                                    
                                            <div class="col-lg-2"><span>-</span></div>
                                            <div class="col-lg-2"><span>-</span></div>
                                            <div class="col-lg-2"><span>-</span></div>                            
                                            <div class="col-lg-2"><span><?=$try_out_value_tkk;?></span></div>                            
                                            <div class="col-lg-2"><span><?=$try_out_parameter_tkk;?></span></div>                            
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-lg-12">
                                                <?php
                                                if ($try_out_parameter_twk == 'Lulus' && $try_out_parameter_tiu == 'Lulus' && $try_out_parameter_tkk == 'Lulus') {
                                                    # code...
                                                    $end_result = "Lulus";
                                                ?>
                                                    <span class="label label-success">Lulus</span>
                                                <?php
                                                }
                                                else
                                                {
                                                    $end_result = "Tidak Lulus";                                    
                                                ?>
                                                    <span class="label label-danger">Tidak Lulus</span>
                                                <?php                                    
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div clas="row text-center">
                                            <?php
                                                $get_result_analisis = $this->Allcrud->getData('tr_analisis_rangking',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$parent,'id_paket'=>$paket))->result_array();
                                                if ($get_result_analisis == array()) {
                                                    # code...
                                                    $data_store = array();
                                                    if ($parent == 1) {
                                                        # code...
                                                        $data_store['id_user']     = $this->session->userdata('session_user');
                                                        $data_store['id_parent']   = $parent;
                                                        $data_store['id_paket']    = $paket;
                                                        $data_store['tpa_true']    = $try_out_true_tpa;
                                                        $data_store['tpa_false']   = $try_out_false_tpa;
                                                        $data_store['tpa_empty']   = $try_out_empty_tpa;
                                                        $data_store['tpa_value']   = $try_out_value_tpa;
                                                        $data_store['tpa_status']  = $try_out_parameter_tpa;
                                                        $data_store['tbi_true']    = $try_out_true_tbi;
                                                        $data_store['tbi_false']   = $try_out_false_tbi;
                                                        $data_store['tbi_empty']   = $try_out_empty_tbi;
                                                        $data_store['tbi_value']   = $try_out_value_tbi;
                                                        $data_store['tbi_status']  = $try_out_parameter_tbi;
                                                        $data_store['total_value'] = $try_out_value_tpa + $try_out_value_tbi;
                                                        $data_store['end_status']  = $end_result;
                                                    }
                                                    elseif($parent == 2) {
                                                        # code...
                                                        $data_store = $this->Globalrules->trigger_insert_update('insert');

                                                        $data_store['id_user']     = $this->session->userdata('session_user');
                                                        $data_store['id_parent']   = $parent;
                                                        $data_store['id_paket']    = $paket;
                                                        $data_store['twk_true']    = $try_out_true_twk;
                                                        $data_store['twk_false']   = $try_out_false_twk;
                                                        $data_store['twk_empty']   = $try_out_empty_twk;
                                                        $data_store['twk_value']   = $try_out_value_twk;
                                                        $data_store['twk_status']  = $try_out_parameter_twk;
                                                        $data_store['tiu_true']    = $try_out_true_tiu;
                                                        $data_store['tiu_false']   = $try_out_false_tiu;
                                                        $data_store['tiu_empty']   = $try_out_empty_tiu;
                                                        $data_store['tiu_value']   = $try_out_value_tiu;
                                                        $data_store['tiu_status']  = $try_out_parameter_tiu;
                                                        $data_store['tkp_empty']   = $try_out_empty_tkk;
                                                        $data_store['tkp_value']   = $try_out_value_tkk;
                                                        $data_store['tkp_status']  = $try_out_parameter_tkk;
                                                        $data_store['total_value'] = $try_out_value_twk + $try_out_value_tiu + $try_out_value_tkk;
                                                        $data_store['end_status']  = $end_result;                                        
                                                    }

                                                    if ($data_store != array()) {
                                                        # code...
                                                        $res_data       = $this->Allcrud->addData('tr_analisis_rangking',$data_store);                                                    
                                                    }                                                                        
                                                }

                                                $data_store1['status'] = 1;
                                                $user     = $this->session->userdata('session_user');
                                                $res_data = $this->Allcrud->editData('tr_track_time_try_out',$data_store1,array('id_user'=>$user,'id_parent'=>$parent,'id_paket'=>$paket));                                
                                            ?>
                                            <div class="col-lg-12 text-center">
                                                <a onclick="go('pembahasan')" class="btn btn-lg btn-primary"><i class="fa fa-search"></i> PEMBAHASAN</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                            <?php
                                }
                                elseif ($parent == 1) {
                                    # code...
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-12 row_viewanalisis">
                                            <div class="row text-center">
                                                <div class="col-lg-2"></div>
                                                <div class="col-lg-2"><span>Benar</span></div>
                                                <div class="col-lg-2"><span>Salah</span></div>
                                                <div class="col-lg-2"><span>Kosong</span></div>                            
                                                <div class="col-lg-2"><span>Nilai</span></div>                            
                                                <div class="col-lg-2"></div>                            
                                            </div>                    
                                            <div class="row text-center">
                                                <div class="col-lg-2">
                                                    <span class="label label-success">TEST POTENSI AKADEMIK</span>
                                                </div>
                                                <div class="col-lg-2"><span><?=$try_out_true_tpa;?></span></div>
                                                <div class="col-lg-2"><span><?=$try_out_false_tpa;?></span></div>
                                                <div class="col-lg-2"><span><?=$try_out_empty_tpa;?></span></div>                            
                                                <div class="col-lg-2"><span><?=$try_out_value_tpa;?></span></div>                            
                                                <div class="col-lg-2"><span><?=$try_out_parameter_tpa;?></span></div>                            
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-lg-2">
                                                    <span class="label label-success">TEST BAHASA INGGRIS</span>
                                                </div>                            
                                                <div class="col-lg-2"><span><?=$try_out_true_tbi;?></span></div>
                                                <div class="col-lg-2"><span><?=$try_out_false_tbi;?></span></div>
                                                <div class="col-lg-2"><span><?=$try_out_empty_tbi;?></span></div>                            
                                                <div class="col-lg-2"><span><?=$try_out_value_tbi;?></span></div>                            
                                                <div class="col-lg-2"><span><?=$try_out_parameter_tbi;?></span></div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-lg-12">
                                                    <?php
                                                    if ($try_out_parameter_tpa == 'Lulus' && $try_out_parameter_tbi == 'Lulus') {
                                                        # code...
                                                        $end_result = "Lulus";
                                                    ?>
                                                        <span class="label label-success">Lulus</span>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        $end_result = "Tidak Lulus";                                    
                                                    ?>
                                                        <span class="label label-danger">Tidak Lulus</span>
                                                    <?php                                    
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div clas="row text-center">
                                                <?php
                                                    $get_result_analisis = $this->Allcrud->getData('tr_analisis_rangking',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$parent,'id_paket'=>$paket))->result_array();
                                                    if ($get_result_analisis == array()) {
                                                        # code...
                                                        $data_store = array();
                                                        if ($parent == 1) {
                                                            # code...
                                                            $data_store['id_user']     = $this->session->userdata('session_user');
                                                            $data_store['id_parent']   = $parent;
                                                            $data_store['id_paket']    = $paket;
                                                            $data_store['tpa_true']    = $try_out_true_tpa;
                                                            $data_store['tpa_false']   = $try_out_false_tpa;
                                                            $data_store['tpa_empty']   = $try_out_empty_tpa;
                                                            $data_store['tpa_value']   = $try_out_value_tpa;
                                                            $data_store['tpa_status']  = $try_out_parameter_tpa;
                                                            $data_store['tbi_true']    = $try_out_true_tbi;
                                                            $data_store['tbi_false']   = $try_out_false_tbi;
                                                            $data_store['tbi_empty']   = $try_out_empty_tbi;
                                                            $data_store['tbi_value']   = $try_out_value_tbi;
                                                            $data_store['tbi_status']  = $try_out_parameter_tbi;
                                                            $data_store['total_value'] = $try_out_value_tpa + $try_out_value_tbi;
                                                            $data_store['end_status']  = $end_result;
                                                        }
                                                        elseif($parent == 2) {
                                                            # code...
                                                            $data_store = $this->Globalrules->trigger_insert_update('insert');
    
                                                            $data_store['id_user']     = $this->session->userdata('session_user');
                                                            $data_store['id_parent']   = $parent;
                                                            $data_store['id_paket']    = $paket;
                                                            $data_store['twk_true']    = $try_out_true_twk;
                                                            $data_store['twk_false']   = $try_out_false_twk;
                                                            $data_store['twk_empty']   = $try_out_empty_twk;
                                                            $data_store['twk_value']   = $try_out_value_twk;
                                                            $data_store['twk_status']  = $try_out_parameter_twk;
                                                            $data_store['tiu_true']    = $try_out_true_tiu;
                                                            $data_store['tiu_false']   = $try_out_false_tiu;
                                                            $data_store['tiu_empty']   = $try_out_empty_tiu;
                                                            $data_store['tiu_value']   = $try_out_value_tiu;
                                                            $data_store['tiu_status']  = $try_out_parameter_tiu;
                                                            $data_store['tkp_empty']   = $try_out_empty_tkk;
                                                            $data_store['tkp_value']   = $try_out_value_tkk;
                                                            $data_store['tkp_status']  = $try_out_parameter_tkk;
                                                            $data_store['total_value'] = $try_out_value_twk + $try_out_value_tiu + $try_out_value_tkk;
                                                            $data_store['end_status']  = $end_result;                                        
                                                        }
    
                                                        if ($data_store != array()) {
                                                            # code...
                                                            $res_data       = $this->Allcrud->addData('tr_analisis_rangking',$data_store);                                                    
                                                        }                                                                        
                                                    }
    
                                                    $data_store1['status'] = 1;
                                                    $user     = $this->session->userdata('session_user');
                                                    $res_data = $this->Allcrud->editData('tr_track_time_try_out',$data_store1,array('id_user'=>$user,'id_parent'=>$parent,'id_paket'=>$paket));                                
                                                ?>
                                                <div class="col-lg-12 text-center">
                                                    <a onclick="go('pembahasan')" class="btn btn-lg btn-primary"><i class="fa fa-search"></i> PEMBAHASAN</a>
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
<?php
        }
    }    
    else {
        # code...
        load_paket_analisis($tipe);        
    }
?>


<script>
    $(document).ready(function(){
        var element = $('.follow-scroll'),
            originalY = element.offset().top;

        // Space between element and top of screen (when scrolling)
        var topMargin = 0;

        // Should probably be set in CSS; but here just for emphasis
        element.css('position', 'relative');

        $(window).on('scroll', function(event) {
            var scrollTop = $(window).scrollTop();

            element.stop(false, false).animate({
                top: scrollTop < originalY
                        ? 0
                        : scrollTop - originalY + topMargin
            }, 300);
        });
    })
    function go(params) {
        if (params == 'pembahasan') {
            $("#viewpembahasan").css({"display": ""})
            $("#viewanalisisheader").css({"display": "none"})            
        }
        else if(params == 'close')
        {
            $("#viewpembahasan").css({"display": "none"})
            $("#viewanalisisheader").css({"display": ""})
        }
    }
	// console.table(data_sender);
</script>