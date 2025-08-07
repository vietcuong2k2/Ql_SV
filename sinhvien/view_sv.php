<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['vai_tro'] != 'sinhvien') {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin sinh viên</title>
</head>
<body>
    <h1>Chào Sinh viên: <?php echo $_SESSION['ho_ten']; ?></h1>
    <p>Trang thông tin cá nhân của sinh viên.</p>
    <a href="../auth/logout.php" class="btn btn-danger">Đăng Xuất</a>
</body>
</html>
