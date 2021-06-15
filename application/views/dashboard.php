

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image: url('<?php echo base_url()?>assets/image/background/bg1.jpg'); opacity:10px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Top Navigation <small>Example 3.0</small></h1>
          </div> -->
          <!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            
             <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" >
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                  <div align="center" class="carousel-item active">
                    <img src="<?= base_url()?>assets/image/logo/LOGO UNIVERSITAS NEGERI PADANG.png" class="" alt="..." style="width: 30%; height: 300px; transition: transform 5s ease, opacity .5s ease-out; ">
                    <div class="carousel-caption d-none d-md-block">
                      <!-- <h5>First slide label</h5>
                      <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="<?= base_url()?>assets/image/slider/gedung_unp.jpeg" class="d-block w-100" alt="..." style="width: 100%; height: 300px; transition: transform 5s ease, opacity .5s ease-out">
                    <div class="carousel-caption d-none d-md-block">
                      <!-- <h5>Second slide label</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="<?= base_url()?>assets/image/slider/ts.jpeg" class="d-block w-100" alt="..." style="width: 100%; height: 300px;"  >
                    <div class="carousel-caption d-none d-md-block">
                      <!-- <h5 style="text-shadow: 10px;">Fakultas Teknik Sipil</h5>
                      <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="<?= base_url()?>assets/image/slider/ts2.jpeg" class="d-block w-100" alt="..." style="width: 100%; height: 300px;"  >
                    <div class="carousel-caption d-none d-md-block">
                      <!-- <h5>Third slide label</h5>
                      <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
          </div>
        </div>
        <!-- /slider -->
        <div class="row mt-3">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>
          </div>
          <!-- col -->
          
        </div>
        <!-- /row -->
        <center>
        <h3 class="" style="font-family: 'Times New Roman', Times, serif;">Sistem Informasi Teknik Sipil</h3><br>  
        </center>
        <div class="row" style="font-family: 'Times New Roman', Times, serif;">
          <div class="col-md-4" >
            <center>
              <i class="fas fa-user fa-5x mb-2"></i><br>
              <a href="<?= base_url('mahasiswa/auth/')?>" class="btn btn-sm btn-success">Login Mahasiswa</a>
            </center>
          </div>
          <div class="col-md-4" >
            <center>
              <i class="far fa-user fa-5x mb-2"></i><br>
              <a href="<?= base_url('dosen/auth/')?>" class="btn btn-sm btn-success">Login Dosen</a>
            </center>
          </div>
          <div class="col-md-4" >
            <center>
              <i class="fas fa-university fa-5x mb-2"></i><br>
              <a href="<?= base_url('admin/auth/')?>" class="btn btn-sm btn-success">Login Pegawai</a>
            </center>
          </div>
         
        </div><br>
        <!-- row -->
        
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

 <!-- <script type="text/javascript">
   $('.carousel').carousel({
    transition: transform 2s ease,
     opacity .5s ease-out
   });
 </script> -->