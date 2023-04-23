<?php
include_once __DIR__.'/../util/dbconnect.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $DB = new DBConnect();
    if(isset($_REQUEST['txtUsername'])){
        $rs = $DB -> getConnection()
            -> query(
                "select * from users 
                    where UsersAccount = '".$_REQUEST['txtUsername']."' 
                            ");
        if($rs->num_rows > 0){
            echo "username existed";
        }
    }
    if(isset($_REQUEST['txtNumberPhone'])){
        $rs = $DB -> getConnection()
            -> query(
                "select * from users 
                    where UsersPhone = '".$_REQUEST['txtNumberPhone']."' 
                            ");
        if($rs->num_rows > 0){
            echo "phone existed";
        }
    }

}

?>