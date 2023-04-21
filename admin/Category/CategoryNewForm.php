<?php
    echo '<div class="hau-form-holder" >
        <form class="hau-form" action="/admin/Category/AddCategory.php" method="get" onsubmit="return isExistedName();">
            
            <div class="hau-admin-label">
                <button style="float:right;" class="close-button" ><i class="fa-solid fa-xmark"></i></button>
                <label>Nhập loại sản phẩm mới</label>
            </div>
            
            <div class="hau-form-element">
                <label for="name">Tên loại:</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="hau-form-element">
                <input class="btn-add-user" type="submit" id="submitbtn">
            </div>
        </form>
    </div>';
?>
<script>
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
        xml.open("POST","/api/category.php?name=" + document.querySelector("#name").value,false);
        xml.send();
        return islegal;
    }
    function showInputForm(){
        document.querySelector(".hau-form-holder").style.display = "flex";
    }
    function hideForm(){
        document.querySelector(".hau-form-holder").style.display = "none";
    }
    document.querySelector(".close-button").onclick = (e)=>{
        e.preventDefault();
        hideForm();
    }
</script>
