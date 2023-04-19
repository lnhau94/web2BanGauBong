function OpenLogin(){
    ExitLog();
    if(!sessionStorage.getItem("userid")){
        document.getElementById('Login').style.display = "block";

    }else{
        sessionStorage.removeItem("userid");
        document.getElementById("btnCart").style.display = "none";
        alert("logout!");
    }

}

function OpenRegister(){
    ExitLog();
    document.getElementById('Register').style.display = "block";
}

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
function login(){
    let username = document.getElementById("txtUsername").value;
    let pass = document.getElementById("txtPassword").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText != "-1"){
                sessionStorage.setItem("userid",this.responseText);
                document.getElementById("btnCart").style.display = "block";
                ExitLog();
            }else{
                alert("Log in fail!");
            }

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