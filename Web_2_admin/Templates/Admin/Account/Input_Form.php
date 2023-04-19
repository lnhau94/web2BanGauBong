<!-- Form nhập liệu -->
    <div id="Account-Input-Form" class="form-site-background">
        <form class="input-form" id="Account-Form" method="POST" onsubmit="return false;">
            <div class="input-header">
                <label style="font-size: 20px; color: #950b2d; margin-left: 70px; "><b>THÔNG TIN TÀI KHOẢN</b></label>
                <button class="close-button" onclick='CloseEditFrm()'><i class="fa-solid fa-xmark"></i></button>
            </div>

            <div class="input-container">
                <div class="row-detail" id="username-row">
                    <label class="lab-input-detail">Tên người dùng: </label><br>
                    <input class="txt-input-detail" id="txt-username" type="text" placeholder="Nhập tên người dùng ở đây!" name="username">
                    <p id="username-warning-1" class="warning-information">Tên người dùng không được bỏ trống!</p>
                    <p id="username-warning-2" class="warning-information">Tên người dùng không được quá 20 ký tự!</p>
                </div>

                <div class="row-detail">
                    <label class="lab-input-detail">Mật khẩu: </label><br>
                    <input class="txt-input-detail" id="txt-password" type="text" placeholder="Nhập mật khẩu ở đây!" name="password"><br>
                    <p id="password-warning-1" class="warning-information">Mật khẩu không được bỏ trống!</p>
                    <p id="password-warning-2" class="warning-information">Mật khẩu không được quá 30 ký tự!</p>
                </div>

                <div class="row-detail">
                    <label class="lab-input-detail">Email: </label><br>
                    <input class="txt-input-detail" id="txt-email" type="text" placeholder="Nhập Email ở đây!" name="email"><br>
                    <p id="email-warning-1" class="warning-information">Email không được bỏ trống!</p>
                </div>

                <div class="row-detail">
                    <label class="lab-input-detail">Số điện thoại: </label><br>
                    <input class="txt-input-detail" id="txt-number-phone" type="text" placeholder="Nhập Số điện thoại ở đây!" name="number_phone"><br>
                    <p id="phone-warning-1" class="warning-information">Số điện thoại không được bỏ trống!</p>
                </div>

                <div class="row-detail">
                    <label class="lab-input-detail">Địa chỉ: </label><br>
                    <input class="txt-input-detail" id="txt-address" type="text" placeholder="Nhập địa chỉ ở đây!" name="address"><br>
                    <p id="address-warning-1" class="warning-information">Địa chỉ không được bỏ trống!</p>
                </div>

                <div class="row-detail">
                    <label class="lab-input-detail">Phân quyền: </label><br>
                    <select id="cbx-role" name="role" class="cmb-input-detail">
                        <option value="Customer">Khách hàng</option>
                        <option value="Staff">Nhân Viên</option>
                        <option value="Admin">Quản lý</option>
                    </select>
                </div>

                <div class="row-detail">
                    <label class="lab-input-detail">Tình trạng: </label><br>
                    <div class="radio-panel" style="margin: 5px;">
                        <input class="rad-choice" id="rad-unlock" type="radio" name="status" value="Unlock"><label class="lab-rad">Mở Khóa</label><br>
                        <input class="rad-choice" id="rad-lock" type="radio" name="status" value="Lock"><label class="lab-rad">Khóa</label><br>
                        <p style="padding: 4px;font-size: 10px; color: red; margin-left: 10px;">Lưu ý: Nếu bạn chọn khóa tài khoản này. Tài khoản sẽ bị vô hiệu hóa tạm thời và không thể sữ dụng được</p>
                    </div>
                </div>
            </div>

            <div class="input-bottom" id="input-bottom">
                
            </div>
        </form>
    </div>