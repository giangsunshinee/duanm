<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;

    public function __construct()
    {
        // Khởi tạo model
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
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

    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getlistAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getSanPhamDanhMuc($sanPham['danh_muc_id']);
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header('Location: ' . BASE_URL);
            exit();
        }
    }

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        // deleteSessionError();
        exit();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['mat_khau'];

            // var_dump($email, $password);
            // die();

            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            // var_dump($user);
            //  die();

            if ($user == $email) { // Nếu đăng nhập thành công
                $_SESSION['user_admin'] = $user; // Lưu thông tin người dùng vào session
                header('Location: ' . BASE_URL);
                exit();
            } else {  // Nếu đăng nhập thất bại
                $_SESSION['error'] = $user; // Lưu thông báo lỗi vào session

                $_SESSION['flash'] = true; // Đánh dấu có thông báo lỗi

                // Chuyển hướng về trang đăng nhập
                header('Location: ' . BASE_URL . '?act=login');
                exit();
            }
        }
    }
}
