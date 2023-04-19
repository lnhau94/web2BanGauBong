document.querySelector(".huy-datepicker-before").addEventListener("input", (e) => {
  test = new Date(e.target.value);
  console.log(`Day: ${test.getDate()}`);
  console.log(`Month: ${test.getMonth()+1}`);
  console.log(`Year: ${test.getFullYear()}`);
});

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