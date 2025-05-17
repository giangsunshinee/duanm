<?php

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once '../admin/controllers/AdminDanhMucController.php';
require_once '../admin/controllers/AdminSanPhamController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
// require_once './models/AdminSanPham.php';
// Route
$act = $_GET['act'] ?? '/';


match ($act) {
    //route 
    'danh-muc' => (new AdminDanhMucController())->danhSachSanPham(),
};
