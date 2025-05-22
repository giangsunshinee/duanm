<?php

class AdminDonHangController
{
    // Khai báo biến model
    public $modelDonHang;
    // Hàm khởi tạo
    public function __construct()
    {

        $this->modelDonHang = new AdminDonHang();
    }

    public function danhSachDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();

        require_once './views/donhang/listDonHang.php';
    }

    public function detailDonhang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
        if (!is_array($sanPhamDonHang)) {
            $sanPhamDonHang = [];
        }

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        if (!is_array($listTrangThaiDonHang)) {
            $listTrangThaiDonHang = [];
        }

        require_once './views/donhang/detailDonHang.php';
    }

    public function formEditDonHang()
    {
        // var_dump('formAddSanPham');
        // Lấy id danh mục từ url
        $id = $_GET['id_don_hang'] ?? '';
        $donHang = $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        if (!is_array($listTrangThaiDonHang)) {
            $listTrangThaiDonHang = [];
        }
        if ($donHang) {
            require_once './views/donhang/editDonHang.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
    }

    public function postEditDonHang()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $don_hang_id = $_POST['don_hang_id'] ?? '';
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';;

            // Validate dữ liệu
            $errors = [];

            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
            }

            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại không được để trống';
            } elseif (!preg_match('/^[0-9]{10,11}$/', $sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại không hợp lệ';
            }

            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email không được để trống';
            } elseif (!filter_var($email_nguoi_nhan, FILTER_VALIDATE_EMAIL)) {
                $errors['email_nguoi_nhan'] = 'Email không hợp lệ';
            }

            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ không được để trống';
            }

            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Trạng thái không được để trống';
            }

            $_SESSION['error'] = $errors;


            if (empty($errors)) {
                // Nếu không có lỗi thì thêm danh mục vào database
                $this->modelDonHang->updateDonHang($don_hang_id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id);

                header('Location: ' . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else {
                // Nếu có lỗi thì hiển thị lại form và thông báo lỗi
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $don_hang_id);
                exit();
            }
        }
    }

    // public function postEditAnhSanPham()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $san_pham_id = $_POST['san_pham_id'] ?? '';

    //         $listAnhSanPhamCurrent = $this->modelSanpham->getlistAnhSanPham($san_pham_id);
    //         if (!is_array($listAnhSanPhamCurrent)) {
    //             $listAnhSanPhamCurrent = [];
    //         }

    //         $img_array = $_FILES['img_array'];
    //         $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
    //         $current_img_ids = $_POST['current_img_ids'] ?? [];

    //         $upload_file = [];

    //         foreach ($img_array['name'] as $key => $value) {
    //             if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
    //                 $new_file = uploadFileAlbum($img_array, './uploads/', $key);
    //                 if ($new_file) {
    //                     $upload_file[] = [
    //                         'id' => $current_img_ids[$key] ?? null,
    //                         'file' => $new_file
    //                     ];
    //                 }
    //             }
    //         }

    //         foreach ($upload_file as $file_info) {
    //             if ($file_info['id']) {
    //                 $old_file = $this->modelSanpham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
    //                 $this->modelSanpham->updateAnhSanPham($file_info['id'], $file_info['file']);
    //                 deleteFile($old_file);
    //             } else {
    //                 // Nếu không có id, thêm ảnh mới
    //                 $this->modelSanpham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
    //             }
    //         }

    //         foreach ($listAnhSanPhamCurrent as $anhSP) {
    //             $anh_id = $anhSP['id'];
    //             if (in_array($anh_id, $img_delete)) {
    //                 $this->modelSanpham->destroyAlbumAnhSanPham($anh_id);
    //                 deleteFile($anhSP['link_hinh_anh']);
    //             }
    //         }

    //         header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
    //         exit();
    //     }
    // }

    // public function deleteSanPham()
    // {
    //     $id = $_GET['id_san_pham'];
    //     $SanPham = $this->modelSanpham->getDetailSanPham($id);

    //     if ($SanPham) {
    //         // Lấy danh sách ảnh album
    //         $listAnhSanPham = $this->modelSanpham->getlistAnhSanPham($id);
    //         $listAnhSanPham = is_array($listAnhSanPham) ? $listAnhSanPham : [];

    //         // Xóa từng ảnh album (file + DB)
    //         foreach ($listAnhSanPham as $anhSP) {
    //             deleteFile($anhSP['link_hinh_anh']);
    //             $this->modelSanpham->destroyAlbumAnhSanPham($anhSP['id']);
    //         }

    //         // Xóa sản phẩm
    //         $this->modelSanpham->destroySanPham($id);
    //     }

    //     header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
    //     exit();
    // }

    // public function detailSanPham()
    // {
    //     $id = $_GET['id_san_pham'];
    //     $sanPham = $this->modelSanpham->getDetailSanPham($id);
    //     $listAnhSanPham = $this->modelSanpham->getlistAnhSanPham($id);
    //     if ($sanPham) {
    //         require_once '../admin/views/sanpham/detailSanPham.php';
    //     } else {
    //         header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
    //         exit();
    //     }
    // }
}
