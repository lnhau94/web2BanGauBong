<div class="hau-form-holder" >
    <form class="hau-form" action="/admin/Role/AddRole.php" method="get" onsubmit="return isExistedName();">

        <div class="hau-admin-label">
            <button style="float:right;" class="close-button" ><i class="fa-solid fa-xmark"></i></button>
            <label>Nhập Role mới</label>
        </div>

        <div class="hau-form-element">
            <label for="name">Tên Role:</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="hau-form-element">
            <input class="btn-add-user" type="submit" id="submitbtn">
        </div>
    </form>
</div>