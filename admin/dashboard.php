<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['vai_tro'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Trang Admin</title>
    <style>
        .card {
            margin: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <h5>Chào Admin</h5>
        <a href="../auth/logout.php" class="btn btn-danger">Đăng Xuất</a>
    </div>
    
    <div class="container mt-4">
        <h1>Trang Chủ Quản Trị</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Tổng sinh viên</h5>
                        <p class="card-text">1,234</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Lớp học</h5>
                        <p class="card-text">48</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Môn học</h5>
                        <p class="card-text">156</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-5">Hoạt động gần đây</h2>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                Cập nhật thông tin sinh viên
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                Đăng ký lớp học mới
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                Cập nhật điểm cho sinh viên
            </a>
        </div>

        <h2 class="mt-5">Thông báo hệ thống</h2>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                Hệ thống sẽ bảo trì vào 2:00 AM ngày mai
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                Cập nhật phần mềm vào cuối tháng
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>