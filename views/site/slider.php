<?php

use yii\helpers\Url;

?>
<section id="main-slider" class="shop-04-banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid" src="images/shop/banner/01.jpg" alt="slider">
                <div class="slider-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 align-self-center text-start">
                                <div class="slider">
                                    <span class="mb-20 animated5"> Coleccion 2022</span>
                                    <h1 class="text-uppercase animated5">Coleccion de Persianas & Cortinas </h1>
                                    <p class=" mt-20 mb-30 animated5">Hasta 30% Descuento</p>
                                    <a class="button black ml-10 animated5" href="<?php echo Url::to(['../categoria', 'id' => 1]); ?>">Ver Mas </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="images/shop/banner/02.jpg" alt="slider">
                <div class="slider-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 align-self-center text-start">
                                <div class="slider">
                                    <span class="mb-20 animated5">Collection 2022 </span>
                                    <h1 class="text-uppercase animated5">Pisos Flotantes & Vinilicos </h1>
                                    <p class=" mt-20 mb-30 animated5">Hasta un 20% de Descuento</p>
                                    <a class="button black animated5" href="<?php echo Url::to(['../categoria', 'id' => 2]); ?>">Ver Mas </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>