<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?= base_url()?>assets/image/logo/LOGO UNIVERSITAS NEGERI PADANG.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="" style="font-weight: 15px;">Portal Mahasiswa</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
       
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item ">
                 <a href="<?= base_url('mahasiswa/dashboard')?>" class="nav-link  ">
                <i class="nav-icon fas fa-home"></i>
                <p>Beranda</p>
               </a>
                 </li>
                 <li class="nav-item">
                 <a href="<?= base_url('mahasiswa/biodata_mhs/')?>" class="nav-link  ">
                <i class="nav-icon fas  fa-sticky-note"></i>
                <p>Biodata Mahasiswa</p>
                </a>  
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
                  <a href="" class="nav-link ">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Pembimbing
                    <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a href="<?= base_url('mahasiswa/pembimbing/')?>" class="nav-link ">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Pembimbing Skripsi</p>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="<?= base_url('mahasiswa/pembimbing/pembimbing_a')?>" class="nav-link ">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Pembimbing Akademik</p>
                  </a>
                  </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('mahasiswa/pembimbing/riwayat/')?>" class="nav-link">
                    <i class="fas fa-calendar-check nav-icon"></i>
                    <p>Riwayat Konsultasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('mahasiswa/proposal')?>" class="nav-link">
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