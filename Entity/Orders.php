<?php
  require_once './Users.php';
  require_once './OrderDetail.php';
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
    private $orderdetail;
    public function getOrders(){
      if ($this -> orders == null){
        $this -> orders = array();
        $connect = $this -> getConnection();
        $rs_orders = $connect -> query("select * from category order by CategoryId asc");
        if ($rs_orders -> num_rows > 0){
          while ($rows_orders = $rs_orders -> fetch_assoc()){
            array_push($this -> orders, $rows_orders['CategoryId']);
            echo '<br>';
            $rs_orderdetail = $connect -> query("select * from product where CategoryId = ".$rows_orders['CategoryId']);
            if ($this -> orderdetail == null){
              $this -> orderdetail = array();
              if ($rs_orderdetail -> num_rows > 0){
                while ($rows_orderdetail = $rs_orderdetail -> fetch_assoc()){
                  array_push($this -> orderdetail, $rows_orderdetail['ProductId']);
                }
                print_r($this -> orders);
                print_r($this -> orderdetail);
                $this -> orderdetail = array();
                $this -> orders = array();
              }
            }
            echo '<br>';
          }
        }
      }
    }
  }
  $test = new Orders();
  $test -> getOrders();
?>