<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
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
        <h1>Danh sách sản phẩm</h1>

        <!-- Nút để mở Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Thêm sản phẩm
        </button></br>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Kho hàng</th>
                    <th>Kích thước</th>
                    <th>Trạng thái</th>
                    <th>Mã loại</th>
                    <th>Loại</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kết nối
                require_once 'ketnoi.php';

                // Câu lệnh
                $lietke_sql = "SELECT * FROM sanpham";

                // Thực thi câu lệnh
                $result = mysqli_query($conn, $lietke_sql);

                // Duyệt qua result và in ra
                while ($r = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $r['tensp']; ?></td>
                        <td><img width="460" height="345" class="img-fluid" src="anh/<?php echo $r['hinhanh'];?>"></td>
                        <td><?php echo $r['gia']; ?></td>
                        <td><?php echo $r['khohang']; ?></td>
                        <td><?php echo $r['kichthuoc']; ?></td>
                        <td><?php echo $r['trangthai']; ?></td>
                        <td><?php echo $r['maloai']; ?></td>
                        <td><?php
                            $i = 0;
                            
                        ?></td>
                        <td>
                            <a href="sua.php?sid=<?php echo $r['masp']; ?>" class="btn btn-info">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xóa sản phẩm?');" href="xoa.php?sid=<?php echo $r['masp']; ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="them.php" method="post">
                        <div class="form-group">
                            <label for="tensp">Tên sản phẩm</label>
                            <input type="text" id="tensp" name="tensp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="hinhanh">Hình ảnh</label>
                            <input type="file" name="hinhanh" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gia">Giá</label>
                            <input type="text" id="gia" name="gia" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="khohang">Kho hàng</label>
                            <input type="text" id="khohang" name="khohang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kichthuoc">Kích thước</label>
                            <input type="text" id="kichthuoc" name="kichthuoc" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="trangthai">Trạng thái</label></br>
                            <select id="trangthai" name="trangthai" class="form-control">
                                <option value="Đang bán">Đang bán</option>
                                <option value="Ngừng kinh doanh">Ngừng kinh doanh</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="maloai">Mã loại</label>
                            <input type="text" id="maloai" name="maloai" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="loai">Loại</label>
                            <input type="text" id="loai" name="loai" class="form-control">
                        </div>
                        <button class="btn btn-success">Thêm</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>
</body>

</html>