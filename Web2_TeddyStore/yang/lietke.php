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
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <div class="container">
        <h1>Danh sách sản phẩm</h1>
        <!-- Nút để mở Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Thêm sản phẩm
        </button>
        <!-- <a href="them.php" class="btn btn-primary">Thêm sản phẩm</a> -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Kho hàng</th>
                    <th>Kích thước</th>
                    <th>Trạng thái</th>
                    <th>Loại</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kết nối
                require_once 'ketnoi.php';

                // Câu lệnh
                $lietke_sql = "SELECT * FROM product";

                // Thực thi câu lệnh
                $lietke_result = mysqli_query($conn, $lietke_sql);
                $row_lietke = mysqli_fetch_array($lietke_result);

                $maloai_sql = "SELECT * FROM category";
                $maloai_result = mysqli_query($conn, $maloai_sql);
                $row_maloai = mysqli_fetch_array($maloai_result);

                // Duyệt qua result và in ra
                // while ($r = mysqli_fetch_assoc($lietke_result)) {
                //     while ($rr = mysqli_fetch_assoc($maloai_result)) {
                //         if ($row_lietke['CategoryId'] = $row_maloai['CategoryId']) {
                //             $CategoryName == $row_maloai['CategoryName'];
                //         }
                //     }
                //     echo $r['ProductName'] . " - " . $r['ProductPrice'] . " - " . $r['ProductInventory'] . " - " . $r['ProductSize'] . " - " . $r['ProductStatus'] . " - " . $CategoryName;
                // }
                while ($r = mysqli_fetch_assoc($lietke_result)) {
                ?>
                    <!-- echo $r['ProductName'] . " - " . $r['ProductPrice'] . " - " . $r['ProductInventory'] . " - " . $r['ProductSize'] . " - " . $r['ProductStatus'] . " - " . $r['CategoryId']; -->
                    <tr>
                        <td><?php echo $r['ProductName']; ?></td>
                        <td><?php echo $r['fileToUpload']; ?></td>
                        <td><?php echo $r['ProductPrice']; ?></td>
                        <td><?php echo $r['ProductInventory']; ?></td>
                        <td><?php echo $r['ProductSize']; ?></td>
                        <td><?php echo $r['ProductStatus']; ?></td>
                        <td><?php echo $r['CategoryId']; ?></td>
                        <td>
                            <a href="sua.php?sid=<?php echo $r['ProductId']; ?>" class="btn btn-info">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xóa sản phẩm?');" href="xoa.php?sid=<?php echo $r['ProductId']; ?>" class="btn btn-danger">Xóa</a>
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

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</body>

</html>