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
               <li class="breadcrumb-item"><a href="<?= base_url('pegawai/dashboard/')?>">Pembimbing</a></li>
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
           <input type="hidden" name="redirect_page" value="<?= base_url('pegawai/pembimbing/mahasiswa/').$this->uri->segment(4)?>">
          <div class="row">
            <?php foreach ($mahasiswa as $key => $value) {?>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Nama :</label>
                <label><?= $value['nama']?></label>
              </div>
              <div class="form-group">
                <label>NIM :</label>
                <label><?= $value['nim']?></label>
              </div>
              <div class="form-group">
                <label>Prodi :</label>
                <label><?= $value['prodi']?></label>
              </div>
              <button type="button" class="btn btn-danger btn-sm" style="width: 100%;" data-toggle="modal" data-target="#modal-sm<?php echo $value['id_mhs']?> ">
                  <i class="fas fa-trash"></i></button>
             <hr>
            </div>
          <?php }?>
            <!-- col -->
          </div>
        </div>
          
      </section>
    </div>
    <?php $no=0; foreach ($mahasiswa as $key => $value) {?>
    <div class="modal fade" id="modal-sm<?= $value['id_mhs']?>">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pegawai/pembimbing/hapus_mhs/')?>" method="post">
                <input type="hidden" name="redirect_page" value="<?= base_url('pegawai/pembimbing/mahasiswa/').$this->uri->segment(4)?>">
                    <input type="hidden" name="id_mhs" value="<?= $value['id_mhs']?>">
                    <p>Apakah anda yakin untuk <b>Menghapus</b> <?= $value['nama']?>?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-sm btn-success">Ya</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </form>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <?php }?>