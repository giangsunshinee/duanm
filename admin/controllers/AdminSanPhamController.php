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

                if (!empty($img_array['name'])) {
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
        $listAnhSanPham = $this->modelSanpham->getlistAnhSanPham($sanPham['id']);
        if (!is_array($listAnhSanPham)) {
            $listAnhSanPham = [];
        }
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
            // Lấy ra du lieu 
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $sanPhamOld = $this->modelSanpham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // Lấy đường dẫn hình ảnh cũ

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap']    ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta']    ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

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

            // if ($hinh_anh['error'] !== 0) {
            //     $errors['hinh_anh'] = 'Phải chọn hình ảnh';
            // }

            $_SESSION['error'] = $errors;

            if (isset($hinh_anh) && $hinh_anh['error'] === 0) {
                // Có upload ảnh mới, xử lý upload
                $new_file = uploadFile($hinh_anh, './uploads/');
                if (!empty($new_file)) {
                    // Xóa file cũ nếu có
                    if (!empty($old_file)) {
                        deleteFile($old_file);
                    }
                } else {
                    $new_file = $old_file; // Giữ nguyên file cũ nếu upload mới thất bại
                }
            } else {
                $new_file = $old_file; // Không upload ảnh mới, giữ nguyên ảnh cũ
            }

            if (empty($errors)) {
                // Nếu không có lỗi thì thêm danh mục vào database
                $san_pham_id = $this->modelSanpham->updateSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file, $san_pham_id);


                header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
            } else {
                // Nếu có lỗi thì hiển thị lại form và thông báo lỗi
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }
    }

    public function postEditAnhSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            $listAnhSanPhamCurrent = $this->modelSanpham->getlistAnhSanPham($san_pham_id);
            if (!is_array($listAnhSanPhamCurrent)) {
                $listAnhSanPhamCurrent = [];
            }

            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            $upload_file = [];

            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }

            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanpham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                    $this->modelSanpham->updateAnhSanPham($file_info['id'], $file_info['file']);
                    deleteFile($old_file);
                } else {
                    // Nếu không có id, thêm ảnh mới
                    $this->modelSanpham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }

            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    $this->modelSanpham->destroyAlbumAnhSanPham($anh_id);
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }

            header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }

    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];
        $SanPham = $this->modelSanpham->getDetailSanPham($id);

        if ($SanPham) {
            // Lấy danh sách ảnh album
            $listAnhSanPham = $this->modelSanpham->getlistAnhSanPham($id);
            $listAnhSanPham = is_array($listAnhSanPham) ? $listAnhSanPham : [];

            // Xóa từng ảnh album (file + DB)
            foreach ($listAnhSanPham as $anhSP) {
                deleteFile($anhSP['link_hinh_anh']);
                $this->modelSanpham->destroyAlbumAnhSanPham($anhSP['id']);
            }

            // Xóa sản phẩm
            $this->modelSanpham->destroySanPham($id);
        }

        header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }

    public function detailSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanpham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanpham->getlistAnhSanPham($id);
        if ($sanPham) {
            require_once '../admin/views/sanpham/detailSanPham.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
}
