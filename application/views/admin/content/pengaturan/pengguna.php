<?php if ($action == 'view' || empty($action)){ ?>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/popup/jquery.mousewheel-3.0.4.pack.js"></script>
<section class="content-header">
  <h1>Pengguna<small></small></h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pengguna</li>
  </ol>
</section>
<!-- Main content -->
<?php 
if($admin->admin_level_kode == 1) { ?>
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
            <div class="bttns_add">
              <ul>
                <li><a class="addbttn last" href="<?php echo site_url();?>pengaturan/pengguna/tambah">Tambah Pengguna</a></li>
              </ul>
            </div>
            <div class="bttns_clear">
              <ul>
                <li><a class="clrttn last" href="<?php echo site_url();?>pengaturan/pengguna">Bersihkan Pencarian</a></li>
              </ul>
            </div>
          </div>
          <form action="" method="post" id="table">
            <table class="example1">
              <tr>
                <td height="25"><span class="judul_cari">Cari Pengguna Berdasarkan : </span>
                  <?php array_pilihan('cari', $berdasarkan, $cari);?> &nbsp; <input type="text" name="q" class="text" size="40" value="<?php echo $q;?>" /><input type="submit"
                    name="kirim" class="seach" value="" /></td>
              </tr>
            </table>
          </form>
        </div>
        <div class="box-body table-responsive">
          <table class="table table-bordered table-striped" id="example1">
            <thead>
              <tr>
                <th width="30">#</th>
                <th width="200">USERNAME</th>
                <th width="200">NAMA LENGKAP</th>
                <th width="150">TELEPON</th>
                <th width="150">KELOMPOK</th>
                <th width="100"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
	$i	= $page+1;
	$where_admin['admin_status']	= 'A';
	$like_admin[$cari]			= $q;
	if ($jml_data > 0){
	foreach ($this->ADM->grid_all_admin('', 'admin_level_nama', 'ASC', $batas, $page, $where_admin, $like_admin) as $row){
	?>
              <tr>
                <td align="center">
                  <?php echo $i;?>
                </td>
                <td>
                  <?php echo $row->admin_user;?>
                </td>
                <td>
                  <?php echo $row->admin_nama;?>
                </td>
                <td>
                  <?php echo $row->admin_telepon;?>
                </td>
                <td>
                  <?php echo $row->admin_level_nama;?>
                </td>
                <td align="center"><a href="<?php echo site_url();?>pengaturan/pengguna/edit/<?php echo $row->admin_user;?>" class="edit" title="edit"></a>
                  <a
                    href="<?php echo site_url();?>pengaturan/pengguna/hapus/<?php echo $row->admin_user;?>" class="delete"
                    title="Hapus" onclick="return confirm('Apakah anda yakin? \nAkan menghapus pengguna `<?php echo $row->admin_nama;?>`.');"></a>
                </td>
              </tr>
              <?php 
	$i++; 
	} 
	} else { 
	?>
              <tr>
                <td colspan="7">Belum ada data!.</td>
              </tr>
              <?php } ?>
              <?php 
                    if($admin->admin_level_kode == 1) { ?>
              <tr>
                <th colspan="7" align="left">TOTAL :
                  <?php echo $jml_data_admin;?><span id="pages"><?php if ($jml_halaman > 1){ echo pages($halaman, $jml_halaman, 'pengaturan/pengguna/view', $id=""); }?></span></th>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <?php } else { ?>
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
           
          </div>
          
        </div>
        <div class="box-body table-responsive">
          <table class="table table-bordered table-striped" id="example1">
            <thead>
              <tr>
                <th width="30">#</th>
                <th width="200">USERNAME</th>
                <th width="200">NAMA LENGKAP</th>
                <th width="150">TELEPON</th>
                <th width="150">KELOMPOK</th>
                <th width="100"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
	$i	= $page+1;
	$where_admin['admin_user']	= $admin->admin_user;
	$like_admin[$cari]			= $q;
	if ($jml_data > 0){
	foreach ($this->ADM->grid_all_admin('', 'admin_level_nama', 'ASC', $batas, $page, $where_admin, $like_admin) as $row){
	?>
              <tr>
                <td align="center">
                  <?php echo $i;?>
                </td>
                <td>
                  <?php echo $row->admin_user;?>
                </td>
                <td>
                  <?php echo $row->admin_nama;?>
                </td>
                <td>
                  <?php echo $row->admin_telepon;?>
                </td>
                <td>
                  <?php echo $row->admin_level_nama;?>
                </td>
                <td align="center"><a href="<?php echo site_url();?>pengaturan/pengguna/edit/<?php echo $row->admin_user;?>" class="edit" title="edit"></a>
                  
                </td>
              </tr>
              <?php 
	$i++; 
	} 
	} else { 
	?>
              <tr>
                <td colspan="7">Belum ada data!.</td>
              </tr>
              <?php } ?>
              <tr>
                <th colspan="7" align="left">TOTAL :
                  <?php echo $jml_data2;?><span id="pages"><?php if ($jml_halaman > 1){ echo pages($halaman, $jml_halaman, 'pengaturan/pengguna/view', $id=""); }?></span></th>
              </tr>
            </tbody>
          </table>
        </div>
        <?php } ?>
        <?php } elseif ($action == 'tambah') { ?>
        <section class="content-header">
          <h1>Tambah<small>Pengguna</small></h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url();?>pengaturan/pengguna">Pengguna</a></li>
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
                  <form id="formMenu" action="<?php echo site_url();?>pengaturan/pengguna/tambah" method="post" onSubmit="return validate()">
                    <input type="hidden" name="admin_user" value="<?php echo $admin_user;?>" />
                    <table border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
                      <tr>
                        <td><label for="admin_user">Username <span class="required">*</span></label></td>
                        <td><input name="admin_user" type="text" class="form-control input-sm" id="admin_user" value="<?php echo $admin_user; ?>"
                          /></td>
                      </tr>
                      <tr>
                        <td width="130"><label for="admin_pass">Password <span class="required">*</span></label></td>
                        <td><input name="admin_pass" type="password" class="form-control input-sm" id="admin_pass" value="<?php echo $admin_pass; ?>"
                          /></td>
                      </tr>
                      <tr>
                        <td width="130"><label for="admin_nama">Nama Lengkap <span class="required">*</span></label></td>
                        <td><input name="admin_nama" type="text" id="admin_nama" class="form-control input-sm" value="<?php echo $admin_nama; ?>"
                            size="30" maxlength="30" /></td>
                      </tr>
                      <tr>
                        <td width="130"><label for="admin_alamat">Alamat <span class="required">*</span></label></td>
                        <td><input name="admin_alamat" type="text" id="admin_alamat" class="form-control input-sm" value="<?php echo $admin_alamat; ?>"
                            size="50" maxlength="255" /></td>
                      </tr>
                      <tr>
                        <td width="130"><label for="admin_telepon">Telepon <span class="required">*</span></label></td>
                        <td><input name="admin_telepon" type="text" class="form-control input-sm" id="admin_telepon" value="<?php echo $admin_telepon; ?>"
                            size="15" maxlength="15" /></td>
                      </tr>
                      <tr>
                        <td><label for="admin_level_kode">Kelompok <span class="required">*</span></label></td>
                        <td>
                          <?php $this->ADM->combo_box("SELECT * FROM admin_level WHERE admin_level_status='A' AND admin_level_nama!='Public'", 'admin_level_kode', 'admin_level_kode', 'admin_level_nama', $admin_level_kode,'submit();');?>
                        </td>
                      </tr>
                    </table>
                    <div style="padding:20px 0 0 0px; text-align:center"><input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data" />&nbsp;<input class="btn btn-primary"
                        type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url();?>pengaturan/pengguna'"
                      /></div>
                  </form>
                </div>
              </div>
              <?php } elseif ($action == 'edit') { ?>
              <section class="content-header">
                <h1>Edit<small>Pengguna</small></h1>
                <ol class="breadcrumb">
                  <li><a href="<?php echo base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="<?php echo base_url();?>pengaturan/pengguna">Pengguna</a></li>
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
                        <form id="formMenu" action="<?php echo site_url();?>pengaturan/pengguna/edit" method="post" onSubmit="return validate()">
                          <input type="hidden" name="admin_user" value="<?php echo $admin_user;?>" />
                          <table border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
                            <tr>
                              <td><label for="admin_user">Username <span class="required">*</span></label></td>
                              <td><input name="admin_user" type="text" class="form-control input-sm" id="admin_user" value="<?php echo $admin_user; ?>"
                                  readonly="readonly" /></td>
                            </tr>
                            <tr>
                              <td width="130"><label for="admin_pass">Password <span class="required">*</span></label></td>
                              <td><input name="admin_pass" type="password" class="form-control input-sm" id="admin_pass" value=""
                                /></td>
                            </tr>
                            <tr>
                              <td width="130"><label for="admin_nama">Nama Lengkap <span class="required">*</span></label></td>
                              <td><input name="admin_nama" type="text" class="form-control input-sm" id="admin_nama" value="<?php echo $admin_nama; ?>"
                                  size/></td>
                            </tr>
                            <tr>
                              <td width="130"><label for="admin_alamat">Alamat <span class="required">*</span></label></td>
                              <td><input name="admin_alamat" type="text" class="form-control input-sm" id="admin_alamat" value="<?php echo $admin_alamat; ?>"
                                  size="50" maxlength="255" /></td>
                            </tr>
                            <tr>
                              <td width="130"><label for="admin_telepon">Telepon <span class="required">*</span></label></td>
                              <td><input name="admin_telepon" type="text" class="form-control input-sm" id="admin_telepon" value="<?php echo $admin_telepon; ?>"
                                /></td>
                            </tr>
                            <tr>
                              <td><label for="admin_level_kode">Kelompok <span class="required">*</span></label></td>
                              <td>
                                <?php $this->ADM->combo_box("SELECT * FROM admin_level WHERE admin_level_status='A'", 'admin_level_kode', 'admin_level_kode', 'admin_level_nama', $admin_level_kode, 'submit();');?>
                              </td>
                            </tr>
                          </table>
                          <div style="padding:20px 0 0 0px; text-align:center"><input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data" />&nbsp;<input class="btn btn-primary"
                              type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url();?>pengaturan/pengguna'"
                            /></div>
                        </form>
                      </div>
                    </div>
<?php } ?>