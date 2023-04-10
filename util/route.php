<?php
$url = parse_url($_SERVER['REQUEST_URI']);

$target = explode("/", $url['path'], 3)[2];

if($target == '' || $target == 'index.php'){
    include_once 'view/banner.php';
    include_once 'view/NewProduct.php';
}
if(str_contains($target,"Category")){
    $id = explode("=",$target)[1];
    include_once 'view/Category.php';
    include_once 'view/FilterControl.php';
    echo "<div class='hau-product-view'>";
    renderFilter();
    render($id);
    echo "</div>";
}
?>