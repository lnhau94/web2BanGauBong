<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include_once __DIR__.'/../view/CartView.php';
    include_once __DIR__.'/../Model/Cart.php';
    $cart = new CartView(Cart::getData($_REQUEST['userId']));
    echo $cart->show();
}
?>