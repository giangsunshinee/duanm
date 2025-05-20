<?php

class AdminSanPhamController
{
    // Khai báo biến model
    public $modelSanpham;
    public $modelDanhmuc;
    // Hàm khởi tạo
    public function __construct()
    {

        $this->modelSanpham = new AdminSanPham();
        $this->modelDanhmuc = new AdminDanhMuc();
    }

    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanpham->getAllSanPham() ?? [];

        require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham()
    {
        // var_dump('formAddSanPham');
        $listDanhMuc = $this->modelDanhmuc->getAllDanhMuc();

        require_once '../admin/views/sanpham/addSanPham.php';

        deleteSessionError();
    }

    public function postAddSanPham()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap']    ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta']    ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            //luu hinh anh
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            $img_array = $_FILES['img_array'];


            // Validate dữ liệu
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên danh mục không được để trống';
            }

            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }

            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi không được để trống';
            }

            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }

            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
            }

            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục phải chọn';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }

            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'Phải chọn hình ảnh';
            }

            $_SESSION['error'] = $errors;


            if (empty($errors)) {
                // Nếu không có lỗi thì thêm danh mục vào database
                $san_pham_id = $this->modelSanpham->insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $file_thumb);
                
                if(!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]
                        ];

                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanpham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }

                header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
            } else {
                // Nếu có lỗi thì hiển thị lại form và thông báo lỗi
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }

    public function formEditSanPham()
    {
        // var_dump('formAddSanPham');
        // Lấy id danh mục từ url
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanpham->getDetailSanPham($id);
        $listSanpham = $this->modelSanpham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhmuc->getAllDanhMuc();
        // var_dump($SanPham);
        // Nếu không tìm thấy danh mục thì quay về trang danh sách
        if ($sanPham) {
            require_once '../admin/views/sanpham/editSanPham.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

    public function postEditSanPham()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $mo_ta = $_POST['mo_ta'];

            // Validate dữ liệu
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên danh mục không được để trống';
            }

            if (empty($errors)) {
                // Nếu không có lỗi thì sửa danh mục vào database
                $this->modelSanpham->updateSanPham($id, $ten_san_pham, $mo_ta);
                header('Location: ' . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                // Nếu có lỗi thì hiển thị lại form và thông báo lỗi
                $SanPham = [
                    'id' => $id,
                    'ten_san_pham' => $ten_san_pham,
                    'mo_ta' => $mo_ta
                ];

                require_once '../admin/views/sanpham/editSanPham.php';
            }
        }
    }

    public function deleteSanPham()
    {
        // Lấy id danh mục từ url
        $id = $_GET['id_san_pham'];
        // Kiểm tra xem danh mục có tồn tại không
        $SanPham = $this->modelSanpham->getDetailSanPham($id);
        // Nếu không tìm thấy danh mục thì quay về trang danh sách
        if ($SanPham) {
            // Xóa danh mục
            $this->modelSanpham->destroySanPham($id);
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }
}
