<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo e(asset('adminLTE/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <?php if(Session::get('user') == "HMJ"): ?>
        <a href="<?php echo e(route('editProfile')); ?>" class="d-block"><?php echo e($pengguna); ?></a>
        <?php else: ?>
        <a href="#" class="d-block"><?php echo e($pengguna); ?></a>
        <?php endif; ?>
      </div>
    </div>

    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        

        <?php if(Session::get("user") != "HMJ" && Session::get("user") == "KAPRODI" || Session::get("user") == "DOSEN" ): ?>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              laporan penggunaan dana
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo e(route('ajukan laporan')); ?>" class="nav-link">
                
                <p>Buat Laporan penggunaan dana</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('laporan disetujui')); ?>" class="nav-link">
                
                <p>laporan penggunaan dana disetujui</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('laporan ditolak')); ?>" class="nav-link">
                
                <p>Laporan penggunaan dana ditolak</p>
              </a>
            </li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if(Session::get("user") != "TU"
        && Session::get("user") != 'Wadek'
        && Session::get("user") != 'Biro'
        && Session::get("user") != 'Warek' ): ?>
        <li class="nav-item">
          <a href="<?php echo e($request); ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Buat permintaan surat perjanjian penundaan
              
            </p>
          </a>
        </li>

        <?php endif; ?>
        <?php if(Session::get("user") == "TU"): ?>



        
          
          
          <?php endif; ?>
          <?php if(Session::get('user') != "Biro" && Session::get('user') != "Warek" ): ?>


          <li class="nav-item">
            <a href="<?php echo e($all); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Semua Surat
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e($inbox); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Surat Masuk
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e($pending); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Surat Pending
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e($reject); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Surat ditolak
                
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php if(Session::get('user') == 'Warek'): ?>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Laporan penggunaan dana
                
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php if(Session::get('user') == 'Biro'): ?>
          <li class="nav-item">
            <a href="<?php echo e(route('user index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Semua Pesan
                
              </p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="<?php echo e(route('logout')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Keluar
                
              </p>
            </a>
          </li>
          
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside><?php /**PATH C:\Users\Acer\Documents\laravel-maulana\laravel-maulana\resources\views/component/sidebar.blade.php ENDPATH**/ ?>