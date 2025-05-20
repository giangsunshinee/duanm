  <!-- Header -->

  <?php include_once 'views/layout/header.php'; ?>
  <!-- End Header -->

  <!-- Navbar -->
  <?php include_once 'views/layout/navbar.php'; ?>
  <!-- End Navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once 'views/layout/sidebar.php'; ?>
  <!-- End Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Thêm Sản Phẩm </h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">Thêm Sản Phẩm</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                              <div class="row card-body ">

                                  <div class="form-group col-12">
                                      <label>Tên Sản Phẩm </label>
                                      <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                                      <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>

                                          <div class="text-danger">
                                              <?= $_SESSION['error']['ten_san_pham'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group col-6">
                                      <label>Hình Ảnh </label>
                                      <input type="file" class="form-control" name="hinh_anh">
                                      <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>

                                          <div class="text-danger">
                                              <?= $_SESSION['error']['hinh_anh'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group col-6">
                                      <label>Album Ảnh </label>
                                      <input type="file" class="form-control" name="img_array[]" multiple>
                                  </div>


                                  <div class="form-group col-6">
                                      <label>Giá sản phẩm </label>
                                      <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm">
                                      <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>

                                          <div class="text-danger">
                                              <?= $_SESSION['error']['gia_san_pham'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group col-6">
                                      <label>Giá Khuyến Mãi </label>
                                      <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập tên giá khuyến mãi">
                                      <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>

                                          <div class="text-danger">
                                              <?= $_SESSION['error']['gia_khuyen_mai'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group col-6">
                                      <label>Số Lượng </label>
                                      <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                                      <?php if (isset($_SESSION['error']['so_luong'])) { ?>

                                          <div class="text-danger">
                                              <?= $_SESSION['error']['so_luong'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group col-6">
                                      <label>Ngày Nhập </label>
                                      <input type="date" class="form-control" name="ngay_nhap" placeholder="Nhập tên ngày nhập">
                                      <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>

                                          <div class="text-danger">
                                              <?= $_SESSION['error']['ngay_nhap'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group col-6">
                                      <label>Danh Mục </label>
                                      <select class="form-control" name="danh_muc_id">
                                          <option selected disabled>Chọn danh mục</option>
                                          <?php foreach ($listDanhMuc as $danhMuc): ?>
                                              <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                          <?php endforeach ?>
                                      </select>
                                      <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                                          <div class="text-danger">
                                              <?= $_SESSION['error']['danh_muc_id'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group col-6">
                                      <label>Trạng Thái </label>
                                      <select class="form-control" name="trang_thai">
                                          <option selected disabled>Chọn trạng thái</option>
                                          <option value="1">Còn hàng</option>
                                          <option value="2">Hết hàng</option>
                                      </select>
                                      <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                                          <div class="text-danger">
                                              <?= $_SESSION['error']['trang_thai'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group col-12">
                                      <label>Mô tả </label>
                                      <textarea class="form-control" name="mo_ta" placeholder="Nhập mô tả"></textarea>
                                  </div>

                                  <div class="card-footer ">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                          </form>
                      </div>
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include_once 'views/layout/footer.php'; ?>
  </body>

  </html>