<?php
    include_once __DIR__.'/../../../../../util/dbconnect.php';


    // Kết nối database
    $conn = new DBConnect();
    $conn = $conn->getConnection();

    $username = $_POST['delete-username'];

    $sql = "DELETE FROM `users` WHERE UsersAccount = '$username'";

    if (mysqli_query($conn, $sql)) {
        header("Location: /Web_2_Admin/index.php?select=account");
    }
    
    mysqli_close($conn);
?>