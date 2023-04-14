<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Thêm sản phẩm</title>
</head>

<body>
    <div class="container">
        <h1>Thêm sản phẩm</h1>
        <!-- <form action="them.php" method="post"> -->
        <form action="them.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="ProductName">Tên sản phẩm</label>
                <input type="text" id="ProductName" name="ProductName" class="form-control">
            </div>
            <div class="form-group">
                <label for="fileToUpload">Hình ảnh</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
            </div>
            <div class="form-group">
                <label for="ProductPrice">Giá</label>
                <input type="text" id="ProductPrice" name="ProductPrice" class="form-control">
            </div>
            <div class="form-group">
                <label for="ProductInventory">Kho hàng</label>
                <input type="text" id="ProductInventory" name="ProductInventory" class="form-control">
            </div>
            <div class="form-group">
                <label for="ProductSize">Kích thước</label>
                <input type="text" id="ProductSize" name="ProductSize" class="form-control">
            </div>
            <div class="form-group">
                <label for="ProductStatus">Trạng thái</label></br>
                <select id="ProductStatus" name="ProductStatus" class="form-control">
                    <option value="Đang bán">Đang bán</option>
                    <option value="Ngừng kinh doanh">Ngừng kinh doanh</option>
                </select>
            </div>
            <div class="form-group">
                <label for="CategoryName">Loại</label>
                <input type="text" id="CategoryName" name="CategoryName" class="form-control">
            </div>
            <button name="submit" class="btn btn-success">Thêm</button>
        </form>
    </div>
</body>

</html>

<?php
// Nhận dữ liệu từ form
$ProductName = $_POST['ProductName'];
$fileToUpload = $_POST['fileToUpload'];
$ProductPrice = $_POST['ProductPrice'];
$ProductInventory = $_POST['ProductInventory'];
$ProductSize = $_POST['ProductSize'];
$ProductStatus = $_POST['ProductStatus'];
$CategoryName = $_POST['CategoryName'];
$ProductId = $_POST['sid'];

// Kết nối CSDL
require_once 'ketnoi.php';

// Lấy mã loại
$maloai_sql = "SELECT * FROM category";
$maloai_result = mysqli_query($conn, $maloai_sql);
$row_maloai = mysqli_fetch_array($maloai_result);
while ($r = mysqli_fetch_assoc($maloai_result)) {
    if ($CategoryName == $row_maloai['CategoryName']) {
        $CategoryId = $row_maloai['CategoryId'];
    }
}

// Viết lệnh sql để thêm dữ liệu
$capnhat_sql = "UPDATE product SET ProductName='$ProductName', ProductPrice='$ProductPrice', ProductInventory='$ProductInventory', ProductSize='$ProductSize', ProductStatus='$ProductStatus'
WHERE ProductId='$ProductId'";
// echo $capnhat_sql; exit;

// Thực thi câu lệnh thêm
if (mysqli_query($conn, $capnhat_sql)) {
    // In thông báo thành công
    // echo "<h1>Cập nhật thành công</h1>";

    //Trở về trang liệt kê
    header("Location: lietke.php");
}
?>