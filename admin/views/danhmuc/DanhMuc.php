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
                <h3 class="card-title">DataTable with default features</h3>
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
                          <a href="index.php?controller=AdminDanhMuc&action=edit&id=<?php $danhMuc['id'] ?>" class="btn btn-primary">Sửa</a>
                          <a href="index.php?controller=AdminDanhMuc&action=delete&id=<?php $danhMuc['id'] ?>" class="btn btn-danger">Xóa</a>
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