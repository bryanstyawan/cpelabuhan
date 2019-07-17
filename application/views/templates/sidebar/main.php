<div class="col-lg-2 col-sm-2  hidden-xs">
    <aside class="main-sidebar hidden-sm hidden-xs" style="height: 450px;">
        <section class="sidebar" style="height: auto;">
            <ul class="sidebar-menu tree" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?=base_url();?>user/bimbingan_belajar">
                        <i class="fa fa-book"></i> <span>Materi</span>
                    </a>
                </li>
                <li>
                    <a href="<?=base_url();?>user/try_out">
                        <i class="fa fa-pencil"></i> <span>Try Out</span>
                    </a>
                    <?php
                        $uri = $this->uri->segment(2); 
                        if ($uri == 'try_out') {
                            # code...
                    ?>
                        <ul class="treeview-menu">
                            <li><a href="<?=base_url();?>user/try_out/"><i class="fa fa-circle-o"></i> Paket Soal</a></li>
                            <li><a href="<?=base_url();?>user/try_out/rangking"><i class="fa fa-circle-o"></i> Rangking</a></li>
                            <li><a href="<?=base_url();?>user/try_out/analisis"><i class="fa fa-circle-o"></i> Analisis</a></li>
                        </ul>                                        
                    <?php
                        }
                    ?>
                </li>
                <li>
                    <a href="<?=base_url();?>user/raport">
                        <i class="fa fa-envelope"></i> <span>Raport</span>
                    </a>
                </li>										
            </ul>
        </section>
    </aside>
</div>