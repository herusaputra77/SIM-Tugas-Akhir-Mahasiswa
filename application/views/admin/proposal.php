
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
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="card">
<!--               <div class="card-header">
                <h3 class="card-title">Striped Full Width Table</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body p-0">
          <table class="table table-bordered table-hover table-striped" id="mytabel">
          <thead>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nama Pembimbing Akademik</th>
                    <th>Status</th>
                    <th>Judul Skripsi</th>
                    <th>Tanggal Input</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $no=1; foreach($proposal as $ps):?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $ps['nim']?></td>
                        <td><?= $ps['nama_mhs']?></td>
                        <td><?= $ps['nama_dosen']?></td>
                        <td><?= $ps['status']?></td>
                        <td><?= $ps['judul_skripsi']?></td>
                        <td><?= date('d F Y', $ps['tgl_input'])?></td>
                        <td><?php if($ps['status'] == 'Disetujui Pembimbing'){?>
                            <a href="<?= base_url('admin/tugas_akhir/detail_proposal/'.$ps['id_skripsi'])?>" class="btn btn-sm btn-primary">Detail</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalsetuju<?php echo $ps['id_skripsi']?>">Setuju
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-sm<?php echo $ps['id_skripsi']?>">Tolak
                    </button>
                        <?php } else {?>
                            <a href="<?= base_url('admin/tugas_akhir/detail_proposal/'.$ps['id_skripsi'])?>" class="btn btn-sm btn-primary">Detail</a>
                        <?php } ?>
                    </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
          </table>
        </div>
        </div>
      </section>
    </div>
    <?php $no=0; foreach ($status as $key => $value) {?>
    <div class="modal fade" id="modalsetuju<?= $value['id_skripsi']?>">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tugas_akhir/setuju/')?>" method="post">

                    <input type="hidden" name="id_skripsi" value="<?= $value['id_skripsi']?>">
                    <p>Apakah anda yakin untuk <b>SETUJU</b>?</p>
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
    <?php }?>

    <?php $no=0; foreach ($status as $key => $value) {?>
    <div class="modal fade" id="modal-sm<?= $value['id_skripsi']?>">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tugas_akhir/tolak/')?>" method="post">

                    <input type="hidden" name="id_skripsi" value="<?= $value['id_skripsi']?>">
                    <p>Apakah anda yakin untuk <b>MENOLAK</b>?</p>
                    <div class="form-group">
                      <input type="text" class="form-control" name="komentar" placeholder="Beri Komentar...">

                    </div>
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
    <?php }?>