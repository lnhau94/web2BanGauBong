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

    $sql = "UPDATE `user` SET password = '$password', email = '$email', number_phone = '$number_phone', address = '$address', role = '$role', status = '$status'
    WHERE username = '$username'";

    if (mysqli_query($conn, $sql)) {
        header("Location: /Web_2_Admin/Admin_Index.php?select=account");
    }
    mysqli_close($conn);
?>