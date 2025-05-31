<?php

class HomeController
{
    public $modelSanPham;

    public function __construct()
    {
        // Khởi tạo model
        $this->modelSanPham = new SanPham();
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }

    public function trangchu()
    {
        // Gọi view
        echo 'Home page2';
    }

    public function danhSachSanPham()
    {
        // Gọi view
        // echo 'Danh sách sản phẩm';
        $listProduct = $this->modelSanPham->getAllProduct();
        // var_dump($listProduct);die();
        require_once  './views/listProduct.php';
    }
}
