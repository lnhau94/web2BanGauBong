
function ajax() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("hau-product-view-container").innerHTML = this.responseText;
        }


        };
    xmlhttp.open("POST", "/api/product.php?page=1&productCount=10", true);
    xmlhttp.send();

}
