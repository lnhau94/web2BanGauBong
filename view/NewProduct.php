<?php
include_once 'view/ProductView.php';
$ps = new Products();

echo '<label class="hau-container-label">New Arrival</label>';
echo '<div class="hau-product-container">';
foreach ($ps->getNewProducts() as $item) {
    $s = new ProductView($item);
    echo $s->show();
}
echo '</div>';
?>