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

  });
});