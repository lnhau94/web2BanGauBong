<?php
    include_once __DIR__.'/../util/dbconnect.php';
    class Cart{
        private $itemList;
        public function __construct($itemList = array())
        {
            $this->itemList = $itemList;
        }
        public function addItem(CartItem $item){
            array_push($this->itemList,$item);
        }
        public static function getData($userId){
            $cart = new Cart();
            $DB = new DBConnect();
            $rs = $DB->getConnection()->query("
                 select p.ProductId as id, p.ProductName as name, c.qty as qty, p.ProductPrice as price, i.ImageUrl as imageurl
                 from cart c join product p on c.productId = p.productId join image i on i.ProductId  = p.ProductId
                where c.userId = ".$userId
                );

            while($row = $rs->fetch_assoc()) {
                $item = new CartItem($row['id'],$row['name'], $row['imageurl'], $row['price'], $row['qty']);
                $cart->addItem($item);
            }
            return $cart;
        }

        /**
         * @return array|mixed
         */
        public function getItemList(): mixed
        {
            return $this->itemList;
        }

    }
    class CartItem{
        private $id;
        private $name;
        private $imgUrl;
        private $price;
        private $qty;

        /**
         * @param $name
         * @param $imgUrl
         * @param $price
         * @param $qty
         */
        public function __construct($id,$name, $imgUrl, $price, $qty)
        {
            $this->id = $id;
            $this->name = $name;
            $this->imgUrl = $imgUrl;
            $this->price = $price;
            $this->qty = $qty;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }


        /**
         * @return mixed
         */
        public function getImgUrl()
        {
            return $this->imgUrl;
        }

        /**
         * @return mixed
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @return mixed
         */
        public function getQty()
        {
            return $this->qty;
        }


    }
?>