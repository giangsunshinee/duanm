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
                      <h1>Sửa Sản Phẩm : <?= $sanPham['ten_san_pham'] ?></h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-6">
                  <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title">Thông tin sản phẩm</h3>

                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-minus"></i>
                              </button>
                          </div>
                      </div>
                      <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="POST" enctype="multipart/form-data">
                          <div class="card-body">
                              <div class="form-group">
                                  <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                  <label for="ten_san_pham">Tên sản phẩm</label>
                                  <input type="text" id="ten_san_pham" class="form-control" name="ten_san_pham" value="<?= $sanPham['ten_san_pham'] ?>">
                                  <?php if (isset($_SESSION['error']['ten_san-pham'])) { ?>
                                      <p class="text-danger"> <?= $_SESSION['error']['ten_san-pham'] ?> </p>
                                  <?php } ?>
                              </div>

                              <div class="form-group">
                                  <label for="gia_san_pham">Giá sản phẩm</label>
                                  <input type="text" id="gia_san_pham" class="form-control" name="gia_san_pham" value="<?= $sanPham['gia_san_pham'] ?>">
                              </div>

                              <div class="form-group">
                                  <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                  <input type="text" id="gia_khuyen_mai" class="form-control" name="gia_khuyen_mai" value="<?= $sanPham['gia_khuyen_mai'] ?>">
                              </div>

                              <div class="form-group">
                                  <label for="hinh_anh">Hình ảnh</label>
                                  <input type="file" id="hinh_anh" class="form-control" name="hinh_anh">
                              </div>

                              <div class="form-group">
                                  <label for="so_luong">Số Lượng</label>
                                  <input type="text" id="so_luong" class="form-control" name="so_luong" value="<?= $sanPham['so_luong'] ?>">
                              </div>

                              <div class="form-group">
                                  <label for="ngay_nhap">Ngày nhập</label>
                                  <input type="date" id="ngay_nhap" class="form-control" name="ngay_nhap" value="<?= $sanPham['ngay_nhap'] ?>">
                              </div>

                              <div class="form-group">
                                  <label for="inputStatus">Danh mục</label>
                                  <select id="inputStatus" class="form-control custom_select" name="danh_muc_id">
                                      <?php foreach ($listDanhMuc as $danhMuc) : ?>
                                          <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>"> <?= $danhMuc['ten_danh_muc'] ?> </option>
                                      <?php endforeach ?>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label for="trang_thai">Trạng thái</label>
                                  <select id="trang_thai" class="form-control custom_select" name="trang_thai">
                                      <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1"> Còn hàng</option>
                                      <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2"> Hết hàng</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label for="mo_ta">Mô tả</label>
                                  <textarea name="mo_ta" id="mo_ta" class="form-control"><?= $sanPham['mo_ta'] ?></textarea>
                              </div>

                          </div>
                          <div class="card-footer text-center">
                              <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                          </div>

                      </form>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
              <div class="col-md-6">
                  <!-- /.card -->
                  <div class="card card-info">
                      <div class="card-header">
                          <h3 class="card-title">ALbum sản phẩm</h3>

                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-minus"></i>
                              </button>
                          </div>
                      </div>
                      <div class="card-body p-0">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>File Name</th>
                                      <th>File Size</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>

                                  <tr>
                                      <td>Functional-requirements.docx</td>
                                      <td>49.8005 kb</td>
                                      <td class="text-right py-0 align-middle">
                                          <div class="btn-group btn-group-sm">
                                              <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                              <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                          </div>
                                      </td>
                                  <tr>
                                      <td>UAT.pdf</td>
                                      <td>28.4883 kb</td>
                                      <td class="text-right py-0 align-middle">
                                          <div class="btn-group btn-group-sm">
                                              <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                              <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                          </div>
                                      </td>
                                  <tr>
                                      <td>Email-from-flatbal.mln</td>
                                      <td>57.9003 kb</td>
                                      <td class="text-right py-0 align-middle">
                                          <div class="btn-group btn-group-sm">
                                              <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                              <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                          </div>
                                      </td>
                                  <tr>
                                      <td>Logo.png</td>
                                      <td>50.5190 kb</td>
                                      <td class="text-right py-0 align-middle">
                                          <div class="btn-group btn-group-sm">
                                              <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                              <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                          </div>
                                      </td>
                                  <tr>
                                      <td>Contract-10_12_2014.docx</td>
                                      <td>44.9715 kb</td>
                                      <td class="text-right py-0 align-middle">
                                          <div class="btn-group btn-group-sm">
                                              <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                              <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                          </div>
                                      </td>

                              </tbody>
                          </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <a href="#" class="btn btn-secondary">Cancel</a>
                  <input type="submit" value="Save Changes" class="btn btn-success float-right">
              </div>
          </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include_once 'views/layout/footer.php'; ?>
  </body>

  </html>