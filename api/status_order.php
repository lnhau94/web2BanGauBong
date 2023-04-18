<?php
  include_once '../util/dbconnect.php';
  $connect_db = new DBConnect();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = parse_url($_SERVER['REQUEST_URI']);
    $array_url = explode("=",urldecode($url['query']));
    $id = explode("&",$array_url[1])[0];
    $status = $array_url[2];
    $connect = $connect_db -> getConnection();
    $connect -> query('update orders set Status = "'.$status.'" where OrdersId = '.$id);
    echo $id;
    echo $status;
  }
?>