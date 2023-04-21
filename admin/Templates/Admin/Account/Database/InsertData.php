<?php
    include_once __DIR__.'/../../../../../util/dbconnect.php';


    // Kết nối database
    $conn = new DBConnect();
    $conn = $conn->getConnection();


    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $number_phone = $_POST['number_phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $name = $_POST['name'];

    $sql = " INSERT INTO `users` (`UsersAccount`,`UsersName`, `UsersPassword`, `UsersMail`, `UsersPhone`, `UsersAddress`, `RolesId`, `status`)
        VALUES ('$username',n'$name', '$password', '$email', '$number_phone', '$address', '$role', '$status')";

    if (mysqli_query($conn, $sql)) {
        header("Location: /admin/index.php?select=account");
    }
    mysqli_close($conn);
?>