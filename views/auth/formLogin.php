 <?php require_once './views/layout/header.php'; ?>

 <?php require_once './views/layout/menu.php'; ?>
 <main>
     <!-- breadcrumb area start -->
     <div class="breadcrumb-area">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="breadcrumb-wrap">
                         <nav aria-label="breadcrumb">
                             <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                 <li class="breadcrumb-item active" aria-current="page">login-Register</li>
                             </ul>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- breadcrumb area end -->

     <!-- login register wrapper start -->
     <div class="login-register-wrapper section-padding">
         <div class="container">
             <div class="member-area-from-wrap">
                 <div class="row">
                     <!-- Login Content Start -->
                     <div class="col-lg-6">
                         <div class="login-reg-form-wrap">
                             <h5>Đăng nhập</h5>
                             <p>Xin chào! Vui lòng đăng nhập vào tài khoản của bạn.</p>
                             <form action="<?= BASE_URL . '?act=check-login' ?>" method="POST">
                                 <div class="single-input-item">
                                     <input type="email" name="email" required />
                                 </div>
                                 <div class="single-input-item">
                                     <input type="password" name="mat_khau" required />
                                 </div>
                                 <div class="single-input-item">
                                     <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                         <a href="#" class="forget-pwd">Quên mật khẩu</a>
                                     </div>
                                 </div>
                                 <div class="single-input-item">
                                     <button class="btn btn-sqr">Đăng nhập</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                     <!-- Login Content End -->
                 </div>
             </div>
         </div>
     </div>
     <!-- login register wrapper end -->
 </main>

 <?php require_once './views/layout/footer.php'  ?>