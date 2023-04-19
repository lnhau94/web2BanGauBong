<?php
include_once 'view/Catalog.php';
include_once 'view/FilterControl.php';
$url = parse_url($_SERVER['REQUEST_URI']);

$target = explode("/", $url['path'], 3)[1];

if($target == '' || $target == 'index.php'){
    include_once 'view/banner.php';
    showNewProduct();
}
//if($target == 'cart'){
//    include_once 'view/CartView.php';
//    include_once 'Model/Cart.php';
//    $cart = new CartView(Cart::getData(1));
//    echo $cart->show();
//}
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
        showAll(1,5);
        echo "</div>";
    }else{
        showProductDetail($arr[1]);
    }
}

?>