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

function showAll($page=1, $productCount = 5,$categories = "('1','2','3','4','5','6','7','8','9','10')",$name="",$minPrice=0,$maxPrice=1000000){
    $ps = new Products();
    echo '<div id="hau-product-view-container" class="hau-product-view-container">';
    foreach ($ps->advSearch($page,$productCount,$categories,$name,$minPrice,$maxPrice) as $item) {
        $s = new ProductView($item);
        echo $s->showInCatalog();
    }
    showPanigation($page,$productCount,$categories,$name,$minPrice,$maxPrice);
    echo '</div>';
}

function showAllItem($page=1, $productCount = 5,$categories = "('1','2')"){
    $ps = new Products();
    foreach ($ps->getProduct($page,$productCount,$categories) as $item) {
        $s = new ProductView($item);
        echo $s->showInCatalog();
    }
    showPanigation($page,$productCount,$categories);
}

function showPanigation($page=1, $productCount = 5,$categories = "('1','2')",$name="",$minPrice=0,$maxPrice=1000000){
    $ps = new Products();
    $itemCount = $ps->getProductCount($page,$productCount,$categories,$name,$minPrice,$maxPrice)/$productCount;
    echo '<ul class="hau-pagination">';
    for ($i = 1 ; $i < $itemCount+1 ; $i++){
        if ($i == $page){
            echo '<li onclick="ajax('.$i.')" class="hau-pagination-item current">'.$i.'</li>';
        }
        else{
            echo '<li onclick="ajax('.$i.')" class="hau-pagination-item">'.$i.'</li>';
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

function showProductDetail($id){
    $ps = new Products();
    $cateId = "";

//    echo '<label class="hau-container-label">New Arrival</label>';
    foreach ($ps->getAllProduct() as $item) {
        if($item->getId() == $id) {
            $s = new ProductView($item);
            echo $s->showInProductPage();
            $cateId = $item->getCategory();
            break;
        }
    }

    echo '<label class="hau-container-label">Cùng thể loại</label>';
    echo '<div class="hau-product-container">';
    foreach ($ps->getByCategoryId($cateId) as $item) {
        $s = new ProductView($item);
        echo $s->showInCatalog();
    }
    echo '</div>';
}

?>


