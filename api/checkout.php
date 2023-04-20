<?php
include_once __DIR__.'/../util/dbconnect.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $DB = new DBConnect();
    if($_REQUEST['cm'] == "order"){
        $DB -> getConnection()
            -> query(
                "insert into orders (TotalPrice,UsersId) values('".$_REQUEST['totalprice']."', '".$_REQUEST['userid']."')"
            );
        echo $DB->getConnection()->query("select OrdersId from orders order by OrdersId desc limit 1")
            ->fetch_array()[0];
    }
    if($_REQUEST['cm'] == "orderdetails"){
        $DB -> getConnection()
            -> query(
                "insert into orderdetail (OrdersId,ProductId,OrderQuantity)
                        values('".$_REQUEST['orderid']."', '".$_REQUEST['productid']."', '".$_REQUEST['qty']."')"
            );
        $DB -> getConnection() ->query(
            "delete from cart where p"
        );
    }
    if($_REQUEST['cm'] == "rmcart"){
        $DB -> getConnection() ->query(
            "delete from cart where productId = '".$_REQUEST['productid']."' and userId = '".$_REQUEST['userid']."'"
        );
        echo "removed";
    }

}

?>

