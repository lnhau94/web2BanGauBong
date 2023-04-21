<?php
    include_once __DIR__.'/../../../../../util/dbconnect.php';


    // Kết nối database
    $conn = new DBConnect();
    $conn = $conn->getConnection();


    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $number_phone = $_POST['number_phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    $sql = "UPDATE `users` SET UsersName = '$name',UsersPassword = '$password', UsersMail = '$email', UsersPhone = '$number_phone', UsersAddress = '$address', RolesId = '$role', status = '$status'
    WHERE UsersAccount = '$username'";

    if (mysqli_query($conn, $sql)) {
        header("Location: /admin/index.php?select=account");
    }
    mysqli_close($conn);
?>