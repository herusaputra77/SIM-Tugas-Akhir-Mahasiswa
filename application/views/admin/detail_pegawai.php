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
               <li class="breadcrumb-item"><a href="<?= base_url('dosen/dashboard/')?>">Dashboard</a></li>
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
              <div class="col-md-2" style="font-weight: bold;">
                  <div>
                      <p for="">Nama </p>
                  </div>
                  <hr>
                  <div>
                      <p for="">Hak Akses </p>
                  </div>
                  <hr>
                  <div>
                      <p for="">NIP </p>
                  </div>
                  <hr>
                  <div>
                      <p for="">No Telpon </p>
                  </div>
                  <hr>
              </div>
              <div class="col-md-0.5" style="font-weight: bold;">
                  <div>
                      <p for="">:</p>
                  </div>
                  <hr>
                  <div>
                      <p for="">:</p>
                    </div>
                    <hr>
                    <div>
                        <p for="">:</p>
                    </div>
                    <hr>
                    <div>
                        <p for="">:</p>
                    </div>
                    <hr>
                  
              </div>
              <div class="col-md-4">
                   <?php foreach ($detail as $key => $value) {?>
                    <div>
                        <p><?= $value['nama']?></p>
                    </div>
                    <hr>
                    <div>
                        <?php if($value['role_id'] == 1){?>
                        <p>Admin</p>
                        <?php }else{?>
                            <p>Pegawai</p>
                            <?php }?>
                    </div>
                    <hr>
                    <div>
                        <p><?= $value['nip']?></p>
                    </div>
                    <hr>
                    <div>
                        <p><?= $value['telp']?></p>
                    </div>
                    <hr>
                   
                    
                </div>
                <div class="col-md-3">
                    <img src="<?= base_url('assets/image/pegawai/').$value['image']?>" style="width: 250px;">
                </div>
            </div>
            <hr>
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-sm<?php echo $value['id_pegawai']?> ">
                <i class="fas fa-edit"></i> Edit</button> <a href="<?= base_url('admin/pegawai')?>" class="btn btn-sm btn-success"> <i class="fas fa-arrow-circle-left"></i> Kembali</a>
                <?php } ?>
          <!-- /.row -->
        </div>
      </section>
    </div>


    <?php $no=0; foreach ($detail as $key => $value) {?>
        <div class="modal fade" id="modal-sm<?= $value['id_pegawai']?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Dosen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= base_url('admin/pegawai/edit_aksi')?>" method="post" >
                  <div class="form-group">
                      <input type="hidden" class="form-control" name="id_pegawai" value="<?= $value['id_pegawai']?>">
                      <input type="hidden" name="redirect_page" value="<?= str_replace('index.php/', '', current_url()); ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Nama Pegawai</label>
                      <input type="text" class="form-control" name="nama" value="<?= $value['nama']?>">
                  </div>
                  <div class="form-group">
                      <label for="">NIP</label>
                      <input type="text" class="form-control" name="nip" value="<?= $value['nip']?>">
                  </div>
                  <div class="form-group">
                    <label>Prodi</label>
                    <select name="prodi" class="form-control" id="">
                      <option value="<?= $value['prodi']?>"><?= $value['prodi']?></option>
                      <?php foreach($prodi as $pd){?>
                      <option value="<?= $pd['nama_prodi']?>"><?= $pd['nama_prodi']?></option>
                      <?php }?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Hak Akses</label>
                    <select name="hak_akses" class="form-control" id="">
                      <option value="<?=$value['role_id']?>"><?php if($value['role_id'] == 1) {
                          echo 'Admin';}else{ echo 'Pegawai';}?></option>
                      <option value="1">Admin</option>
                      <option value="2">Petugas</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                      <label for="">No Telpon</label>
                      <input type="text" class="form-control" name="no_telpon" value="<?= $value['telp']?>">
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <?php }?>