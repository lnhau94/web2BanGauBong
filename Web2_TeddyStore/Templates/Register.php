
<!-- Đăng ký  -->
<div id="Register" class="modal" style="display: none;" >
    <div id="frmRegister">            
        <button id="btnCloseFrm" onclick="ExitLog()" >
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="TopFrm">       
            <br><label style="font-size:24px; color: #FF7B9B; float: left; margin-left: 170px"><b>ĐĂNG KÝ</b></label>
        </div>

        <div class="CenterLog">
            <label class="labLog" for="txtUsername"><b>Tên người dùng</b></label><br>
            <input class="txtLog" type="text" placeholder="Nhập tên người dùng" name="txtUsername" required><br>
        
            <label class="labLog" for="txtNumberPhone"><b>Số điện thoại</b></label><br>
            <input class="txtLog" type="text" placeholder="Nhập số điện thoại!" name="txtNumberPhone" required><br>
            
            <label class="labLog" for="txtEmail"><b>Email</b></label><br>
            <input class="txtLog" type="text" placeholder="Nhập Email!" name="txtRePassword" required><br>
            
            <label class="labLog" for="txtPassword"><b>Mật khẩu</b></label><br>
            <div style="position: relative;">          
                <input class="txtLog" type="password" placeholder="Nhập mật khẩu!" name="txtPassword" required>
                <label style="position: absolute; left: 410px; top: 20px">
                    <input type="checkbox" id="eyecheck" style="display:none;" checked="checked">
                    <i class="fa-solid fa-eye" style="color: #FF7B9B"></i>
                    <i class="fa-solid fa-eye-slash" style="color: #FF7B9B"></i>
                </label>
            </div>

            <label class="labLog" for="txtRePassword"><b>Xác nhận mật khẩu</b></label><br>
            <div style="position: relative;">    
                <input class="txtLog" type="password" placeholder="Nhập lại mật khẩu!" name="txtRePassword" required>
                <label style="position: absolute; left: 410px; top: 20px">
                    <input type="checkbox" id="eyecheck" style="display:none;" checked="checked">
                    <i class="fa-solid fa-eye" style="color: #FF7B9B"></i>
                    <i class="fa-solid fa-eye-slash" style="color: #FF7B9B"></i>
                </label>
            </div>

            <button class="btnSubmit" type="submit">Đăng ký</button>
        </div>  
        
        <div class="BotFrm">
            <hr>
            <span style="color: #FF7B9B;">Đã có tài khoản? <a href="#" style="color: #ff275d;" onclick="OpenLogin()" >Đăng nhập ngay!</a></span>
        </div>
    </div>
</div>
