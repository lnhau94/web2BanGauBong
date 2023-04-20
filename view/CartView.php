<?php
    include_once __DIR__."/../Model/Cart.php";
    class CartView{
        private Cart $cart;
        public function __construct(Cart $cart){
            $this->cart = $cart;
        }
        public function show(){
            $view = '<div class="hau-cart-holder">';
            $view = $view.'<div class="hau-cart-header">
                            <label class="hau-control-label">Giỏ hàng</label>
                            <button onclick="checkout()" class="hau-cart-button">Thanh Toán</button>
                            </div>';
            foreach ($this->cart->getItemList() as $item){
                $view = $view. '
                    <div class="hau-cart-item" data-id="'.$item->getId().'">
                        <img width="50px" height="50px" class="hau-cart-item-img" src="img/'.$item->getImgUrl().'">
                        <label class="hau-cart-item-name">'.$item->getName().'</label>
                        <label class="hau-cart-item-price">'.number_format($item->getPrice()).'</label>
                        <input onchange="calculateTotalPrice(this)" class="hau-cart-item-qty" type="number" min="1" max="100" value ="'.$item->getQty().'">
                        <label class="hau-cart-item-totalPrice">'.number_format(intval($item->getPrice())*intval($item->getQty())).'</label>
                        <div class="hau-cart-item-function-holder">
                            <input onchange="checkStorage(this.parentElement.parentElement)" class="hau-cart-item-checkbox" type="checkbox">
                            <button class="hau-cart-item-remove"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                ';
            }
            return $view."</div>";
        }
    }
?>

