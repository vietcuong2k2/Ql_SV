<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mssv = $_POST['mssv'];
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $khoa = $_POST['khoa'];
    $ngaysinh = $_POST['ngaysinh'];
    $diem_tb = $_POST['diem_tb'];
    $trang_thai = $_POST['trang_thai'];
    $lop_id = $_POST['lop_id'];

    $sql = "INSERT INTO sinhvien (mssv, hoten, email, khoa, ngaysinh, diem_tb, trang_thai, lop_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssdsi", $mssv, $hoten, $email, $khoa, $ngaysinh, $diem_tb, $trang_thai, $lop_id);

    if ($stmt->execute()) {
        header("Location: ../admin/student_manage.php");
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<form method="POST">
    MSSV: <input type="text" name="mssv" required><br>
    Họ tên: <input type="text" name="hoten" required><br>
    Email: <input type="email" name="email" required><br>
    Khoa: <input type="text" name="khoa" required><br>
    Ngày sinh: <input type="date" name="ngaysinh" required><br>
    Điểm TB: <input type="number" step="0.01" name="diem_tb" required><br>
    Trạng thái: 
    <select name="trang_thai">
        <option>Đang học</option>
        <option>Tốt nghiệp</option>
    </select><br>
    Lớp ID: <input type="number" name="lop_id"><br>
    <button type="submit">Thêm sinh viên</button>
</form>
