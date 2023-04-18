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

function toCart(element){

    let target = document.getElementById("hau-gift");
    if(target) target.remove();
    let cart = document.getElementById("btnCart");
    let rect = cart.getBoundingClientRect();
    let rect2 = element.getBoundingClientRect();
    let gift = document.createElement("div");
    cart.setAttribute("style","position: relative;")
    gift.innerHTML = '<i class="fa-solid fa-gift"></i>'

    gift.className = "hau-gift";
    gift.id = "hau-gift";
    gift.setAttribute("style",
        "--start-X: " + (rect2.left - rect.left) + "px;" +
                "--start-Y: " + (rect2.bottom - rect.bottom) + "px;" +
                "position: absolute;"
    );
    cart.append(gift);
    // gift.remove();

}