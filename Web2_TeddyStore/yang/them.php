<?php
// Nhận dữ liệu từ form
$ProductName = $_POST['ProductName'];
// $fileToUpload = $_POST['fileToUpload'];
$ProductPrice = $_POST['ProductPrice'];
$ProductInventory = $_POST['ProductInventory'];
$ProductSize = $_POST['ProductSize'];
$ProductStatus = $_POST['ProductStatus'];
// $CategoryName = $_POST['CategoryName'];
$CategoryId = $_POST['CategoryId'];

// Kết nối CSDL
require_once 'ketnoi.php';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
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
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif"
) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
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

    
  $id_sql = "SELECT ProductId FROM product ORDER BY ProductId desc limit 1";
  $rs = mysqli_query($conn,$id_sql);
  $pId = "";
  while ($row = mysqli_fetch_array($rs)){
    $pId = $row['0'];
  }
  $imageName = basename($_FILES["fileToUpload"]["name"]);
  $insertImage = "INSERT INTO image (ImageUrl, ProductId) VALUES ('" .$imageName. "',".$pId.")";
  mysqli_query($conn,$insertImage);

  //Trở về trang liệt kê
  header("Location: index.php");
}

?>