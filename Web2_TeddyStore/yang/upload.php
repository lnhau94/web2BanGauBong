<?php
// var_dump($_FILES);
// move_uploaded_file($_FILES['hinhanh']['tmp_name'], 'anh/'.$_FILES['hinhanh']['name']);

// $folder_path = '\/anh/';
// $file_path = $folder_path.basename($_FILES['hinhanh']['name']);

// $flag_ok = true;

// // jpg, png, jpeg, gif
// $ex = array('jpg', 'png', 'gif', 'jpeg');
// $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
// // if (!in_array($file_type, $ex)) {
// //     echo 'File không hợp lệ';
// //     $flag_ok = false;
// // }

// if ($flag_ok) {
//     move_uploaded_file($_FILES['hinhanh']['tmp_name'], $file_path);

//     $upload_sql = "INSERT into sanpham (hinhanh) VALUES ($file_path)";
//     mysqli_query($conn, $upload_sql);
//     header("Location: lietke.php");
// }
// else {
//     echo 'Tải ảnh lên thất bại';
// }

$target_dir = "./anh/";
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
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)
?>