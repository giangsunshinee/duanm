<?php
class SanPham
{
    public $conn;

    // Hàm khởi tạo
    public function __construct()
    {
        // Kết nối database
        $this->conn = connectDB();
    }

    // Hàm lấy danh sách sản phẩm
    public function getAllProduct()
    {
        try {
            $sql = "SELECT * FROM san_phams";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi kết nối database: " . $e->getMessage();
        }
    }

    public function getAllSanPham()
    {
        $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi kết nối database: " . $e->getMessage();
        }
    }
}
