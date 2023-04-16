<?php 
    include_once __DIR__.'/../Entity/Product.php';
    class ProductView {
        private $product;

        public function __construct(Product $product) {
            $this->product = $product;
        }

        public function showInCatalog(){
            return "
                <div class='hau-product-item'>
                    <img class='hau-product-item-img' src='img/". $this->product->getImgURL() . "'style = {width: 300px; height: 350px;}>
                    <label class='hau-product-item-name'>".$this->product->getName()."</label>
                    <label class='hau-product-item-name'>".$this->product->getCategoryName()."</label>
                    <label class='hau-product-item-price'>".$this->product->getPrice()."</label>
                </div>
            ";
        }
        public function showInProductPage(){

        }
    }
?>