<?php 
    include_once __DIR__.'/../Entity/Product.php';
    class ProductView {
        private $product;

        public function __construct(Product $product) {
            $this->product = $product;
        }

        public function showInCatalog(){
            return "
                <div  class='hau-product-item' style='--start-X: ".rand(-100,100)."%;'>
                    <img class='hau-product-item-img' src='img/". $this->product->getImgURL() . "'style = {width: 300px; height: 350px;}>
                    <label class='hau-product-item-name'><a href='/product=".$this->product->getId()."'>".$this->product->getName()."</a></label>
                    <label class='hau-product-item-name'>".$this->product->getCategoryName()."</label>
                    <label class='hau-product-item-price'>".$this->product->getPrice()."</label>
                    ".$this->renderAddToCart()."
                </div>
            ";
        }

        public function renderAddToCart(){
//            if($_SESSION["user"] != null){
//                }
//            return "";
            return '<button onclick="toCart(this.parentElement)" class="hau-product-item-button">Thêm vào giỏ hàng</button>';

        }
        public function showInProductPage(){
            return "
                <div ' class='hau-product-item-detail' style='--start-X: ".rand(-100,100)."%;'>
                    <img class='hau-product-item-detail-img' src='img/". $this->product->getImgURL() . "'style = {width: 300px; height: 350px;}>
                    <div class='hau-product-item-detail-info'>
                        <label class='hau-product-item-name'>
                            <a href='/product=".$this->product->getId()."'>".$this->product->getName()."</a>
                        </label>
                        <label class='hau-product-item-detail-price'>".$this->product->getPrice()."</label>
                        <label class='hau-product-item-detail-name'>".$this->product->getCategoryName()."</label>
                        <label class='hau-product-item-detail-name'>".$this->product->getSize()."</label>
                        <input class='hau-product-item-detail-qty' type='number' min='1' max='100' value='1'>
                        <button onclick='toCart(this.parentElement.parentElement)' class='hau-product-item-button'>Thêm vào giỏ hàng</button>
                    </div>
                </div>
            ";
        }
    }
?>