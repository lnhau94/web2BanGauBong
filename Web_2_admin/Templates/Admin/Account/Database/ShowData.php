<?php 
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "my_bear";

    // Kết nối database
    $conn = mysqli_connect($serverName, $userName, $password, $dbName);


    $sql = "SELECT * FROM user";
    $rowlist = 0;
    $list = mysqli_query($conn, $sql);
    while ($inner = mysqli_fetch_assoc($list)) {
        echo '<div class="row-data">
                <label class="items-data" id="lab-username-'.$rowlist.'">'. $inner['username'] .'</label>
                <label class="items-data" id="lab-password-'.$rowlist.'">'. $inner['password'] .'</label>
                <div class="items-control">
                    <button class="btn-Edit-User"><i class="fa-solid fa-pen-to-square" onclick="OpenUpdate('.$rowlist.')"></i></button>
                    <button class="btn-Delete-User"><i class="fa-solid fa-trash" onclick="DeleteAttentionOpen('.$rowlist.')"></i></button>
                </div>
                <div class="sup-data">
                    <label class="detail-data">
                        <i class="fa-solid fa-phone"></i>
                        Số điện thoại: <label id="lab-number-'.$rowlist.'">'.$inner['number_phone'] .'</label>
                    </label><br>
                    <label class="detail-data">
                        <i class="fa-solid fa-envelope"></i>
                        Email: <label id="lab-email-'.$rowlist.'"> '. $inner['email'] .'</label>
                    </label><br>
                    <label class="detail-data">
                        <i class="fa-solid fa-location-dot"></i>
                        Địa chỉ: <label id="lab-address-'.$rowlist.'">'. $inner['address'] .'</label>
                    </label><br>
                    <label class="detail-data">
                        <i class="fa-solid fa-users"></i>
                        Phân quyền: <label id="lab-role-'.$rowlist.'">'. $inner['role'] .'</label>
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