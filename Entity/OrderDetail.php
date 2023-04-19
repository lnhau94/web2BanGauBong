<?php
  class OrderDetail {
    private $orderId;
    private $productId;
    private $productName;
    private $productPrice;
    private $productSize;
    private $orderQty;

    function __construct($orderId,$productId,$productName,$productPrice,$productSize,$orderQty) {
      $this->orderId = $orderId;
      $this->productId = $productId;
      $this->orderQty = $orderQty;
      $this->productName = $productName;
      $this->productPrice = $productPrice;
      $this->productSize = $productSize;
    }
  
	public function getProductId() {
		return $this->productId;
	}
  
	public function setProductId($productId) {
		$this->productId = $productId;
	}

	public function getOrderQty() {
		return $this->orderQty;
	}
	
	public function setOrderQty($orderQty) {
		$this->orderQty = $orderQty;
	}

	public function getOrderId() {
		return $this->orderId;
	}

	public function setOrderId($orderId) {
		$this->orderId = $orderId;
	}

	public function getProductName() {
		return $this->productName;
	}

	public function setProductName($productName) {
		$this->productName = $productName;
	}

	public function getProductPrice() {
		return $this->productPrice;
	}

	public function setProductPrice($productPrice) {
		$this->productPrice = $productPrice;
	}

	public function getProductSize() {
		return $this->productSize;
	}
	
	public function setProductSize($productSize) {
		$this->productSize = $productSize;
	}
}
?>