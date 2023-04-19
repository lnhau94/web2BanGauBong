<!-- Đăng nhập -->
<div id="Login" class="modal" style="display: none;">
    <div id="frmLogin">
        <button id="btnCloseFrm" onclick="ExitLog()">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="TopFrm">
            <br><label style="font-size:24px; color: #FF7B9B; float: left; margin-left: 155px"><b>ĐĂNG NHẬP</b></label>
        </div>

        <div class="CenterLog">
            <label class="labLog" for="txtUsername"><b>Tên người dùng</b></label><br>
            <input class="txtLog" id="txtUsername" type="text" placeholder="Nhập tên người dùng!" name="txtUsername" required><br>
        
            <label class="labLog" for="txtPassword"><b>Mật khẩu</b></label><br>
            <div style="position: relative;"> 
                <input class="txtLog" type="password" placeholder="Nhập mật khẩu!" name="txtPassword" id="txtPassword" value="secret" required>
                <label style="position: absolute; left: 410px; top: 20px" >
                    <input type="checkbox" id="eyecheck" style="display:none;" checked="checked" onclick="HideShowPassword()" >
                    <i class="fa-solid fa-eye" style="color: #FF7B9B"></i>
                    <i class="fa-solid fa-eye-slash" style="color: #FF7B9B"></i>
                </label>
            </div>

            <button class="btnSubmit" onclick="login()">ĐĂNG NHẬP</button>
        </div>  

        <div class="BotFrm">
            <hr>
            <span style="color: #FF7B9B;">Chưa có tài khoản? <a href="#" style="color: #ff275d;" onclick="OpenRegister()" >Đăng ký ngay!</a></span>
        </div>
    </div>
</div>
<script>
    function login(){
        let username = document.getElementById("txtUsername").value;
        let pass = document.getElementById("txtPassword").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                sessionStorage.setItem("userid",this.responseText);
                alert(sessionStorage.getItem("userid"));
            }
        };
        xmlhttp.open("POST",
            "/api/login.php?" +
            "username=" + username +
            "&pass=" + pass ,
            true);
        xmlhttp.send();
        // alert(username.value);
        // alert(pass.value);
    }
</script>
