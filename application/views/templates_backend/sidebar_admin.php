<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?= base_url()?>assets/image/logo/LOGO UNIVERSITAS NEGERI PADANG.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Teknik Sipil</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url()?>assets/admin_lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item ">
                 <a href="<?= base_url('admin/dashboard/')?>" class="nav-link  ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
               </a>
                 </li>
                 <li class="nav-item">
                 <a href="<?= base_url('admin/mahasiswa/')?>" class="nav-link  ">
                <i class="nav-icon fas fa-user"></i>
                <p>Mahasiswa</p>
                </a>  
                 </li>
                 <li class="nav-item">
                 <a href="<?= base_url('admin/dosen/')?>" class="nav-link  ">
                <i class="nav-icon fas fa-user"> </i>
                <p>Dosen</p>
                  </a>
                 </li>
                 <li class="nav-item">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Pembimbing
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/pembimbing/pembimbing_pa')?>" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Pembimbing Akademik</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/pembimbing/')?>" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Pembimbing Skripsi</p>
                  </a>
                </li>
              </ul>

            </li>
                 <li class="nav-item">
                 <a href="<?= base_url('admin/pegawai/')?>" class="nav-link  ">
                <i class="nav-icon fas fa-user"> </i>
                <p>Pegawai</p>
                  </a>
                 </li>

            </li>
            <li class="nav-item">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Tugas Akhir
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/tugas_akhir/proposal')?>" class="nav-link">
                    <i class="fas fa-file nav-icon"></i>
                    <p>Proposal</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/tugas_akhir/bimbingan')?>" class="nav-link">
                    <i class="fas fa-file nav-icon"></i>
                    <p>Bimbingan</p>
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