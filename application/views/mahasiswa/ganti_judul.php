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
               <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa/dashboard/')?>">Beranda</a></li>
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
          <?php
          if(isset($error ))
          {
            echo "ERORR";
            print_r($error);
          }?>
        
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('mahasiswa/proposal/update_skripsi')?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5>Judul</h5>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="hidden" name="id_skripsi" value="<?= $proposal['id_skripsi']?>">
                                <textarea name="judul_skripsi" id=""  class="form-control" cols="30" value="<?= $proposal['judul_skripsi']?>"><?= $proposal['judul_skripsi']?></textarea>
                            </div>
                            <?php echo form_error('judul_skripsi','<div class="text-danger small">','</div>') ?>
                        </div>
                        <div class="col-sm-4">
                            <h5>File</h5>
                        </div>
                        <div class="col-sm-8">
                        <div class="form-group ">
                          
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" id="image" name="file">
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                        </div>
                        <?php echo form_error('file','<div class="text-danger small">','</div>') ?>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary" class="text-right">Simpan</button>
                        </div>
                        <p>Catatan: Pastikan file anda pdf dan nama file anda benar!!!</p>
                        
                        </div>
                            
                        </div>
                        <!-- card body -->
                        <div class="card-footer">
                            </form>
                            </div>
                        </div>

            </div>
        </div>
    </section>
</div>