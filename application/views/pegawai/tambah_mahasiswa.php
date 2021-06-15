    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?= $judul?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url('pegawai/dashboard/')?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $this->uri->segment(2)?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
                <form method="post" action="<?= base_url('pegawai/mahasiswa/tambah')?>" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>NIM</label>
                    <input type="text" class="form-control" name="nim">
                     <?php echo form_error('nim','<div class="text-danger small">','</div>') ?>
                  </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama">
                    <?php echo form_error('nama','<div class="text-danger small">','</div>') ?>
                  </div>
                  <div class="form-group">
                    <label>Telpon</label>
                    <input type="text" class="form-control" name="telp">
                    <?php echo form_error('telp','<div class="text-danger small">','</div>') ?>
                  </div>
                </div>
                <!-- col-md -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" class="form-control" name="alamat">
                    <?php echo form_error('alamat','<div class="text-danger small">','</div>') ?>
                  </div>
                <div class="form-group">
                    <label>Prodi</label>
                    <select name="prodi" class="form-control">
                      <option value=""><--Pilih Prodi--></option>
                      <?php foreach ($prodi as $key => $value) {?>
                      <option value="<?= $value['nama_prodi']?>"><?= $value['nama_prodi']?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('prodi','<div class="text-danger small">','</div>') ?>
                  </div>
                  <!-- <div class="form-group ">
                  <label class="">Picture</label>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input form-control" id="image" name="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                  </div>
                
                  </div>
                </div> -->
                <!-- col-md -->
                </div>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
              </div>

                </form>
              
            </div>
            
          </div>
        </div>
      </section>
    </div>