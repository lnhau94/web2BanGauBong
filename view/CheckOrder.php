<?php
//  echo '
//  <!DOCTYPE html>
//  <html lang="en">
//  <head>
//    <meta charset="UTF-8">
//    <meta http-equiv="X-UA-Compatible" content="IE=edge">
//    <meta name="viewport" content="width=device-width, initial-scale=1.0">
//    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
//    <link rel="stylesheet" href="../CSS/Huy_CheckOrder.css">
//    <title>Orders</title>
//  </head>
//  ';
//  echo '<body>';
  echo '<div class="huy-container-orders">';
  echo '
    <div class="huy-datepicker">
      <label>Chọn khoảng ngày: </label>
      <input type="date" id="huy-datepicker-before" class="huy-datepicker-before" min="2000-01-01"> - 
      <input type="date" id="huy-datepicker-after" class="huy-datepicker-after" min="2000-01-01">
      <button class="huy-btn-search-order" style="background-color: transparent; border-color: transparent;">
        <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #FF7B9B;"></i>
      </button>
    </div>
    <br>
    <div class="huy-table">
      <div class="huy-header">
        <div class="huy-row">
          <div class="huy-column"><span class="huy-column-title">ID ORDER</span></div>
          <div class="huy-column"><span class="huy-column-title">TOTAL PRICE</span></div>
          <div class="huy-column"><span class="huy-column-title">DATE ORDER</span></div>
          <div class="huy-column"><span class="huy-column-title">ID USER</span></div>
          <div class="huy-column"><span class="huy-column-title">STATUS</span></div>
          <div class="huy-column"><span class="huy-column-title">DETAIL</span></div>
        </div>
      </div>
      <div class="huy-body">
  ';
  echo '</div>'; // Close div of "huy-body"
  echo '</div>'; // Close div of "huy-table"
  echo '</div>'; // Close div of "huy-container-orders"
//  echo '</body>';
  echo '<script src="../JS/Huy_CheckOrder.js"></script>';
?>