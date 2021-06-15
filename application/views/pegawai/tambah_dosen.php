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
                <form method="post" action="<?= base_url('pegawai/dosen/tambah')?>" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kode Dosen</label>
                    <input type="text" class="form-control" name="kd_dosen">
                     <?php echo form_error('kd_dosen','<div class="text-danger small">','</div>') ?>
                  </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama">
                    <?php echo form_error('nama','<div class="text-danger small">','</div>') ?>
                  </div>
                <div class="form-group">
                    <label>Bidang Keahlian</label>
                    <input type="text" class="form-control" name="keahlian">
                    <?php echo form_error('nama','<div class="text-danger small">','</div>') ?>
                  </div>
                <div class="form-group">
                    <label>Pangkat</label>
                    <input type="text" class="form-control" name="pangkat">
                    <?php echo form_error('nama','<div class="text-danger small">','</div>') ?>
                  </div>
                  
                  
                </div>
                <!-- col-md -->
                <div class="col-md-6">
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip">
                    <?php echo form_error('nip','<div class="text-danger small">','</div>') ?>
                  </div>
                      <div class="form-group">
                        <label>Jabatan Fungsional</label>
                       <select name="jabatan_fungsional" class="form-control" id="">
                         <option value=""><--Pilih Jabatan--></option>
                         <?php $no=1; foreach ($jabatan as $key => $value) {?>
                          
                          <option value="<?= $value['jabatan']?>"><?= $value['jabatan']?></option>
                         <?php } ?>
                       </select>
                        <?php echo form_error('telp','<div class="text-danger small">','</div>') ?>
                      </div>
                      <div class="form-group">
                        <label>Telpon</label>
                        <input type="text" class="form-control" name="telp">
                        <?php echo form_error('telp','<div class="text-danger small">','</div>') ?>
                      </div>
                  <!-- <div class="form-group ">
                  <label class="">Picture</label>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input form-control" id="image" name="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                  </div>
                
                  </div> -->
                </div>
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