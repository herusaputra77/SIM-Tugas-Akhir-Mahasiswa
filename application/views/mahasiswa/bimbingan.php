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
        <?php
          if(isset($error ))
          {
            echo "ERORR";
            print_r($error);
          }?>
           <?php echo $this->session->flashdata('pesan') ?>
            <form action="<?= base_url('mahasiswa/pembimbing/bimbingan/')?>" method="post" enctype="multipart/form-data">
          <div class="row"> 
            <div class="col-sm-6">
              <div class="form-group">
                 <label>Keterangan</label>
                 <textarea class="form-control" name="ket" rows="3" placeholder="Tulis Komentar...."></textarea>
                 <input type="hidden" name="id_dosen" value="<?= $pembimbing['id_dosen']?>">
                 <input type="hidden" name="id_mahasiswa" value="<?= $pembimbing['id_mahasiswa']?>">
                 <input type="hidden" name="nip" value="<?= $pembimbing['nip']?>">
                 <input type="hidden" name="nim" value="<?= $pembimbing['nim']?>">
                </div>
                <?php echo form_error('ket','<div class="text-danger small">','</div>') ?>
              <div class="form-group">
                <label class="">File Skripsi</label>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input form-control" name="file">
                      <label class="custom-file-label" for="file">Pilih file</label>
                  </div>
                  <?php echo form_error('file','<div class="text-danger small">','</div>') ?>
                 
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Upload</button>
            </div>
            </div>
            </form>
            <p>Catatan : File yang di Upload harus dalam bentuk PDF!!!</p>
          </div>
        </section>
    </div>