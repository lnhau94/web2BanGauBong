<?php 
    include 'Entity/Product.php';
    class ProductView {
        private $name;
        private $imgURL;
        private $price;

        public function __construct($product) {
            $this -> name = $product->getName();
            $this -> imgURL = $product->getImgURL();
            $this -> price = $product->getPrice();
        }

        public function show(){
            return "
                <div class='hau-product-item'>
                    <img class='hau-product-item-img' src='img/". $this->imgURL. "'style = {width: 300px; height: 350px;}>
                    <label class='hau-product-item-name'>".$this->name."</label>
                    <label class='hau-product-item-price'>".$this->price."</label>
                </div>
            ";
        }
    }
?>