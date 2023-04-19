document.querySelector(".huy-btn-search-order").addEventListener("click", (e) => {
  e.preventDefault();
  var beforeDate = document.querySelector(".huy-datepicker-before").value;
  var afterDate = document.querySelector(".huy-datepicker-after").value;
  if (beforeDate == "" || afterDate == "") {
    alert("Không được để ngày trống")
  }
  else {
    var beforeDate_format = new Date(beforeDate);
    var afterDate_format = new Date(afterDate);
    if (beforeDate_format > afterDate_format) {
      alert("Ngày bắt đầu không được lớn hơn ngày kết thúc")
    }
    else {
      var reqhttp_show = new XMLHttpRequest();
      reqhttp_show.open("POST","../Entity/Orders.php?" + 
      "beforeDate=" + beforeDate + 
      "&afterDate=" + afterDate,true);
      reqhttp_show.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // console.log(this.responseText);
          document.querySelector(".huy-body").innerHTML = this.responseText;
          document.querySelectorAll(".huy-status").forEach((e) => {
            e.addEventListener("change", (ev) => {
              if (ev.target.value == "none" || ev.target.value == "done") {
                ev.target.disabled = true;
                ev.target.style.filter = 'blur(1px)';
              }
              var reqhttp = new XMLHttpRequest();
              var nameStatus = "";
              if (ev.target.value == "none") {
                nameStatus = "Từ chối";
              }
              else if (ev.target.value == "done") {
                nameStatus = "Đã thanh toán";
              }
              else if (ev.target.value == "process") {
                nameStatus = "Đang chờ xử lý";
              }
              reqhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  console.log(this.responseText);
                }
              }
              reqhttp.open("POST",'../api/status_order.php?' + 
              "id=" + e.parentElement.parentElement.childNodes[1].innerText +
              "&status=" + nameStatus,true);
              reqhttp.send();
            });
          });
        }
      }
      reqhttp_show.send();
    }
  }
});

function changeDetail(element) {
  if (element.childNodes[0].className == "fa-solid fa-angle-down") {
    element.childNodes[0].className = "fa-solid fa-angle-up";
  }
  else {
    element.childNodes[0].className = "fa-solid fa-angle-down";
  }
}