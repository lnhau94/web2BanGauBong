<?php
    include_once __DIR__."/../Model/Cart.php";
    class CartView{
        private Cart $cart;
        public function __construct(Cart $cart){
            $this->cart = $cart;
        }
        public function show(){
            $view = '';
            foreach ($this->cart->getItemList() as $item){
                $view = $view. '
                    <div class="hau-cart-item">
                        <img class="hau-cart-item-img" src="img/'.$item->getImgUrl().'">
                        <label class="hau-cart-item-name">'.$item->getName().'</label>
                        <label class="hau-cart-item-price">'.$item->getPrice().'</label>
                        <input class="hau-cart-item-qty" type="number" min="1" max="100" value ="'.$item->getQty().'">
                        <label class="hau-cart-item-totalPrice">'.intval($item->getPrice())*intval($item->getQty()).'</label>
                        <div>
                            <input class="hau-cart-item-checkbox" type="checkbox">
                            <button class="hau-cart-item-remove"></button>
                        </div>
                    </div>
                ';
            }
            return $view;
        }
    }
?>

