<?php
include_once __DIR__.'/../util/dbconnect.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $DB = new DBConnect();
    $url = parse_url($_SERVER['REQUEST_URI']);
    $param = explode('&',$url['query']);
    $rs = $DB -> getConnection()
        -> query(
            'select usersId from users where UsersAccount = "'.$_REQUEST['username'].'" 
            and UsersPassword = "'.$_REQUEST['pass'].'"');
    if ($rs ->num_rows){
        echo $rs ->fetch_array()[0];
    }
    else{
        echo -1;
    }
}
?>