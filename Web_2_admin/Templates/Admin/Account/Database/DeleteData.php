<?php 
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "my_bear";

    // Kết nối database
    $conn = mysqli_connect($serverName, $userName, $password, $dbName);

    $username = $_POST['delete-username'];

    $sql = "DELETE FROM `user` WHERE username = '$username'";

    if (mysqli_query($conn, $sql)) {
        header("Location: /Web_2_Admin/Admin_Index.php?select=account");
    }
    
    mysqli_close($conn);
?>