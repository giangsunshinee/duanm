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
                      <h1>Sửa Danh Mục Sản Phẩm </h1>
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
                              <h3 class="card-title">Sửa Danh Mục Sản Phẩm</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="<?= BASE_URL_ADMIN . '?act=sua-danh-muc' ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $danhmuc['id'] ?>">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Tên Danh Mục </label>
                                      <input type="text" class="form-control" name="ten_danh_muc" placeholder="Nhập tên danh mục" value="<?= $danhmuc['ten_danh_muc'] ?>">
                                      <?php if (isset($errors['ten_danh_muc'])) { ?>

                                          <div class="text-danger">
                                              <?= $errors['ten_danh_muc'] ?>
                                          </div>
                                      <?php } ?>
                                  </div>

                                  <div class="form-group">
                                      <label>Mô tả </label>
                                      <textarea class="form-control" name="mo_ta" placeholder="Nhập mô tả"><?= $danhmuc['mo_ta'] ?></textarea>
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