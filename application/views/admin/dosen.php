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
          <a href="<?= base_url('admin/dosen/tambah/')?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-plus"> Tambah</i></a>
           <div class="">
<!--               <div class="card-header">
                <h3 class="card-title">Striped Full Width Table</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body p-0">
          <table class="table table-bordered table-hover table-striped" id="mytabel">
            <thead>
              <th>No</th>
              <th>Kode Dosen</th>
              <th>Nama</th>
              <th>NIP</th>
              <th>Telp</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $no=1; foreach ($dosen as $key => $ds) {?>
              <tr>
                <td><?= $no++?></td>
                <td><?= $ds->kd_dosen?></td>
                <td><?= $ds->nama?></td>
                <td><?= $ds->nip?></td>
                <td><?= $ds->telp?></td>
                <td><img src="<?= base_url('assets/image/dosen/').$ds->image?>" style="width: 50px;"></td>
                <td>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-sm<?php echo $ds->id_dosen?> ">
                  <i class="fas fa-trash"></i></button>
                  <a href="<?= base_url('admin/dosen/detail_dosen/').$ds->id_dosen?>" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a>
                </td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
        </div>
      </section>
    </div>

    <?php $no=0; foreach ($dosen as $key => $value) {?>
    <div class="modal fade" id="modal-sm<?= $value->id_dosen?>">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/dosen/hapus/')?>" method="post">

                    <input type="hidden" name="id_dosen" value="<?= $value->id_dosen?>">
                    <p>Apakah anda yakin untuk <b>Menghapus</b> <?= $value->nama?>?</p>
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