<?php

class AdminTaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
    }

    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        require_once '../admin/views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once '../admin/views/taikhoan/quantri/addQuanTri.php';

        deleteSessionError();
    }

    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];

            $errors = [];

            // Validate dữ liệu
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            $_SESSION['error'] = $errors;

            // Nếu không có lỗi thì xử lý thêm tài khoản
            if (empty($errors)) {
                // password mặc định
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                // var_dump($password);die();
                $chuc_vu_id = 1; // ID của quản trị viên
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);

                header('Location: ' . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }
}
