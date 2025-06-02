<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;

    public function __construct()
    {
        // Khởi tạo model
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
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
                $_SESSION['user_client'] = $user; // Lưu thông tin người dùng vào session
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

    public function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
        }
        header('Location: ' . BASE_URL . '?act=login');
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }

                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $_SESSION['error'] = 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.';
                header('Location: ' . BASE_URL . '?act=login');
                exit();
            }
            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];
            $checkSanPham = false;

            foreach ($chiTietGioHang as $detail) {
                if ($detail['san_pham_id'] == $san_pham_id) {
                    $newSoLuong = $detail['so_luong'] + $so_luong;
                    $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                    $checkSanPham = true;
                }
            }

            if (!$checkSanPham) {
                $this->modelGioHang->addDetalGioHang($gioHang['id'], $san_pham_id, $so_luong);
            }

            header('Location: ' . BASE_URL . '?act=gio-hang');
        } else {
            $_SESSION['error'] = 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.';
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }

    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if ($gioHang) {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                require_once './views/gioHang.php';
            } else {
                $_SESSION['error'] = 'Giỏ hàng của bạn hiện đang trống.';
                header('Location: ' . BASE_URL);
                exit();
            }
        } else {
            $_SESSION['error'] = 'Bạn cần đăng nhập để xem giỏ hàng.';
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }
}
