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
                      <h1>Quản lý danh sách đơn hàng - Đơn hàng: <strong> <?= $donHang['ma_don_hang'] ?></strong></h1>
                  </div>
              </div>
              <div>
                  <form action="" method="POST">
                      <select name="trang_thai_id" id="" class="form-control">
                          <option value="" disabled></option>
                          <?php foreach ($listTrangThaiDonHang as $key => $tt) : ?>
                              <option
                                  <?= $tt['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?>
                                  <?= $tt['id'] < $donHang['trang_thai_id'] ? 'disabled' : '' ?>
                                  value="<?= $tt['id'] ?>"> <?= $tt['ten_trang_thai'] ?>
                              </option>
                          <?php endforeach; ?>
                      </select>
                  </form>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <?php
                        if ($donHang['trang_thai_id'] == 1) {
                            $colorAlert = 'alert-primary';
                        } else if ($donHang['trang_thai_id'] == 2) {
                            $colorAlert = 'alert-success';
                        } else if ($donHang['trang_thai_id'] == 3) {
                            $colorAlert = 'alert-danger';
                        } else if ($donHang['trang_thai_id'] == 4) {
                            $colorAlert = 'alert-warning';
                        } else if ($donHang['trang_thai_id'] == 5) {
                            $colorAlert = 'alert-info';
                        } else if ($donHang['trang_thai_id'] == 6) {
                            $colorAlert = 'alert-secondary';
                        } else {
                            $colorAlert = 'alert-light';
                        }
                        ?>
                      <div style="text-align: center;" class="alert <?= $colorAlert; ?>">
                          <strong>Trạng thái đơn hàng:</strong> <?= $donHang['ten_trang_thai'] ?>
                      </div>

                      <!-- Main content -->
                      <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                              <div class="col-12">
                                  <h4>
                                      <i class="fas fa-cat"></i> Shop Pet - GiangNT
                                      <small class="float-right">Ngày đặt : <strong><?= formatDate($donHang['ngay_dat'])  ?> </strong> </small>
                                  </h4>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- info row -->
                          <div class="row invoice-info">
                              <div class="col-sm-4 invoice-col">
                                  <h4> <strong> Thông tin người đặt </strong> </h4>
                                  <address>
                                      <strong>Tên : <?= $donHang['ho_ten'] ?></strong><br>
                                      Email : <?= $donHang['email'] ?> <br>
                                      Số điện thoại : <?= $donHang['so_dien_thoai'] ?><<br>
                                  </address>
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4 invoice-col">
                                  <h4> <strong> Thông tin người nhận </strong> </h4>
                                  <address>
                                      <strong>Tên : <?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                      Email : <?= $donHang['email_nguoi_nhan'] ?><br>
                                      Số điện thoại : <?= $donHang['sdt_nguoi_nhan'] ?><br>
                                      Địa chỉ : <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                                  </address>
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4 invoice-col">
                                  <h4> <strong> Thông tin đơn hàng </strong> </h4>
                                  <address>
                                      <strong>Mã đơn hàng : <?= $donHang['ma_don_hang'] ?></strong><br>
                                      Tổng tiền : <?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VNĐ<br>
                                      Ghi chú : <?= $donHang['ghi_chu'] ?><br>
                                      Thanh toán : <?= $donHang['ten_phuong_thuc'] ?><br>
                                  </address>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- Table row -->
                          <div class="row">
                              <div class="col-12 table-responsive">
                                  <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Tên sản phẩm</th>
                                              <th>Dơn giá</th>
                                              <th>Số lượng</th>
                                              <th>Thành tiền</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?= $tongtien = 0; ?>
                                          <?php foreach ($sanPhamDonHang as $key => $sp) : ?>
                                              <tr>
                                                  <td><?= $key + 1 ?></td>
                                                  <td><?= $sp['ten_san_pham'] ?></td>
                                                  <td><?= number_format($sp['don_gia'], 0, ',', '.') ?> VNĐ</td>
                                                  <td><?= $sp['so_luong'] ?></td>
                                                  <td><?= number_format($sp['thanh_tien'], 0, ',', '.') ?> VNĐ</td>
                                              </tr>
                                              <?php $tongtien += $sp['thanh_tien']; ?>
                                          <?php endforeach; ?>
                                      </tbody>
                                  </table>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <div class="row">
                              <div class="col-6">
                                  <p class="lead">
                                      <strong> Ngày đặt : <?= formatDate($donHang['ngay_dat'])  ?> </strong>
                                  </p>

                                  <div class="table-responsive">
                                      <table class="table">
                                          <tr>
                                              <th style="width:50%">Thành tiền</th>
                                              <td> <?= number_format($tongtien, 0, ',', '.') ?> VNĐ</td>
                                          </tr>
                                          <tr>
                                              <th>Vận chuyển :</th>
                                              <td>100.000 VNĐ</td>
                                          </tr>
                                          <tr>
                                              <th>Tổng tiền</th>
                                              <td><?= number_format($tongtien + 100000, 0, ',', '.') ?> VNĐ</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                              <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- this row will not appear when printing -->
                          <div class="row no-print">
                              <div class="col-12">
                                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                      Payment
                                  </button>
                                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                      <i class="fas fa-download"></i> Generate PDF
                                  </button>
                              </div>
                          </div>
                      </div>
                      <!-- /.invoice -->
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include_once 'views/layout/footer.php'; ?>

  <!-- End Footer -->
  </body>

  </html>