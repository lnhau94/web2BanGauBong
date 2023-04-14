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

// Kết nối CSDL
require_once 'ketnoi.php';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

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
$them_sql = "INSERT INTO product (ProductName, ProductPrice, ProductInventory, ProductSize, ProductStatus, CategoryId)
VALUES ('$ProductName', '$ProductPrice', '$ProductInventory', '$ProductSize', '$ProductStatus', '$CategoryId')";
//echo $them_sql; exit;

// Thực thi câu lệnh thêm
if (mysqli_query($conn, $them_sql)) {
    // In thông báo thành công
    // echo "<h1>Thêm thành công</h1>";

    //Trở về trang liệt kê
    header("Location: lietke.php");
}
?>