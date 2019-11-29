<section class="content-header">
    <h1>Dashboard<small>Control Panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div id="welcome">
                        <h3 style="display:block;">Selamat datang di Halaman Administrator
                            <?php echo $web->identitas_website;?>
                        </h3>
                        <div class="clear"></div>
                        <div class="callout callout-info">
                            <h4>Hallo,
                                <?php echo $admin->admin_nama; ?>
                            </h4>
                            <p>Sistem informasi ini untuk administrator atau operator menjalankan data yang akan dibuat</p>
                        </div>
                        <?php 
                        if($admin->admin_level_kode == 1 || $admin->admin_level_kode == 2) { ?>
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>
                                            <?php echo $jml_data_transaksi_masuk;?>
                                        </h3>
                                        <p>
                                            Barang Masuk
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-archive"></i>
                                    </div>
                                    <a href="<?php echo site_url();?>website/agenda" class="small-box-footer">
                                    Lihat Barang Masuk <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-xs-6 col-md-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>
                                            <?php echo $jml_data_transaksi_keluar;?>
                                        </h3>
                                        <p>
                                            Barang Keluar
                                        </p>
                                    </div>
                                    <div class="icon">
                                      <i class="fa fa-archive"></i>
                                    </div>
                                    <a href="<?php echo site_url();?>website/komentar" class="small-box-footer">
                                    Lihat Barang Keluar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>