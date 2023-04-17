<?php
    require_once __DIR__.'/../view/Catalog.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $url = parse_url($_SERVER['REQUEST_URI']);
    $param = explode('&',$url['query']);
    $page = explode("=",$param[0])[1];
    $productCount = explode("=",$param[1])[1];
    $categories = explode("=",$param[2])[1];
    $name = urldecode(explode("=",$param[3])[1]);
    $minPrice = explode("=",$param[4])[1];
    $maxPrice = explode("=",$param[5])[1];
    if (empty($page)) {
        $page = 1;
    }
    if (empty($categories) || $categories == "()") {
        $categories = "('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19')";
    }
    if (empty($productCount)) {
        $productCount = 5;
    }
    if (empty($name)) {
        $name = "";
    }
    if (empty($minPrice)) {
        $minPrice = 0;
    }
    if (empty($maxPrice)) {
        $maxPrice = 1000000;
    }
    showAll($page,$productCount,$categories,$name,$minPrice,$maxPrice);
}
//    $page = 1;
//    $categories = "('1','2')";
//    $productCount = 5;
//    if (!empty($_POST['page'])) {
//        $page = $_POST['page'];
//        echo $page;
//    }
//    if (isset($_POST['categories'])) {
//        $categories = $_POST['categories'];
//    }
//    if (isset($_POST['$productCount'])) {
//        $productCount = $_POST['productCount'];
//        echo $productCount;
//    }
//    showAllItem($page,$productCount,$categories);
    ?>

