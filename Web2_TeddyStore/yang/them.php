<?php
// Nhận dữ liệu từ form
$tensp = $_POST['tensp'];
$gia = $_POST['gia'];
$khohang = $_POST['khohang'];
$kichthuoc = $_POST['kichthuoc'];
$trangthai = $_POST['trangthai'];
$maloai = $_POST['maloai'];
$loai = $_POST['loai'];
$hinhanh = $_POST['hinhanh'];

// Kết nối CSDL
require_once 'ketnoi.php';

// Viết lệnh sql để thêm dữ liệu
$them_sql = "INSERT INTO sanpham (tensp, hinhanh, gia, khohang, kichthuoc, trangthai, maloai, loai)
VALUES ('$tensp', '$hinhanh', '$gia', '$khohang', '$kichthuoc', '$trangthai', '$maloai', '$loai')";
//echo $them_sql; exit;

// Thực thi câu lệnh thêm
if (mysqli_query($conn, $them_sql)) {
    // In thông báo thành công
    // echo "<h1>Thêm thành công</h1>";
    
    //Trở về trang liệt kê
    header("Location: lietke.php");
}
