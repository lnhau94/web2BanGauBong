<?php
// Lấy id của sản phẩm muốn xóa
$ProductId = $_GET['sid'];
// echo $id;

// Kết nối
require_once 'ketnoi.php';

// Câu lệnh sql
$xoa_sql = "DELETE FROM product WHERE ProductId=$ProductId";

mysqli_query($conn, $xoa_sql);
//echo "<h1>Xóa thành công</h1>";

//Trở về trang liệt kê
header("Location: lietke.php");
?>