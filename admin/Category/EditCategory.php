<?php
    include_once __DIR__."/../../util/dbconnect.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $DB = new DBConnect();
        $DB ->getConnection() ->query(
            "update category set CategoryName ='".$_REQUEST['name']."' where CategoryId = '".$_REQUEST['id']."'"
        );
    }
?>