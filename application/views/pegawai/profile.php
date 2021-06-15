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
        <?php echo $this->session->flashdata('pesan') ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Nama</strong> 
                       <p><?= $pegawai['nama']?></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <strong>NIP</strong> 
                       <p><?= $pegawai['nip']?></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <strong>No Telpon</strong> 
                       <p><?= $pegawai['telp']?></p>
                        <hr>
                    </div>
                </div>
            <div class="col-md-6">
            <img src="<?= base_url('assets/image/pegawai/').$pegawai['image']?>" style="width: 50%;" >

            </div>

            </div>
        </div>
      </section>
    </div>