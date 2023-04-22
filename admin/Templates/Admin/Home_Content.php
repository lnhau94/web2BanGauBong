<div class="Home-Content">
    <?php 
        if (isset($_GET['select'])){
            $Site = $_GET['select'];
        } else {
            $Site = 'None';
        }

        switch($Site){
            case 'account':
                include "Templates/Admin/Account/Account_Site.php";
                break;
            case 'None':
                include "Templates/Admin/None_Site/None_Site.php";
                break;
            case 'bill':
                include __DIR__."/../../../view/CheckOrder.php";
                break;
            case 'product':
                include __DIR__."/../../../Web2_TeddyStore/yang/lietke.php";
                break;
            case 'category':
                include __DIR__."/../../Category/CategoryListView.php";
                break;
            case 'role':
                include __DIR__."/../../Role/RolesView.php";
                break;
            case 'statistics':
                include __DIR__."/../../Statistics/StatisticsView.php";
                break;

        }
    ?>
</div>