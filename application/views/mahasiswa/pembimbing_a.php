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
               <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa/dashboard/')?>">Mahasiswa</a></li>
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
        </div>
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pembimbing Akademik</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="row">
                      <?php if(!empty($Pembimbing['id_mahasiswa'])){?>
                        <div class="col-md-12" align="center">
                        <h4>Belum Ada Pembimbing, silahkan tanya <strong>Prodi</strong></h4>
                          
                        </div>
                        <?php }else{ ?>
                    <div class="col-md-3">
                     <img src="<?= base_url('assets/image/dosen/').$pembimbing_pa['image']?>" style="width: 100px;">
                    </div>
                    <div class="col-md-9">
                      <div class="">
                      <label>Nama</label>
                      <label>:</label>
                      <label><?= $pembimbing_pa['nama']?></label>  
                      </div>
                      <div class="">
                      <label>NIP</label>
                      <label>:</label>
                      <label><?= $pembimbing_pa['nip']?></label>  
                      </div>
                      <?php } ?>
                    </div>
                    
                </div>
                  </div>
                  <div>

                    
                  </div>
                <!-- /.card-body -->
                  <?php if(empty($pembimbing['id_mahasiswa'])){?>
                  <?php }else{?>
                <div class="card-footer">
                  <!-- <form action="<?= base_url('mahasiswa/pembimbing/bimbingan/')?>" method="post">
                    <input type="hidden" name="nama" value="<?= $pembimbing['nama']?>">
                    <input type="hidden" name="nip" value="<?= $pembimbing['nip']?>">
                    <input type="hidden" name="id_dosen" value="<?= $pembimbing['id_dosen']?>">
                    <input type="hidden" name="id_mahasiswa" value="<?= $pembimbing['id_mahasiswa']?>">
                  <button type="submit" class="btn btn-sm btn-success">Bimbingan</button>
                  </form> -->

                  <a href="<?= base_url('mahasiswa/pembimbing/bimbingan/')?>" class="btn btn-sm btn-success">Bimbingan</a>
                </div>
                <?php } ?>
            </div>
            <!-- /.card -->

          <!-- </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pembimbing II</small></h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <div class="card-body">
                 <div class="row">
                    <div class="col-md-3">
                      
                     <img src="<?= base_url('assets/image/dosen/').$pembimbing2['image']?>" style="width: 100px;">
                    </div>
                    <div class="col-md-9">
                      <div class="">
                      <label>Nama</label>
                      <label>:</label>
                      <label><?= $pembimbing2['nama']?></label>  
                      </div>
                      <div class="">
                      <label>NIP</label>
                      <label>:</label>
                      <label><?= $pembimbing2['nip']?></label>  
                      </div>
                    </div>
                    
                </div>
                  </div>
                  <div> -->
                <!-- /.card-body -->
                <!-- <div class="card-footer">
                  <a href="<?= base_url('mahasiswa/pembimbing/bimbingan2/')?>" class="btn btn-sm btn-success">Bimbingan</a>
                </div> -->
            </div>
            <!-- /.card -->
            
          </div>
        </div>
      </section>
    </div>