<?php
if($_SERVER['REQUEST_METHOD'] == "GET"){
    include_once __DIR__."/../../util/dbconnect.php";
    if (isset($_GET['name'])){
        $DB = new DBConnect();
        $rs = $DB->getConnection()->query("insert into roles(RolesName) values('".$_GET['name']."')");
        header("Location: /admin/index.php?select=role");
    }
}
?>