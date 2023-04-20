<?php
  include_once '../util/dbconnect.php';
  $connect_db = new DBConnect();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_REQUEST['id'];
    $status = $_REQUEST['status'];
    $connect = $connect_db -> getConnection();
    $connect -> query('update orders set Status = "'.$status.'" where OrdersId = '.$id);
  }
?>