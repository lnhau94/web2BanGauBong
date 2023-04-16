<?php
  require_once './Users.php';
  require_once './OrderDetail.php';
  require_once './Product.php';
  require_once '../util/dbconnect.php';
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
                    $rs_products = $connect -> query("select p.*, i.ImageUrl from product p inner join image i on i.ProductId = p.product where p.ProductId = ".$rows_orderdetails['ProductId']);
                    if ($rs_products -> num_rows > 0) {
                      while ($rows_products = $rs_products -> fetch_assoc()) {
                        array_push($this -> products, new Product($rows_products['ProductId'],$rows_products['ProductName'],
                                                                  $rows_products['ProductPrice'],$rows_products['ProductInventory'],$rows_products['ProductSize'],
                                                                  $rows_products['ProductStatus'],$rows_products['CategoryId'],$rows_products['ImageUrl']));
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
        }
      }
      print_r($this -> orders);
    }
  }
  $test = new Orders();
  $test -> getOrders();
?>