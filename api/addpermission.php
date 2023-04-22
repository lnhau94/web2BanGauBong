<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include_once __DIR__."/../util/dbconnect.php";
    $DB = new DBConnect();
    $DB->getConnection()->query("delete from functionaldetail 
            where RolesId = '".$_REQUEST['roleId']."'");

    foreach (explode("-",$_REQUEST['functionId']) as $item){
        if($item != ""){
            $DB->getConnection()->query("insert into functionaldetail (RolesId, FunctionalId) 
            values ('".$_REQUEST['roleId']."','".$item."') on duplicate key update RolesId = '".$_REQUEST['roleId']."'");
        }


    }
}
?>