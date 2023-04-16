<?php
    include_once __DIR__.'/../Entity/Category.php';
    function renderFilter(){
        echo '<div class="hau-control-container">';
            echo '<div class="products-inpage">';

            echo '<label>Số sản phẩm mỗi trang:</label>';
                echo '<select id="inPageChoice">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                      </select>';
            echo '</div>';

            echo '<input type="text" name="hau-search-field" placeholder="Nhập tên sản phẩm muốn tìm">';
            echo '<button class="hau-search-button">Search <i class="fa-solid fa-magnifying-glass"></i></button>';

            echo '<div>';
                echo '<label>Category</label>';
                echo '<button onclick="hideCate()" id="hau-btn-hide" class="hau-control-button"><i class="fa-solid fa-chevron-down"></i></button>';
            echo '</div>';

            $cat = new Categories();
            echo '<div id="hau-cate-holder" class="hau-cate-holder">';
                    foreach($cat ->getCategories() as $item){
                        echo '<div class="">';
                        echo '<input type="checkbox" value="'.$item->getId().'">' . $item->getName();
                        echo '</div>';
                    }
            echo "</div>";
        echo '</div>';
    }  
?>
<script type="text/javascript">
    function hideCate(){
        if(document.getElementById("hau-cate-holder").style.display=="none"){
            document.getElementById("hau-cate-holder").style.display="block";
        }
        else{
            document.getElementById("hau-cate-holder").style.display="none"
        }
    }
</script>