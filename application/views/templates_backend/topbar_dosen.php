

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
       
      </ul>

      <!-- SEARCH FORM -->
      <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
 -->
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <?= $dosen['nama']?>
             <img src="<?= base_url('assets/image/dosen/').$dosen['image']?>" class="img-circle elevation-1" style="width: 30px;" >
            <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Profile</span>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('dosen/profile')?>" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> My Profile
              <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('dosen/profile/edit_profile')?>" class="dropdown-item">
              <i class="fas fa-edit mr-2"></i> Edit Profile
              <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('dosen/profile/ganti_password')?>" class="dropdown-item">
              <i class="fas fa-key mr-2"></i> Ganti Password
              <!-- <span class="float-right text-muted text-sm">2 days</span> -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('dosen/auth/logout/')?>" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
              <!-- <span class="float-right text-muted text-sm">2 days</span> -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    