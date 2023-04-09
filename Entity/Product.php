<?php
    class Product extends DBConnect{
        private $id;
        private $name;
        private $price;
        private $inventory;
        private $size;
        private $state;
        private $category;
        private $imgURL;

        public function __construct( $id, $name, $price, $inventory, $size, $state, $category,$imgURL){
            $this -> id = $id;
            $this -> name = $name;
            $this -> price = $price;
            $this -> inventory = $inventory;
            $this -> size = $size;
            $this -> state = $state;
            $this -> category = $category;
            $this -> imgURL = $imgURL;
        }
        public function getId(){
            return $this -> id;
        }
        public function getName(){
            return  $this -> name;
        }
        public function getPrice(){
            return $this -> price;
        }
        public function getInventory(){
            return $this -> inventory;
        }
        public function getSize(){
            return $this -> size;
        }
        public function getState(){
            return $this -> state;
        }
        public function getCategory(){
            return $this -> category;
        }
        public function getImgURL(){
            return $this -> imgURL;
        }
    }

    class Products extends DBConnect{
        private $products;
        public function getProducts(){
            if($this->products==null){
                $this -> products = array();
                $rs = $this -> getConnection() -> query("SELECT * FROM Product p join Image i on p.ProductId = i.ProductId");
                if($rs->num_rows>0){
                    while($row = $rs->fetch_assoc()){
                        array_push($this->products,
                            new Product($row['ProductId'],$row['ProductName'],
                                        $row['ProductPrice'],$row["ProductInventory"],
                                        $row["ProductSize"],$row["ProductStatus"],
                                        $row["CategoryId"], $row["ImageUrl"]));
                    }
                }
            }
            return $this -> products;
        }
    }

?>