<?php 

use yii\helpers\Url;
?>
<section class="page-section-pb rowpad none">
    <div class="home-banners right container ">
        <div class="row">
            <div class="col-md-4">
                <div class="add-banner-3 text-center xs-mb-20">
                    <img src="images/shop/add-banner/04.jpg" class="img-fluid full-width" alt="">
                    <div class="add-banner-content">
                        <h3 class="text-uppercase">Cortinas Roller </h3>
                   
                        <a href="<?php echo Url::to(['../categoria', 'id' => 1]); ?>">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="add-banner-3 center-banner xs-mb-20">
                            <img src="images/shop/add-banner/01.jpg" class="img-fluid full-width" alt="">
                            <div class="add-banner-content">
                                <h3 class="text-uppercase">Piso Flotante <br> Vinilico</h3>
                                <a href="<?php echo Url::to(['../categoria', 'id' => 2]); ?>">Ver Mas</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="add-banner-3 bottom-banner xs-mb-20">
                            <img src="images/shop/add-banner/02.jpg" class="img-fluid full-width" alt="">
                            <div class="add-banner-content">
                                <h3 class="text-uppercase">Puertas <br></h3>
                                <a href="<?php echo Url::to(['../categoria', 'id' => 3]); ?>">Ver Mas</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-md-12">
                        <div class="add-banner-3 center-banner mt-4 mt-sm-0">
                            <img src="images/shop/add-banner/03.jpg" class="img-fluid full-width" alt="">
                            <div class="add-banner-content">
                                <h3 class="text-uppercase">Otros Materiales</h3>
                             
                                <a href="<?php echo Url::to(['../categoria', 'id' => 4]); ?>">Ver Mas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>