function editCategory(element){
    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function (){
        // alert("Sửa thành công");
    }
    xml.open("POST","/admin/Category/EditCategory.php?id=" + element.dataset.id
        +"&name=" + element.querySelector(".category-name").value,false);
    xml.send();
}

function removeCategory(element){
    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function (){
        // alert(this.responseText);
    }
    xml.open("POST","/admin/Category/RemoveCategory.php?id=" + element.dataset.id,true);
    xml.send();
}

function showRoleInputForm(){

}

function editRole(element){

}

function removeRole(element){

}