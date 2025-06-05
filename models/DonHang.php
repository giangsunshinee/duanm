<?php

class DonHang
{

    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id)
    {
        try {
            $sql = 'INSERT INTO don_hangs (tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ghi_chu, tong_tien, phuong_thuc_thanh_toan_id, ngay_dat, ma_don_hang, trang_thai_id) 
                VALUES (:tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ghi_chu, :tong_tien, :phuong_thuc_thanh_toan_id, :ngay_dat, :ma_don_hang, :trang_thai_id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ghi_chu' => $ghi_chu,
                ':tong_tien' => $tong_tien,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                ':ngay_dat' => $ngay_dat,
                ':ma_don_hang' => $ma_don_hang,
                ':trang_thai_id' => $trang_thai_id
            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function addChiTietDonHang($donHangId, $sanPhamId, $soLuong, $donGia, $thanhTien)
    {
        try {
            $sql = 'INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, so_luong, thanh_tien, don_gia) 
                VALUES (:don_hang_id, :san_pham_id, :so_luong, :thanh_tien, :don_gia)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id' => $donHangId,
                ':san_pham_id' => $sanPhamId,
                ':so_luong' => $soLuong,
                ':don_gia' => $donGia,
                ':thanh_tien' => $thanhTien
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function clearDetailGioHang($gioHangId)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $gioHangId]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function clearGioHang($taiKhoanId)
    {
        try {
            $sql = 'DELETE FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $taiKhoanId]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function getDonHangFromUser($taiKhoanId)
    {
        try {
            $sql = 'SELECT * FROM don_hangs WHERE tai_khoan_id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $taiKhoanId
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function getTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function getPhuongThucThanhToan()
    {
        try {
            $sql = 'SELECT * FROM phuong_thuc_thanh_toans';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function getDonHangById($donHangId)
    {
        try {
            $sql = 'SELECT * FROM don_hangs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $donHangId
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function getChiTietDonHangByDonHangId($donHangId)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*,
                    san_phams.ten_san_pham,
                    san_phams.hinh_anh
                    FROM
                    chi_tiet_don_hangs
                    JOIN 
                    san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    WHERE
                    chi_tiet_don_hangs.don_hang_id = :don_hang_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':don_hang_id' => $donHangId
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }



    public function updateTrangThaiDonHang($donHangId, $trangThaiId)
    {
        try {
            $sql = 'UPDATE don_hangs SET trang_thai_id = :trang_thai_id WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai_id' => $trangThaiId,
                ':id' => $donHangId
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
}
