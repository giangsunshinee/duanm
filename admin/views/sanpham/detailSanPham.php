  <!-- Header -->

  <?php include_once 'views/layout/header.php'; ?>
  <!-- End Header -->

  <!-- Navbar -->
  <?php include_once 'views/layout/navbar.php'; ?>
  <!-- End Navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once 'views/layout/sidebar.php'; ?>
  <!-- End Main Sidebar Container -->


  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>E-commerce</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">E-commerce</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card card-solid">
              <div class="card-body">
                  <div class="row">
                      <div class="col-12 col-sm-6">
                          <div class="col-12">
                              <img style="width: 500px;" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
                          </div>
                          <div class="col-12 product-image-thumbs">
                              <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
                                  <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="Product Image"></div>
                              <?php endforeach ?>
                          </div>
                      </div>
                      <div class="col-12 col-sm-6">
                          <h3 class="my-3">Tên Sản Phẩm: <?= $sanPham['ten_san_pham'] ?></h3>
                          <hr>
                          <h4 class="mt-3">Giá Tiền : <?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?> VNĐ</h4>
                          <h4 class="mt-3">Giá khuyến mãi : <?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?> VNĐ</h4>
                          <h4 class="mt-3">Số Lượng : <?= $sanPham['so_luong'] ?></h4>
                          <h4 class="mt-3">Lượt xem : <?= $sanPham['luot_xem'] ?> </h4>
                          <h4 class="mt-3">Danh Mục : <?= $sanPham['ten_danh_muc'] ?></h4>
                          <h4 class="mt-3">Trạng Thái : <?= $sanPham['trang_thai'] == 1 ? 'Còn Hàng' : 'Hết Hàng' ?></h4>
                          <h4 class="mt-3">Ngày nhập : <?= $sanPham['ngay_nhap'] ?> </h4>
                      </div>
                  </div>
                  <div class="row mt-4">
                      <div class="col-12">
                          <nav class="w-100">
                              <div class="nav nav-tabs" id="product-tab" role="tablist">
                                  <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô tả</a>
                                  <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Bình Luận</a>
                                  <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Đánh giá</a>
                              </div>
                          </nav>
                          <div class="tab-content p-3" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> <?= $sanPham['mo_ta'] ?></div>
                              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                  <div class="col-12">
                                      <div class="card">
                                          <div class="">
                                              <table id="example2" class="table table-bordered table-striped">
                                                  <thead>
                                                      <tr>
                                                          <th>STT</th>
                                                          <th>Tên sản phẩm</th>
                                                          <th>Nội dung bình luận</th>
                                                          <th>Ngày bình luận</th>
                                                          <th>Trạng thái</th>
                                                          <th>Thao Tác</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                                                          <tr>
                                                              <td><?= $key + 1 ?></td>
                                                              <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id']; ?>"><?= $binhLuan['ho_ten'] ?></a></td>
                                                              <td><?= $binhLuan['noi_dung'] ?></td>
                                                              <td><?= date('d/m/Y', strtotime($binhLuan['ngay_dang'])) ?></td>
                                                              <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                                                              <td>
                                                                  <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?> " method="POST">
                                                                      <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                                                      <input type="hidden" name="name_view" value="detail-sanpham">
                                                                      <input type="hidden" name="id_khach_hang" value="<?= $binhLuan['tai_khoan_id'] ?>">
                                                                      <button onclick="return confirm('Có chắc bạn muốn ẩn bình luận này không không ? ')" class="btn btn-warning">
                                                                          <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ Ẩn' ?>
                                                                      </button>
                                                                  </form>
                                                              </td>
                                                          </tr>
                                                      <?php endforeach ?>
                                                  </tbody>
                                                  <tfoot>
                                                      <tr>
                                                          <th>STT</th>
                                                          <th>Tên sản phẩm</th>
                                                          <th>Nội dung bình luận</th>
                                                          <th>Ngày bình luận</th>
                                                          <th>Trạng thái</th>
                                                          <th>Thao Tác</th>
                                                      </tr>
                                                  </tfoot>
                                              </table>
                                          </div>
                                          <!-- /.card -->
                                      </div>
                                      <!-- /.content -->
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include_once 'views/layout/footer.php'; ?>
  </body>

  </html>

  <script>
      $(document).ready(function() {
          $('.product-image-thumb').on('click', function() {
              var $image_element = $(this).find('img')
              $('.product-image').prop('src', $image_element.attr('src'))
              $('.product-image-thumb.active').removeClass('active')
              $(this).addClass('active')
          })
      })
  </script>