<?php 
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "my_bear";

    // Kết nối database
    $conn = mysqli_connect($serverName, $userName, $password, $dbName);


    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $number_phone = $_POST['number_phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    $sql = " INSERT INTO `user` (`username`, `password`, `email`, `number_phone`, `address`, `role`, `status`)
        VALUES ('$username', '$password', '$email', '$number_phone', '$address', '$role', '$status')";

    if (mysqli_query($conn, $sql)) {
        header("Location: /Web_2_Admin/Admin_Index.php?select=account");
    }
    mysqli_close($conn);
?>