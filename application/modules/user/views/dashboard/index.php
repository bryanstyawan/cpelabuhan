<style>
    .container-menu-ecodu
    {

    }
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .carousel-inner > .item > a > img
    {
        height: 150px;                
    }

    .container-menu-ecodu > img
    {
        margin-bottom: 15px;
        height: 121px;
    }
} 

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    .carousel-inner > .item > a > img
    {
    }

    .container-menu-ecodu > img
    {
        
    }        
} 

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    .carousel-inner > .item > a > img
    {
        height: 255px;        
    }

    .container-menu-ecodu > img
    {
        margin-bottom: 15px;
        height: 165px;        
    }        
} 

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
    .carousel-inner > .item > a > img
    {
        height: 335px;
        width: 100%;                
    }

    .container-menu-ecodu > img
    {
        width: 100%;
        height: 171px;        
    }        
} 

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
    .carousel-inner > .item > a > img
    {
                
    }

    .container-menu-ecodu > img
    {
        margin-bottom: 15px;
        height: 256px;        
    }    
}
</style>
<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="box box-solid">
                <div class="box-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>                        
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active left">
                                <a href="<?=base_url();?>user/try_out">
                                    <img src="<?=base_url();?>assets_home/dash/slide_try_out.png" alt="Try Out">                        
                                    <div class="carousel-caption">
                                    Try Out
                                    </div>                                
                                </a>
                            </div>
                            <div class="item next left">
                                <a href="<?=base_url();?>user/bimbingan_belajar">
                                    <img src="<?=base_url();?>assets_home/dash/slide_bimbingan_belajar.png" alt="Try Out">
                                    <div class="carousel-caption">
                                    Bimbingan Belajar
                                    </div>                                
                                </a>
                            </div>
                            <div class="item">
                                <a href="<?=base_url();?>user/video_materi">
                                    <img src="<?=base_url();?>assets_home/dash/slide_video_materi.png" alt="Video Materi">
                                    <div class="carousel-caption">
                                    Video Materi
                                    </div>                                
                                </a>
                            </div>
                            <div class="item">
                                <a href="<?=base_url();?>user/mini_try_out">
                                    <img src="<?=base_url();?>assets_home/dash/slide_mini_try_out.png" alt="Video Materi">
                                    <div class="carousel-caption">
                                    Mini Try Out
                                    </div>                                
                                </a>
                            </div>                        
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="fa fa-angle-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="fa fa-angle-right"></span>
                        </a>
                    </div>
                </div>
            </div>        
        </div>
        <div class="row">

            <div class="row">
                <a href="<?=base_url();?>user/try_out">
                    <div class="col-md-6 container-menu-ecodu">
                        <img class='col-xs-6 col-lg-12' src="<?php echo base_url() . 'assets_home/dash/try_out/WEB_MENU_TRY_OUT.png'; ?>" alt="Try Out">
                    </div>                
                </a>

                <a href="<?=base_url();?>user/bimbingan_belajar">
                    <div class="col-md-6 container-menu-ecodu">
                        <img class='col-xs-6 col-lg-12' src="<?php echo base_url() . 'assets_home/dash/bimbel/WEB_MENU_BIMBEL.png'; ?>" alt="Bimbingan Belajar">
                    </div>                
                </a>
            </div>
            <div class="row">

                <a href="<?=base_url();?>user/video_materi">            
                    <div class="col-md-6 container-menu-ecodu">
                        <img class='col-xs-6 col-lg-12' src="<?php echo base_url() . 'assets_home/dash/video_materi/WEB_MENU_VIDEO_MATERI.png'; ?>" alt="Bimbingan Belajar">                            
                    </div>
                </a>

                <a href="<?=base_url();?>user/mini_try_out">
                    <div class="col-md-6 container-menu-ecodu">
                        <img class='col-xs-6 col-lg-12' src="<?php echo base_url() . 'assets_home/dash/mini_try_out/WEB_MENU_MINI_TRY_OUT.png'; ?>" alt="Mini Try Out">                                                
                    </div>        
                </a>
            </div>            

        </div>
    </div>
</div>

<script>
$(".main-sidebar").hide()
</script>