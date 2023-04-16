<?php

include_once __DIR__.'/../view/ProductView.php';
include_once __DIR__.'/../Model/Products.php';
function showByCategory($id){
    $ps = new Products();
    echo '<div id="hau-product-view-container" class="hau-product-view-container">';
    foreach ($ps->getByCategoryId($id) as $item) {
        $s = new ProductView($item);
        echo $s->showInCatalog();
    }
    echo '</div>';
}

function showAll($page=1, $productCount = 5,$categories = "('1','2')"){
    $ps = new Products();
    echo '<div id="hau-product-view-container" class="hau-product-view-container">';
    foreach ($ps->getProduct($page,$productCount,$categories) as $item) {
        $s = new ProductView($item);
        echo $s->showInCatalog();
    }
    showPanigation();
    echo '</div>';
}

function showAllItem($page=1, $productCount = 5,$categories = "('1','2')"){
    $ps = new Products();
    foreach ($ps->getProduct($page,$productCount,$categories) as $item) {
        $s = new ProductView($item);
        echo $s->showInCatalog();
    }
    showPanigation();
}

function showPanigation($page=1, $productCount = 5,$categories = "('1','2')"){
    $ps = new Products();
    $itemCount = $ps->getProductCount($page,$productCount,$categories);
    echo '<ul class="hau-pagination">';
    for ($i = 1 ; $i <= $itemCount ; $i++){
        if ($i == $page){
            echo '<li onclick="ajax()" class="hau-pagination-item current">'.$i.'</li>';
        }
        else{
            echo '<li onclick="ajax()" class="hau-pagination-item">'.$i.'</li>';
        }
    }
    echo '</ul>';
}

function showNewProduct(){
    $ps = new Products();

    echo '<label class="hau-container-label">New Arrival</label>';
    echo '<div class="hau-product-container">';
    foreach ($ps->getNewProducts() as $item) {
        $s = new ProductView($item);
        echo $s->showInCatalog();
    }
    echo '</div>';
}

?>


