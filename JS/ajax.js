
function ajax(page=1) {
    var xmlhttp = new XMLHttpRequest();
    let productCount = document.getElementById("inPageChoice").value;
    let categories = getCategories();
    let name = document.getElementsByName("hau-search-field")[0].value;
    let minPrice = document.getElementById("min-price-slider").value;
    let maxPrice = document.getElementById("max-price-slider").value;
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("hau-product-view-container").innerHTML = this.responseText;
        }
        };
    xmlhttp.open("POST",
        "/api/product.php?" +
                "page=" + page +
                "&productCount=" + productCount +
                "&categories=" + categories +
                "&name=" + name +
                "&minPrice=" + minPrice +
                "&maxPrice=" + maxPrice,
        true);
    xmlhttp.send();
}

