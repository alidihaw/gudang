<?php if ($action == 'view' || empty($action)){ ?>
<script type="text/javascript" src="<?php echo base_url();?>templates/default/js/popup/jquery.mousewheel-3.0.4.pack.js"></script>
<section class="content-header">
	<h1>Daftar<small>Supplier</small></h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Supplier</li>
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
						if ($admin->admin_level_kode == 1) { ?>
						<div class="bttns_add">
							<ul>
								<li><a class="addbttn last" href="<?php echo site_url();?>website/supplier/tambah">Tambah Supplier</a></li>
							</ul>
						</div>
						<?php } ?>
						<div class="bttns_clear">
							<ul>
								<li><a class="clrttn last" href="<?php echo site_url();?>website/supplier">Bersihkan Pencarian</a></li>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
					<form action="" method="post" id="table">
						<table class="example1">
							<tr>
								<td height="25"><span class="judul_cari">Cari Berdasarkan : </span>
									<?php array_pilihan('cari', $berdasarkan, $cari);?> &nbsp; <input type="text" name="q" class="text" size="40" value="<?php echo $q;?>" /><input type="submit" name="kirim"
									    class="seach" value="" /></td>
							</tr>
						</table>
					</form>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-striped" id="example1">
						<thead>
							<tr>
								<th width="30">#</th>
								<th width="590">NAMA SUPPLIER</th>
								<th width="590">ALAMAT SUPPLIER</th>
								<th width="590">NOTELP SUPPLIER</th>
								<?php 
						if ($admin->admin_level_kode == 1) { ?>
								<th width="100"></th>
						<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php 
	$i	= $page+1;
	$like_supplier[$cari]			= $q;
	if ($jml_data > 0){
	foreach ($this->ADM->grid_all_supplier('', 'nama_supplier', 'ASC', $batas, $page, '', $like_supplier) as $row){
	?>
							<tr>
								<td align="center">
									<?php echo $i;?>
								</td>
								<td>
									<?php echo $row->nama_supplier;?>
								</td>
								<td>
									<?php echo $row->alamat_supplier;?>
								</td>
								<td>
									<?php echo $row->notelp_supplier;?>
								</td>
								<?php 
						if ($admin->admin_level_kode == 1) { ?>
								<td align="center"><a href="<?php echo site_url();?>website/supplier/edit/<?php echo $row->id_supplier;?>" class="edit"
									    title="edit"></a><a href="<?php echo site_url();?>website/supplier/hapus/<?php echo $row->id_supplier;?>"
										class="delete" title="Hapus" onclick="return confirm('Apakah anda yakin? \nAkan menghapus supplier `<?php echo $row->nama_supplier;?>`.');"></a></td>
									
						<?php } ?>
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
									<?php echo $jml_data;?><span id="pages"><?php if ($jml_halaman > 1){ echo pages($halaman, $jml_halaman, 'website/supplier/view', $id=""); }?></span></th>
							</tr>
						</tbody>
					</table>
				</div>
				<?php } elseif ($action == 'tambah') { ?>
				<section class="content-header">
					<h1>Tambah<small>Supplier</small></h1>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
						<li><a href="<?php echo base_url();?>website/supplier">Supplier</a></li>
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
									<form id="formMenu" action="<?php echo site_url();?>website/supplier/tambah" method="post" onSubmit="return validate()">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
											<tr>
												<td><label for="nama_supplier">Nama Supplier <span class="required">*</span></label></td>
												<td><input name="nama_supplier" type="text" class="form-control input-sm" id="nama_supplier" value="" size="30"
													    maxlength="50" /></td>
											</tr>
											<tr>
												<td><label for="alamat_supplier">Alamat <span class="required">*</span></label></td>
												<td><input name="alamat_supplier" type="text" class="form-control input-sm" id="alamat_supplier" value="" size="110"
													    maxlength="110" /></td>
											</tr>
											<tr>
												<td><label for="notelp_supplier">No Telepon <span class="required">*</span></label></td>
												<td><input name="notelp_supplier" type="text" class="form-control input-sm" id="notelp_supplier" value="" size="110"
													    maxlength="110" /></td>
											</tr>
										</table>
										<div style="padding:20px 0 0 0px; text-align:center"><input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data" />&nbsp;<input class="btn btn-primary"
											    type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url();?>website/supplier'"
											/></div>
									</form>
								</div>
							</div>
							<?php } elseif ($action == 'edit') { ?>
							<section class="content-header">
								<h1>Edit<small>Supplier</small></h1>
								<ol class="breadcrumb">
									<li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
									<li><a href="<?php echo base_url();?>website/supplier">Supplier</a></li>
									<li class="active">Edit</li>
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
												<form id="formMenu" action="<?php echo site_url();?>website/supplier/edit" method="post" onSubmit="return validate()">
													<input type="hidden" name="id_supplier" value="<?php echo $id_supplier;?>" />
													<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">

											<tr>
												<td><label for="nama_supplier">Nama Supplier <span class="required">*</span></label></td>
												<td><input value="<?php echo $nama_supplier; ?>" name="nama_supplier" type="text" class="form-control input-sm" id="nama_supplier" value="" size="30"
													    maxlength="50" /></td>
											</tr>
											<tr>
												<td><label for="alamat_supplier">Alamat <span class="required">*</span></label></td>
												<td><input value="<?php echo $alamat_supplier; ?>" name="alamat_supplier" type="text" class="form-control input-sm" id="alamat_supplier" value="" size="110"
													    maxlength="110" /></td>
											</tr>
											<tr>
												<td><label for="notelp_supplier">No Telepon <span class="required">*</span></label></td>
												<td><input value="<?php echo $notelp_supplier; ?>" name="notelp_supplier" type="text" class="form-control input-sm" id="notelp_supplier" value="" size="110"
													    maxlength="110" /></td>
											</tr>

													</table>
													<div style="padding:20px 0 0 0px; text-align:center"><input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data" />&nbsp;<input class="btn btn-primary"
														    type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url();?>website/supplier'"
														/></div>
												</form>
											</div>
										</div>
										<?php } ?>