<?php
    class Product{
        private $id;
        private $name;
        private $price;
        private $inventory;
        private $size;
        private $state;
        private $category;
        private $categoryName;
        private $imgURL;

        public function __construct( $id, $name, $price, $inventory, $size, $state, $category,$categoryName,$imgURL){
            $this -> id = $id;
            $this -> name = $name;
            $this -> price = $price;
            $this -> inventory = $inventory;
            $this -> size = $size;
            $this -> state = $state;
            $this -> category = $category;
            $this -> categoryName = $categoryName;
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

        public function getCategoryName()
        {
            return $this->categoryName;
        }

    }



?>