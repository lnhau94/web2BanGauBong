<div class="Nav_Bar">
    <ul class="Nav_List">
        <div class="web-logo">
            <img id="logo" src="Element/Image/HeaderLogo.png" alt="Logo" >
        </div>
        <?php 
            //Khởi tạo mãng icons
            $Nav_Icons = array( "account" => "fa-solid fa-user",
                                "product" => "fa-solid fa-paw",
                                "role" => "fa-solid fa-key",
                                "category" => "fa-solid fa-box",
                                "bill" => "fa-solid fa-money-bill",
                                "statistics" => "fa-solid fa-arrow-trend-up");
            $Nav_Names = array( "account" => "TÀI KHOẢN",
                "product" => "SẢN PHẨM",
                "role" => "PHÂN QUYỀN",
                "category" => "LOẠI SẢN PHẨM",
                "bill" => "HÓA ĐƠN",
                "statistics" => "THỐNG KÊ");


            // Khởi tạo menu
            foreach ($_SESSION['feature'] as $item){
                echo '<li>
                        <a href="?select='.$item .'">
                            <i class="'. $Nav_Icons[$item] .'"></i>
                            <span class="link_name">' . $Nav_Names[$item]. '</span>
                        </a>
                    </li>';
            }
        ?>

        <!-- Khởi tạo nút đăng xuất -->
        <li >
            <a href="/admin/Login/Logout.php" style="color: red;">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="link_name">ĐĂNG XUẤT</span>
            </a>
        </li>
    </ul>
</div>