<?php

// Kết nối CSDL qua PDO
function connectDB()
{
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

// them file
function uploadFile($file, $folderUpload)
{
    $pathStoreage = $folderUpload . time() . $file['name'];

    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStoreage;
    if (move_uploaded_file($from, $to)) {
        return $pathStoreage;
    }
    return null;
}

function uploadFileAlbum($file, $folderUpload, $key)
{
    $pathStoreage = $folderUpload . time() . $file['name'][$key];

    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStoreage;
    if (move_uploaded_file($from, $to)) {
        return $pathStoreage;
    }
    return null;
}

// xoa file
function deleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}

// xoa session
function deleteSessionError()
{
    if (isset($_SESSION['flash'])) {
        unset($_SESSION['flash']);
        unset($_SESSION['error']);
        // session_unset();
        // session_destroy();
    }
}

function formatDate($date)
{
    return date('d/m/Y', strtotime($date));
}

function checkLoginAdmin()
{
    if (!isset($_SESSION['user_admin'])) { // Kiểm tra nếu chưa đăng nhập
        // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
        require_once '../admin/views/auth/formLogin.php';
        exit();
    }
}
