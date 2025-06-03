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
                                 <li class="breadcrumb-item"><a href="shop.html">Sản Phẩm</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Chi Tiết Sản Phẩm</li>
                             </ul>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- breadcrumb area end -->

     <!-- page main wrapper start -->
     <div class="shop-main-wrapper section-padding pb-0">
         <div class="container">
             <div class="row">
                 <!-- product details wrapper start -->
                 <div class="col-lg-12 order-1 order-lg-2">
                     <!-- product details inner end -->
                     <div class="product-details-inner">
                         <div class="row">
                             <div class="col-lg-5">
                                 <div class="product-large-slider anh">
                                     <?php foreach ($listAnhSanPham as $key => $anhSanPham) : ?>
                                         <div class="pro-large-img img-zoom">
                                             <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?> " alt="product-details" />
                                         </div>
                                     <?php endforeach; ?>
                                 </div>
                                 <div class="pro-nav slick-row-10 slick-arrow-style">

                                     <?php foreach ($listAnhSanPham as $key => $anhSanPham) : ?>
                                         <div class="pro-nav-thumb">
                                             <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="product-details" />
                                         </div>
                                     <?php endforeach; ?>
                                 </div>
                             </div>
                             <div class="col-lg-7">
                                 <div class="product-details-des">
                                     <div class="manufacturer-name">
                                         <a href="product-details.html"><?= $sanPham['ten_danh_muc'] ?></a>
                                     </div>
                                     <h3 class="product-name"><?= $sanPham['ten_san_pham']  ?></h3>
                                     <div class="ratings d-flex">
                                         <div class="pro-review">
                                             <?php $countComment = count($listBinhLuan) ?>
                                             <span><?= $countComment . ' Bình Luận' ?></span>
                                         </div>
                                     </div>
                                     <div class="price-box">
                                         <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                             <span class="price-regular"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>₫</span>
                                             <span class="price-old"><del><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>₫</del></span>
                                         <?php } else { ?>
                                             <span class="price-regular"><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>₫</span>
                                         <?php } ?>
                                     </div>
                                     <div class="availability">
                                         <i class="fa fa-check-circle"></i>
                                         <span><?= $sanPham['so_luong'] . ' trong kho' ?> </span>
                                     </div>
                                     <p class="pro-desc"><?= $sanPham['mo_ta'] ?></p>
                                     <form action="<?= BASE_URL . '?act=them-gio-hang' ?> " method="POST">
                                         <div class="quantity-cart-box d-flex align-items-center">
                                             <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                             <h6 class="option-title">Số Lượng:</h6>
                                             <div class="quantity">
                                                 <div class="pro-qty"><input type="text" value="1" name="so_luong"></div>
                                             </div>
                                             <div class="action_link">
                                                 <button class="btn btn-cart2">Add to cart</button>
                                             </div>
                                         </div>
                                     </form>

                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- product details inner end -->

                     <!-- product details reviews start -->
                     <div class="product-details-reviews section-padding pb-0">
                         <div class="row">
                             <div class="col-lg-12">
                                 <div class="product-review-info">
                                     <ul class="nav review-tab">
                                         <li>
                                             <a class="active" data-bs-toggle="tab" href="#tab_one">Mô tả</a>
                                         </li>
                                         <li>
                                             <a data-bs-toggle="tab" href="#tab_three">Bình Luận (<?= $countComment ?>)</a>
                                         </li>
                                     </ul>
                                     <div class="tab-content reviews-tab">
                                         <div class="tab-pane fade show active" id="tab_one">
                                             <div class="tab-one">
                                                 <p><?= $sanPham['mo_ta'] ?></p>
                                             </div>
                                         </div>
                                         <div class="tab-pane fade" id="tab_three">
                                             <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                                                 <h5>Bình luận của : <span><?= $binhLuan['ho_ten'] ?></span></h5>
                                                 <div class="total-reviews">
                                                     <div class="rev-avatar">
                                                         <img src="<?= $binhLuan['anh_dai_dien'] ?>" alt="">
                                                     </div>
                                                     <div class="review-box">
                                                         <div class="post-author">
                                                             <p><span>Khách Hàng -</span><?= $binhLuan['ngay_dang'] ?></p>
                                                         </div>
                                                         <p><?= $binhLuan['noi_dung'] ?></p>
                                                     </div>
                                                 </div>
                                             <?php endforeach; ?>
                                             <form action="#" class="review-form">
                                                 <div class="form-group row">
                                                     <div class="col">
                                                         <label class="col-form-label"><span class="text-danger">*</span>
                                                             Nội Dung Bình Luận </label>
                                                         <textarea class="form-control" required></textarea>
                                                     </div>
                                                 </div>
                                                 <div class="buttons">
                                                     <button class="btn btn-sqr" type="submit">Bình Luận</button>
                                                 </div>
                                             </form> <!-- end of review-form -->
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- product details reviews end -->
                 </div>
                 <!-- product details wrapper end -->
             </div>
         </div>
     </div>
     <!-- page main wrapper end -->

     <!-- related products area start -->
     <section class="related-products section-padding">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <!-- section title start -->
                     <div class="section-title text-center">
                         <h2 class="title">Sản Phẩm Liên Quan</h2>
                         <p class="sub-title"></p>
                     </div>
                     <!-- section title start -->
                 </div>
             </div>
             <div class="row">
                 <div class="col-12">
                     <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                         <?php foreach ($listSanPhamCungDanhMuc as $key => $sanPham): ?>
                             <div class="product-item">
                                 <figure class="product-thumb">
                                     <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                         <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                         <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                     </a>
                                     <div class="product-badge">
                                         <?php
                                            $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                            $ngayHienTai = new DateTime();
                                            $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                            ?>
                                         <?php if ($tinhNgay->days <= 7): ?>
                                             <div class="product-label new">
                                                 <span>Mới</span>
                                             </div>
                                         <?php endif; ?>

                                         <?php if ($sanPham['gia_khuyen_mai']): ?>
                                             <div class="product-label discount">
                                                 <span>Giảm giá</span>
                                             </div>
                                         <?php endif; ?>
                                     </div>
                                     <div class="cart-hover">
                                         <button class="btn btn-cart">Xem chi tiết</button>
                                     </div>
                                 </figure>
                                 <div class="product-caption text-center">
                                     <h6 class="product-name">
                                         <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                     </h6>
                                     <div class="price-box">
                                         <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                             <span class="price-regular"><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?>₫</span>
                                             <span class="price-old"><del><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>₫</del></span>
                                         <?php } else { ?>
                                             <span class="price-regular"><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?>₫</span>
                                         <?php } ?>
                                     </div>
                                 </div>
                             </div>
                             <!-- product item end -->
                         <?php endforeach; ?>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- related products area end -->
 </main>

 <style>
     .anh {
         width: 100%;
         height: 500px;
         /* hoặc chiều cao bạn muốn */
         display: flex;
         align-items: center;
         justify-content: center;
         overflow: hidden;
     }

     .anh img {
         max-width: 100%;
         max-height: 100%;
         object-fit: cover;
         display: block;
         margin: 0 auto;
     }

     .slick-slide {
         height: auto !important;
     }

     .product-item {
         display: flex;
         flex-direction: column;
         align-items: center;
         height: 420px;
         /* hoặc chiều cao bạn muốn */
         justify-content: flex-start;
         background: #fff;
         border-radius: 8px;
         overflow: hidden;
         margin-bottom: 20px;
     }

     /* Ảnh sản phẩm cùng kích thước, căn giữa */
     .product-thumb {
         width: 100%;
         height: 260px;
         /* hoặc chiều cao bạn muốn */
         display: flex;
         align-items: center;
         justify-content: center;
         overflow: hidden;
         background: #f9f9f9;
     }

     .product-thumb img {
         max-width: 100%;
         max-height: 100%;
         object-fit: cover;
         display: block;
         margin: 0 auto;
     }

     /* Caption luôn ở dưới cùng */
     .product-caption {
         flex: 1;
         display: flex;
         flex-direction: column;
         justify-content: flex-end;
         width: 100%;
         text-align: center;
         padding: 10px 0 0 0;
     }

     .slick-slide {
         height: auto !important;
     }
 </style>
 
 <?php require_once 'layout/miniCart.php';  ?>
 <?php require_once 'layout/footer.php';  ?>