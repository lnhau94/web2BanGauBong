<div class="Nav_Bar">
    <ul class="Nav_List">
        <div class="web-logo">
            <img id="logo" src="Element/Image/HeaderLogo.png" alt="Logo" >
        </div>
        <?php 
            //Khởi tạo mãng icons
            $Nav_Icons = array( "fa-solid fa-user",
                                "fa-solid fa-paw",
                                "fa-solid fa-key",
                                "fa-solid fa-box",
                                "fa-solid fa-money-bill",
                                "fa-solid fa-arrow-trend-up");
            //Khởi tạo mãng tên mục
            $Nav_Names = array("TÀI KHOẢN","SẢN PHẨM","PHÂN QUYỀN","LOẠI SẢN PHẨM","HÓA ĐƠN","THỐNG KÊ");
            // Khởi tạo mãng Link của trang "Thêm tên của các trang sau khi code xong"
            $Nav_Links = array("account","product","role","category","bill","statistics");

            $Array_length = count($Nav_Icons);

            // Khởi tạo menu
            for ($menu = 0; $menu < $Array_length; $menu++ ){
                echo '<li>
                        <a href="?select='. $Nav_Links[$menu] .'">
                            <i class="'. $Nav_Icons[$menu] .'"></i>
                            <span class="link_name">' . $Nav_Names[$menu]. '</span>
                        </a>
                    </li>';
            }
        ?>

        <!-- Khởi tạo nút đăng xuất -->
        <li >
            <a href="" style="color: red;">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="link_name">ĐĂNG XUẤT</span>
            </a>
        </li>
    </ul>
</div>