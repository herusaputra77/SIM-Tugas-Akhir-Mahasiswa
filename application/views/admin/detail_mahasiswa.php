

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
                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard/')?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $this->uri->segment(2)?></li>
                <li class="breadcrumb-item active"><?= $this->uri->segment(3)?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-md-1" style="font-weight: bold;">
                  <div>
                      <p for="">Nama </p>
                  </div>
                  <hr>
                  <div>
                      <p for="">NIM </p>
                  </div>
                  <hr>
                  <div>
                      <p for="">Alamat </p>
                  </div>
                  <hr>
                  <div>
                      <p for="">Prodi </p>
                  </div>
                  <hr>
                  <div>
                      <p for="">No Telpon </p>
                  </div>
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
                  <div>
                      <p for="">:</p>
                  </div>

              </div>
              <div class="col-md-6">
                   <?php foreach ($mahasiswa as $key => $value) {?>
                    <div>
                        <p><?= $value['nama']?></p>
                    </div>
                    <hr>
                    <div>
                        <p><?= $value['nim']?></p>
                    </div>
                    <hr>
                    <div>
                        <p><?= $value['alamat']?></p>
                    </div>
                    <hr>
                    <div>
                        <p><?= $value['prodi']?></p>
                    </div>
                    <hr>
                    <div>
                        <p><?= $value['telp']?></p>
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <img src="<?= base_url('assets/image/dosen/').$value['image']?>" style="width: 250px;">
                </div>
            </div>
            <hr>
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-sm<?php echo $value['id_mhs']?> ">
                <i class="fas fa-edit"></i> Edit</button> <a href="<?= base_url('admin/mahasiswa')?>" class="btn btn-sm btn-success"> <i class="fas fa-arrow-circle-left"></i> Kembali</a>
                <?php } ?>
          <!-- /.row -->
          <!-- Main row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php $no=0; foreach ($mahasiswa as $key => $value) {?>
        <div class="modal fade" id="modal-sm<?= $value['id_mhs']?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Dosen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= base_url('admin/mahasiswa/edit_aksi')?>" method="post" >
                  <div class="form-group">
                      <input type="hidden" class="form-control" name="id_mhs" value="<?= $value['id_mhs']?>">
                      <input type="hidden" name="redirect_page" value="<?= str_replace('index.php/', '', current_url()); ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Nama Dosen</label>
                      <input type="text" class="form-control" name="nama" value="<?= $value['nama']?>">
                  </div>
                  <div class="form-group">
                      <label for="">NIP</label>
                      <input type="text" class="form-control" name="nim" value="<?= $value['nim']?>">
                  </div>
                  <div class="form-group">
                      <label for="">Alamat</label>
                      <input type="text" class="form-control" name="alamat" value="<?= $value['alamat']?>">
                  </div>
                  <div class="form-group">
                      <label for="">Prodi</label>
                  <select name="prodi" class="form-control">
                      <option value="<?= $value['prodi']?>"><?= $value['prodi']?></option>
                      <?php foreach ($prodi as $key => $value) {?>
                      <option value="<?= $value['nama_prodi']?>"><?= $value['nama_prodi']?></option>
                      <?php } ?>
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
   