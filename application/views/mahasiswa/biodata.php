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
               <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa/dashboard/')?>">Biodata</a></li>
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
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <ul class="nav nav-pills p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Mahasiswa</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Edit Biodata</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab 3</a></li> -->
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                      <div class="col-sm-6">

                        <div class="form-group">
                          <label for="nim">Nim</label>
                          <input type="text" class="form-control" value="<?= $mahasiswa['nim']?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="nim">Nama</label>
                          <input type="text" class="form-control" value="<?= $mahasiswa['nama']?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="nim">Prodi</label>
                          <input type="text" class="form-control" value="<?= $mahasiswa['prodi']?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="nim">Alamat</label>
                          <input type="text" class="form-control" value="<?= $mahasiswa['alamat']?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="nim">No Telpon</label>
                          <input type="text" class="form-control" value="<?= $mahasiswa['telp']?>" readonly>
                        </div>
                      </div>
                      <!-- col -->
                    </div>
                    <!-- row -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                  <div class="row">
                      <div class="col-sm-6">
                        <form action="<?= base_url('mahasiswa/biodata_mhs/ganti_biodata/')?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="nim">Nim</label>
                          <input type="hidden" name="id_mhs" value="<?= $mahasiswa['id_mhs']?>">
                          <input type="text" name="nim" class="form-control" value="<?= $mahasiswa['nim']?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="nim">Nama</label>
                          <input type="text" name="nama" class="form-control" value="<?= $mahasiswa['nama']?>" >
                        </div>
                        <div class="form-group">
                          <label for="prodi">Prodi</label>
                         <select name="prodi" class="form-control" id="">
                           <option value="<?= $mahasiswa['prodi']?>"><?= $mahasiswa['prodi']?></option>
                           <option value="Teknik Sipil & Bangunan(D3)">Teknik Sipil & Bangunan(D3)</option>
                          <option value="Teknis Sipil & Bangunan(S1)">Teknis Sipil & Bangunan(S1)</option>
                           <option value="Teknik Sipil(S1)">Teknik Sipil(S1)</option>
                         </select>
                        </div>
                        <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <input type="text" name="alamat" class="form-control" value="<?= $mahasiswa['alamat']?>" >
                        </div>
                        <div class="form-group">
                          <label for="no_telpon">No Telpon</label>
                          <input type="text" name="no_telpon" class="form-control" value="<?= $mahasiswa['telp']?>" >
                        </div>
                      </div>
                      <!-- col -->
                      <div class="col-md-6">
                      <div class="form-group row">
                <!-- <div class="col-sm-2 col-form-label"> <strong>Foto Profile</strong> </div> -->
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 mt-4">
                            <center>
                            <img src="<?= base_url('assets/image/mahasiswa/') . $mahasiswa['image']; ?>"  style="height:150%" class="img-thumbnail">
                            </center>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">Ganti Biodata</button>
                </form>
                      <!-- col -->
                    </div>
                    <!-- row -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
      </section>
    </div>