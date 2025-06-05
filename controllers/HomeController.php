<?php

class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonhang;

    public function __construct()
    {
        // Khởi tạo model
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonhang = new DonHang();
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();

        $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
        if (!$gioHang) {
            $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
            $gioHang = ['id' => $gioHangId];
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        } else {
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        }

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

        $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
        $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
        if (!$gioHang) {
            $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
            $gioHang = ['id' => $gioHangId];
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        } else {
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        }

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
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            require_once './views/gioHang.php';
        } else {
            $_SESSION['error'] = 'Bạn cần đăng nhập để xem giỏ hàng.';
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }

    public function thanhToan()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            require_once './views/thanhToan.php';
        } else {
            $_SESSION['error'] = 'Bạn cần đăng nhập để xem giỏ hàng.';
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
            $ma_don_hang = 'DH-' . rand(1000, 9999); // Tạo mã đơn hàng duy nhất

            $donHang = $this->modelDonhang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );

            // var_dump('them thanh cong');
            // die();

            $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
            if ($donHang) {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

                foreach ($chiTietGioHang as $item) {
                    $donGia = $item['gia_khuyen_mai'] ?? $item['gia_san_pham'];
                    $this->modelDonhang->addChiTietDonHang(
                        $donHang,
                        $item['san_pham_id'],
                        $item['so_luong'],
                        $donGia,
                        $item['thanh_tien'] = $donGia * $item['so_luong']

                    );
                }
            }

            $this->modelDonhang->clearDetailGioHang($gioHang['id']);

            $this->modelDonhang->clearGioHang($tai_khoan_id);

            header('Location: ' . BASE_URL . '?act=lich-su-mua-hang');
            exit();
        } else {
            var_dump('loi thanh toan khong thanh cong');
            die();
        }
    }

    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $arrTrangThaiDonHang = $this->modelDonhang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrTrangThaiDonHang, 'ten_trang_thai', 'id');
            // echo "<pre>";
            // print_r($trangThaiDonHang);
            // die;

            $arrPhuongThucThanhToan = $this->modelDonhang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrPhuongThucThanhToan, 'ten_phuong_thuc', 'id');
            // echo "<pre>";
            // print_r($phuongThucThanhToan);
            // die;

            $donHangs = $this->modelDonhang->getDonHangFromUser($tai_khoan_id);
            require_once './views/lichSuMuaHang.php';
        } else {
            $_SESSION['error'] = 'Bạn cần đăng nhập để xem lịch sử mua hàng.';
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }

    public function chiTietMuaHang() {}

    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $donHangId = $_GET['id'];

            $donHang = $this->modelDonhang->getDonHangById($donHangId);
            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền huỷ đơn hàng này !";
                exit;
            }

            if ($donHang['trang_thai_id'] != 1) {
                echo "Chỉ đơn hàng chưa xác nhận thì có thể hủy !";
                exit;
            }

            $this->modelDonhang->updateTrangThaiDonHang($donHangId, 11);
            header('Location: ' . BASE_URL . '?act=lich-su-mua-hang');
        } else {
            $_SESSION['error'] = 'Bạn cần đăng nhập để xem lịch sử mua hàng.';
            header('Location: ' . BASE_URL . '?act=login');
            exit();
        }
    }
}
