<?php
// Dữ liệu mẫu (Có thể lấy từ cơ sở dữ liệu)
$courses = [
    ["name" => "Lập trình Web", "status" => "Đang học", "students" => 25, "total" => 30],
    ["name" => "Cơ sở dữ liệu", "status" => "Đang học", "students" => 15, "total" => 20],
    ["name" => "Mạng máy tính", "status" => "Đang học", "students" => 18, "total" => 25],
    ["name" => "Toán rời rạc", "status" => "Đang học", "students" => 20, "total" => 30],
    ["name" => "Trí tuệ nhân tạo", "status" => "Đang học", "students" => 22, "total" => 30],
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quản lý lớp học</title>
</head>
<body>
    <header>
        <div class="logo">
           <a href="#">
                <span class="material-symbols-outlined text-blue-600 font-extrabold text-3xl">school</span>
            </a>
        </div>
        <h1>Quản lý lớp học</h1>
        <div class="stats">
            <p>Sinh viên: 5</p>
            <p>Lớp học: 3</p>
            <p>Đang học: 135</p>
        </div>
    </header>

    <main>
        <button class="add-class">+ Thêm lớp học</button>
        <div class="course-list">
            <?php foreach ($courses as $course): ?>
                <div class="course-card">
                    <h2><?php echo $course['name']; ?></h2>
                    <p>Trạng thái: <?php echo $course['status']; ?></p>
                    <p>Sinh viên tham gia: <?php echo $course['students']; ?> / <?php echo $course['total']; ?></p>
                    <progress value="<?php echo $course['students']; ?>" max="<?php echo $course['total']; ?>"></progress>
                    <button class="view">Xem chi tiết</button>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>