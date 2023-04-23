<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include_once __DIR__.'/../Entity/Hau_Order.php';
    $order = new Orders();
    echo '<div class="hau-order-holder">';
    $order -> getOrders($_REQUEST['userId']);
    echo '</div>';
}
?>