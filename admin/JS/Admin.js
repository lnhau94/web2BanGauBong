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
    let label_name = document.getElementById('lab-name-'+index).innerHTML;
    let label_password = document.getElementById('lab-password-'+index).innerHTML;
    let label_number_phone = document.getElementById('lab-number-'+index).innerHTML;
    let label_email = document.getElementById('lab-email-'+index).innerHTML;
    let label_address = document.getElementById('lab-address-'+index).innerHTML;
    let label_role = document.getElementById('lab-role-'+index).innerHTML;
    let label_status = document.getElementById('lab-status-'+index).innerHTML;

    let input_username = document.getElementById('txt-username');
    let input_name = document.getElementById('txt-name');
    let input_password = document.getElementById('txt-password');
    let input_number_phone = document.getElementById('txt-number-phone');
    let input_email = document.getElementById('txt-email');
    let input_address = document.getElementById('txt-address');
    
    let rad_unlock = document.getElementById('rad-unlock');
    let rad_lock = document.getElementById('rad-lock');

    input_username.readOnly = true;
    input_username.style.backgroundColor = "#c0c0c0";

    input_username.value = label_username;
    input_name.value = label_name;
    input_password.value = label_password;
    input_email.value = label_email;
    input_number_phone.value = label_number_phone;
    input_address.value = label_address; 
    
    if ( label_status == "Đang hoạt động" ){
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

    let username_attention = document.getElementById('username-attention');
    let password_attention = document.getElementById('password-attention');
    let email_attention = document.getElementById('email-attention');
    let address_attention = document.getElementById('address-attention');
    let number_attention = document.getElementById('number-attention');

    let input_username = document.getElementById('txt-username');
    let input_password = document.getElementById('txt-password');
    let input_number_phone = document.getElementById('txt-number-phone');
    let input_email = document.getElementById('txt-email');
    let input_address = document.getElementById('txt-address');

    if (input_username.value == ""){
        username_attention.innerHTML = `<p class="warning-information">Tên người dùng không được bỏ trống!</p>`;
        flag = false;
    } else {
        if (input_username.value.length > 20){
            username_attention.innerHTML = `<p class="warning-information">Tên người dùng không được quá 20 ký tự!</p>`;
            flag = false;
        } else {
            username_attention.innerHTML = "";
        }
    }
    

    if (input_password.value == ""){
        password_attention.innerHTML = `<p class="warning-information">Mật khẩu không được bỏ trống!</p>`;
        flag = false;
    } else {
        if (input_password.value.length > 30){
            password_attention.innerHTML = `<p class="warning-information">Mật khẩu không được quá 30 ký tự!</p>`;
            flag = false;
        } else {
            password_attention.innerHTML = "";
        }
    }

    if (input_email.value == ""){
        email_attention.innerHTML = `<p class="warning-information">Email không được bỏ trống!</p>`;
        flag = false;
    } else {
            email_attention.innerHTML = "";
        }


    if (input_address.value == ""){
        address_attention.innerHTML = `<p class="warning-information">Địa chỉ không được bỏ trống!</p>`;
        flag = false;
    } 

    var Vali_Numbers = /^[0-9]+$/;

    if (input_number_phone.value == ""){
        number_attention.innerHTML = `<p class="warning-information">Số điện thoại không được bỏ trống!</p>`;
        flag = false;
    } else {
        if (!input_number_phone.value.match(Vali_Numbers)){
            number_attention.innerHTML = `<p class="warning-information">Ký tự bất buộc là các số (0 - 9)</p>`;
            flag = false;
        } else {
            if (input_number_phone.value.length != 10){
                number_attention.innerHTML = `<p class="warning-information">Số điện thoại bất buộc có 10 ký tự!</p>`;
                flag = false;
            } else {
                if (input_number_phone.value.charAt(0) != "0"){
                    number_attention.innerHTML = `<p class="warning-information">Số điện thoại bất đầu là số 0!</p>`;
                    flag = false;
                } else {
                    number_attention.innerHTML = "";
                }
            }
        }
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

