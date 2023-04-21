<?php
include_once __DIR__."/../../util/dbconnect.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $DB = new DBConnect();
    $DB ->getConnection() ->query(
        "delete from category  where CategoryId = '".$_REQUEST['id']."'"
    );
}
?>