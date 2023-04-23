
<!-- Đăng ký  -->
<div id="Register" class="modal" style="display: none;" >
    <div id="frmRegister">            
        <button id="btnCloseFrm" onclick="ExitLog()" >
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="TopFrm">       
            <br><label style="font-size:24px; color: #FF7B9B; float: left; margin-left: 170px"><b>ĐĂNG KÝ</b></label>
        </div>

        <form onsubmit="return submitRegister()" name="rgt" id="registerForm" action="/api/register.php" class="CenterLog" method="POST">
            <label class="labLog" for="txtUsername"><b>Tên tài khoản</b></label><br>
            <input class="txtLog" id="txtname" type="text" placeholder="Nhập tên tài khoản" name="txtUsername" required><br>

            <label class="labLog" for="txtname"><b>Tên người dùng</b></label><br>
            <input class="txtLog" type="text" placeholder="Nhập tên người dùng" name="txtname" required><br>

            <label class="labLog" for="txtNumberPhone"><b>Số điện thoại</b></label><br>
            <input class="txtLog" id="txtphone" type="text" placeholder="Nhập số điện thoại!" name="txtNumberPhone" required><br>

            <label class="labLog" for="txtEmail"><b>Email</b></label><br>
            <input class="txtLog" type="text" placeholder="Nhập Email!" name="txtEmail" required><br>

            <label class="labLog" for="txtAddress"><b>Address</b></label><br>
            <input class="txtLog" type="text" placeholder="Nhập Địa chỉ!" name="txtAddress" required><br>
            
            <label class="labLog" for="txtPassword"><b>Mật khẩu</b></label><br>
            <div style="position: relative;">          
                <input class="txtLog"  id="txtpass" type="password" placeholder="Nhập mật khẩu!" name="txtPassword" required>
                <label style="position: absolute; left: 410px; top: 20px">
                    <input type="checkbox" id="eyecheck" style="display:none;" checked="checked" onclick="HideShowPassword1(this.parentElement.parentElement)">
                    <i class="fa-solid fa-eye" style="color: #FF7B9B"></i>
                    <i class="fa-solid fa-eye-slash" style="color: #FF7B9B"></i>
                </label>
            </div>

            <label class="labLog" for="txtRePassword"><b>Xác nhận mật khẩu</b></label><br>
            <div style="position: relative;">    
                <input class="txtLog" type="password" placeholder="Nhập lại mật khẩu!" name="txtRePassword" required>
                <label style="position: absolute; left: 410px; top: 20px">
                    <input type="checkbox" id="eyecheck" style="display:none;" checked="checked" onclick="HideShowPassword1(this.parentElement.parentElement)">
                    <i class="fa-solid fa-eye" style="color: #FF7B9B"></i>
                    <i class="fa-solid fa-eye-slash" style="color: #FF7B9B"></i>
                </label>
            </div>

            <input class="btnSubmit" type="submit" value="Đăng ký">
        </form>
        
        <div class="BotFrm">
            <hr>
            <span style="color: #FF7B9B;">Đã có tài khoản? <a href="#" style="color: #ff275d;" onclick="OpenLogin()" >Đăng nhập ngay!</a></span>
        </div>
    </div>
</div>

<script>
    function submitRegister(){
        let username = document.forms['rgt'].querySelector("#txtname").value;
        let phone = document.forms['rgt'].querySelector("#txtphone").value;
        let pass = document.forms['rgt'].querySelector("#txtpass").value;
        checkRegister(username,phone).then((islegal) => {
            if(islegal){
                let req = new URLSearchParams(new FormData(document.forms['rgt'])).toString();
                console.log(req);
                let xml = new XMLHttpRequest();
                xml.onreadystatechange = function (){
                    if(this.responseText == "0"){
                        OpenLogin();
                        document.getElementById("Login").querySelector("#txtUsername").value = username;
                        document.getElementById("Login").querySelector("#txtPassword").value = pass;

                    }
                }
                xml.open("POST","/api/register.php?"+ req);
                xml.send();
            }
        });


        return false;
    }

    async function checkRegister(user, phone){
        let xml = new XMLHttpRequest();
        let islegal = true;
        xml.onreadystatechange = function (){
            if (this.readyState == 4 && this.status == 200) {
                if(!this.responseText){
                    islegal = islegal && true;
                }else{
                    islegal = false;
                    alert(this.responseText);
                }
            }

        }
        xml.open("POST","/api/registercheck.php?txtUsername="+ user + "&txtNumberPhone="+phone, true);
        xml.send();
        return islegal;
    }

</script>
