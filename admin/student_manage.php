<?php
require_once '../config/db.php'; // kết nối DB

// Query: lấy sinh viên + tên lớp (nếu có)
$sql = "SELECT sv.mssv, sv.hoten, sv.email, sv.khoa, sv.ngaysinh, sv.diem_tb, sv.trang_thai, sv.lop_id, l.tenlop
        FROM sinhvien sv
        LEFT JOIN lop l ON sv.lop_id = l.id
        ORDER BY sv.hoten ASC";
$result = $conn->query($sql);

if (!$result) {
    die("Lỗi truy vấn: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Quản lý sinh viên</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-white text-gray-800">

<header class="border-b border-gray-200">
    <nav class="max-w-[1200px] mx-auto flex items-center justify-between px-4 sm:px-6 lg:px-8 h-16">
        <div class="flex items-center space-x-6">
            <a class="text-blue-600 font-bold text-lg select-none" href="#">logo</a>
            <ul class="hidden md:flex space-x-6 text-sm text-gray-700 font-normal">
                <li><a class="hover:text-gray-900" href="dashboard.php">Trang chủ</a></li>
                <li><a class="hover:text-gray-900" href="#">Quản lý sinh viên</a></li>
                <li><a class="hover:text-gray-900" href="#">Quản lý lớp học</a></li>
                <li><a class="hover:text-gray-900" href="#">Môn học</a></li>
                <li><a class="hover:text-gray-900" href="#">Quản lý điểm</a></li>
                <li><a class="hover:text-gray-900" href="#">Báo cáo</a></li>
            </ul>
        </div>
        <div class="flex items-center space-x-6 text-gray-500 text-lg">
            <button aria-label="Thông báo" class="hover:text-gray-700"><i class="far fa-bell"></i></button>
            <button aria-label="Tài khoản" class="hover:text-gray-700"><i class="far fa-user"></i></button>
        </div>
    </nav>
</header>

<main class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-12">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
        <div>
            <h1 class="text-gray-900 font-semibold text-xl leading-tight">Quản lý sinh viên</h1>
            <p class="text-gray-500 text-xs mt-1">Quản lý thông tin và theo dõi tiến độ học tập của sinh viên</p>
        </div>
        <a href="../student/add_student.php" class="mt-4 sm:mt-0 inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-4 py-2 rounded">
            <i class="fas fa-plus mr-2"></i> Thêm sinh viên
        </a>
    </div>

    <section class="bg-white border border-gray-100 rounded-lg p-4">
        <table class="w-full text-left text-gray-700 text-xs border-separate border-spacing-y-2">
            <thead>
                <tr>
                    <th class="pl-4 font-semibold">Họ tên</th>
                    <th class="font-semibold">Mã SV</th>
                    <th class="font-semibold">Lớp</th>
                    <th class="font-semibold">Khoa</th>
                    <th class="font-semibold">Ngày sinh</th>
                    <th class="font-semibold">Điểm TB</th>
                    <th class="font-semibold">Trạng thái</th>
                    <th class="pr-4 font-semibold">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="bg-white rounded-lg shadow-sm">
                            <td class="pl-4 py-3">
                                <p class="font-semibold text-gray-900"><?= htmlspecialchars($row['hoten']) ?></p>
                                <p class="text-gray-400 text-[9px]"><?= htmlspecialchars($row['email']) ?></p>
                            </td>
                            <td class="py-3 font-semibold text-gray-900"><?= htmlspecialchars($row['mssv']) ?></td>
                            <td class="py-3"><?= htmlspecialchars($row['tenlop'] ?? '') ?></td>
                            <td class="py-3"><?= htmlspecialchars($row['khoa']) ?></td>
                            <td class="py-3"><?= htmlspecialchars($row['ngaysinh']) ?></td>
                            <td class="py-3 font-semibold"><?= htmlspecialchars($row['diem_tb']) ?></td>
                            <td class="py-3">
                                <?php $tt = $row['trang_thai'] ?? 'Đang học'; ?>
                                <span class="inline-block <?= $tt == 'Đang học' ? 'bg-green-100 text-green-600' : 'bg-purple-100 text-purple-600' ?> text-[9px] font-semibold px-2 py-0.5 rounded-full">
                                    <?= htmlspecialchars($tt) ?>
                                </span>
                            </td>
                            <td class="pr-4 py-3 flex items-center space-x-3 text-sm">
                                <!-- Sửa: truyền mssv -->
                                <a href="../student/edit_student.php?mssv=<?= urlencode($row['mssv']) ?>" class="text-gray-600 hover:text-gray-800" title="Sửa">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <!-- Xóa: truyền mssv -->
                                <a href="../student/delete_student.php?mssv=<?= urlencode($row['mssv']) ?>" onclick="return confirm('Xóa sinh viên này?')" class="text-red-600 hover:text-red-700" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center py-6 text-gray-500">Chưa có dữ liệu sinh viên.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>

</body>
</html>
