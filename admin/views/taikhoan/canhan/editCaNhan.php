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
                      <h1>Sửa Tài Khoản Quản Cá Nhân </h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container " style="max-width: 800px;">
              <h1 style="text-align : center">Edit Profile</h1>
              <hr>
              <div class="row justify-content-center ">
                  <form action="<?= BASE_URL_ADMIN . '?act=sua-thong-tin-ca-nhan-quan-tri' ?>" method="POST">
                      <!-- left column -->
                      <div class="col-md-12">
                          <div class="text-center">
                              <img src="<?= BASE_URL . $thongTin['anh_dai_dien']; ?>" class="avatar img-circle" alt="avatar" style="width: 150px; height: 150px;" onerror="this.onerror=null;this.src='https://th.bing.com/th/id/OIP._p7dSl1uR5eynQDkJyb1tgAAAA?rs=1&pid=ImgDetMain';">
                              <input type="file" class="form-control">
                              <h6>Họ tên : <?= $thongTin['ho_ten'] ?></h6>
                              <h6>Chức vụ : <?= $thongTin['chuc_vu_id'] ?></h6>
                          </div>
                      </div>

                      <!-- edit form column -->
                      <div class="col-md-12 personal-info">
                          <hr>
                          <h3>Thông tin cá nhân</h3>

                          <div class="form-group">
                              <label class="col-lg-3 control-label">Họ Tên: </label>
                              <div class="col-lg-12">
                                  <input class="form-control" type="text" value="<?= $thongTin['ho_ten'] ?>" name="ho_ten">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Last name:</label>
                              <div class="col-lg-12">
                                  <input class="form-control" type="text" value="Bishop">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Company:</label>
                              <div class="col-lg-12">
                                  <input class="form-control" type="text" value="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Email:</label>
                              <div class="col-lg-12">
                                  <input class="form-control" type="text" value="<?= $thongTin['email'] ?>" name="email">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-3 control-label">Time Zone:</label>
                              <div class="col-lg-12">
                                  <div class="ui-select">
                                      <select id="user_time_zone" class="form-control">
                                          <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                          <option value="Alaska">(GMT-09:00) Alaska</option>
                                          <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                          <option value="Arizona">(GMT-07:00) Arizona</option>
                                          <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                          <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                          <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                          <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-3 control-label"></label>
                              <div class="col-md-12">
                                  <input type="submit" class="btn btn-primary" value="Save Changes">
                              </div>
                          </div>
                  </form>
                  <hr>
                  <?php if (isset($_SESSION['success'])) { ?>
                      <div class="alert alert-info alert-dismissable">
                          <a class="panel-close close" data-dismiss="alert">×</a>
                          <strong>Thông báo!</strong> <?= $_SESSION['success'] ?>
                      </div>
                  <?php } ?>

                  <h3>Đổi mật khẩu</h3>
                  <p>Để bảo mật tài khoản của bạn, vui lòng không chia sẻ mật khẩu với bất kỳ ai.</p>

                  <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri' ?>" method="POST">
                      <div class="form-group">
                          <label class="col-md-3 control-label">Mật khẩu cũ :</label>
                          <div class="col-md-12">
                              <input class="form-control" type="text" name="old_pass" value="">
                              <?php if (isset($_SESSION['error']['old_pass'])) { ?>
                                  <p class="alert alert-danger" role="alert">
                                      <?= $_SESSION['error']['old_pass'] ?>
                                  </p>
                              <?php } ?>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">Mật khẩu mới :</label>
                          <div class="col-md-12">
                              <input class="form-control" type="text" name="new_pass" value="">
                              <?php if (isset($_SESSION['error']['new_pass'])) { ?>
                                  <p class="alert alert-danger" role="alert">
                                      <?= $_SESSION['error']['new_pass'] ?>
                                  </p>
                              <?php } ?>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label">Nhập lại mật khẩu mới :</label>
                          <div class="col-md-12">
                              <input class="form-control" type="text" name="confirm_pass" value="">
                              <?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
                                  <p class="alert alert-danger" role="alert">
                                      <?= $_SESSION['error']['confirm_pass'] ?>
                                  </p>
                              <?php } ?>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-3 control-label"></label>
                          <div class="col-md-12">
                              <input type="submit" class="btn btn-primary" value="Save Changes">
                          </div>
                      </div>
                  </form>
              </div>
          </div>
  </div>
  <hr>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php include_once 'views/layout/footer.php'; ?>
  </body>

  </html>