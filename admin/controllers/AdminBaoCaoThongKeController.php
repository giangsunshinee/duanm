<?php

class AdminBaoCaoThongKeController
{
    public function home()
    {
        // // Lấy danh sách đơn hàng
        // $donHangModel = new AdminDonHang();
        // $listDonHang = $donHangModel->getAllDonHang();

        // // Lấy danh sách sản phẩm
        // $sanPhamModel = new AdminSanPham();
        // $listSanPham = $sanPhamModel->getAllSanPham();

        // // Lấy danh sách danh mục
        // $danhMucModel = new AdminDanhMuc();
        // $listDanhMuc = $danhMucModel->getAllDanhMuc();

        // // Gọi view
        require_once './views/home.php';
    }
}
