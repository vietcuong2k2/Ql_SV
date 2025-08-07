<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "student";

$conn = new mysqli($host, $user, $pass, $dbname);

// Kiểm tra lỗi kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập charset để tránh lỗi font tiếng Việt
$conn->set_charset("utf8");
?>
