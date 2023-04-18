<?php
    include_once __DIR__.'/../Entity/Category.php';
    function renderFilter(){
        echo '<div class="hau-control-container">';
            echo '<div class="products-inpage">';

            echo '<label class="hau-control-label">Số sản phẩm mỗi trang:</label>';
                echo '<select id="inPageChoice">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                      </select>';
            echo '</div>';
            echo '<div class="hau-search-holder">';
            echo '<input style="width: 100%" type="text" name="hau-search-field" placeholder="Tìm kiếm">';
            echo '<button onclick="ajax(1)" class="hau-search-button">Search <i class="fa-solid fa-magnifying-glass"></i></button>';
            echo '</div>';
            echo '<div class="hau-cate-control">';
                echo '<label class="hau-control-label">Category</label>';
                echo '<button onclick="hideCate()" id="hau-btn-hide" class="hau-control-button">
                            <i class="fa-solid fa-chevron-down"></i>
                      </button>';
            echo '</div>';

            $cat = new Categories();
            echo '<div id="hau-cate-holder" class="hau-cate-holder">';
                    foreach($cat ->getCategories() as $item){
                        echo '<div class="hau-control-category-choice-holder">';
                        echo '<input class="hau-control-category-choice" type="checkbox" value="'.$item->getId().'">' . $item->getName();
                        echo '</div>';
                    }
            echo '</div>';
            echo '<label id="min-price-value"></label>';
            echo '<label id="max-price-value"></label>';
            echo '<div class="hau-slider-holder">';
            echo '<input onchange="showMinPrice()" id="min-price-slider" class="hau-slider-price" type="range" min="0" max="500000" step="1" value="0">';
            echo '<input onchange="showMaxPrice()" id="max-price-slider" class="hau-slider-price" type="range" min="500000" max="1000000" step="1000" value="1000000">';
            echo '</div>';
        echo '</div>';
    }  
?>