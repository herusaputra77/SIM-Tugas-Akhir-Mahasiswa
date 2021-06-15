<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?= base_url()?>assets/image/logo/LOGO UNIVERSITAS NEGERI PADANG.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="" style="font-weight: 15px;">Portal Dosen</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('assets/image/dosen/').$dosen['image']?>" style="width: 70px; border-radius: 2px; border-color: blue;" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $dosen['nama']?></a>
          </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item ">
                 <a href="<?= base_url('dosen/dashboard')?>" class="nav-link  ">
                <i class="nav-icon fas fa-home"></i>
                <p>Beranda</p>
               </a>
                 </li>
            <li class="nav-item">
              <a href="" class="nav-link ">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Bimbingan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('dosen/bimbingan')?>" class="nav-link ">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Mahasiswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('dosen/bimbingan/proposal')?>" class="nav-link">
                    <i class="fas fa-file nav-icon"></i>
                    <p>Proposal</p>
                  </a>
                </li>
              </ul>

            </li>
              </ul>
            
          
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>