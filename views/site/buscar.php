<?php

use app\models\Categoria;
use app\models\DetalleNota;
use app\models\Producto;
use yii\helpers\Url;

?>
<section class="page-title bg-overlay-black-60 parallax" data-jarallax='{"speed": 0.6}' style="background-image: url('https://i0.wp.com/anautrilla.com/wp-content/uploads/2018/01/un-hogar-acogedor-calido-tips-para-conseguirlo-anautrilla-interiorismo-online.jpg?fit=1551%2C926&ssl=1');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-name">
                    <h1><?php echo $q; ?></h1>
                    <p>Comercial maians</p>
                </div>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo Url::to(['/']); ?>"><i class="fa fa-home"></i> Inicio</a> <i class="fa fa-angle-double-right"></i></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--=================================
page-title -->


<!--=================================
shop -->

<section class="shop grid page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="sidebar-widgets-wrap">
                    <div class="sidebar-widget mb-40">
                        <h5 class="mb-20">Buscar Productos</h5>
                        <div class="widget-search">
                            <i class="fa fa-search"></i>
                            <input type="search" class="form-control placeholder" placeholder="Buscar....">
                        </div>
                    </div>
                    <div class="sidebar-widget mb-40">
                        <h5 class="mb-20">Categorias</h5>
                        <div class="widget-link">
                            <ul>
                                <?php $categorias = Categoria::find()->all();

                                foreach ($categorias as $c) {
                                ?>
                                    <li> <a href="<?php echo Url::to(['../categoria', 'id' => $c->id]); ?>"> <i class="fa fa-angle-double-right"></i><?php echo $c->nombre; ?> </a> </li>


                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>


                    <div class="sidebar-widget mb-0">
                        <h5 class="mb-20">Mas Venidos</h5>

                        <?php
                        $connection = Yii::$app->getDb();
                        $command = $connection->createCommand('SELECT 
                        p.imagen, p.nombreProducto, SUM(d.cantidad) as "totales"
                        FROM
                        producto p
                        INNER JOIN
                        detalleNota d ON p.idproducto = d.idproducto
                        GROUP BY p.idproducto
                        ORDER BY totales DESC');
                        $vendidos = $command->queryAll();

                        foreach ($vendidos as $v) {

                        ?>

                            <div class="recent-item clearfix">

                                <div class="recent-image">
                                    <a href="<?php echo Url::to(['../detalle_producto', 'id' => $v["idproducto"]]); ?>"><img class="img-fluid" src="<?php echo $v["imagen"]; ?>" alt=""></a>
                                </div>
                                <div class="recent-info">
                                    <div class="recent-title">
                                        <a href="<?php echo Url::to(['../detalle_producto', 'id' => $v["idproducto"]]); ?>"><?php echo $v["nombreProducto"]; ?></a>
                                    </div>


                                </div>
                            </div>

                        <?php
                        }

                        ?>




                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 sm-mt-40">


                <?php $productos = Producto::find()
                    ->where(["like", "nombreProducto", $q])
                    ->orderBy(['nombreProducto' => SORT_ASC])
                    ->limit(3)
                    ->all();

                foreach ($productos as $producto) {
                ?>
                    <div class="divider mt-30 mb-30"></div>
                    <div class="product listing">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-6 col-md-4">
                                <div class="product-image">
                                    <img class="img-fluid mx-auto" src="<?php echo $producto->imagen; ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-6 col-md-4">
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

                <?php
                }

                ?>
                <div id="results"></div>



            </div>
        </div>
    </div>
</section>

<!--=================================
welcome -->

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


<script>
    var scrollLoad = true;
    var mypage = 1;

    jQuery(window).scroll(function() {
        if (scrollLoad && jQuery(window).scrollTop() >= jQuery(document).height() - jQuery(window).height() - 600) {
            mypage++;
            mycontent(mypage);


            //Add something at the end of the page
        }


        function mycontent(mypage) {


            $.get('../categoria/cargarq?page=' + mypage + '&q=<?php echo $q; ?>',
                function(data) {

                    if (data.trim().length == 0 || data.trim().length == null) {
                        // $('#loading').append('<button class="btn btn-primary">No existen más post disponibles<br></button>');
                        // var e = document.getElementById("loading");
                        // e.id = "loadings";
                        // document.getElementById('ani_img').style.display = 'none';
                        // document.getElementById('ani_img').style.visibility = 'none';
                        // var s = document.getElementById("ani_img");
                        // s.id = "ani_imgs"
                        console.log("no hay mas");
                    }

                    console.log(mypage);
                    $('#results').append(data);



                });
        }
    });
</script>