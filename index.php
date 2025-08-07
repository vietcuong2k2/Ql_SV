<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chính</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Xin chào, <?= htmlspecialchars($user['FullName']) ?>!</h2>
        <p>Vai trò: <strong><?= $user['Role'] ?></strong></p>

        <?php if ($user['Role'] == 'admin'): ?>
            <a href="sinhvien/view_sv.php" class="btn btn-primary">Quản lý sinh viên</a>
        <?php elseif ($user['Role'] == 'teacher'): ?>
            <a href="teacher/my_classes.php" class="btn btn-primary">Lớp của tôi</a>
        <?php elseif ($user['Role'] == 'student'): ?>
            <a href="grades/view_grades.php" class="btn btn-primary">Xem điểm</a>
        <?php endif; ?>

        <a href="auth/logout.php" class="btn btn-danger ml-2">Đăng xuất</a>
    </div>
</body>
</html>
