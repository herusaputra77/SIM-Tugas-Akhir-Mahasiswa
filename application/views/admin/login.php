    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper hold-transition login-page" style="background-image: url('<?php echo base_url()?>assets/image/background/OF18O70.jpg'); background-size:cover">
      <section class="content" style="padding: auto ; ">
      <div class="container">
        <div class="login-box">
  <div class="card">
    <div class="card-tittle">

      <h2 align="center" style="font-family: times new roman;">Login Pegawai</h2>
    </div>
    <div class="card-body ">
       <?php echo $this->session->flashdata('pesan') ?>

      <form action="<?= base_url('admin/auth/login/')?>" method="post">
        <div class="input-group mb-2">
          <input type="text" class="form-control" name="nip" placeholder="NIP">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-university"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('nip','<div class="text-danger small">','</div>') ?>
        <div class="input-group mb-2">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('password','<div class="text-danger small">','</div>') ?>
        <div class="row">
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-sign-in-alt"></i> Sign In</button>
          </div>
          <div class="col-md-6">
            <a href="<?= base_url('dashboard')?>" class="btn btn-warning btn-sm btn-block"><i class="fas fa-times "></i> Batal</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
      </div>
    </section>
      
    </div>