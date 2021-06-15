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
        <?= $this->session->flashdata('pesan');?>
            <div class="row">
          <?php foreach ($bimbingan1 as $key => $value) {?>
              <div class="col-md-6">
                
          <div class="card card-info mt-2">
              <div class="card-header">
                <h3 class="card-title">Mahasiswa Bimbingan TA</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div>
                    
                      <label>Nama</label>
                      <label>:</label>
                      <label><?= $value['nama']?></label>
                  </div>
                  <div>
                    
                      <label>NIM</label>
                      <label>:</label>
                      <label><?= $value['nim']?></label>
                  </div>
                  <div>
                    
                      <label>Prodi</label>
                      <label>:</label>
                      <label><?= $value['prodi']?></label>
                  </div>
                      <!-- <label><?= $bimbingan->nama_mhs?></label> -->
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="<?= base_url('dosen/bimbingan/detail_bimbingan/').$value['nim']?>" class="btn btn-info btn-sm">Lihat Bimbingan</a>
                </div>
                <!-- /.card-footer -->
            </div>
              </div>
              
            </div>
            <!-- /.card -->
          <?php }?>
            </div>
      </section>
    </div>