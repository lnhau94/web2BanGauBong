<?php
include_once __DIR__.'/../util/dbconnect.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $DB = new DBConnect();
    $productId = $_REQUEST['productId'];
    $instock =  $DB -> getConnection()
        -> query('select ProductInventory from product where ProductId = '.$productId);
    echo $productId.":";
    echo $instock -> fetch_array()[0];
}
?>