<?php

class AdminDanhMucController
{

    public $modelDanhmuc;
    public function __construct()
    {

        $this->modelDanhmuc = new AdminDanhMuc();
    }
    public function danhSachSanPham()
    {
        $listDanhMuc = $this->modelDanhmuc->getAllDanhMuc();
       require_once './views/danhmuc/DanhMuc.php';
    }
}