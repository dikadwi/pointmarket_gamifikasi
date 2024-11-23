 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-6">
     <!-- Brand Logo -->
     <a href="/Admin/index" class="brand-link">
         <img src="#" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Point Market</span>
     </a>
     <!-- Sidebar -->
     <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Admin</a>
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
                 <!-- <li class="nav-item">
                     <a href="#Leaderboards" class="nav-link">
                         <i class="nav-icon fas fa-trophy"></i>
                         <p>
                             Leaderboards
                         </p>
                     </a>
                 </li> -->
                 <li class="nav-item">
                     <a href="/User" class="nav-link">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             <!-- Mahasiswa -->
                             Data User (Mahasiswa)
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/Transaksi/data_transaksi" class="nav-link">
                         <i class="nav-icon fas fa-shopping-cart"></i>
                         <p>
                             Data Transaksi
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/Transaksi/data_misitambah  " class="nav-link">
                         <i class="nav-icon fas fa-shopping-cart"></i>
                         <p>
                             Data Misi Tambahan
                         </p>
                     </a>
                 </li>
                 <!-- <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-shopping-cart"></i>
                         <p>
                             Jenis Transaksi
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/Transaksi/reward" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Rewards
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/Transaksi/pembelian" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Pembelian
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/Transaksi/punishment" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Punishment
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/Transaksi/misi_tambah" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Misi Tambahan
                                 </p>
                             </a>
                         </li>
                     </ul>
                 </li> -->
                 <li class="nav-item">
                     <a href="/Badges" class="nav-link">
                         <i class="nav-icon fas fa-ribbon"></i>
                         <p>Badges
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/Transaksi/validasi" class="nav-link">
                         <i class="nav-icon fas fa-file"></i>
                         <p>
                             Validasi
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/Admin/market_place" class="nav-link">
                         <i class="nav-icon fas fa-file"></i>
                         <p>
                             Market Place
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>