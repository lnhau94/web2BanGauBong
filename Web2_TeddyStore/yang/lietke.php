<div class="container">
    <h1>Danh sách sản phẩm</h1>
    <!-- Nút để mở Modal -->
    <?php
        if(in_array("product-add",$_SESSION['permission'])){
            echo '
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Thêm sản phẩm
            </button>
            ';
        }
    ?>

    <!-- <a href="them.php" class="btn btn-primary">Thêm sản phẩm</a> -->
    <table class="table">
        <thead class="table-danger">
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
        $lietke_sql = "SELECT * FROM product p join image i on p.ProductId = i.ProductId join category c on p.CategoryId = c.CategoryId";

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
                <td><?php echo "<img style='width:100px;height:100px;' src='/img/" . $r['ImageUrl'] . "'"; ?></td>
                <td><?php echo $r['ProductPrice']; ?></td>
                <td><?php echo $r['ProductInventory']; ?></td>
                <td><?php echo $r['ProductSize']; ?></td>
                <td><?php echo $r['ProductStatus']; ?></td>
                <td><?php echo $r['CategoryName']; ?></td>
                <td>
                    <a href="/Web2_TeddyStore/yang/sua.php?sid=<?php echo $r['ProductId']; ?>" class="btn btn-info">Sửa</a>
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
                <form action="/Web2_TeddyStore/yang/them.php" method="post" enctype="multipart/form-data">

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

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>