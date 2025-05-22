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
                      <h1>Sửa Đơn hàng : <?= $donHang['ma_don_hang'] ?> </h1>
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
                              <h3 class="card-title">Sửa Đơn Hàng </h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">
                              <input type="hidden" name="don_hang_id" value="<?= $donHang['id'] ?>">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Tên Người Nhận </label>
                                      <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $donHang['ten_nguoi_nhan'] ?>">
                                      <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                                          <div class="text-danger">
                                              <?= $errors['ten_nguoi_nhan'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group">
                                      <label>Số Điện Thoại </label>
                                      <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $donHang['sdt_nguoi_nhan'] ?>">
                                      <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                                          <div class="text-danger">
                                              <?= $errors['sdt_nguoi_nhan'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group">
                                      <label>Email </label>
                                      <input type="email" class="form-control" name="email_nguoi_nhan" value="<?= $donHang['email_nguoi_nhan'] ?>">
                                      <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                                          <div class="text-danger">
                                              <?= $errors['email_nguoi_nhan'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group">
                                      <label>Đại Chỉ </label>
                                      <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $donHang['dia_chi_nguoi_nhan'] ?>">
                                      <?php if (isset($errors['dia_chi_nguoi_nhan'])) { ?>
                                          <div class="text-danger">
                                              <?= $errors['dia_chi_nguoi_nhan'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>



                                  <div class="form-group">
                                      <label>Ghi Chú </label>
                                      <textarea class="form-control" name="ghi_chu" placeholder="Nhập mô tả"><?= $donHang['ghi_chu'] ?></textarea>
                                  </div>

                                  <hr>

                                  <div class="form-group">
                                      <label for="trang_thai">Trạng thái</label>
                                      <select id="trang_thai" class="form-control custom_select" name="trang_thai_id">
                                          <?php foreach ($listTrangThaiDonHang as $trangThai) : ?>
                                              <option value="<?= $trangThai['id'] ?>"

                                                  <?php
                                                    if ($donHang['trang_thai_id'] > $trangThai['id'] || $donHang['trang_thai_id'] == 9 || $donHang['trang_thai_id'] == 10 || $donHang['trang_thai_id'] == 11) {
                                                        echo 'disabled';
                                                    }
                                                    ?>

                                                  <?= $donHang['trang_thai_id'] == $trangThai['id'] ? 'selected' : '' ?>>
                                                  <?= $trangThai['ten_trang_thai'] ?></option>
                                          <?php endforeach ?>
                                      </select>
                                  </div>

                                  <div class="card-footer">
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