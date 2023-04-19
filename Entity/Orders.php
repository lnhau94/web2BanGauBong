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
      $beforeDate = "";
      $afterDate = "";
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $beforeDate = $_REQUEST['beforeDate'];
        $afterDate = $_REQUEST['afterDate'];
        if ($this -> orders == null){
          $this -> orders = array();
          $connect = $this -> getConnection();
          $rs_orders = $connect -> query('select * from orders where OrdersDate between "'.$beforeDate.'" and "'.$afterDate.'" order by OrdersId asc');
          if ($rs_orders -> num_rows <= 0) {
            echo '
            <div id="huy-text-no-item">
              No items
            </div>';
          }
          elseif ($rs_orders -> num_rows > 0){
            while ($rows_orders = $rs_orders -> fetch_assoc()){
              $rs_orderdetails = $connect -> query('select distinct o.*,p.ProductName,p.ProductPrice,p.ProductSize from orderdetail o inner join product p on p.ProductId = o.ProductId where o.OrdersId = '.$rows_orders['OrdersId']);
              if ($this -> orderdetails == null){
                $this -> orderdetails = array();
                if ($rs_orderdetails -> num_rows > 0){
                  while ($rows_orderdetails = $rs_orderdetails -> fetch_assoc()){
                    array_push($this -> orderdetails, new OrderDetail($rows_orderdetails['OrdersId'],$rows_orderdetails['ProductId'],$rows_orderdetails['ProductName'],
                                                                      $rows_orderdetails['ProductPrice'],$rows_orderdetails['ProductSize'],$rows_orderdetails['OrderQuantity']));
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
                <button class="huy-btn-detail" onclick="changeDetail(this)"><i id="huy-icon-show" class="fa-solid fa-angle-up"></i></button>
              </div>
              ';
              echo '<div class="huy-detail-order">';
              echo '<div class="huy-detail-product">';
              // echo '<label>Tên sản phẩm</label>';
              echo '<label>Kích cỡ</label>';
              echo '<label>Số lượng</label>';
              echo '<label>Đơn giá</label>';
              echo '<label>Tổng tiền</label>';
              echo '</div>'; // Close div of "huy-detail-product"
              foreach ($item -> getOrderDetail() as $detailOrder) {
                echo '<div class="huy-detail-product">';
                echo '<label>'.$detailOrder -> getProductName().'</label><br>';
                echo '<label>'.$detailOrder -> getProductSize().'</label>';
                echo '<label>'.$detailOrder -> getOrderQty().'</label>';
                echo '<label>'.$detailOrder -> getProductPrice().'</label>';
                echo '<label>'.$detailOrder -> getProductPrice() * $detailOrder -> getOrderQty().'</label>';
                echo '</div>'; // Close div of "huy-detail-product"
              }
              // echo '<div class="huy-detail-product">';
              // echo '<label>Test item 1</label>';
              // echo '<label>Test item 2</label>';
              // echo '</div>'; // Close div of "huy-detail-product"
              echo '</div>'; // Close div of "huy-detail-order"
              echo '</div>'; // Close div of "huy-row"
            }
          }
        }
      }
    }
  }
  $test = new Orders();
  $test->getOrders();
?>