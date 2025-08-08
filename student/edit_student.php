<?php
require_once '../config/db.php';

$mssv = $_GET['mssv'] ?? '';
if (!$mssv) {
    die("Không tìm thấy MSSV.");
}

$sql = "SELECT * FROM sinhvien WHERE mssv = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mssv);
$stmt->execute();
$result = $stmt->get_result();
$sv = $result->fetch_assoc();

if (!$sv) {
    die("Không tìm thấy sinh viên.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $khoa = $_POST['khoa'];
    $ngaysinh = $_POST['ngaysinh'];
    $diem_tb = $_POST['diem_tb'];
    $trang_thai = $_POST['trang_thai'];
    $lop_id = $_POST['lop_id'];

    $sql = "UPDATE sinhvien SET hoten=?, email=?, khoa=?, ngaysinh=?, diem_tb=?, trang_thai=?, lop_id=? WHERE mssv=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssdis", $hoten, $email, $khoa, $ngaysinh, $diem_tb, $trang_thai, $lop_id, $mssv);

    if ($stmt->execute()) {
        header("Location: ../admin/student_manage.php");
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<form method="POST">
    MSSV: <input type="text" value="<?= htmlspecialchars($sv['mssv']) ?>" disabled><br>
    Họ tên: <input type="text" name="hoten" value="<?= htmlspecialchars($sv['hoten']) ?>" required><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($sv['email']) ?>" required><br>
    Khoa: <input type="text" name="khoa" value="<?= htmlspecialchars($sv['khoa']) ?>" required><br>
    Ngày sinh: <input type="date" name="ngaysinh" value="<?= htmlspecialchars($sv['ngaysinh']) ?>" required><br>
    Điểm TB: <input type="number" step="0.01" name="diem_tb" value="<?= htmlspecialchars($sv['diem_tb']) ?>" required><br>
    Trạng thái: 
    <select name="trang_thai">
        <option <?= $sv['trang_thai'] == 'Đang học' ? 'selected' : '' ?>>Đang học</option>
        <option <?= $sv['trang_thai'] == 'Tốt nghiệp' ? 'selected' : '' ?>>Tốt nghiệp</option>
    </select><br>
    Lớp ID: <input type="number" name="lop_id" value="<?= htmlspecialchars($sv['lop_id']) ?>"><br>
    <button type="submit">Lưu thay đổi</button>
</form>
