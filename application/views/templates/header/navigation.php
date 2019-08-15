<nav class="navbar navbar-static-top" role="navigation" style="background-color: #fff;height: 100%;">
<?php
		$CI = & get_instance();
		$CI->load->view('templates/header/open_tag',array('tag'=>'div','class'=>'navbar-custom-menu'));
		$CI->load->view('templates/header/open_tag',array('tag'=>'ul','class'=>'nav navbar-nav pull-right'));
		// $CI->load->view('templates/header/message');
		$CI->load->view('templates/header/menu_user');		
		// $CI->load->view('templates/header/notification',array('counter'=>$count_notify,'notify_result'=>$notify->result()));												
		$CI->load->view('templates/header/user');				
		$CI->load->view('templates/header/close_tag',array('tag'=>'ul'));		
		$CI->load->view('templates/header/close_tag',array('tag'=>'div'));
?>        
    <div class="navbar-custom-menu pull-left">
        <!-- <a href="#" class="sidebar-toggle hidden-lg hidden-md" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a> -->
        <a href="<?php echo site_url();?>" class="logo" style="background-color: #fff;height:100%;width:100%;padding-bottom:15px;">
            <img class="pull-left" src="<?php echo base_url();?>assets_home/dummy-logo.png" alt="logo" style="height: 58px;width: 140px;">            
            <span class="pull-left" style="height: 58px;width: 280px;color:black;padding-top: 15px;">Pertamina Goban</span>
        </a>
        <ul class="nav navbar-nav hidden-xs col-lg-12" id="header_navigator" style="background-color: #9cc82b;width: 115%;">