<!--=================================
page-title-->




<!--=================================
page-title -->


<!--=================================
shop -->

<section class="shop-single page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider-slick">
                            <div class="slider slider-for detail-big-car-gallery">
                                <?php

                                use app\models\Categoria;
                                use app\models\Producto;
                                use yii\helpers\Url;

                                if ($model["fotos"]) {


                                    foreach ($model->fotos as $foto) { ?>
                                        <div class="item">
                                            <img class="img-fluid" src="<?php echo $foto->ruta; ?>" alt="">
                                        </div>

                                    <?php }
                                } else {
                                    ?>
                                    <div class="item">
                                        <img class="img-fluid" src="<?php echo $model->imagen; ?>" alt="">
                                    </div>
                                <?php
                                } ?>

                            </div>
                            <div class="slider slider-nav">
                                <?php

                                if ($model["fotos"]) {


                                    foreach ($model->fotos as $foto) { ?>
                                        <div class="item">
                                            <img class="img-fluid" src="<?php echo $foto->ruta; ?>" alt="">
                                        </div>

                                    <?php }
                                } else {
                                    ?>
                                    <div class="item">
                                        <img class="img-fluid" src="<?php echo $model->imagen; ?>" alt="">
                                    </div>
                                <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-detail clearfix">
                            <div class="product-detail-title mb-20 sm-mt-40">
                                <h4 class="mb-10"> <?php echo $model->nombreProducto; ?></h4>
                            </div>
                            <div class="clearfix mb-30">


                            </div>
                            <div class="product-detail-quantity clearfix mb-40">
                                <div class="input-group">
                                    <input id="el-<?php echo $model->idproducto; ?>" type="number" name="quant[1]" class="form-control input-number" value="1" min="1" max="2000">
                                </div>
                                <div class="product-detail add-to-cart">
                                    <a class="button small" onClick="agregar(<?php echo $model->idproducto ?>)">Cotizar</a>
                                </div>
                            </div>
                            <div class="product-detail-des mb-30">
                                <p class="mb-30"><?php echo $model->descripcionProducto; ?>.</p>
                                <ul class="list list-unstyled list-arrow">
                                    <?php if ($model->rendimiento) { ?>
                                        <li><?php echo $model->rendimiento; ?> m² X Caja</li>
                                    <?php } ?>

                                </ul>
                            </div>
                            <div class="product-detail-meta">
                                <span>Categoria: <a href="<?php echo Url::to(['../categoria', 'id' => $model->categoria->id]); ?>"><?php echo $model->categoria->nombre; ?></a> </span>
                            </div>
                            <div class="product-detail-social">
                                <span>Compartir:</span>
                                <ul class="list-style-none">
                                    <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                    <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                    <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                                    <li><a href="#"> <i class="fa fa-rss"></i> </a></li>
                                    <li><a href="#"> <i class="fa fa-envelope-o"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12 col-md-12">
                        <div class="title mt-30 mb-30">
                            <h6>Productos Relacionados</h6>
                        </div>
                        <div class="owl-carousel" data-nav-dots="false" data-nav-arrow="true" data-items="3" data-sm-items="2" data-lg-items="3" data-md-items="3" data-xs-items="2" data-autoplay="false">
                            <?php $relacionados = Producto::find()->where(["id_categoria" => $model->id_categoria])->limit(4)->all();
                            foreach ($relacionados as $product) { ?>
                                <div class="item">
                                    <div class="product">
                                        <div class="product-image">
                                            <img class="img-fluid mx-auto" src="<?php echo $product->imagen; ?>" alt="">
                                            <div class="product-overlay">
                                                <div class="add-to-cart">
                                                    <a onClick="agregar(<?php echo $product->idproducto ?>)">Cotizar</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-des">
                                            <div class="product-title">
                                                <a href="<?php echo Url::to(['../detalle_producto', 'id' => $product->idproducto]); ?>"><?php echo $product->nombreProducto; ?></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>




                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar-widgets-wrap">
                    <div class="sidebar-widget mb-40">
                        <h5 class="mb-20">Buscar un material</h5>
                        <div class="widget-search">
                            <i class="fa fa-search"></i>
                            <input type="search" class="form-control placeholder" placeholder="Buscar....">
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h5 class="mb-20">Categorias</h5>
                        <div class="widget-link">
                            <?php $categorias = Categoria::find()->all();

                            foreach ($categorias as $c) {
                            ?>
                                <li> <a href="<?php echo Url::to(['../categoria', 'id' => $c->id]); ?>"> <i class="fa fa-angle-double-right"></i><?php echo $c->nombre; ?> </a> </li>


                            <?php
                            }
                            ?>
                        </div>
                    </div>


                    <div class="sidebar-widget">
                        <h5 class="mt-40 mb-20">Suscribete</h5>
                        <div class="widget-newsletter">
                            <div class="newsletter-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="newsletter-content">
                                <i>Tenemos las mejores ofertas para ti. </i>
                            </div>
                            <div class="newsletter-form mt-20">
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Name">
                                </div>
                                <a class="button d-grid" href="#">Suscribirse</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
shop -->


<!--=================================
action box- -->


<section class="action-box theme-bg full-width">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 position-relative">
                <div class="action-box-text">
                    <h3><strong> Ofertas de Invierno: </strong> Revisa las Ofertas que tenemos para ti.</h3>
                </div>
                <div class="action-box-button">
                    <a class="button button-border white" href="<?php echo Url::to(['../categoria', 'id' => 1]); ?>">
                        <span>If a Ofertas</span>
                        <i class="fa fa-download"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
