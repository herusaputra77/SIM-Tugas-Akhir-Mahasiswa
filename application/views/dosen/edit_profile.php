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
                <li class="breadcrumb-item active">edit profile</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <form action="<?= base_url('dosen/profile/edit_aksi')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Kode Dosen</label>
                    <input type="text" class="form-control" name="kd_dosen" value="<?= $dosen['kd_dosen']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $dosen['nama']?>">
                </div>
                <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" class="form-control" name="nip" value="<?= $dosen['nip']?>">
                </div>
                <div class="form-group">
                    <label for="">Keahlian</label>
                    <input type="text" class="form-control" name="keahlian" value="<?= $dosen['keahlian']?>">
                </div>
                <div class="form-group">
                    <label for="">Pangkat</label>
                    <input type="text" class="form-control" name="pangkat" value="<?= $dosen['pangkat']?>">
                </div>
                <div class="form-group">
                    <label for="">Jabatan Fungsional</label>
                    <select name="jabatan_fungsional" class="form-control" id="">
                        <option value="<?= $dosen['jabatan_fungsional']?>"><?= $dosen['jabatan_fungsional']?></option>
                        <?php foreach($jabatan as $jb){?>}
                        <option value="<?= $jb['jabatan']?>"><?= $jb['jabatan']?></option>
                        <?php } ?>
                    </select>
                <div class="form-group">
                    <label for="">No Telpon</label>
                    <input type="text" class="form-control" name="no_telpon" value="<?= $dosen['telp']?>">
                </div>
                <div class="form-group row">
                <div class="col-sm-2 col-form-label"> <strong>Foto Profile</strong> </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/image/dosen/') . $dosen['image']; ?>" class="img-thumbnail">
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