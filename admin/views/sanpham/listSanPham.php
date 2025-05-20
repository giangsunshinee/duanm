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
                      <h1>Quan Ly danh sach san pham </h1>
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
                          <div class="card-header">
                              <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>">
                                  <button class="btn btn-success">Thêm Danh Mục Sản Phẩm</button>
                              </a>
                          </div>
                          <div class="">
                              <?php if (!empty($listSanPham) && is_array($listSanPham)): ?>
                                  <?php foreach ($listSanPham as $key => $sanPham) : ?>
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
                                          <th>Tên sản phẩm</th>
                                          <th>Ảnh Sản Phẩm</th>
                                          <th>Giá tiền</th>
                                          <th>Số lượng</th>
                                          <th>Danh mục</th>
                                          <th>Trạng thái</th>
                                          <th>Thao Tác</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach ($listSanPham as $key => $sanPham) : ?>
                                          <tr>
                                              <td><?= $key + 1 ?></td>
                                              <td><?= $sanPham['ten_san_pham'] ?></td>
                                              <td>
                                                  <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" width="150px" height="100px"
                                                      onerror="this.onerror=null; this.src='https://th.bing.com/th/id/OIP._afEK8OunDcdCncW9JxE_gAAAA?rs=1&pid=ImgDetMain'" />
                                              </td>
                                              <td><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?> VNĐ</td>
                                              <td><?= $sanPham['so_luong'] ?></td>
                                              <td><?= $sanPham['ten_danh_muc'] ?></td>
                                              <td>
                                                  <?php if ($sanPham['trang_thai'] == 1) : ?>
                                                      <span class="badge badge-success">Còn hàng</span>
                                                  <?php else : ?>
                                                      <span class="badge badge-danger">Hết hàng</span>
                                                  <?php endif; ?>
                                              </td>
                                              <td>
                                                  <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                      <button class="btn btn-primary">Sửa</button>
                                                  </a>
                                                  <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                                      <button class="btn btn-danger">Xóa</button>
                                                  </a>
                                              </td>
                                          </tr>
                                      <?php endforeach ?>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th>STT</th>
                                          <th>Tên sản phẩm</th>
                                          <th>Ảnh Sản Phẩm</th>
                                          <th>Giá tiền</th>
                                          <th>Số lượng</th>
                                          <th>Danh mục</th>
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