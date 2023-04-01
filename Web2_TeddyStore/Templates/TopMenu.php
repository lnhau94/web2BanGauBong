<div class="topmenu">
    <ul>
        <?php
            $Menus = array("TRANG CHỦ", "GIẢM GIÁ", "MỚI", "LIÊN HỆ");
            for ($x = 0; $x < count($Menus); $x++){
                echo '<li> <a href = "index.php?chon='. $x .'" > '. $Menus[$x] .' </a></li>';
            }
        ?>
    </ul>
</div>