<?php
include_once __DIR__.'/../util/dbconnect.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $DB = new DBConnect();
    if($DB -> getConnection()
        -> query(
            "insert into users(UsersAccount,UsersPassword,UsersMail,UsersPhone,UsersAddress,UsersName,RolesId) 
                            value(
                                '".$_REQUEST['txtUsername']."','".$_REQUEST['txtPassword']."','".$_REQUEST['txtEmail']."',
                                '".$_REQUEST['txtNumberPhone']."','".$_REQUEST['txtname']."','".$_REQUEST['txtAddress']."','1'
                            )")){
        echo 0;
    }else{
        echo -1;
    }
}

?>