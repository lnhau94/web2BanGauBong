
<div id="Login" class="modal" style="display: block;">
    <div id="frmLogin">
        <button id="btnCloseFrm" onclick="ExitLog()">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="TopFrm">
            <br><label style="font-size:24px; color: #FF7B9B; margin-left: 155px"><b>ĐĂNG NHẬP</b></label>
        </div>

        <form method="POST" class="CenterLog">
            <label class="labLog" for="txtUsername"><b>Tên người dùng</b></label><br>
            <input class="txtLog" type="text" placeholder="Nhập tên người dùng!" name="txtUsername" required><br>

            <label class="labLog" for="txtPassword"><b>Mật khẩu</b></label><br>
            <div style="position: relative;">
                <input class="txtLog" type="password" placeholder="Nhập mật khẩu!" name="txtPassword" id="txtPassword" value="secret" required>
                <label style="position: absolute; left: 410px; top: 20px" >
                    <input type="checkbox" id="eyecheck" style="display:none;" checked="checked" onclick="HideShowPassword()" >
                    <i class="fa-solid fa-eye" style="color: #FF7B9B"></i>
                    <i class="fa-solid fa-eye-slash" style="color: #FF7B9B"></i>
                </label>
            </div>

            <button class="btnSubmit" type="submit">ĐĂNG NHẬP</button>
        </form>
    </div>
</div>
<?php
include_once __DIR__.'/../../util/dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['txtUsername']) && isset($_POST['txtPassword'])){
        $DB = new DBConnect();
        $rs = $DB -> getConnection() ->query("
                select f2.FunctionalName from users u join roles r on u.RolesId = r.RolesId 
                join functionaldetail f on r.RolesId = f.RolesId 
                join functional f2 on f.FunctionalId = f2.FunctionalId 
                where u.UsersAccount = '".$_POST['txtUsername']."' and u.UsersPassword = '".$_POST['txtPassword']."'
            ");

        echo $rs -> num_rows;
        if($rs -> num_rows > 0){
            $user = $_POST['txtUsername'];
            $_SESSION['user'] = $user;
            $_SESSION['permission'] = array();
            $_SESSION['feature'] = array();
        }
        while ($row = $rs->fetch_array()){
            $feature = explode('-',$row[0])[0];
            if(!in_array($feature,$_SESSION['feature'])){
                array_push($_SESSION['feature'], $feature);
            }
            array_push($_SESSION['permission'],$row[0]);
        }
        header("Location: /admin/index.php");
//            print_r($_SESSION['permission']);

    }
}
?>
<script>

    function ExitLog(){
        document.getElementById('Login').style.display = "none";
        document.getElementById('Register').style.display = "none";
    }

    function HideShowPassword(){
        if(document.getElementById("txtPassword").type == "password"){
            document.getElementById("txtPassword").type = "text";
        }else{
            document.getElementById("txtPassword").type = "password";
        }

    }
</script>