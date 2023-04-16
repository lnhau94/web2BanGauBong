<?php
include_once 'view/Catalog.php';
include_once 'view/FilterControl.php';
$url = parse_url($_SERVER['REQUEST_URI']);

$target = explode("/", $url['path'], 3)[1];

if($target == '' || $target == 'index.php'){
    include_once 'view/banner.php';
    showNewProduct();
}
if(str_contains($target,"Category")){
    $id = explode("=",$target)[1];
    echo "<div class='hau-product-view'>";
    renderFilter();
    showByCategory($id);
    echo "</div>";
}

if(str_contains($target,"product")){
    $arr = explode("=",$target);
    if(sizeof($arr) == 1){
        echo "<div class='hau-product-view'>";
        renderFilter();
        showAll(1,5,"('1')");
        echo "</div>";
    }
}

?>