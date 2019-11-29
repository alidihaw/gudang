<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ADMINISTRATOR -
        <?php echo $web->identitas_website;?>
    </title>
    <meta name="description" content="<?php echo $web->identitas_deskripsi;?>" />
    <meta name="keywords" content="<?php echo $web->identitas_keyword;?>" />
    <meta name="author" content="<?php echo $web->identitas_author;?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/<?php echo $web->identitas_favicon;?>"
        sizes="16x16" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url();?>templates/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>templates/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>templates/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>templates/admin/js/popup/jquery.fancybox-1.3.4.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>templates/admin/css/date/jquery-ui-1.8.17.custom.css" />
</head>

<body class="skin-blue">
    <header class="header">
        <a href="<?php echo base_url();?>admin" class="logo">
            WMS
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $admin->admin_nama; ?><i class="caret"></i></span>
                            </a>
                        <ul class="dropdown-menu">
                            <li class="user-header bg-light-blue">
                                <img src="<?php echo base_url();?>templates/admin/img/icon-user.png" class="img-circle" alt="User Image" />
                                <p>
                                    <?php echo $admin->admin_nama; ?> -
                                    <?php echo $admin->admin_level_nama; ?>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo site_url();?>pengaturan/edit_password" class="btn btn-default btn-flat">Ganti Password</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo site_url();?>login/keluar" class="btn btn-default btn-flat">Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left skin-black">
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url();?>templates/admin/img/icon-user.png" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?php echo $admin->admin_nama; ?>
                        </p>

                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li><a href='<?php echo base_url();?>admin'><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <?php 
                    if($admin->admin_level_kode == 1) { ?>
                    <li><a href='<?php echo base_url();?>website/identitas/edit/1'><i class="fa fa-globe"></i> Identitas Website</a></li>
                    <li><a href='<?php echo base_url();?>pengaturan/kelompok_pengguna'><i class="fa fa-user"></i> Master Kelompok Pengguna</a></li>
                    <?php } ?>
                    <?php 
                    if($admin->admin_level_kode == 1 || $admin->admin_level_kode == 2) { ?>
                    <li><a href='<?php echo base_url();?>pengaturan/pengguna'><i class="fa fa-users"></i> Master Pengguna</a></li>
                    <li><a href='<?php echo base_url();?>website/supplier'><i class="fa fa-users"></i> Master Supplier</a></li>
                    <li><a href='<?php echo base_url();?>website/customer'><i class="fa fa-users"></i> Master Customer</a></li>
                    <?php } ?>
                    <li><a href='<?php echo base_url();?>website/barang'><i class="fa fa-list"></i> Master Barang</a></li>
                    <li class='treeview'>
                        <a href='#'>
                            <i class='fa fa-pencil'></i> <span>Transaksi</span>
                            <i class='fa fa-angle-left pull-right'></i>
                        </a>
                        <ul class='treeview-menu'>
                            <li class=''><a href='<?php echo base_url();?>website/masuk'><i class='fa fa-angle-double-right'></i>Barang Masuk</a></li>
                            <li class=''><a href='<?php echo base_url();?>website/keluar'><i class='fa fa-angle-double-right'></i>Barang Keluar</a></li>
                            <li class=''><a href='<?php echo base_url();?>website/penyesuaian'><i class='fa fa-angle-double-right'></i>Adjustment</a></li>
                        </ul>
                    </li>
                    <li class='treeview'>
                        <a href='#'>
                            <i class='fa fa-file'></i> <span>Laporan</span>
                            <i class='fa fa-angle-left pull-right'></i>
                        </a>
                        <ul class='treeview-menu'>
                            <li class=''><a href='<?php echo base_url();?>website/laporanmasuk'><i class='fa fa-angle-double-right'></i>Laporan Barang Masuk</a></li>
                            <li class=''><a href='<?php echo base_url();?>website/laporankeluar'><i class='fa fa-angle-double-right'></i>Laporan Barang Keluar</a></li>
                            <li class=''><a href='<?php echo base_url();?>website/laporanpenyesuaian'><i class='fa fa-angle-double-right'></i>Laporan Adjustment</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>
        <aside class="right-side">
            <?php $this->load->view($content);?>
        </aside>
    </div>

    <!-- jQuery 2.0.2 -->
    <script src="<?php echo base_url();?>templates/admin/js/jquery.min.js"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="<?php echo base_url();?>templates/admin/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>templates/admin/js/bootstrap.min.js" type="text/javascript"></script>


    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url();?>templates/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>templates/admin/js/AdminLTE/app.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/date/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/date/jquery-ui-1.8.17.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/popup/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/popup/jquery.fancybox-1.3.4.pack.js"></script>
    <script>
        var f = jQuery.noConflict();
        f(document).ready(function () {
            f('#agenda_selesai').datepicker({
                minDate: -0,
                maxDate: "+1M +3D",
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                dayNamesMin: ['Mg', 'Sn', 'Se', 'Ra', 'Ka', 'Jm', 'Sb'],
                monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt',
                    'Nov', 'Des'
                ],
                showAnim: 'fade',
                maxDate: "+1Y"
            });
        });
    </script>
    <script>
        var m = jQuery.noConflict();
        m(document).ready(function () {
            m('#agenda_mulai').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "dd-mm-yy",
                dayNamesMin: ['Mg', 'Sn', 'Se', 'Ra', 'Ka', 'Jm', 'Sb'],
                monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt',
                    'Nov', 'Des'
                ],
                showAnim: 'fade',
                minDate: "-1Y",
                maxDate: "+1Y"
            });

        });
    </script>
    <script type="text/javascript">
        var d = jQuery.noConflict();
        d(document).ready(function () {
            d("a[rel=detail]").fancybox({
                'height': 500,
                'width': 900,
                'autoScale': false,
                'transitionIn': 'elastic',
                'transitionOut': 'none',
                'overlayShow': false,
                'type': 'iframe',
                'prevEffect': 'none',
                'nextEffect': 'none',
                'showNavArrows': false
            });
        });
    </script>
</body>

</html>