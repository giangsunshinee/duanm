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
                      <h1>Sửa Tài Khoản Quản Trị Viên </h1>
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
                              <h3 class="card-title">Sửa Tài Khoản Quản Trị Viên : <?= $quantri['ho_ten'] ?></h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="<?= BASE_URL_ADMIN . '?act=sua-quan-tri' ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_quan_tri" value="<?= $quantri['id'] ?>">
                              <div class="row card-body ">
                                  <div class="form-group col-12">
                                      <label>Họ Tên </label>
                                      <input type="text" class="form-control" name="ho_ten" value="<?= $quantri['ho_ten'] ?>" placeholder="Nhập họ tên">
                                      <?php if (isset($_SESSION['error']['ho_ten'])) { ?>

                                          <div class="text-danger">
                                              <?= $_SESSION['error']['ho_ten'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>
                                  <div class="form-group col-12">
                                      <label>Email </label>
                                      <input type="text" class="form-control" name="email" value="<?= $quantri['email'] ?>" placeholder="Nhập email">
                                      <?php if (isset($_SESSION['error']['email'])) { ?>

                                          <div class="text-danger">
                                              <?= $_SESSION['error']['email'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group col-12">
                                      <label>Số Điện Thoại </label>
                                      <input type="text" class="form-control" name="so_dien_thoai" value="<?= $quantri['so_dien_thoai'] ?>" placeholder="Nhập số điện thoại">
                                      <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>

                                          <div class="text-danger">
                                              <?= $_SESSION['error']['so_dien_thoai'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group col-12">
                                      <label>Trạng Thái </label>
                                      <select class="form-control" name="trang_thai">
                                          <option value="1" <?= $quantri['trang_thai'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
                                          <option value="2" <?= $quantri['trang_thai'] == 2 ? 'selected' : '' ?>>Ngừng hoạt động</option>
                                      </select>
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