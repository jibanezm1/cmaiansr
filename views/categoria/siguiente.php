<?php

use yii\helpers\Url;

foreach ($productos as $producto) {
?>
    <div class="product listing">
        <div class="row">
            <div class="col-6 col-md-4">
                <div class="product-image">
                    <img class="img-fluid mx-auto" src="<?php echo $producto->imagen; ?>" alt="">
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="product-des text-start">
                    <div class="product-title">
                        <a href="<?php echo Url::to(['../detalle_producto', 'id' => $producto->idproducto]); ?>"><?php echo $producto->nombreProducto; ?></a>
                    </div>


                    <div class="product-price">
                        <a class="button black ml-10 animated5" href="<?php echo Url::to(['../detalle_producto', 'id' => $producto->idproducto]); ?>">Ver Detalle</a>

                    </div>
                    <div class="product-info mt-20">
                        <p> <?php echo $producto->descripcionProducto; ?> </p>
                        <a class="button small mt-20" href="<?php echo Url::to(['../detalle_producto', 'id' => $producto->idproducto]); ?>">Agregar a Cotización</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divider mt-30 mb-30"></div>
<?php
}


?>