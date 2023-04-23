<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include_once __DIR__."/../util/dbconnect.php";
    $DB = new DBConnect();

    $DB->getConnection()->query(
        "update product 
                set ProductInventory = ProductInventory + '".$_REQUEST['storage']."' 
                where ProductId = '".$_REQUEST['productid']."'"
    );


}
?>