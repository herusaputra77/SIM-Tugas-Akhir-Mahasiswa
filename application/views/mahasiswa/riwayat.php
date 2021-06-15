
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
           <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa/dashboard/')?>">Mahasiswa</a></li>
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
    <table class="table table-hover table-striped">
    <tr>
    <th>No</th>
    <th>Nama Dosen</th>
    <th>Tanggal</th>
    <th>Komentar</th>
    </tr>
    <?php $no=1; foreach($riwayat as $rw):?>
    <tr>
    <td><?= $no++?></td>
    <td><?= $rw['nama']?></td>
    <td><?= date('d F Y', $rw['tgl_komentar']); ?></td>
    <td><?= $rw['komentar']?></td>
  </tr>
  <?php endforeach;?>
    </table>
    </div>
  </section>
</div>