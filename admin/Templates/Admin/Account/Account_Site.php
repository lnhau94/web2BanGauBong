<div class="Account-Site" >
    <!-- tiêu đề -->
    <div class="titles-site" style="padding: 10px 10px; background-color: #ffd5df;">
        <label style="font-size: 24px; color: #950b2d; "><b>THÔNG TIN TÀI KHOẢN</b></label>
    </div>

    <!-- bảng dữ liệu -->
    <div class="Account-table" style="background-color: #ffe4ea;">
        <div class="heading-table">
            <label class="heading-name">Tên tài khoản</label>
            <label class="heading-name">Tên người dùng</label>
            <label class="heading-name">Mật khẩu</label>
            <label class="heading-name">Hành động</label>
        </div>
        <div class="data-table-list">
            <?php require_once 'Templates/Admin/Account/Database/ShowData.php' ?>
        </div>
    </div>
    <!-- nút hành động -->
    <?php
        if(in_array('account-add',$_SESSION['permission'])){
            echo '
            <div class="control-site" style="padding: 10px 10px; background-color: #ffd5df;">
                <button class="btn-add-user" onclick="OpenInsert()"><i class="fa-solid fa-user-plus"></i>Thêm tài khoản</button>
            </div>
            ';
    }
    ?>
    <?php include "Templates/Admin/Account/Input_Form.php"?>
    <?php include "Templates/Admin/Account/Attention_Form.php"?>
</div>