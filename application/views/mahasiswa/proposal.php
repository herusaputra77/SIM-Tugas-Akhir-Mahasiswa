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
               <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa/dashboard/')?>">Tugas Akhir</a></li>
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
            <div class="card">
                <div class="card-body">
                    <h5>Daftar Pengajuan Proposal <a href="<?= base_url('mahasiswa/proposal/daftar')?>" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i></a></h5>
                    <table class="table table-hover">
                        <tr>
                            <th>NO</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $no=1; foreach($proposal as $ps):?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?= $ps['judul_skripsi']?></td>
                            <td><?= date('d F Y', $ps['tgl_input'])?></td>
                            <td><?= $ps['status']?></td>
                            <td><?php if($ps['status'] == 'Draft'){?>
                            <a href="<?= base_url('mahasiswa/proposal/detail/'.$ps['id_skripsi'])?>" class="btn btn-sm btn-success">Lihat</a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-sm<?= $ps['id_skripsi']?>">Validasi
                </button>
                            <a href="<?= base_url('mahasiswa/proposal/ganti/'.$ps['id_skripsi'])?>" class="btn btn-sm btn-warning">Ganti</a>
                            <?php }elseif($ps['status'] == 'Ditolak Pembimbing' || $ps['status'] == 'Ditolak Prodi'  ){?>
                          <a href="<?= base_url('mahasiswa/proposal/detail/'.$ps['id_skripsi'])?>" class="btn btn-sm btn-success">Lihat</a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-sm<?= $ps['id_skripsi']?>">Validasi
                </button>
                            <a href="<?= base_url('mahasiswa/proposal/ganti/'.$ps['id_skripsi'])?>" class="btn btn-sm btn-warning">Ganti</a>
                        <?php } else {?>
                            <a href="<?= base_url('mahasiswa/proposal/detail/'.$ps['id_skripsi'])?>" class="btn btn-sm btn-success">Lihat</a>

                        <?php }?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    </table>


                </div>

            </div>
        </div>
      </section>
    </div>
    <?php $no=0; foreach ($validasi as $key => $value) {?>
    <div class="modal fade" id="modal-sm<?= $value['id_skripsi']?>">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Validasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="<?= base_url('mahasiswa/proposal/validasi')?>" method="post">
              <p>Apakah anda yakin untuk <b>VALIDASI</b>?</p>
              <input type="hidden" name="id_skripsi" value="<?= $value['id_skripsi']?>">
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
    <?php } ?>