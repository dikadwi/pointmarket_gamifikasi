 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-6">
     <!-- Brand Logo -->
     <a href="/Admin/index" class="brand-link">
         <img src="#" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Sistem Informasi Admin</span>
     </a>
     <!-- Sidebar -->
     <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"><?= user()->username; ?></a>
             </div>
         </div>


         <!-- Sidebar Menu -->
         <nav class="mt-5">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-header">MENU</li>
                 <!--Menu  -->
                 <?php if (in_groups('admin')) : ?>
                     <li class="nav-item">
                         <a href="/Admin/user" class="nav-link">
                             <i class="nav-icon fas fa-users"></i>
                             <p>
                                 Data Pengguna
                             </p>
                         </a>
                     </li>
                 <?php endif; ?>
                 <li class="nav-item">
                     <a href="/Admin/data" class="nav-link">
                         <i class="nav-icon fas fa-university"></i>
                         <p>
                             Data Kendaraan
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/Admin/roda2" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Roda 2
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/Admin/roda4" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Roda 4
                                 </p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="/Admin/masuk" class="nav-link">
                         <i class="nav-icon fas fa-plus"></i>
                         <p>
                             Kendaraan Masuk
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-minus"></i>
                         <p>
                             Kendaraan Keluar
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/Admin/qrcode" class="nav-link">
                         <i class="nav-icon fas fa-minus"></i>
                         <p>
                             QR Code
                         </p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>