<?php
$server = 'webbear.mysql.database.azure.com';
$username = 'lnhau';
$password = 'lnhau94';
$database = 'webbear';

$conn = new mysqli($server, $username, $password, $database) ;
  
    if ($result = $conn -> query("SELECT * FROM Product p join Image i on p.productId = i.productId")) {
        echo "Returned rows are: " . $result -> num_rows ."<br>";
        $i = 0;
        while($i++ < $result -> num_rows){
          $row = $result -> fetch_array();
          $j = 0;
          echo $row[1]." " . $row[2]."<img src=./img/".$row[8].">";
          echo "<br>";
          
        }
        
        // Free result set
        $result -> free_result();
      }
?>