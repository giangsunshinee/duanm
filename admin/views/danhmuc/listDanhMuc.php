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
            <h1>Quan Ly danh sach danh muc </h1>
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
                <a href="<?= BASE_URL_ADMIN . '?act=form-them-danh-muc' ?>">
                  <button class="btn btn-success">Thêm Danh Mục Sản Phẩm</button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên danh mục</th>
                      <th>Mô tả</th>
                      <th>Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>
                      <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $danhMuc['ten_danh_muc'] ?></td>
                        <td><?= $danhMuc['mo_ta'] ?></td>
                        <td>
                          <a href="<?= BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>">
                            <button class="btn btn-primary">Sửa</button>
                          </a>
                          <a href="<?= BASE_URL_ADMIN . '?act=xoa-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                            <button class="btn btn-danger">Xóa</button>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>STT</th>
                      <th>Tên danh mục</th>
                      <th>Mô tả</th>
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