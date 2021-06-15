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
               <li class="breadcrumb-item"><a href="<?= base_url('dosen/dashboard/')?>">Pembimbing</a></li>
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
          <form action="<?= base_url('admin/pembimbing/tambah_pembimbing_pa/')?>" method="post">
            
          <div class="form-group">
            <label>Pilih Dosen</label>
            <select class="form-control" name="dosen">
              <option value=""><--Pilih Dosen--></option>
                <?php foreach ($dosen as $key => $value){?>
                <option value="<?= $value['id_dosen']?>"><?= $value['nama']?></option>
                <hr>
              <?php }?>
            </select>
           <?php echo form_error('dosen','<div class="text-danger small">','</div>') ?>
            
          </div>
          <div class="form-group">
            <label>Pilih Mahasiswa</label>
            <select class="form-control" name="mahasiswa">
              <option value=""><--Pilih Mahasiswa--></option>
                <?php foreach ($mahasiswa as $key => $value){?>
                <option value="<?= $value['id_mhs']?>">
                  <?= $value['nama']?></option>
                <hr>
              <?php }?>
                
            </select>
            
           <?php echo form_error('mahasiswa','<div class="text-danger small">','</div>') ?>
          </div>
          <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"> Simpan</i></button>
          </form>
        </div>
      </section>
    </div>