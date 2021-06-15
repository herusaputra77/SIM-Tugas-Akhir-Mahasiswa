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
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <ul class="nav nav-pills p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Dosen Akademik</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Dosen Tugas Akhir</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab 3</a></li> -->
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                      <div class="col-sm-12">
                      <table id="mytabel" class="table table-hover table-striped" id="mytabel">
            <thead>
              <th>NO</th>
              <th>Nama Mahasiswa</th>
              <th>NIM</th>
              <th>Tanggal Input</th>
              <th>Status</th>
              <th>Berkas</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $no=1; foreach ($proposal as $key => $value) {?>
              <tr>
                <td><?= $no++?></td>
                <td><?= $value['nama']?></td>
                <td><?= $value['nim']?></td>
                <td><?= date('d F Y',$value['tgl_input']) ?></td>
                <td><?= $value['status']?></td>
                <td><a href="<?= base_url('assets/file/proposal/'.$value['file'])?>"><i class="fas fa-eye"></i></a></td>
                <td>
                  <?php if($value['status'] == 'Draft' || $value['status']== 'Diajukan')  { ?>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalsetuju<?php echo $value['id_skripsi']?>">Setuju
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-sm<?php echo $value['id_skripsi']?>">Tolak
                </button>
                <?php }else if($value['status'] == 'Ditolak Pembimbing'){?>
                <a href="<?= base_url('dosen/bimbingan/proposal_ditolak_pa/').$value['id_skripsi']?>" class="btn btn-sm btn-primary">Detail</a>
                  <?php }else{ ?>

                    <?php }?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            
          </table>
                      </div>
                      <!-- col -->
                    </div>
                    <!-- row -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                  <div class="row">
                      <div class="col-sm-12">
                      <table id="mytabel" class="table table-hover table-striped" id="mytabel">
            <thead>
              <th>NO</th>
              <th>Nama Mahasiswa</th>
              <th>NIM</th>
              <th>Tanggal Input</th>
              <th>Status</th>
              <th>Berkas</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $no=1; foreach ($proposal_ta as $key => $value) {?>
              <tr>
                <td><?= $no++?></td>
                <td><?= $value['nama']?></td>
                <td><?= $value['nim']?></td>
                <td><?= date('d F Y',$value['tgl_input']) ?></td>
                <td><?= $value['status']?></td>
                <td><a href="<?= base_url('assets/file/proposal_ta/'.$value['file'])?>"><i class="fas fa-eye"></i></a></td>
                <td>
                  <a href="<?= base_url('dosen/bimbingan/detail_proposal_ta/').$value['id_skripsi']?>" class="btn btn-sm btn-primary">Detail</a>
                  <?php if($value['status'] == 'Draft' || $value['status']== 'Diajukan')  { ?>

                <?php }else if($value['status'] == 'Ditolak Pembimbing'){?>
                  <?php }else{ ?>

                    <?php }?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            
          </table>
                      </div>
                      <!-- col -->
                      <div class="col-md-6">
                      </div>
                      <!-- col -->
                    </div>
                    <!-- row -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    
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

    <?php $no=0; foreach ($proposal as $key => $value) {?>
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
                <form action="<?= base_url('dosen/bimbingan/setuju/')?>" method="post">

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

    <?php $no=0; foreach ($proposal as $key => $value) {?>
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
                <form action="<?= base_url('dosen/bimbingan/tolak/')?>" method="post">

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