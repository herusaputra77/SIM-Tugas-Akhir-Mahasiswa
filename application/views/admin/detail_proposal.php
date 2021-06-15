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
               <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard/')?>">Tugas Akhir</a></li>
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
        <div class="form-group">
                <label for="">Judul Skripsi</label>
                <textarea name="" id="" class="form-control" cols="10" value="<?= $proposal['judul_skripsi']?>"readonly ><?= $proposal['judul_skripsi']?></textarea>
            </div>
            <div>
            <label for="">Nama Berkas :</label><br>
              <a href="<?= base_url('assets/file/proposal/'.$proposal['file'])?>" class="btn btn-sm btn-success"><?= $proposal['file']?></a><br>
            <object data='<?= base_url('assets/file/proposal/'.$proposal['file'])?>' type='application/pdf' width='100%' height='300'></object>
            </div>
        </div>
      </section>
    </div>