<?php
    include_once __DIR__.'/../util/dbconnect.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $DB = new DBConnect();
        $url = parse_url($_SERVER['REQUEST_URI']);
        $param = explode('&',$url['query']);
        $DB -> getConnection()
            -> query(
                "insert into cart(userId,productId,qty) 
                            value('".explode("=",$param[0])[1]."',
                                '".explode("=",$param[1])[1]."',
                                '".explode("=",$param[2])[1]."')
                                on duplicate key update qty = qty + '".explode("=",$param[2])[1]."'");
    }

?>