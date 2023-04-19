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
        }
    ?>
</div>