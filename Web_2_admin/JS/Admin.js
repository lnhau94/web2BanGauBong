// Mở frm
function OpenEditFrm(){
    document.getElementById('Account-Input-Form').style.display = "block";

}

// Đóng frm
function CloseEditFrm(){
    document.getElementById('Account-Input-Form').style.display = "none";
    document.getElementById('Account-Form').action = "";

    let input_username = document.getElementById('txt-username');
    let input_password = document.getElementById('txt-password');
    let input_number_phone = document.getElementById('txt-number-phone');
    let input_email = document.getElementById('txt-email');
    let input_address = document.getElementById('txt-address');

    input_username.value = "";
    input_password.value = "";
    input_email.value = "";
    input_number_phone.value = "";
    input_address.value = ""; 
    input_username.readOnly = false;
    input_username.style.backgroundColor = "white";

}

//hàm mở frm thêm
function OpenInsert(){ 
    document.getElementById('delete-button').type = "button";
    let rad_unlock = document.getElementById('rad-unlock').checked=true;
    let button = document.getElementById('input-bottom');

    var html="";
    html += `<button id="submit-button" onclick="CheckInsertElement()" class="btn-submit">Xác nhận</button>`;
    button.innerHTML = html;
    document.getElementById('Account-Form').action = "Templates/Admin/Account/Database/InsertData.php";
    OpenEditFrm();
}

// hàm mở frm cập nhật
function OpenUpdate(index){
    document.getElementById('delete-button').type = "button";
    let button = document.getElementById('input-bottom');
    var html="";
    html += `<button id="submit-button" onclick="CheckUpdateElement()" class="btn-submit">Xác nhận</button>`;
    button.innerHTML = html;
    document.getElementById('Account-Form').action = "Templates/Admin/Account/Database/UpdateData.php";
    OpenEditFrm();
    
    let label_username = document.getElementById('lab-username-'+index).innerHTML;
    let label_password = document.getElementById('lab-password-'+index).innerHTML;
    let label_number_phone = document.getElementById('lab-number-'+index).innerHTML;
    let label_email = document.getElementById('lab-email-'+index).innerHTML;
    let label_address = document.getElementById('lab-address-'+index).innerHTML;
    let label_role = document.getElementById('lab-role-'+index).innerHTML;
    let label_status = document.getElementById('lab-status-'+index).innerHTML;

    let input_username = document.getElementById('txt-username');
    let input_password = document.getElementById('txt-password');
    let input_number_phone = document.getElementById('txt-number-phone');
    let input_email = document.getElementById('txt-email');
    let input_address = document.getElementById('txt-address');
    
    let rad_unlock = document.getElementById('rad-unlock');
    let rad_lock = document.getElementById('rad-lock');

    input_username.readOnly = true;
    input_username.style.backgroundColor = "#c0c0c0";

    input_username.value = label_username;
    input_password.value = label_password;
    input_email.value = label_email;
    input_number_phone.value = label_number_phone;
    input_address.value = label_address; 
    
    if ( label_status == "Unlock" ){
        rad_unlock.checked = true;
    } else {
        rad_lock.checked=true;
    }

    // Khu vực thực hiện phân quyền
    // Đây chỉ là giải pháp tạm thời nên cần được thấy thế khi hoàn thành chương trình
    let cbx_role = document.getElementById('cbx-role');
    if (label_role == "Customer"){
        cbx_role.selectedIndex = 0;
    } else {
        if (label_role == "Staff"){
            cbx_role.selectedIndex = 1;
        } else {
            cbx_role.selectedIndex = 2;
        }
    }
    //---------------------------------------------------
}

// Mở form attention
function AttentionOpen(){
    let Attention_black = document.getElementById('Attention-Form-Black');
    Attention_black.style.display = "block";
}

function AttentionClose(){
    let Attention_black = document.getElementById('Attention-Form-Black');
    Attention_black.style.display = "none";
}

function DeleteAttentionOpen(index){
    let Attention_form = document.getElementById('Attention-form');
    Attention_form.action = "Templates/Admin/Account/Database/DeleteData.php"
    Attention_form.method = "POST";
    AttentionOpen();
    let write_zone = document.getElementById('content');
    
    let icon = document.getElementById('attention-icon');
    icon.innerHTML = `<label class="icon"><i class="fa-solid fa-trash"></i></label><br>`;
    
    let Get_Username = document.getElementById('lab-username-'+index).innerHTML;

    var html = "";
        html +=  `<label style="font-size: 14px; color:rgb(99, 0, 16);">Bạn có muốn xóa tài khoản dưới đây hay không? nếu bạn làm vậy, tài khoản sẽ không thể phục hồi trở lại!</label><br>`;
        html +=  `<label id="get-username" style="font-size: 24px; font-weight: bold; color:rgba(255, 0, 43, 0.762);">`+ Get_Username +`</label>`;
        html +=  `<input type="hidden" name="delete-username" value="`+ Get_Username +`">`;

    write_zone.innerHTML = html;

    document.getElementById('delete-button').type = "submit";
}
// Hàm kiểm tra dữ liệu insert
function CheckInsertElement(){
    let flag = true;

    let input_username = document.getElementById('txt-username');
    let input_password = document.getElementById('txt-password');
    let input_number_phone = document.getElementById('txt-number-phone');
    let input_email = document.getElementById('txt-email');
    let input_address = document.getElementById('txt-address');

    if (input_username.value == ""){
        document.getElementById('username-row').innerHTML = `<p class="warning-information">Tên người dùng không được bỏ trống!</p>`;
        flag = false;
    } else {
        if (input_username.value.length >= 20){
            document.getElementById('username-row').innerHTML = `<p id="username-warning-2" class="warning-information">Tên người dùng không được quá 20 ký tự!</p>`;
            flag = false;
        }
    }

    if (input_password == ""){
        document.getElementById('password-warning-1').style.display = "block";
        flag = false;
    } else {
        if (input_password.length >= 30){
            document.getElementById('password-warning-2').style.display = "block";
            flag = false;
        }
    }

    if (input_number_phone == ""){
        document.getElementById('phone-warning-1').style.display = "block";
        flag = false;
    }

    if (input_email == ""){
        document.getElementById('email-warning-1').style.display = "block";
        flag = false;
    }

    if (input_address == ""){
        document.getElementById('address-warning-1').style.display = "block";
        flag = false;
    }

    if (flag == true){
        OpenAttentionInsert();
    }
}

// Hàm kiểm tra dữ liệu update
function CheckUpdateElement(){
    OpenAttentionUpdate();

}

// Hàm hiện form xác nhận
function OpenAttentionInsert(){
    let icon = document.getElementById('attention-icon');
    icon.innerHTML = `<label class="icon"><i class="fa-solid fa-user"></i></label><br>`;
    
    let input_username = document.getElementById('txt-username').value;
    let input_password = document.getElementById('txt-password').value;
    let input_number_phone = document.getElementById('txt-number-phone').value;
    let input_email = document.getElementById('txt-email').value;
    let input_address = document.getElementById('txt-address').value;
    
    let rad_unlock = document.getElementById('rad-unlock');
    let rad_lock = document.getElementById('rad-lock');

    var html = "";
        html +=  `<label style="font-size: 14px; color:rgb(99, 0, 16);">Bạn có chắc thêm tài khoản mới với các thông tin sau?</label><br>`;
        html +=  `<label style="font-size: 14px; color:red;"> Tên người dùng: `+ input_username +`</label><br>`;
        html +=  `<label style="font-size: 14px; color:red;"> Mật khẩu: `+ input_password +`</label><br>`;
        html +=  `<label style="font-size: 14px; color:red;"> Email: `+ input_email +`</label><br>`;
        html +=  `<label style="font-size: 14px; color:red;"> Số điện thoại: `+ input_number_phone +`</label><br>`;
        html +=  `<label style="font-size: 14px; color:red;"> Địa chỉ: `+ input_address +`</label><br>`;

    if (rad_unlock.checked){
        html +=  `<label style="font-size: 14px; color:red;"> Trạng thái tài khoản: Mở khoá</label><br>`;
    } else {
        html += `<label style="font-size: 14px; color:red;"> Trạng thái tài khoản: Khoá</label><br>`;
    }

    // Khu vực thực hiện phân quyền
    // Đây chỉ là giải pháp tạm thời nên cần được thấy thế khi hoàn thành chương trình
    let cbx_role = document.getElementById('cbx-role').value;
    if (cbx_role == "Customer"){
        html +=  `<label style="font-size: 14px; color:red;"> Phân quyền: Khách hàng</label><br>`;
    } else {
        if (cbx_role == "Staff"){
            html +=  `<label style="font-size: 14px; color:red;"> Phân quyền: Nhân viên</label><br>`;
        } else {
            html +=  `<label style="font-size: 14px; color:red;"> Phân quyền: Quản lý</label><br>`;
        }
    }
    //---------------------------------

    let write_zone = document.getElementById('content');
    write_zone.innerHTML = html;

    AttentionOpen();
}

function OpenAttentionUpdate(){
    let icon = document.getElementById('attention-icon');
    icon.innerHTML = `<label class="icon"><i class="fa-solid fa-pen"></i></label><br>`;
    
    let input_username = document.getElementById('txt-username').value;
    let input_password = document.getElementById('txt-password').value;
    let input_number_phone = document.getElementById('txt-number-phone').value;
    let input_email = document.getElementById('txt-email').value;
    let input_address = document.getElementById('txt-address').value;
    
    let rad_unlock = document.getElementById('rad-unlock');

    

    var html = "";
        html +=  `<label style="font-size: 14px; color:rgb(99, 0, 16);">Bạn có chắc thay đổi thông tin tài khoản với các thông tin sau?</label><br>`;
        html +=  `<label style="font-size: 14px; color:red;"> Tên người dùng cần thay đổi thông tin: `+ input_username +`</label><br>`;
        html +=  `<label style="font-size: 14px; color:red;"> Mật khẩu: `+ input_password +`</label><br>`;
        html +=  `<label style="font-size: 14px; color:red;"> Email: `+ input_email +`</label><br>`;
        html +=  `<label style="font-size: 14px; color:red;"> Số điện thoại: `+ input_number_phone +`</label><br>`;
        html +=  `<label style="font-size: 14px; color:red;"> Địa chỉ: `+ input_address +`</label><br>`;

    if (rad_unlock.checked){
        html +=  `<label style="font-size: 14px; color:red;"> Trạng thái tài khoản: Mở khoá</label><br>`;
    } else {
        html += `<label style="font-size: 14px; color:red;"> Trạng thái tài khoản: Khoá</label><br>`;
    }

    // Khu vực thực hiện phân quyền
    // Đây chỉ là giải pháp tạm thời nên cần được thấy thế khi hoàn thành chương trình
    let cbx_role = document.getElementById('cbx-role').value;
    if (cbx_role == "Customer"){
        html +=  `<label style="font-size: 14px; color:red;"> Phân quyền: Khách hàng</label><br>`;
    } else {
        if (cbx_role == "Staff"){
            html +=  `<label style="font-size: 14px; color:red;"> Phân quyền: Nhân viên</label><br>`;
        } else {
            html +=  `<label style="font-size: 14px; color:red;"> Phân quyền: Quản lý</label><br>`;
        }
    }
    //---------------------------------

    let write_zone = document.getElementById('content');
    write_zone.innerHTML = html;

    AttentionOpen();
}

// hàm thực hiện submit
function AcceptSubmit(){
    document.getElementById('Account-Form').submit();
}

