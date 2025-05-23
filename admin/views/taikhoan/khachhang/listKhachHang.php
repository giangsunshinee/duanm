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
                      <h1>Quan Lý tài khoản Khách Hàng </h1>
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
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th>STT</th>
                                          <th>Họ tên</th>
                                          <th>Ảnh đại diện</th>
                                          <th>Email</th>
                                          <th>Số điện thoại</th>
                                          <th>Trạng thái</th>
                                          <th>Thao Tác</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($listKhachHang as $key => $khacHang) : ?>
                                          <tr>
                                              <td><?= $key + 1 ?></td>
                                              <td><?= $khacHang['ho_ten'] ?></td>
                                              <td>
                                                  <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" alt="" width="100px" height="100px"
                                                      onerror="this.onerror=null; this.src='https://media.dolenglish.vn/PUBLIC/MEDIA/2b2f1391-7dcd-4d41-b1eb-2273c8cd00de.jpg'" />
                                              </td>
                                              <td><?= $khacHang['email'] ?></td>
                                              <td><?= $khacHang['so_dien_thoai'] ?></td>
                                              <td><?= $khacHang['trang_thai'] == 1 ? 'Hoạt động' : 'Ngừng hoạt động' ?></td>
                                              <td>
                                                  <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $khacHang['id'] ?>">
                                                      <button class="btn btn-info">Chi tiết</button>
                                                  </a>
                                                  <a href="<?= BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khacHang['id'] ?>">
                                                      <button class="btn btn-primary">Sửa</button>
                                                  </a>
                                                  <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quan_tri=' . $khacHang['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn reset mật khẩu tài khoản này không?')">
                                                      <button class="btn btn-danger">Reset</button>
                                                  </a>
                                              </td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>STT</th>
                                          <th>Họ tên</th>
                                          <th>Ảnh đại diện</th>
                                          <th>Email</th>
                                          <th>Số điện thoại</th>
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