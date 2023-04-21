<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include_once __DIR__."/../util/dbconnect.php";
    $DB = new DBConnect();
    $rs = $DB->getConnection()->query("select * from category where CategoryName = '".$_REQUEST['name']."'");
    echo $rs->num_rows;
}
?>