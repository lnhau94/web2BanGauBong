function OpenLogin(){
    ExitLog();
    document.getElementById('Login').style.display = "block";
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
    alert("Im here!");
}