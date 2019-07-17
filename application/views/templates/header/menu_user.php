<?php
if ($this->session->userdata('session_role') == 3) {
    # code...
?>
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="open_menu">
        <i id="viewnavbarcontent" class="fa fa-navicon"></i>
    </a>
    <ul class="dropdown-menu" style="left: auto;">
        <li>
        <!-- inner menu: contains the actual data -->
            <ul class="menu" style="background-color: #fff;">
                <li>
                    <a href="<?=base_url();?>user/bimbingan_belajar">
                        <!-- <i class="fa fa-users text-aqua"></i>  -->
                        Bimbingan Belajar
                    </a>
                </li>

                <li>
                    <a href="<?=base_url();?>user/video_materi">
                        <!-- <i class="fa fa-users text-aqua"></i>  -->
                        Video Belajar
                    </a>
                </li>

                <li>
                    <a href="<?=base_url();?>user/try_out">
                        <!-- <i class="fa fa-users text-aqua"></i>  -->
                        Try Out
                    </a>
                </li>

                <li>
                    <a href="<?=base_url();?>user/mini_try_out">
                        <!-- <i class="fa fa-users text-aqua"></i>  -->
                        Mini Try Out
                    </a>
                </li>                

            </ul>
        </li>
    </ul>
</li>

<script>
$(document).ready(function()
{
    $("#open_menu").click(function(){
        if ($("#viewnavbarcontent").hasClass("fa fa-navicon") ) {
            $("#viewnavbarcontent").attr("class", "fa fa-times")
        }
        else if ($("#viewnavbarcontent").hasClass("fa fa-times") ) {
            $("#viewnavbarcontent").attr("class", "fa fa-navicon")
        }        

    })
});

</script>
<?php
}
?>
