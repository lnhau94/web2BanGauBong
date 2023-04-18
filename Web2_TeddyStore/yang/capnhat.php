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
                <label for="ProductPrice">Giá</label>
                <input type="number" min="0" id="ProductPrice" name="ProductPrice" class="form-control">
            </div>
            <div class="form-group">
                <label for="ProductInventory">Kho hàng</label>
                <input type="number" min="0" id="ProductInventory" name="ProductInventory" class="form-control">
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
                <!-- <input type="text" id="CategoryName" name="CategoryName" class="form-control"> -->
                <?php
                require_once 'ketnoi.php';
                if ($loai_sql = $conn->query("SELECT * FROM category")) {
                    $i = 0;
                    $string = '';
                    $string = $string . "<select name='CategoryId'>";
                    while ($i++ < $loai_sql->num_rows) {
                        $row = $loai_sql->fetch_array();
                        $string = $string . "<option value=";
                        $string = $string . $row[0];
                        $string = $string . ">";
                        $string = $string . $row[1];
                        $string = $string . "</option>";
                    }
                    $string = $string . "</select>";
                    echo $string;
                    // $loai_sql->free_result();
                }
                ?>
            </div>
            <button name="submit" class="btn btn-success">Thêm</button>
        </form>
    </div>
</body>

</html>

<?php
// Nhận dữ liệu từ form
$ProductName = $_POST['ProductName'];
// $fileToUpload = $_POST['fileToUpload'];
$ProductPrice = $_POST['ProductPrice'];
$ProductInventory = $_POST['ProductInventory'];
$ProductSize = $_POST['ProductSize'];
$ProductStatus = $_POST['ProductStatus'];
$CategoryId = $_POST['CategoryId'];
$ProductId = $_POST['sid'];

// Kết nối CSDL
require_once 'ketnoi.php';


// Viết lệnh sql để thêm dữ liệu
$lietke_sql = "SELECT * FROM product p join image i on p.ProductId = i.ProductId join category c on p.CategoryId = c.CategoryId";

$capnhat_sql = "UPDATE product SET ProductName='$ProductName', ProductPrice='$ProductPrice', ProductInventory='$ProductInventory', ProductSize='$ProductSize', ProductStatus='$ProductStatus', CategoryId='$CategoryId'
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