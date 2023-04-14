<?php
include_once 'view/ProductView.php';
function render($id){
    $ps = new Products();
    echo '<div class="hau-product-view-container">';
    foreach ($ps->getByCategoryId($id) as $item) {
        $s = new ProductView($item);
        echo $s->show();
    }
    echo '</div>';
}

?>