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
               <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa/dashboard/')?>">Dashboard</a></li>
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
        <?php echo $this->session->flashdata('pesan') ?>
            <form action="<?= base_url('mahasiswa/biodata_mhs/ganti_psw/')?>" method="post">

                <p align="center">Masukkan Password Baru.</p>
                <div class="form-group">
                    <input type="password" name="password" class="form-control"> 
                    <?php echo form_error('password','<div class="text-danger small">','</div>') ?>
                </div>
                <button type="submit" class="btn btn-sm btn-warning">Ganti Password</button>
            </form>
        </div>
      </section>
    </div>