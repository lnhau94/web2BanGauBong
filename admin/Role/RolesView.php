<div class="hau-role-container">
    <div class="hau-role-table">
        <div class="titles-site" style="padding: 10px 10px; background-color: #ffd5df;">
            <label style="font-size: 24px; color: #950b2d; "><b>Phân quyền</b></label>
            <?php
            if(in_array("role-add",$_SESSION['permission'])){
                echo '<button class="btn-add-user" onclick="showInputForm()">Thêm</button>';
            }
            ?>
        </div>
        <div class="hau-role-header">
            <label class="hau-table-item">Mã Role</label>
            <label class="hau-table-item">Tên Role</label>
            <label class="hau-table-item">Hành động</label>
        </div>
        <div class="hau-role-body">
            <?php
            include_once __DIR__."/../../util/dbconnect.php";
            $DB = new DBConnect();
            $rs = $DB -> getConnection() ->query("select * from roles");
            while($row = $rs->fetch_assoc()){
                echo '
                    <div class="hau-role-table-row" data-id="'.$row['RolesId'].'">
                        <label class="hau-table-item">'.$row['RolesId'].'</label>
                        <input type="text" class="hau-table-item role-name" value="'.$row['RolesName'].'">';
                echo '<div>';
                if(in_array("role-edit",$_SESSION['permission'])){
                    echo '<button onclick="editRole(this.parentElement.parentElement)" class="btn-Edit-User"><i class="fa-solid fa-pen-to-square"></i></button>';
                    echo '<button onclick="showPermission(this.parentElement.parentElement)" class="btn-Edit-User"><i class="fa-solid fa-list-check"></i></button>';
                }
                if(in_array("role-remove",$_SESSION['permission'])){
                    echo '<button onclick="removeRole(this.parentElement.parentElement)" class="btn-Edit-User"><i class="fa-solid fa-trash"></i></button>';
                }
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <div class="hau-function-table">
        <div class="titles-site" style="padding: 10px 10px; background-color: #ffd5df;">
            <label style="font-size: 24px; color: #950b2d; "><b>Roles Đang chọn: </b></label>
            <label id="currentRoleLabel" style="font-size: 24px; color: #950b2d; "></label>
            <button onclick="savePermission()" class="btn-add-user">Lưu thay đổi</button>
        </div>
        <div class="hau-function-header">
            <label class="hau-table-item">Mã Chức năng</label>
            <label class="hau-table-item">Tên Chức năng</label>
            <label class="hau-table-item">Được phép</label>
        </div>
        <div class="hau-function-body">
            <?php
            include_once __DIR__."/../../util/dbconnect.php";
            $DB = new DBConnect();
            $rs = $DB -> getConnection() ->query("select * from functional");
            while($row = $rs->fetch_assoc()){
                echo '
                    <div class="hau-function-table-row" data-id="'.$row['FunctionalId'].'">
                        <label class="hau-table-item">'.$row['FunctionalId'].'</label>
                        <label class="hau-table-item">'.$row['FunctionalName'].'</label>
                        <input type="checkbox" class="hau-table-item func-id" value="'.$row['FunctionalId'].'">';

                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>


<?php
include_once __DIR__."/NewRoleForm.php";
?>
<script>
    function showInputForm(){
        document.querySelector(".hau-form-holder").style.display = "flex";
    }
    function hideForm(){
        document.querySelector(".hau-form-holder").style.display = "none";
    }
    function isExistedName(){
        if(document.querySelector("#name").value == ""){
            alert("Tên không được để trống")
            return false;
        }
        let xml = new XMLHttpRequest();
        let islegal = false;
        xml.onreadystatechange = function (){
            islegal = this.responseText == 0;
            if(!islegal){
                alert("Existed name!!!");
            }
        }
        xml.open("POST","/api/role.php?name=" + document.querySelector("#name").value,false);
        xml.send();
        return islegal;
    }
    function showPermission(element){
        document.querySelector("#currentRoleLabel").innerText = element.querySelector(".role-name").value;
        let lastElement = document.querySelector(".currentRoleChoice");
        if(lastElement){
            lastElement.classList.toggle("currentRoleChoice");
        }
        element.classList.toggle("currentRoleChoice");
        let xml = new XMLHttpRequest();
        xml.onreadystatechange = function (){
            let funcs = this.responseText.split("-");
            document.querySelector(".hau-function-body").querySelectorAll(".func-id").forEach(e=>{
                e.checked = funcs.includes(e.value);
            })
        }
        xml.open("POST","/api/functional.php?roleId=" + element.dataset.id,false);
        xml.send();
    }
    function savePermission(){
        let roleChoice = document.querySelector(".currentRoleChoice");
        if(!roleChoice){
            alert("Vui lòng chọn Role!!");
        }else{
            let fid = '';
            document.querySelectorAll(".func-id").forEach(e=>{
                if(e.checked){
                    fid += "-"+e.value;
                }

            })
            let xml = new XMLHttpRequest();
            xml.onreadystatechange = function(){
                showPermission(roleChoice);
            }
            xml.open("POST","/api/addpermission.php?roleId=" + roleChoice.dataset.id +
                "&functionId=" + fid
                ,true);
            xml.send();
            console.log("/api/addpermission.php?roleId=" + roleChoice.dataset.id +
                "&functionId=" + fid);
        }
    }
    document.querySelector(".close-button").onclick = (e)=>{
        e.preventDefault();
        hideForm();
    }
</script>
