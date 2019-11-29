<?php if ($action == 'view' || empty($action)){ ?>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/js/popup/jquery.mousewheel-3.0.4.pack.js"></script>
<section class="content-header">
	<h1>Transaksi<small> Barang Masuk</small></h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Transaksi Barang Masuk</li>
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
						<?php 
						if ($admin->admin_level_kode == 1 || $admin->admin_level_kode == 10) { ?>
						<div class="bttns_add">
							<ul>
								<li><a class="addbttn last" href="<?php echo site_url();?>website/masuk/tambah">Tambah Barang Masuk</a></li>
							</ul>
						</div>
						<?php } ?>
						<div class="bttns_clear">
							<ul>
								<li><a class="clrttn last" href="<?php echo site_url();?>website/masuk">Bersihkan Pencarian</a></li>
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
								<th width="590">JUMLAH</th>
								<th width="590">TANGGAL TRANSAKSI</th>
						
							</tr>
						</thead>
						<tbody>
							<?php 
	$i	= $page+1;
	$where_transaksi['status_pergerakan'] 	= 1;
	$like_transaksi[$cari]			= $q;
	if ($jml_data > 0){
	foreach ($this->ADM->grid_all_transaksi('', 'id_transaksi', 'DESC', $batas, $page, $where_transaksi, $like_transaksi) as $row){
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
									<?php 
									$where_supplier['id_supplier'] 	= $row->id_supplier;
									foreach ($this->ADM->grid_all_supplier('', 'id_supplier', 'DESC', 100, '', $where_supplier, '') as $row3){ ?>
									<?php echo $row3->nama_supplier;?>
									<?php } ?>
								</td>
								<td>
									<?php echo $row->jumlah;?>
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
								<td colspan="6">Belum ada data!.</td>
							</tr>
							<?php } ?>
							<tr>
								<th colspan="6" align="left">TOTAL :
									<?php echo $jml_data;?><span id="pages"><?php if ($jml_halaman > 1){ echo pages($halaman, $jml_halaman, 'website/masuk/view', $id=""); }?></span></th>
							</tr>
						</tbody>
					</table>
				</div>
				<?php } elseif ($action == 'tambah') { ?>
				<section class="content-header">
					<h1>Transaksi<small> Barang Masuk</small></h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
						<li><a href="<?php echo base_url();?>website/barang">Transaksi Barang Masuk</a></li>
						<li class="active">Tambah</li>
					</ol>
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-body table-responsive">
									<script language="javascript">
										function validate() {
											<?php foreach ($validate as $key => $value) { ?>
											var <?php echo $key;?> = document.getElementById('<?php echo $key;?>').value;
											if (<?php echo $key;?>.length == 0) {
												alert('<?php echo $value;?> harus diisi!');
												document.getElementById('<?php echo $key;?>').focus();
												return false;
											}
											<?php } ?>
											return true;
										}
									</script>
									<form id="formMenu" action="<?php echo site_url();?>website/masuk/tambah" method="post" onSubmit="return validate()">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
											
										
										<tr>
												<td><label for="id_barang">Nama Barang <span class="required">*</span></label></td>
												<td><select name="id_barang" class="form-control input-sm">
												<?php foreach ($this->ADM->grid_all_barang('', 'id_barang', 'DESC', 100, '', '' , '') as $barang){ ?>
													<option value="<?php echo $barang->id_barang ?>"><?php echo $barang->nama_barang ?></option>
												<?php } ?>
												</select></td>
											</tr>

											<tr>
												<td><label for="id_supplier">Nama Supplier <span class="required">*</span></label></td>
												<td><select name="id_supplier" class="form-control input-sm">
												<?php foreach ($this->ADM->grid_all_supplier('', 'id_supplier', 'DESC', 100, '', '' , '') as $supplier){ ?>
													<option value="<?php echo $supplier->id_supplier ?>"><?php echo $supplier->nama_supplier ?></option>
												<?php } ?>
												</select></td>
											</tr>

											<tr>
												<td><label for="jumlah">Jumlah <span class="required">*</span></label></td>
												<td><input name="jumlah" type="number" class="form-control input-sm" id="jumlah" value="" size="30"
													    maxlength="30" /></td>
											</tr>
										</table>
										<div style="padding:20px 0 0 0px; text-align:center"><input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data" />&nbsp;<input class="btn btn-primary"
											    type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url();?>website/masuk'"
											/></div>
									</form>
								</div>
							</div>
							<?php } ?>