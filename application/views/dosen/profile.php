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
               <li class="breadcrumb-item"><a href="<?= base_url('dosen/dashboard/')?>">Dosen</a></li>
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
                        <strong>Kode Dosen</strong> 
                       <p><?= $dosen['kd_dosen']?></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <strong>Nama</strong> 
                       <p><?= $dosen['nama']?></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <strong>NIP</strong> 
                       <p><?= $dosen['nip']?></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <strong>Keahlian</strong> 
                       <p><?= $dosen['keahlian']?></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <strong>Pangkat</strong> 
                       <p><?= $dosen['pangkat']?></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <strong>Jabatan Fungsional</strong> 
                       <p><?= $dosen['jabatan_fungsional']?></p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <strong>No Telpon</strong> 
                       <p><?= $dosen['telp']?></p>
                        <hr>
                    </div>
                </div>
            <div class="col-md-6">
            <img src="<?= base_url('assets/image/dosen/').$dosen['image']?>" style="width: 50%;" >

            </div>

            </div>
        </div>
      </section>
    </div>