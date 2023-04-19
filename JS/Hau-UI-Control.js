function showMinPrice(){
    let minS = document.getElementById("min-price-slider");
    let maxS = document.getElementById("max-price-slider");
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'VND',
    });
    document.getElementById("min-price-value").innerText = "from:" + formatter.format(minS.value);
    maxS.min = minS.value;
    maxS.width = (maxS.max - maxS.min)/(maxS.max - minS.min);
}
function showMaxPrice(){
    let minS = document.getElementById("min-price-slider");
    let maxS = document.getElementById("max-price-slider");
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'VND',
    });
    document.getElementById("max-price-value").innerText = "to:" +formatter.format(document.getElementById("max-price-slider").value);
    minS.max = maxS.value;
    minS.width = (minS.max - maxS.min)/(maxS.max - minS.min);
}

function getCategories(){
    let arr = Array.from(document.querySelectorAll(".hau-control-category-choice"));
    if(arr.length > 0){
        return "("
            + arr.filter(e=>e.checked).map(e=>  e.value ).join(",")
            + ")";
    }
    return "";

}

function hideCate(){
    if(document.getElementById("hau-cate-holder").style.display=="none"){
        document.getElementById("hau-btn-hide").innerHTML = '<i class="fa-solid fa-chevron-down"></i>';
        document.getElementById("hau-cate-holder").style.display="block";
    }
    else{
        document.getElementById("hau-btn-hide").innerHTML = '<i class="fa-solid fa-chevron-up"></i>';
        document.getElementById("hau-cate-holder").style.display="none";
    }
}

function addToCart(element){
    if(sessionStorage.getItem("userid")){
        toCart(element);
        let qtyElement
            = element.querySelector(".hau-product-item-detail-qty");
        if(qtyElement.value > 100 || qtyElement.value < 1){
            qtyElement.value = 1;
        }
        let id = element.dataset.id;
        let qty = qtyElement.value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Add Success!");
            }
        };
        xmlhttp.open("POST",
            "/api/addtocart.php?" +
            "userId=" + sessionStorage.getItem("userid") +
            "&productId=" + id +
            "&qty=" + qty,
            true);
        xmlhttp.send();
    }else{
        OpenLogin();
    }

}

function addToCartDefault(element){
    if(sessionStorage.getItem("userid")){
        toCart(element);
        let id = element.dataset.id;
        let qty = 1;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Add Success!!");
            }
        };
        xmlhttp.open("POST",
            "/api/addtocart.php?" +
            "userId=" + sessionStorage.getItem("userid") +
            "&productId=" + id +
            "&qty=" + qty,
            true);
        xmlhttp.send();
    }else{
        OpenLogin();
    }
}

function toCart(element){
    let target = document.getElementById("hau-gift");
    if(target) target.remove();
    let cart = document.getElementById("btnCart");
    let rect = cart.getBoundingClientRect();
    let rect2 = element.getBoundingClientRect();
    let gift = document.createElement("div");
    cart.setAttribute("style","position: relative;")
    // gift.innerHTML = '<i class="fa-solid fa-gift"></i>' + element.childNodes[1].outerHTML;
    element.childNodes.forEach(e=>{
        if(e.nodeName.toLowerCase() === 'img'){
            gift.innerHTML = element.childNodes[1].outerHTML;
        }

    })


    gift.className = "hau-gift";
    gift.id = "hau-gift";
    gift.setAttribute("style",
        "--start-X: " + ((rect2.left + rect2.right)/2 - rect.left - 50) + "px;" +
                "--start-Y: " + ((rect2.bottom + rect2.top)/2 - rect.bottom -50) + "px;" +
                "position: absolute;"
    );
    cart.append(gift);
    // gift.remove();

}

function showCart(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector(".container").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST",
        "/api/cart.php?" +
        "userId=" + sessionStorage.getItem("userid"),
        true);
    xmlhttp.send();
}

function checkout(){
    document.querySelectorAll(".hau-cart-item").forEach(item=>{
        if(item.querySelector(".hau-cart-item-checkbox").checked){
            console.log(item.dataset.id);
            console.log(item.querySelector(".hau-cart-item-totalPrice"));
            console.log(Number(item.querySelector(".hau-cart-item-qty").value)
                *Number(item.querySelector(".hau-cart-item-price").value)
            );
            console.log(Number(item.querySelector(".hau-cart-item-totalPrice").innerText.replaceAll(",","")));

        }
    })
}

function calculateTotalPrice(element){
    if(element.value < 1){
        element.value = 1;
    }
    if(element.value > 100){
        element.value = 100;
    }
    let item = element.parentElement;
    item.querySelector(".hau-cart-item-totalPrice").innerText =
        new Intl.NumberFormat().format(
            Number(item.querySelector(".hau-cart-item-price").innerText.replaceAll(",",""))*
            item.querySelector(".hau-cart-item-qty").value);

}