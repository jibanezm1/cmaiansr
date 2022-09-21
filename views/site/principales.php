<?php

use app\models\Producto;
use yii\helpers\Url;

?>
<section class="shop-tab page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab tab-border nav-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="man-women-tab" data-bs-toggle="tab" href="#man-women" role="tab" aria-controls="man-women" aria-selected="true"> Materiales</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="man-women" role="tabpanel" aria-labelledby="man-women-tab">
                            <div class="row">
                                <?php


                                $model = Producto::find()->limit(8)->all();

                                foreach ($model as $producto) {
                                ?>
                                    <div class="col-lg-3 col-sm-3 col-6 col-md-5">
                                        <div class="product mt-30">
                                            <div class="product-image">
                                                <img class="img-fluid mx-auto" src="<?php echo $producto->imagen; ?>" alt="">
                                                <div class="product-overlay">
                                                    <div class="add-to-cart">
                                                        <a href="<?php echo Url::to(['detalle_producto', 'id' => $producto->idproducto]); ?>">Agregar a cotización</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-des">
                                                <div class="product-title">
                                                    <a href="<?php echo Url::to(['detalle_producto', 'id' => $producto->idproducto]); ?>" <?php echo $producto->nombreProducto; ?>"><?php echo $producto->nombreProducto; ?></a>
                                                </div>


                                                <div class="product-price">
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>