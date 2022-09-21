<?php

use yii\helpers\Url;

$cart = \Yii::$app->cart;

if ($cart->getItems()) {

    $items =  $cart->getItems();

    foreach ($items as $i) {

?>
        <div class="cart-item">
            <div class="cart-image">
                <img class="img-fluid" src="<?php echo $i->getProduct()->imagen; ?>" alt="">
            </div>
            <div class="cart-name clearfix">
                <a href="#"><?php echo $i->getProduct()->nombreProducto; ?> <strong>x<?php echo $i->getQuantity(); ?></strong></a>


            </div>
            <div class="cart-close">
                <a onClick="eliminar(<?php echo $i->getProduct()->idproducto; ?>)"> <i class="fa fa-times-circle"></i> </a>
            </div>
        </div>
    <?php


    }
    ?>
    <div class="cart-total">
        <a class="button black" href="<?php echo Url::to(['checkout']); ?>">Ver Detalle</a>
    </div>
<?php
} else {
    echo "Carrito Vacio :(";
}
?>