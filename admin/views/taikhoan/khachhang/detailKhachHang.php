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
                <div class="col-sm-12" style="text-align: center;">
                    <h1>Xem chi tiết tài khoản Khách Hàng </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid d-flex justify-content-center">
            <div class="card shadow-lg" style="max-width: 800px; width: 100%;">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                        <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" alt="Ảnh đại diện"
                            class="img-fluid rounded-circle border"
                            style="width: 220px; height: 220px; object-fit: cover;"
                            onerror="this.onerror=null; this.src='https://media.dolenglish.vn/PUBLIC/MEDIA/2b2f1391-7dcd-4d41-b1eb-2273c8cd00de.jpg'" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title mb-4"> <strong>Tên khách hàng</strong> : <?= $khachHang['ho_ten'] ?? '' ?></h4>
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <th width="40%">Email:</th>
                                    <td><?= $khachHang['email'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại:</th>
                                    <td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ:</th>
                                    <td><?= $khachHang['dia_chi'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày sinh:</th>
                                    <td><?= !empty($khachHang['ngay_sinh']) ? date('d-m-Y', strtotime($khachHang['ngay_sinh'])) : '' ?></td>
                                </tr>
                                <tr>
                                    <th>Giới tính:</th>
                                    <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                </tr>
                                <tr>
                                    <th>Trạng thái:</th>
                                    <td>
                                        <?php if ($khachHang['trang_thai'] == 1): ?>
                                            <span class="badge badge-success">Hoạt động</span>
                                        <?php else: ?>
                                            <span class="badge badge-secondary">Ngừng hoạt động</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                            <div class="mt-4">
                                <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i> Quay lại danh sách
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="col-12">
        <h1>Thông tin đơn hàng</h1>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách đơn hàng của khách hàng: <?= $khachHang['ho_ten'] ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="">
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
    <hr>
    <div class="col-12">
        <h1>Thông tin bình luận</h1>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Các bình luận của khách hàng: <?= $khachHang['ho_ten'] ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Nội dung bình luận</th>
                            <th>Ngày bình luận</th>
                            <th>Trạng thái</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']; ?>"><?= $binhLuan['ten_san_pham'] ?></a></td>
                                <td><?= $binhLuan['noi_dung'] ?></td>
                                <td><?= date('d/m/Y', strtotime($binhLuan['ngay_dang'])) ?></td>
                                <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                                <td>
                                    <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?> " method="POST">
                                        <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                        <input type="hidden" name="name_view" value="detail-khach">
                                        <input type="hidden" name="id_khach_hang" value="<?= $binhLuan['tai_khoan_id'] ?>">
                                        <button onclick="return confirm('Có chắc bạn muốn ẩn bình luận này không không ? ')" class="btn btn-danger">
                                            <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn':'Bỏ Ẩn' ?>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Nội dung bình luận</th>
                            <th>Ngày bình luận</th>
                            <th>Trạng thái</th>
                            <th>Thao Tác</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card -->
        </div>
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