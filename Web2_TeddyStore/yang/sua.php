<?php
// Lấy id của sản phẩm muốn sửa
$idsp = $_GET['sid'];

// Kết nối
require_once 'ketnoi.php';

// Câu lệnh để lấy thông tin của sản phẩm có masp = $idsp
$sua_sql = "SELECT * FROM sanpham WHERE masp = $idsp";

$result = mysqli_query($conn, $sua_sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form action="capnhat.php" method="post">
            <input type="hidden" name="sid" value="<?php echo $idsp;?>" id="">
            <div class="form-group">
                <label for="tensp">Tên sản phẩm</label>
                <input type="text" id="tensp" name="tensp" class="form-control"
                value="<?php echo $row['tensp']?>">
            </div>
            <div class="form-group">
                <label for="hinhanh">Hình ảnh</label>
                <input type="text" id="hinhanh" name="hinhanh" class="form-control"
                value="<?php echo $row['hinhanh']?>">
            </div>
            <div class="form-group">
                <label for="gia">Giá</label>
                <input type="text" id="gia" name="gia" class="form-control"
                value="<?php echo $row['gia']?>">
            </div>
            <div class="form-group">
                <label for="khohang">Kho hàng</label>
                <input type="text" id="khohang" name="khohang" class="form-control"
                value="<?php echo $row['khohang']?>">
            </div>
            <div class="form-group">
                <label for="kichthuoc">Kích thước</label>
                <input type="text" id="kichthuoc" name="kichthuoc" class="form-control"
                value="<?php echo $row['kichthuoc']?>">
            </div>
            <div class="form-group">
                <label for="trangthai">Trạng thái</label></br>
                <select id="trangthai" name="trangthai" class="form-control"
                value="<?php echo $row['trangthai']?>">
                    <option value="Đang bán">Đang bán</option>
                    <option value="Ngừng kinh doanh">Ngừng kinh doanh</option>
                </select>
            </div>
            <div class="form-group">
                <label for="maloai">Mã loại</label>
                <input type="text" id="maloai" name="maloai" class="form-control"
                value="<?php echo $row['maloai']?>">
            </div>
            <div class="form-group">
                <label for="loai">Loại</label>
                <input type="text" id="loai" name="loai" class="form-control"
                value="<?php echo $row['loai']?>">
            </div>
            <button class="btn btn-success">Lưu</button>
        </form>
    </div>
</body>

</html>