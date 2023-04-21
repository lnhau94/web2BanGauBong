<div class="hau-category-table">
    <div class="titles-site" style="padding: 10px 10px; background-color: #ffd5df;">
        <label style="font-size: 24px; color: #950b2d; "><b>Loại Sản Phẩm</b></label>


    <?php
        if(in_array("category-add",$_SESSION['permission'])){
            echo '<button class="btn-add-user" onclick="showInputForm()">Thêm</button>';
        }
    ?>
    </div>
    <div class="hau-category-header">
        <label class="hau-table-item">Mã loại</label>
        <label class="hau-table-item">Tên loại</label>
        <label class="hau-table-item">Hành động</label>
    </div>
    <div class="hau-category-body">
        <?php
            include_once __DIR__."/../../util/dbconnect.php";
            $DB = new DBConnect();
            $rs = $DB -> getConnection() ->query("select * from category");
            while($row = $rs->fetch_assoc()){
                echo '
                    <div class="hau-category-table-row" data-id="'.$row['CategoryId'].'">
                        <label class="hau-table-item">'.$row['CategoryId'].'</label>
                        <input type="text" class="hau-table-item category-name" value="'.$row['CategoryName'].'">';
                echo '<div>';
                if(in_array("category-edit",$_SESSION['permission'])){
                    echo '<button onclick="editCategory(this.parentElement.parentElement)" class="btn-Edit-User"><i class="fa-solid fa-pen-to-square"></i></button>';
                }
                if(in_array("category-remove",$_SESSION['permission'])){
                    echo '<button onclick="removeCategory(this.parentElement.parentElement)" class="btn-Edit-User"><i class="fa-solid fa-trash"></i></button>';
                }
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>

</div>
<?php
    include_once __DIR__."/CategoryNewForm.php";
?>