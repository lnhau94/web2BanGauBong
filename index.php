<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Teddy Bear Shop</title>
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="CSS/Hau_Style.css">
    <link rel="stylesheet" href="CSS/Hau-Product.css">
    <link rel="stylesheet" href="CSS/Hau-product-page.css">
    <link rel="stylesheet" href="CSS/Hau-Cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <script src="JS/UI.js"></script>
    <script src="JS/ajax.js"></script>
    <script src="JS/Hau-UI-Control.js"></script>
</head>

<body>
    <?php session_start();
//        $_SESSION["user"] = "a";
    ?>
    <?php include 'Templates/Header.php';?>
    <?php include 'Templates/TopMenu.php';?>
    <?php include 'Templates/Container.php';?>
    <?php include 'Templates/Footer.php';?>
    <?php include 'Templates/Login.php';?>
    <?php include 'Templates/Register.php';?>
    <script>
        if(!sessionStorage.getItem("userid")){
            document.getElementById("btnCart").style.display = "none";
        }
    </script>
</body>

