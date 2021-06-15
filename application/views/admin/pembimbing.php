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
          <table class="table table-hover table-striped table-bordered" id="mytabel">
            <thead>
              <th>NO</th>
              <th>Nama Pembimbing</th>
              <th>NIP</th>
              <th>Image</th>
              <th>Jumlah <br> Mahasiswa</th>
              <th>Mahasiswa</th>
            </thead>
            <tbody>
              <?php $no=1; foreach ($pembimbing as $key => $value) {?>
              <tr>
                <td><?= $no++?></td>
                <td><?= $value['nama']?></td>
                <td><?= $value['nip']?></td>
                <td><img src="<?= base_url('assets/image/dosen/').$value['image']?>" style="width: 100px;"></td>
                <td><?= $value['jml_mahasiswa']?></td>
                <td><a href="<?= base_url('admin/pembimbing/mahasiswa/'). $value['id_dosen']?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> Lihat Mahasiswa</a></td>
              </tr>
            <?php }?>
            </tbody>
            
          </table>
          <a href="<?= base_url('admin/pembimbing/tambah_pembimbing/')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pembimbing</a>
          <a href="<?= base_url('admin/pembimbing/export_excel')?>" class="btn btn-sm btn-success"> <i class="fas fa-download"></i> Export Excel</a>
        </div>
      </section>
    </div>

    