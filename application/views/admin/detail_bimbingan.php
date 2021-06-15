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
        <table class="table table-bordered table-hover table-striped" id="mytabel">
            <thead>
              <th>No</th>
              <th>Nama Mahasiswa</th>
              <th>Nama Dosen</th>
              <th>Keterangan</th>
              <th>Tanggal Bimbingan</th>
            </thead>
             <tbody>
              <?php $no=1; foreach ($bimbingan as $key => $value) { ?>
              <tr>
                  <td><?= $no++?></td>
                  <td><?= $value['nama_mhs']?></td>
                  <td><?= $value['nama']?></td>
                  <td><?= $value['keterangan']?></td>
                  <td><?= date('d F Y', $value['tgl_bimbingan'])?></td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
      </section>
    </div>