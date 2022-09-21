<?php

use app\models\Producto;
use yii\helpers\Url;

?>

<section class="page-section-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <h4 class="mb-30">Mas vendidos</h4>

                <?php


                $model = Producto::find()->limit(4)->offset(12)->all();

                foreach ($model as $producto) {
                ?>
                    <div class="product left clearfix mb-40">
                        <div class="product-image">
                            <a href="#"><img class="img-fluid mx-auto" alt="" src="<?php echo $producto->imagen; ?>">
                            </a>
                        </div>
                        <div class="product-description">
                            <div class="product-title">
                                <h5> <a href="<?php echo Url::to(['detalle_producto', 'id' => $producto->idproducto]); ?>"> <?php echo $producto->nombreProducto; ?> </a> </h5>
                            </div>
                            <div class="product-price"><a href="<?php echo Url::to(['detalle_producto', 'id' => $producto->idproducto]); ?>">Cotizar</a>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>



            </div>
            <div class="col-lg-4 col-sm-6">
                <h4 class="mb-30 xs-mt-30">Popular</h4>

                <?php


                $model = Producto::find()->limit(4)->offset(20)->all();

                foreach ($model as $producto) {
                ?>
                    <div class="product left clearfix mb-40">
                        <div class="product-image">
                            <a href="#"><img class="img-fluid mx-auto" alt="" src="<?php echo $producto->imagen; ?>">
                            </a>
                        </div>
                        <div class="product-description">
                            <div class="product-title">
                                <h5> <a href="<?php echo Url::to(['detalle_producto', 'id' => $producto->idproducto]); ?>"> <?php echo $producto->nombreProducto; ?> </a> </h5>
                            </div>
                            <div class="product-price"><a>Cotizar</a>
                            </div>
                            <div class="product-rate">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="col-lg-4">
                <div class="offer-banner-1 text-center sm-mt-40">
                    <div class="banner-image">
                        <div class="line-effect">
                            <img class="img-fluid" src="https://falabella.scene7.com/is/image/Falabella/6734301_4?wid=800&hei=800&qlt=70" alt="">
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="banner-content">
                        <h1 class="text-uppercase text-white">Ofertas !</h1>
                        <strong>Ingresa aqui para revisar las ofertas que tenemos para ti</strong>
                        <a class="button" href="#">Ingresar <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>