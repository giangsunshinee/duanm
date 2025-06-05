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
                                 <li class="breadcrumb-item active" aria-current="page">Chi tiết mua hàng</li>
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
                     <div class="col-lg-7">
                         <!-- Cart Table Area -->
                         <div class="cart-table table-responsive">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th colspan="5"> Thông tin sản phẩm </th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr class="text-center">
                                         <th>Hình ảnh</th>
                                         <th>Tên sản phẩm</th>
                                         <th>Đơn giá</th>
                                         <th>Số lượng</th>
                                         <th>Thành tiền</th>
                                     </tr>
                                     <?php foreach ($chiTietDonHang as $item) : ?>
                                         <td class="text-center">
                                             <img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>" style="width: 80px; height: 80px; object-fit: cover;">
                                         </td>
                                         <td><?= $item['ten_san_pham'] ?></td>
                                         <td><?= number_format($item['don_gia'], 0, ',', '.') ?>₫</td>
                                         <td><?= $item['so_luong'] ?></td>
                                         <td><?= number_format($item['thanh_tien'], 0, ',', '.') ?>₫</td>
                                         </tr>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                     <div class="col-lg-5">
                         <!-- Cart Table Area -->
                         <div class="cart-table table-responsive">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th colspan="2"> Thông tin sản phẩm </th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr class="text-center">
                                         <th>Mã đơn hàng</th>
                                         <th><?= $donHang['ma_don_hang'] ?></th>
                                     </tr>
                                     <tr class="text-center">
                                         <th>Mã đơn hàng</th>
                                         <th><?= $donHang['ten_nguoi_nhan'] ?></th>
                                     </tr>
                                     <tr class="text-center">
                                         <th>Mã đơn hàng</th>
                                         <th><?= $donHang['email_nguoi_nhan'] ?></th>
                                     </tr>
                                     <tr class="text-center">
                                         <th>Mã đơn hàng</th>
                                         <th><?= $donHang['sdt_nguoi_nhan'] ?></th>
                                     </tr>
                                     <tr class="text-center">
                                         <th>Mã đơn hàng</th>
                                         <th><?= $donHang['dia_chi_nguoi_nhan'] ?></th>
                                     </tr>
                                     <tr class="text-center">
                                         <th>Mã đơn hàng</th>
                                         <th><?= $donHang['ngay_dat'] ?></th>
                                     </tr>
                                     <tr class="text-center">
                                         <th>Mã đơn hàng</th>
                                         <th><?= $donHang['ghi_chu'] ?></th>
                                     </tr>
                                     <tr class="text-center">
                                         <th>Mã đơn hàng</th>
                                         <th><?= number_format($donHang['tong_tien']) . '₫' ?></th>
                                     </tr>
                                     <tr class="text-center">
                                         <th>Mã đơn hàng</th>
                                         <th><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></th>
                                     </tr>
                                     <tr class="text-center">
                                         <th>Mã đơn hàng</th>
                                         <th><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></th>
                                     </tr>

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