function editCategory(element){
    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function (){
        // alert("Sửa thành công");
    }
    xml.open("POST","/admin/Category/EditCategory.php?id=" + element.dataset.id
        +"&name=" + element.querySelector(".category-name").value,false);
    xml.send();
}

function checkDate(){
    if (!document.getElementById("start").value
        || !document.getElementById("end").value){
        alert("Vui lòng chọn ngày");
        return false;
    }
    return true;

}

function removeCategory(element){
    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function (){
        // alert(this.responseText);
    }
    xml.open("POST","/admin/Category/RemoveCategory.php?id=" + element.dataset.id,true);
    xml.send();
}

function showProductChart(element){
    element.querySelector(".hau-statistics-body").style.display = "none";
    element.querySelector(".hau-statistic-header").style.display = "none";
    element.querySelector(".hau-chart-holder").style.display = "block";
    const ctx = document.getElementById("productChart");
    let chartLabels = Array.from(element.querySelectorAll(".item-name")).map(e=>e.innerText);
    let qtyData = Array.from(element.querySelectorAll(".item-qty")).map(e=>Number(e.innerText));
    let revData = Array.from(element.querySelectorAll(".item-rev")).map(e=>Number(e.innerText));
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Số lượng',
                data: qtyData,
                borderWidth: 1,
                borderColor: '#FF6384',
                backgroundColor: '#FFB1C1',
            }]
        }
        ,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
function showTable(element){
    element.querySelector(".hau-statistics-body").style.display = "block";
    element.querySelector(".hau-statistic-header").style.display = "grid";
    element.querySelector(".hau-chart-holder").style.display = "none";
}
function showCategoryChart(element){
    element.querySelector(".hau-statistics-body").style.display = "none";
    element.querySelector(".hau-statistic-header").style.display = "none";
    element.querySelector(".hau-chart-holder").style.display = "block";
    const ctx = document.getElementById("categoryChart");
    let chartLabels = Array.from(element.querySelectorAll(".item-name")).map(e=>e.innerText);
    let qtyData = Array.from(element.querySelectorAll(".item-qty")).map(e=>Number(e.innerText));
    let revData = Array.from(element.querySelectorAll(".item-rev")).map(e=>Number(e.innerText));
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Số lượng',
                data: qtyData,
                borderWidth: 1,
                borderColor: '#FF6384',
                backgroundColor: ['#ff9ff3','#feca57','#ff6b6b','#10ac84','#5f27cd','#01a3a4','#f368e0',
                    '#ff9fff','#fecaff','#ff6bff','#10acf4','#5f27fd','#01a3f4','#f368f0']
            }]
        }
        ,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}