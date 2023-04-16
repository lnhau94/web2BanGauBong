<?php
  class OrderDetail {
    private $orderId;
    private $products;
    private $orderQty;

    function __construct($orderId,array $products,$orderQty) {
      $this->orderId = $orderId;
      $this->products = $products;
      $this->orderQty = $orderQty;
    }
  }
?>