<?php
  require './Users.php';
  require './OrderDetail.php';
  class Orders {
    private $orderId;
    private $totalPrice;
    private $orderDate;
    private $customer;
    private $orderDetail;
  
    function __construct($orderId,$totalPrice,$orderDate,$customer,$orderDetail) {
      $this->orderId = $orderId;
      $this->totalPrice = $totalPrice;
      $this->orderDate = $orderDate;
      $this->customer = $customer;
      $this->orderDetail = $orderDetail;
    }
  }
?>