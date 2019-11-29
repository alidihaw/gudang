<?php if ($action == 'view' || empty($action)){ ?>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/js/popup/jquery.mousewheel-3.0.4.pack.js"></script>
<section class="content-header">
	<h1>Laporan<small> Barang Masuk & Keluar</small></h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Laporan Barang Masuk & Keluar</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body table-responsive">
					<div id="opration">

					<script src="<?php echo base_url();?>templates/admin/js/highchart.js"></script>
					<script src="<?php echo base_url();?>templates/admin/js/exporting.js"></script>
                    <a href="<?php echo base_url();?>website/laporanpenyesuaianpdf" class="btn btn-primary btn-block btn-lg" style="margin-bottom: 30px !important;">Download Laporan Barang Masuk & Keluar PDF</a>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script>
	Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Barang Masuk'
    },
    subtitle: {
        text: 'Statistik Barang Masuk'
    },
    xAxis: {
        categories: [
			<?php 
			$where_transaksi['status_pergerakan'] 	= 1;
			foreach ($this->ADM->grid_all_transaksi('', 'id_transaksi', 'DESC', 1000, '', $where_transaksi, '') as $row){ ?>
				<?php 
									$where_barang['id_barang'] 	= $row->id_barang;
									foreach ($this->ADM->grid_all_barang('', 'id_barang', 'DESC', 100, '', $where_barang, '') as $row2){ ?>
									'<?php echo $row2->nama_barang;?>',
									<?php } ?>
			<?php } ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Barang Masuk (pcs)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} pcs</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Barang Masuk',
        data: [
			<?php 
			$where_transaksi['status_pergerakan'] 	= 1;
			foreach ($this->ADM->grid_all_transaksi('', 'id_transaksi', 'DESC', 1000, '', $where_transaksi, '') as $row){ ?>
									<?php echo $row->jumlah;?>,
			<?php } ?>
		]

    }]
});
</script>

<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto;margin-top: 30px !important;"></div>
<script>
	Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Barang Keluar'
    },
    subtitle: {
        text: 'Statistik Barang Keluar'
    },
    xAxis: {
        categories: [
			<?php 
			$where_transaksi['status_pergerakan'] 	= 2;
			foreach ($this->ADM->grid_all_transaksi('', 'id_transaksi', 'DESC', 1000, '', $where_transaksi, '') as $row){ ?>
				<?php 
									$where_barang['id_barang'] 	= $row->id_barang;
									foreach ($this->ADM->grid_all_barang('', 'id_barang', 'DESC', 100, '', $where_barang, '') as $row2){ ?>
									'<?php echo $row2->nama_barang;?>',
									<?php } ?>
			<?php } ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Barang Keluar (pcs)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} pcs</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Barang Keluar',
        data: [
			<?php 
			$where_transaksi['status_pergerakan'] 	= 2;
			foreach ($this->ADM->grid_all_transaksi('', 'id_transaksi', 'DESC', 1000, '', $where_transaksi, '') as $row){ ?>
									<?php echo $row->jumlah;?>,
			<?php } ?>
		]

    }]
});
</script>	
				
							<?php } ?>