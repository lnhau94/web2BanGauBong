<?php
// Nhận dữ liệu từ form
$tensp = $_POST['tensp'];
$gia = $_POST['gia'];
$khohang = $_POST['khohang'];
$kichthuoc = $_POST['kichthuoc'];
$trangthai = $_POST['trangthai'];
$maloai = $_POST['maloai'];
$loai = $_POST['loai'];
$idsp = $_POST['sid'];
$hinhanh = $_POST['hinhanh'];

// Kết nối CSDL
require_once 'ketnoi.php';

// Viết lệnh sql để cập nhật dữ liệu
$capnhat_sql = "UPDATE sanpham SET tensp = '$tensp', hinhanh = '$hinhanh', gia = '$gia', khohang = '$khohang', kichthuoc = '$kichthuoc', trangthai = '$trangthai', maloai = '$maloai', loai = '$loai' 
WHERE masp = $idsp";
// echo $capnhat_sql; exit;

// Thực thi câu lệnh thêm
if (mysqli_query($conn, $capnhat_sql)) {
    // In thông báo thành công
    // echo "<h1>Cập nhật thành công</h1>";
    
    //Trở về trang liệt kê
    header("Location: lietke.php");
}
