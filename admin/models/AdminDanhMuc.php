<?php
class AdminDanhMuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllDanhMuc()
    {

        try {
            $sql = "SELECT * FROM danh_mucs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();
            // Lấy tất cả các bản ghi
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
