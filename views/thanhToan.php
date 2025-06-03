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
                                 <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                 <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Thanh Toán</li>
                             </ul>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- breadcrumb area end -->

     <!-- checkout main wrapper start -->
     <div class="checkout-page-wrapper section-padding">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <!-- Checkout Login Coupon Accordion Start -->
                     <div class="checkoutaccordion" id="checkOutAccordion">
                         <div class="card">
                             <h6>Bạn có mã giảm giá ? <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">Bấm vào đây để nhập mã giảm giá của bạn</span></h6>
                             <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                 <div class="card-body">
                                     <div class="cart-update-option">
                                         <div class="apply-coupon-wrapper">
                                             <form action="#" method="post" class=" d-block d-md-flex">
                                                 <input type="text" placeholder="Nhập mã giảm giá" required />
                                                 <button class="btn btn-sqr">Áp dụng mã giảm giá </button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- Checkout Login Coupon Accordion End -->
                 </div>
             </div>
             <div class="row">
                 <!-- Checkout Billing Details -->
                 <div class="col-lg-6">
                     <div class="checkout-billing-details-wrap">
                         <h5 class="checkout-title">Thông tin người nhận</h5>
                         <div class="billing-form-wrap">
                             <form action="#">
                                 <div class="row">
                                     <div class="single-input-item">
                                         <label for="ten_nguoi_nhan" class="required">Tên người nhận</label>
                                         <input type="text" id="ten_nguoi_nhan" placeholder="Tên người nhận" value="<?= $user['ho_ten'] ?>" required />
                                     </div>
                                 </div>

                                 <div class="single-input-item">
                                     <label for="email_nguoi_nhan" class="required">Địa chỉ email </label>
                                     <input type="email" id="email_nguoi_nhan" placeholder="Địa chỉ email" name="email_nguoi_nhan" value="<?= $user['email'] ?>" required />
                                 </div>

                                 <div class="single-input-item">
                                     <label for="sdt_nguoi_nhan" class="required">Số điện thoại</label>
                                     <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="Phone Number" required />
                                 </div>

                                 <div class="single-input-item">
                                     <label for="diachi" class="required">Địa chỉ</label>
                                     <input type="text" id="diachi" name="diachi" value="<?= $user['dia_chi'] ?>" placeholder="Địa chỉ" required />
                                 </div>



                                 <div class="single-input-item">
                                     <label for="ordernote">Ghi chú</label>
                                     <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Vui lòng nhập ghi chú "></textarea>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>

                 <!-- Order Summary Details -->
                 <div class="col-lg-6">
                     <div class="order-summary-details">
                         <h5 class="checkout-title">Thông tin sản phẩm</h5>
                         <div class="order-summary-content">
                             <!-- Order Summary Table -->
                             <div class="order-summary-table table-responsive text-center">
                                 <table class="table table-bordered">
                                     <thead>
                                         <tr>
                                             <th>Sản phẩm</th>
                                             <th>Tổng</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $tongGioHang = 0; ?>
                                         <?php foreach ($chiTietGioHang as $key => $sanPham): ?>
                                             <tr>
                                                 <td>
                                                     <a href="">
                                                         <?= $sanPham['ten_san_pham']; ?> <strong>x</strong> <?= $sanPham['so_luong']; ?>
                                                     </a>
                                                 </td>
                                                 <td>
                                                     <?php
                                                        // Tính tổng tiền cho sản phẩm
                                                        $tongTien = 0;
                                                        if ($sanPham['gia_khuyen_mai']) {
                                                            $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                        } else {
                                                            $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                        }
                                                        $tongGioHang += $tongTien;
                                                        echo number_format($tongTien) . '₫';
                                                        ?>
                                                 </td>
                                             </tr>
                                         <?php endforeach; ?>
                                     </tbody>
                                     <tfoot>
                                         <tr>
                                             <td>Tổng</td>
                                             <td>
                                                 <strong>
                                                     <?= number_format($tongGioHang) . '₫' ?>
                                                 </strong>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Phí vạn chuyển</td>
                                             <td class="d-flex justify-content-center">
                                                 <strong>30.000₫</strong>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Tổng đơn hàng</td>
                                             <td><strong><?= number_format($tongGioHang + 30000) . '₫' ?></strong></td>
                                         </tr>
                                     </tfoot>
                                 </table>
                             </div>
                             <!-- Order Payment Method -->
                             <div class="order-payment-method">
                                 <div class="single-payment-method show">
                                     <div class="payment-method-name">
                                         <div class="custom-control custom-radio">
                                             <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                             <label class="custom-control-label" for="cashon">Thanh toán khi nhận hàng (COD)</label>
                                         </div>
                                     </div>
                                     <div class="payment-method-details" data-method="cash">
                                         <p>Khách có thể thanh toán sau khi nhận hàng thành công (cần xác nhận đơn hàng)</p>
                                     </div>
                                 </div>
                                 <div class="single-payment-method">
                                     <div class="payment-method-name">
                                         <div class="custom-control custom-radio">
                                             <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input" />
                                             <label class="custom-control-label" for="directbank">Thanh toán online</label>
                                         </div>
                                     </div>
                                     <div class="payment-method-details" data-method="bank">
                                         <p>Khách hàng cần thanh toán online</p>
                                     </div>
                                 </div>
                                 <div class="summary-footer-area">
                                     <div class="custom-control custom-checkbox mb-20">
                                         <input type="checkbox" class="custom-control-input" id="terms" required />
                                         <label class="custom-control-label" for="terms">Xác nhận đặt hàng</label>
                                     </div>
                                     <button type="submit" class="btn btn-sqr">Đặt hàng</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- checkout main wrapper end -->
 </main>
 <?php require_once 'layout/miniCart.php';  ?>
 <?php require_once 'layout/footer.php';  ?>