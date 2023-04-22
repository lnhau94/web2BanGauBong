<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include_once __DIR__."/../util/dbconnect.php";
    $DB = new DBConnect();
    $rs = $DB->getConnection()->query("select * from functionaldetail where RolesId = '".$_REQUEST['roleId']."'");
    $str ='';
    while($row = $rs ->fetch_assoc()){
        $str = $str.$row['FunctionalId']."-";
    }
    echo $str;
}
?>