<?php
include_once 'view/ProductView.php';
function showByCategory($id){
    $ps = new Products();
    echo '<div class="hau-product-view-container">';
    foreach ($ps->getByCategoryId($id) as $item) {
        $s = new ProductView($item);
        echo $s->showInCatalog();
    }
    echo '</div>';
}

function showAll($page=1, $productCount = 5){
    $ps = new Products();
    echo '<div class="hau-product-view-container">';
    foreach ($ps->getAllProduct() as $item) {
        $s = new ProductView($item);
        echo $s->showInCatalog();
    }
    echo '</div>';
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

<style>
    <?php include_once 'CSS/Hau-product-page.css';?>
</style>
