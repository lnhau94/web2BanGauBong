<?php
$url = parse_url( $_SERVER['REQUEST_URI']);

    switch(explode("/",$url['path'],3)[2]){
        case '':
            include 'view/banner.php';
            break;
        case 'index.php':
            include 'view/banner.php';
            include 'view/ProductView.php';
            $ps = new Products();
            foreach($ps ->getProducts() as $item){
                $s = new ProductView($item);
                echo $s -> show();
            }
            break;
    }    
?>