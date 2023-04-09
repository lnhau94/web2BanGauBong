
<div class="hau-topmenu-container">
    <ul>
        <li class="hau-topmenu-item"><a href="./index.php">Home</a></li>
        <?php
        include 'Entity/Category.php';
            $cat = new Categories();
            foreach ($cat -> getCategories()  as $item) {
                echo "<li class= 'hau-topmenu-item'><a href='/BANGAUBONG/?Category=". $item->getId()."'>".$item->getName()."</a></li>";
            }
        ?>
        <li class= 'hau-topmenu-item'><a href="/about">About</a></li>
        <li class= 'hau-topmenu-item'><a href="/contact">Contact</a></li>
        
    </ul>
</div>