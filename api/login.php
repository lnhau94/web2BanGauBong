<?php
include_once __DIR__.'/../util/dbconnect.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $DB = new DBConnect();
    $url = parse_url($_SERVER['REQUEST_URI']);
    $rs = $DB -> getConnection()
        -> query(
            'select usersId from users where UsersAccount = "'.$_REQUEST['username'].'" 
            and UsersPassword = "'.$_REQUEST['pass'].'" and status = "Đang hoạt động"');
    if ($rs ->num_rows > 0){
        echo "0";
    }
    else{
        echo -1;
    }
}
?>