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
               <li class="breadcrumb-item"><a href="<?= base_url('pegawai/dashboard/')?>">Dashboard</a></li>
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
        <form action="<?= base_url('pegawai/profile/edit_aksi')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" class="form-control" name="nip" value="<?= $pegawai['nip']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $pegawai['nama']?>">
                </div>
                <div class="form-group">
                    <label for="">No Telpon</label>
                    <input type="text" class="form-control" name="no_telpon" value="<?= $pegawai['telp']?>">
                </div>
                <div class="form-group row">
                <div class="col-sm-2 col-form-label"> <strong>Foto Profile</strong> </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/image/pegawai/') . $pegawai['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-sm btn-success" >Simpan</button>
            </form>
        </div>
      </section>
    </div>