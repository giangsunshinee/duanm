 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </li>
     <li class="nav-item d-none d-sm-inline-block">
       <a href="<?= BASE_URL ?>" class="nav-link">Webside</a>
     </li>
   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
     <!-- Navbar Search -->

     <li class="nav-item">
       <a class="nav-link" data-widget="fullscreen" href="#" role="button">
         <i class="fas fa-expand-arrows-alt"></i>
       </a>
       <a class="nav-link" href="<?= BASE_URL_ADMIN . '?act=logout-admin' ?>" role="button" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">
         <i class="fas fa-sign-out-alt"></i>
         <span class="d-none d-sm-inline">Đăng xuất</span>       
       </a>
     </li>
   </ul>
 </nav>