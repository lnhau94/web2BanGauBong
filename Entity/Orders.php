<?php
  include_once './Users.php';
  include_once './OrderDetail.php';
  include_once './Product.php';
  include_once '../util/dbconnect.php';
  class Order extends DBConnect {
    private $orderId;
    private $totalPrice;
    private $orderDate;
    private $customer;
    private $orderDetail;
    private $status;
  
    function __construct($orderId,$totalPrice,$orderDate,$customer,$status,array $orderDetail) {
      $this->orderId = $orderId;
      $this->totalPrice = $totalPrice;
      $this->orderDate = $orderDate;
      $this->customer = $customer;
      $this->status = $status;
      $this->orderDetail = $orderDetail;
    }
  
    public function getOrderId() {
      return $this->orderId;
    }

    public function setOrderId($orderId) {
      $this->orderId = $orderId;
    }

    public function getTotalPrice() {
      return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice) {
      $this->totalPrice = $totalPrice;
    }

    public function getOrderDate() {
      return $this->orderDate;
    }

    public function setOrderDate($orderDate) {
      $this->orderDate = $orderDate;
    }

    public function getCustomer() {
      return $this->customer;
    }

    public function setCustomer($customer) {
      $this->customer = $customer;
    }

    public function setOrderDetail($orderDetail) {
      $this->orderDetail = $orderDetail;
    }

    public function getOrderDetail() {
      return $this->orderDetail;
    }

    public function getStatus() {
      return $this->status;
    }

    public function setStatus($status) {
      $this->status = $status;
    }
  }
  class Orders extends DBConnect{
    private $orders;
    private $orderdetails;
    private $products;
    public function getOrders(){
      echo '
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="../CSS/Huy_CheckOrder.css">
        <title>Orders</title>
      </head>
      ';
      echo '<body>';
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
      if ($this -> orders == null){
        $this -> orders = array();
        $connect = $this -> getConnection();
        $rs_orders = $connect -> query("select * from orders order by OrdersId asc");
        if ($rs_orders -> num_rows > 0){
          while ($rows_orders = $rs_orders -> fetch_assoc()){
            $rs_orderdetails = $connect -> query("select * from orderdetail where OrdersId = ".$rows_orders['OrdersId']);
            if ($this -> orderdetails == null){
              $this -> orderdetails = array();
              if ($rs_orderdetails -> num_rows > 0){
                while ($rows_orderdetails = $rs_orderdetails -> fetch_assoc()){
                  if ($this -> products == null) {
                    $this -> products = array();
                    $rs_products = $connect -> query("select distinct p.*, c.CategoryName, i.ImageUrl from product p inner join image i on i.ProductId = p.ProductId inner join category c on c.CategoryId = p.CategoryId where p.ProductId = ".$rows_orderdetails['ProductId']);
                    if ($rs_products -> num_rows > 0) {
                      while ($rows_products = $rs_products -> fetch_assoc()) {
                        array_push($this -> products, new Product($rows_products['ProductId'],$rows_products['ProductName'],
                                                                  $rows_products['ProductPrice'],$rows_products['ProductInventory'],$rows_products['ProductSize'],
                                                                  $rows_products['ProductStatus'],$rows_products['CategoryId'],$rows_products['CategoryName'],$rows_products['ImageUrl']));
                      }
                    }
                  }
                  array_push($this -> orderdetails, new OrderDetail($rows_orderdetails['OrdersId'],$this -> products,$rows_orderdetails['OrderQuantity']));
                }
                array_push($this -> orders, new Order($rows_orders['OrdersId'],$rows_orders['TotalPrice'],
                                                      $rows_orders['OrdersDate'], $rows_orders['UsersId'], $rows_orders['Status'],$this -> orderdetails));
              }
            }
          }
          foreach($this -> orders as $item) {
            echo '
            <div class="huy-row">
              <div class="huy-column">'.$item->getOrderId().'</div>
              <div class="huy-column">'.$item->getTotalPrice().'</div>
              <div class="huy-column">'.$item->getOrderDate().'</div>
              <div class="huy-column">'.$item->getCustomer().'</div>
            ';
            if ($item->getStatus() == "Đang chờ xử lý") {
              echo '
              <div class="huy-column">
                <select class="huy-status" name="huy-status" id="huy-status-id">
                  <option value="none" id="none">Từ chối</option>
                  <option value="process" id="process" selected>Đang chờ xử lý</option>
                  <option value="done" id="done">Đã thanh toán</option>
                </select>
              </div>
              ';
            }
            elseif ($item->getStatus() == "Từ chối") {
              echo '
              <div class="huy-column">
                <select class="huy-status" name="huy-status" id="huy-status-id" disabled>
                  <option value="none" id="none" selected>Từ chối</option>
                  <option value="process" id="process">Đang chờ xử lý</option>
                  <option value="done" id="done">Đã thanh toán</option>
                </select>
              </div>
              ';
            }
            else {
              echo '
              <div class="huy-column">
                <select class="huy-status" name="huy-status" id="huy-status-id" disabled>
                  <option value="none" id="none">Từ chối</option>
                  <option value="process" id="process">Đang chờ xử lý</option>
                  <option value="done" id="done" selected>Đã thanh toán</option>
                </select>
              </div>
              ';
            }
            echo '
            <div class="huy-column">
              <button class="huy-btn-detail"><i id="huy-icon-show" class="fa-solid fa-angle-down"></i></button>
            </div>
            ';
            echo '</div>'; // Close div of ""huy-row"
          }
        }
      }
      echo '</div>'; // Close div of "huy-body"
      echo '</div>'; // Close div of "huy-table"
      echo '</div>'; // Close div of "huy-container-orders"
      echo '</body>';
      echo '<script src="../JS/Huy_CheckOrder.js"></script>';
    }
  }
  $test = new Orders();
  $test -> getOrders();
?>