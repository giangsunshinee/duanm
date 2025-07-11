 <?php require_once 'layout/header.php'; ?>

 <?php require_once 'layout/menu.php'; ?>

 <main>
     <!-- breadcrumb area start -->
     <div class="breadcrumb-area">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="breadcrumb-wrap">
                         <nav aria-label="breadcrumb">
                             <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                 <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
                             </ul>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- breadcrumb area end -->

     <!-- cart main wrapper start -->
     <div class="cart-main-wrapper section-padding">
         <div class="container">
             <div class="section-bg-color">
                 <div class="row">
                     <div class="col-lg-12">
                         <!-- Cart Table Area -->
                         <div class="cart-table table-responsive">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th>Mã đơn hàng</th>
                                         <th>Ngày đặt</th>
                                         <th>Tổng tiền</th>
                                         <th>Phương thức thanh toán</th>
                                         <th>Trạng thái đơn hàng</th>
                                         <th>Thao tác</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php foreach ($donHangs as $donhang) : ?>
                                         <tr>
                                             <td> <b><?= $donhang['ma_don_hang'] ?></b> </td>
                                             <td><?= $donhang['ngay_dat'] ?></td>
                                             <td><?= number_format($donhang['tong_tien']) . '₫' ?></td>
                                             <td><?= $phuongThucThanhToan[$donhang['phuong_thuc_thanh_toan_id']]  ?></td>
                                             <td><?= $trangThaiDonHang[$donhang['trang_thai_id']]  ?></td>
                                             <td>
                                                 <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donhang['id'] ?> " class="btn btn-sqr">Chi Tiết đơn hàng</a>
                                                 <?php if ($donhang['trang_thai_id'] == 1) : ?>
                                                     <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donhang['id'] ?>" class="btn btn-sqr" onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng?')">
                                                         Hủy
                                                     </a>
                                                 <?php endif; ?>
                                             </td>
                                         </tr>
                                     <?php endforeach;  ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- cart main wrapper end -->
 </main>

 <?php require_once 'layout/miniCart.php';  ?>
 <?php require_once 'layout/footer.php';  ?>