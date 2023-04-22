<form method="GET" action="" class="hau-form" style="width: 50%" onsubmit="return checkDate();">
    <input type="hidden" name="select" value="statistics">
    <div>
        <label class="hau-admin-label" style="font-size: 1rem;width: 20%;" for="start">Ngày bắt đầu</label>
        <input type="date" class="hau-form-element" id="start" name="start">
    </div>
    <div>
        <label class="hau-admin-label" style="font-size: 1rem;width: 20%;" for="end">Ngày kết thúc</label>
        <input type="date" class="hau-form-element" id="end" name="end">
    </div>
    <input type="submit" class="btn-add-user" value="OK">

</form>

<?php
    include_once __DIR__."/../../util/dbconnect.php";
    $DB = new DBConnect();
    if(isset($_GET['start']) && isset($_GET['end'])){
        $rs = $DB -> getConnection() -> query("
                        select p.ProductId, p.ProductName, p.ProductPrice , sum(o.OrderQuantity) as qty, p.ProductPrice*sum(o.OrderQuantity) as rev
                        from orderdetail o right join product p on o.ProductId = p.ProductId 
                        join orders o2 on o.OrdersId = o2.OrdersId 
                        where o2.OrdersDate between '".$_GET['start']."' and '".$_GET['end']."' 
                        group by p.ProductId order by qty desc limit 15
                        ");
    }else{
        $rs = $DB -> getConnection() -> query("
                        select p.ProductId, p.ProductName, p.ProductPrice , sum(o.OrderQuantity) as qty, p.ProductPrice*sum(o.OrderQuantity) as rev
                        from orderdetail o right join product p on o.ProductId = p.ProductId 
                        group by p.ProductId order by qty desc limit 15
                        ");
    }

    echo '<div class="hau-statistics-table">';
    echo '
        <div class="titles-site" style="padding: 10px 10px; background-color: #ffd5df;">
            <label style="font-size: 24px; color: #950b2d; "><b>Thống kê sản phẩm</b></label>
            <button style="margin: 2px" onclick="showProductChart(this.parentElement.parentElement)" class="btn-add-user">Biểu đồ</button>
            <button style="margin: 2px" onclick="showTable(this.parentElement.parentElement)" class="btn-add-user">Bảng</button>
        </div>';
    echo '
        <div class="hau-statistic-header">
            <label class="hau-table-item">Mã Sản Phẩm</label>
            <label class="hau-table-item">Tên Sản Phẩm</label>
            <label class="hau-table-item">Đơn Giá</label>
            <label class="hau-table-item">Số lượng bán</label>
            <label class="hau-table-item">Doanh thu</label>
        </div>
    ';
    echo '<div class="hau-statistics-body">';
    while($row = $rs->fetch_assoc()){
        echo '
            <div class="hau-statistics-row">
                <label class="hau-table-item">'.$row['ProductId'].'</label>
                <label class="hau-table-item item-name">'.$row['ProductName'].'</label>
                <label class="hau-table-item ">'.$row['ProductPrice'].'</label>
                <label class="hau-table-item item-qty">'.$row['qty'].'</label>
                <label class="hau-table-item item-rev">'.$row['rev'].'</label>
            </div>
        ';
    }
    echo '</div>';
    echo '<div class="hau-chart-holder">
            <canvas id="productChart"></canvas>
           </div>';
    echo '</div>';

    if(isset($_GET['start']) && isset($_GET['end'])){
        $rs = $DB -> getConnection() -> query("
                    select c.CategoryId , c.CategoryName , sum(o.OrderQuantity) as qty, sum(p.ProductPrice*o.OrderQuantity) as rev
                        from orderdetail o right join product p on o.ProductId = p.ProductId 
                            join category c on p.CategoryId = c.CategoryId 
                        join orders o2 on o.OrdersId = o2.OrdersId 
                        where o2.OrdersDate between '".$_GET['start']."' and '".$_GET['end']."' 
                        group by p.CategoryId order by qty desc 
                        ");
    }else{
        $rs = $DB -> getConnection() -> query("
                    select c.CategoryId , c.CategoryName , sum(o.OrderQuantity) as qty, sum(p.ProductPrice*o.OrderQuantity) as rev
                        from orderdetail o right join product p on o.ProductId = p.ProductId 
                            join category c on p.CategoryId = c.CategoryId
                        group by p.CategoryId order by qty desc 
                        ");
    }


    echo '<div class="hau-statistics-table">';
    echo '
        <div class="titles-site" style="padding: 10px 10px; background-color: #ffd5df;">
            <label style="font-size: 24px; color: #950b2d; "><b>Thống kê Loại sản phẩm</b></label>
            <button style="margin: 2px" onclick="showCategoryChart(this.parentElement.parentElement)" class="btn-add-user">Biểu đồ</button>
            <button style="margin: 2px" onclick="showTable(this.parentElement.parentElement)" class="btn-add-user">Bảng</button>
        </div>';
    echo '
            <div class="hau-statistic-header">
                <label class="hau-table-item">Mã Sản Phẩm</label>
                <label class="hau-table-item">Tên Sản Phẩm</label>
                <label class="hau-table-item">Số lượng bán</label>
                <label class="hau-table-item">Doanh thu</label>
                <label class="hau-table-item"></label>
            </div>
        ';
    echo '<div class="hau-statistics-body">';
    while($row = $rs->fetch_assoc()){
        echo '
                <div class="hau-statistics-row">
                    <label class="hau-table-item">'.$row['CategoryId'].'</label>
                    <label class="hau-table-item item-name">'.$row['CategoryName'].'</label>
                    <label class="hau-table-item item-qty">'.$row['qty'].'</label>
                    <label class="hau-table-item item-rev">'.$row['rev'].'</label>
                    <label class="hau-table-item"></label>
                </div>
            ';
    }
    echo '</div>';

    echo '<div class="hau-chart-holder">
            <canvas id="categoryChart"></canvas>
           </div>';
    echo '</div>';

?>
