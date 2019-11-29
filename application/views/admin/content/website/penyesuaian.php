<?php if ($action == 'view' || empty($action)){ ?>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/js/popup/jquery.mousewheel-3.0.4.pack.js"></script>
<section class="content-header">
	<h1>Transaksi<small> Barang Masuk & Keluar</small></h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Barang Masuk & Keluar</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body table-responsive">
					<div id="opration">
						<?php if ($this->session->flashdata('success') || $this->session->flashdata('error')) {?>
						<div id="massage">
							<?php if ($this->session->flashdata('success')) { ?>
							<div class="success"><span><?php echo $this->session->flashdata('success');?></span></div>
							<?php } else { ?>
							<div class="error"><span><?php echo $this->session->flashdata('error');?></span></div>
							<?php } ?>
						</div>
						<?php } ?>
						<div class="bttns_clear">
							<ul>
								<li><a class="clrttn last" href="<?php echo site_url();?>website/penyesuaian">Bersihkan Pencarian</a></li>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
					<form action="" method="post" id="table">
						<table class="example1">
							<tr>
								<td height="25"><span class="judul_cari">Cari Berdasarkan : </span>
									<?php array_pilihan('cari', $berdasarkan, $cari);?> &nbsp; 
									<select name="q" class="text">
									<?php foreach ($this->ADM->grid_all_barang('', 'id_barang', 'DESC', $batas, $page, '' , '') as $barang){ ?>
										<option value="<?php echo $barang->id_barang ?>"><?php echo $barang->nama_barang ?></option>
									<?php } ?>
									</select><input type="submit" name="kirim"
									    class="seach" value="" style="margin-left: 0px !important;"/>	</td>
										
							</tr>
						</table>
					</form>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-striped" id="example1">
						<thead>
							<tr>
								<th width="30">#</th>
								<th width="590">NAMA BARANG</th>
								<th width="590">NAMA SUPPLIER</th>
								<th width="590">NAMA CUSTOMER</th>
								<th width="590">JUMLAH</th>
								<th width="590">STATUS</th>
								<th width="590">TANGGAL TRANSAKSI</th>
						
							</tr>
						</thead>
						<tbody>
							<?php 
	$i	= $page+1;
	$like_transaksi[$cari]			= $q;
	if ($jml_data > 0){
	foreach ($this->ADM->grid_all_transaksi('', 'id_transaksi', 'DESC', $batas, $page, '', $like_transaksi) as $row){
	?>
							<tr>
								<td align="center">
									<?php echo $i;?>
								</td>
								<td>
									
									<?php 
									$where_barang['id_barang'] 	= $row->id_barang;
									foreach ($this->ADM->grid_all_barang('', 'id_barang', 'DESC', 100, '', $where_barang, '') as $row2){ ?>
									<?php echo $row2->nama_barang;?>
									<?php } ?>
								
								</td>

								<td>
								<?php if($row->id_supplier != 0) { ?>
									<?php 
									$where_supplier['id_supplier'] 	= $row->id_supplier;
									foreach ($this->ADM->grid_all_supplier('', 'id_supplier', 'DESC', 100, '', $where_supplier, '') as $row3){ ?>
									<?php echo $row3->nama_supplier;?>
									<?php } ?>
									<?php } else { ?>
										-
										<?php } ?>
								</td>


								<td>
								<?php if($row->id_customer != 0) { ?>
									<?php 
									$where_customer['id_customer'] 	= $row->id_customer;
									foreach ($this->ADM->grid_all_customer('', 'id_customer', 'DESC', 100, '', $where_customer, '') as $row3){ ?>
									<?php echo $row3->nama_customer;?>
									<?php } ?>
									<?php } else {?>
										-
										<?php } ?>
								</td>
						

								<td>
									<?php echo $row->jumlah;?>
								</td>

								<td>
								<?php if($row->status_pergerakan == 1) { ?>
									<a class="btn btn-primary btn-block">Barang Masuk</a>
									<?php } else { ?>
										
									<a class="btn btn-danger btn-block">Barang Keluar</a>
									<?php } ?>
								</td>
								<td>
									<?php echo $row->tanggal_transaksi;?>
								</td>
							</tr>
							<?php 
	$i++; 
	} 
	} else { 
	?>
							<tr>
								<td colspan="12">Belum ada data!.</td>
							</tr>
							<?php } ?>
							<tr>
								<th colspan="12" align="left">TOTAL :
									<?php echo $jml_data;?><span id="pages"><?php if ($jml_halaman > 1){ echo pages($halaman, $jml_halaman, 'website/penyesuaian/view', $id=""); }?></span></th>
							</tr>
						</tbody>
					</table>
				</div>
				
							<?php } ?>