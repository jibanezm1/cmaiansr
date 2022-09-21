<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\models\Categoria;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Comercial Maians SPA</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <div id="pre-loader">
            <img src="images/pre-loader/loader-12.svg" alt="">
        </div>
        <header id="header" class="header light">

            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 xs-mb-10">
                            <div class="topbar-call text-center text-md-start">
                                <ul>
                                    <li><i class="fa fa-envelope-o theme-color"></i> ventas@cmaians.cl</li>
                                    <li><i class="fa fa-phone"></i> <a href="tel:+56 9 5709 1495"> <span>+56 9 5709 1495 </span> </a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="topbar-social text-center text-md-end">
                                <ul>
                                    <li><a href="#"><span class="ti-facebook"></span></a></li>
                                    <li><a href="#"><span class="ti-instagram"></span></a></li>
                                    <li><a href="#"><span class="fa fa-google"></span></a></li>
                                    <li><a href="#"><span class="ti-twitter"></span></a></li>
                                    <li><a href="#"><span class="ti-linkedin"></span></a></li>
                                    <li><a href="#"><span class="ti-dribbble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="menu">
                <!-- menu start -->
                <nav id="menu" class="mega-menu">
                    <!-- menu list items container -->
                    <section class="menu-list-items">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 position-relative">
                                    <!-- menu logo -->
                                    <ul class="menu-logo">
                                        <li>
                                            <a href="<?php echo Url::to(['/']); ?>"><img id="logo_img" src="images/logo.png" alt="logo"> </a>
                                        </li>
                                    </ul>
                                    <!-- menu links -->
                                    <div class="menu-bar">
                                        <ul class="menu-links">

                                            <li><a href="<?php echo Url::to(['/']); ?>">Inicio <i class="fa fa-indicator "></i></a></li>
                                            <li><a href="<?php echo Url::to(['site/contact']); ?>">Contactanos <i class="fa fa-indicator "></i></a></li>

                                            <li><a href="javascript:void(0)"> Categorias <i class="fa fa-angle-down fa-indicator"></i></a>
                                                <!-- drop down multilevel  -->
                                                <ul class="drop-down-multilevel">

                                                    <?php $categorias = Categoria::find()->all();

                                                    foreach ($categorias as $c) {
                                                    ?>
                                                        <li><a href="<?php echo Url::to(['categoria/view', 'id' => $c->id]); ?>"><?php echo $c->nombre; ?> </a></li>


                                                    <?php
                                                    }
                                                    ?>

                                                </ul>
                                            </li>

                                        </ul>
                                        <div class="search-cart">
                                            <div class="search">
                                                <a class="search-btn not_click" href="javascript:void(0);"></a>
                                                <div class="search-box not-click">
                                                    <form action="buscar" method="get">
                                                        <input type="text" class="not-click form-control" name="q" placeholder="Buscar Producto.." value="">
                                                        <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="shpping-cart">
                                                <a class="cart-btn" href="#"> <i class="fa fa-shopping-cart icon"></i> <strong id="contador" class="item">
                                                        <?php
                                                        $cart = \Yii::$app->cart;
                                                        if ($cart->getItemIds()) {
                                                            $count = $cart->getTotalCount();

                                                            echo $count;
                                                        } else {
                                                            echo "0";
                                                        }

                                                        ?>
                                                    </strong></a>
                                                <div class="cart">
                                                    <div class="cart-title">
                                                        <h6 class="uppercase mb-0">Carro Cotización</h6>
                                                    </div>
                                                    <div id="elcarro">
                                                        <?php
                                                        $cart = \Yii::$app->cart;



                                                        if ($cart->getItems()) {

                                                            $items =  $cart->getItems();

                                                            foreach ($items as $i) {

                                                        ?>

                                                                <div class="cart-item">
                                                                    <div class="cart-image">
                                                                        <img class="img-fluid" src="<?php echo  $i->getProduct()->imagen; ?>" alt="">
                                                                    </div>
                                                                    <div class="cart-name clearfix">
                                                                        <a href="#"><?php echo $i->getProduct()->nombreProducto; ?> <strong>x<?php echo $i->getQuantity(); ?></strong> </a>

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
                                                        ?>

                                                            <div class="cart-item">



                                                                <div class="cart-name clearfix">
                                                                    <a href="#">Sin Productos </a>

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
                        </div>
                    </section>
                </nav>
                <!-- menu end -->
            </div>
        </header>



        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>


        <footer class="footer page-section-pt black-bg">
            <div class="container">



            </div>
        </footer>

        <!--=================================
 footer -->

    </div>

    <div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div>

    <script>
        var plugin_path = 'js/';
    </script>
    <script>
        function eliminar(id) {
            $.get('categoria/eliminar', {
                id: id
            }, function(returnedData) {

                document.getElementById("elcarro").innerHTML = returnedData;
                contador();


            });
        }

        function contador() {
            $.get('categoria/contar', function(returnedData) {

                document.getElementById("contador").innerHTML = returnedData;




            });

        }

        function agregar(id, cantidad) {



            var value = document.getElementById("el-" + id).value;


            console.log(value)

            $.get('categoria/agregar', {
                    id: id,
                    cantidad: value
                },
                function(returnedData) {

                    console.log(returnedData);

                    if (returnedData == 10) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Solamente puede hacer un pedido con productos de un locatario.'
                        });
                    } else {

                        document.getElementById("elcarro").innerHTML = returnedData;
                        contador();
                        return false;
                    }




                });
        }
    </script>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>