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
                      <h1>Quan Ly danh sach don hang </h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="">
                              <?php if (!empty($listDonHang) && is_array($listDonHang)): ?>
                                  <?php foreach ($listDonHang as $key => $donHang) : ?>
                                      <!-- ...existing code... -->
                                  <?php endforeach ?>
                              <?php else: ?>
                                  <tr>
                                      <td colspan="8" class="text-center">Không có sản phẩm nào.</td>
                                  </tr>
                              <?php endif; ?>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>STT</th>
                                          <th>Mã đơn hàng</th>
                                          <th>Tên người nhận</th>
                                          <th>Số điện thoại</th>
                                          <th>Ngày đặt</th>
                                          <th>Tổng tiền</th>
                                          <th>Trạng thái</th>
                                          <th>Thao Tác</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($listDonHang as $key => $donHang) : ?>
                                          <tr>
                                              <td><?= $key + 1 ?></td>
                                              <td><?= $donHang['ma_don_hang'] ?></td>
                                              <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                              <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                              <td><?= date('d/m/Y', strtotime($donHang['ngay_dat'])) ?></td>
                                              <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VNĐ</td>
                                              <td><?= $donHang['ten_trang_thai'] ?>
                                              <td>
                                                  <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                                      <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                  </a>
                                                  <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                                      <button class="btn btn-warning"> <i class="fas fa-cogs"></i> </button>
                                                  </a>
                                              </td>
                                          </tr>
                                      <?php endforeach ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>STT</th>
                                          <th>Mã đơn hàng</th>
                                          <th>Tên người nhận</th>
                                          <th>Số điện thoại</th>
                                          <th>Ngày đặt</th>
                                          <th>Tổng tiền</th>
                                          <th>Trạng thái</th>
                                          <th>Thao Tác</th>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
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

  <!-- End Footer -->
  <script>
      $(function() {
          $("#example1").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });
  </script>
  <!-- Code injected by live-server -->
  </body>

  </html>