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
          <table id="mytabel" class="table table-hover table-striped" id="mytabel">
            <thead>
              <th>NO</th>
              <th>Nama Mahasiswa</th>
              <th>NIM</th>
              <th>Tanggal Bimbingan</th>
              <th>Berkas</th>
              <!-- <th>Aksi</th> -->
            </thead>
            <tbody>
              <?php $no=1; foreach ($detail as $key => $value) {?>
              <tr>
                <td><?= $no++?></td>
                <td><?= $value['nama']?></td>
                <td><?= $value['nim']?></td>
                <td><?= date('d F Y', $value['tgl_bimbingan']); ?></td>
                <td><a href="<?= base_url('dosen/bimbingan/berkas/').$value['id_bimbingan']?>" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> Lihat Berkas</a></td>
                <!-- <td><button type="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></td> -->
              </tr>
            </tbody>
            
            <?php } ?>
          </table>
          <a href="<?= base_url('dosen/bimbingan/export_excel/').$nim['nim']?>" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Export Excel</a>
        </div>
      </section>
    </div>