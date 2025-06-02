<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <ul>
                        <?php $tongGioHang = 0; ?>
                        <?php foreach ($chiTietGioHang as $key => $sanPham): ?>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="product-details.html">
                                        <img class="img-fluid" src="<?= $sanPham['hinh_anh']; ?>" alt="Product" />
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="#"><?= $sanPham['ten_san_pham']; ?></a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity"><?= $sanPham['so_luong']; ?> <strong>&times;</strong></span>
                                        <span class="cart-price"> <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                <?= number_format($sanPham['gia_khuyen_mai']); ?>₫
                                            <?php } else { ?>
                                                <?= number_format($sanPham['gia_san_pham']); ?>₫
                                            <?php } ?></span>
                                    </p>
                                </div>
                                <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                                <?php
                                // Tính tổng tiền cho sản phẩm
                                if ($sanPham['gia_khuyen_mai']) {
                                    $tongTien = $sanPham['gia_khuyen_mai'] *  $sanPham['so_luong'];
                                } else {
                                    $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                }
                                $tongGioHang += $tongTien;
                                ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="minicart-pricing-box">
                    <ul>
                        <li>
                            <span>Tổng tiền sản phẩm</span>
                            <span><strong><?= number_format($tongGioHang) . '₫' ?></strong></span>
                        </li>
                        <li>
                            <span>Phí vận chuyển</span>
                            <span><strong>30.000 ₫</strong></span>
                        </li>
                        <li class="total">
                            <span>Tổng thanh toán</span>
                            <span><strong><?= number_format($tongGioHang + 30000) . '₫' ?></strong></span>
                        </li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="<?= BASE_URL . '?act=gio-hang' ?>"><i class="fa fa-shopping-cart"></i> Xem giỏ hàng </a>
                    <a href="cart.html"><i class="fa fa-share"></i> Thanh Toán </a>
                </div>
            </div>
        </div>
    </div>
</div>