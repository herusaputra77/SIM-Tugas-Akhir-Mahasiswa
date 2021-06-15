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

            <!-- <a href="<?= base_url('assets/file/')?>">lihat</a> -->
          <?php foreach ($berkas as $key => $value) {?>
          <a href="<?= base_url('assets/file/mahasiswa/'.$value['files'])  ?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-download"> Download</i></a>
          <a href=""><?= $value['files']?></a>
          <!-- <form action="<?= base_url('dosen/bimbingan/download')?>" method="post">
              
          <input type="hidden" value="<?= $value['id_bimbingan']?>" name="id_bimbingan">
          <button type="submit" class="btn btn-sm btn-primary mb-2">Download</button>
            </form> -->
          <div class="row">
            <div class="col-sm-6 mt-3">
              <div class="form-group">
                <label>Keterangan Mahasiswa</label>
              <textarea class="form-control" readonly=""><?= $value['keterangan']?></textarea>
              </div>
              <form action="<?= base_url('dosen/bimbingan/tambah_komentar')?>" method="post">
              <input type="hidden" name="id_bimbingan" value="<?= $value['id_bimbingan']?>">
              <input type="hidden" name="redirect_page" value="<?= base_url('dosen/bimbingan/berkas/'.$value['id_bimbingan'])?>">
              <input type="hidden" name="nim" value="<?= base_url('dosen/bimbingan/berkas/'.$value['nim'])?>">
                
              <div class="form-group">
                <label>Komentar</label>
              <textarea class="form-control" name="komentar"></textarea>
              <?php echo form_error('komentar','<div class="text-danger small">','</div>') ?>
              </div>
              
            <button type="submit" class="btn btn-primary btn-sm mb-3">Upload</button>
            </div>
              </form>
          <?php }?>

            
          </div>
        </div>
      </section>
    </div>