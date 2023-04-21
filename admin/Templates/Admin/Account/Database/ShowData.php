<?php
    include_once __DIR__.'/../../../../../util/dbconnect.php';


    // Kết nối database
    $conn = new DBConnect();
    $conn = $conn->getConnection();


    $sql = "SELECT * FROM users u join roles r on u.RolesId = r.RolesId";
    $rowlist = 0;
    $list = mysqli_query($conn, $sql);
    while ($inner = mysqli_fetch_assoc($list)) {
        echo '<div class="row-data">
                <label class="items-data" id="lab-username-'.$rowlist.'">'. $inner['UsersAccount'] .'</label>
                <label class="items-data" id="lab-name-'.$rowlist.'">'. $inner['UsersName'] .'</label>
                <label class="items-data" id="lab-password-'.$rowlist.'">'. $inner['UsersPassword'] .'</label>
                <div class="items-control">';
        if(in_array('account-edit',$_SESSION['permission'])){
            echo '<button class="btn-Edit-User"><i class="fa-solid fa-pen-to-square" onclick="OpenUpdate('.$rowlist.')"></i></button>';
        }
        if(in_array('account-remove',$_SESSION['permission'])){
            echo '<button class="btn-Delete-User"><i class="fa-solid fa-trash" onclick="DeleteAttentionOpen('.$rowlist.')"></i></button>';
        }


        echo '</div>
                <div class="sup-data">
                    <label class="detail-data">
                        <i class="fa-solid fa-phone"></i>
                        Số điện thoại: <label id="lab-number-'.$rowlist.'">'.$inner['UsersPhone'] .'</label>
                    </label><br>
                    <label class="detail-data">
                        <i class="fa-solid fa-envelope"></i>
                        Email: <label id="lab-email-'.$rowlist.'"> '. $inner['UsersMail'] .'</label>
                    </label><br>
                    <label class="detail-data">
                        <i class="fa-solid fa-location-dot"></i>
                        Địa chỉ: <label id="lab-address-'.$rowlist.'">'. $inner['UsersAddress'] .'</label>
                    </label><br>
                    <label class="detail-data">
                        <i class="fa-solid fa-users"></i>
                        Phân quyền: <label id="lab-role-'.$rowlist.'">'. $inner['RolesName'] .'</label>
                    </label><br>
                    <label class="detail-data">
                        <i class="fa-solid fa-lock"></i>
                        Tình trạng tài khoản: <label id="lab-status-'.$rowlist.'">'. $inner['status'] .'</label>
                    </label>
                </div>
            </div>';
        $rowlist++;
    };

    mysqli_close($conn);
?>