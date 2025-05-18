<?php

class AdminDanhMucController
{

    public $modelDanhmuc;
    public function __construct()
    {

        $this->modelDanhmuc = new AdminDanhMuc();
    }

    public function danhSachDanhMuc()
    {
        $listDanhMuc = $this->modelDanhmuc->getAllDanhMuc();

        require_once './views/danhmuc/listDanhMuc.php';
    }

    public function formAddDanhMuc()
    {
        // var_dump('formAddDanhMuc');
        require_once '../admin/views/danhmuc/addDanhMuc.php';
    }

    public function postAddDanhMuc()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // Validate dữ liệu
            $errors = [];

            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            if (empty($errors)) {
                // Nếu không có lỗi thì thêm danh mục vào database
                $this->modelDanhmuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                // Nếu có lỗi thì hiển thị lại form và thông báo lỗi
                require_once '../admin/views/danhmuc/addDanhMuc.php';
            }
        }
    }

    public function formEditDanhMuc()
    {
        // var_dump('formAddDanhMuc');
        // Lấy id danh mục từ url
        $id = $_GET['id_danh_muc'];
        $danhmuc = $this->modelDanhmuc->getDetailDanhMuc($id);
        // var_dump($danhmuc);
        // Nếu không tìm thấy danh mục thì quay về trang danh sách
        if ($danhmuc) {
            require_once '../admin/views/danhmuc/editDanhMuc.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }

    public function postEditDanhMuc()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // Validate dữ liệu
            $errors = [];

            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            if (empty($errors)) {
                // Nếu không có lỗi thì sửa danh mục vào database
                $this->modelDanhmuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                // Nếu có lỗi thì hiển thị lại form và thông báo lỗi
                $danhmuc = [
                    'id' => $id,
                    'ten_danh_muc' => $ten_danh_muc,
                    'mo_ta' => $mo_ta
                ];

                require_once '../admin/views/danhmuc/editDanhMuc.php';
            }
        }
    }

    public function deleteDanhMuc()
    {
        // Lấy id danh mục từ url
        $id = $_GET['id_danh_muc'];
        // Kiểm tra xem danh mục có tồn tại không
        $danhmuc = $this->modelDanhmuc->getDetailDanhMuc($id);
        // Nếu không tìm thấy danh mục thì quay về trang danh sách
        if ($danhmuc) {
            // Xóa danh mục
            $this->modelDanhmuc->destroyDanhMuc($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
}
