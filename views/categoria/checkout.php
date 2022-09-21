<?php

use yii\helpers\Url;

?>
<section class="page-title bg-overlay-black-60 parallax" data-jarallax='{"speed": 0.6}' style="background-image: url(https://media.admagazine.com/photos/618a625090c4ec9a52ca0f33/master/w_1600%2Cc_limit/81384.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-name">
                    <h1>Formulario de Cotización</h1>
                    <p>Casi estas terminando, completa el formulario para que podamos enviarte los valores y terminos.</p>
                </div>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo Url::to(['/']); ?>"><i class="fa fa-home"></i> Inicio</a> <i class="fa fa-angle-double-right"></i></li>
                    <li><span>Formulario </span> </li>
                </ul>
            </div>
        </div>
    </div>
</section>



<br><br>
<br>

<section class="checkout-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="mb-20">Formulario de Cotización</h2>

                <div class="section-field mb-30">
                    <label class="mb-10">Nombre Completo * </label>
                    <input id="nombre" type="text" placeholder="Nombre Completo *" class="form-control" name="nombre">
                </div>
                <div class="section-field mb-30">
                    <label class="mb-10">Correo * </label>
                    <input id="correos" type="text" placeholder="Correo *" class="form-control" name="correos">
                </div>
                <div class="section-field mb-30">
                    <label class="mb-10">Telefono * </label>
                    <input id="telefono" type="text" placeholder="Telefono *" class="form-control" name="telefono">
                </div>

                <div class="section-field mb-30">
                    <label class="mb-10">Direccion de despacho * </label>
                    <input type="text" class="not-click form-control mb-10" placeholder="Direccion" value="" id="direccion" name="direccion">
                </div>
                <div class="section-field mb-30">
                    <label class="mb-10">Comentario * </label>
                    <input id="comentario" type="textarea" placeholder="Comentario *" class="form-control" name="comentario">
                </div>


            </div>

        </div>


    </div>
</section>
<section class="wishlist-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Nombre</th>
                                <th>Cantidad </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cart = \Yii::$app->cart;

                            if ($cart->getItems()) {

                                $items =  $cart->getItems();

                                foreach ($items as $i) {
                            ?>
                                    <tr>

                                        <td class="image">
                                            <a class="media-link" href="#"> <img class="img-fluid" src="<?php echo $i->getProduct()->imagen; ?>" alt="" /></a>
                                        </td>
                                        <td class="description">
                                            <a href="#"><?php echo $i->getProduct()->nombreProducto; ?></a>
                                        </td>
                                        <td class="td-quentety">
                                            <?php echo $i->getQuantity(); ?>

                                        </td>

                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-60">
            <div class="col-md-12">
                <h4>Politica de servicio </h4>
                <p>La cotizacion tiene una validez de 5 dias desde que se ha emitido..</p>
                <div class="form-group">
                    <a class="button mt-10" onclick="enviar()">Enviar Cotización</a>
                </div>
            </div>

        </div>
    </div>
</section>


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
    function enviar() {

        var formData = {
            nombre: $("#nombre").val(),
            correo: $("#correos").val(),
            telefono: $("#telefono").val(),
            comentario: $("#comentario").val(),
            direccion: $("#direccion").val(),

        };
        console.log(formData);
        var settings = {
            "url": "../cotizacion/create",
            "method": "get",
            "mimeType": "multipart/form-data",
            "data": formData
        };

        $.ajax(settings).done(function(response) {
            if (response == 1) {
                Swal.fire({
                    title: 'Alerta',
                    text: "Su Cotización ha sido enviada",
                    icon: 'success'
                }).then((result) => {
                    window.location.reload();

                });
            } else {
                Swal.fire({
                    title: 'Alerta',
                    text: "No se ha podido enviar la cotización",
                    icon: 'warning'
                }).then((result) => {
                    window.location.reload();

                });

            }
        });

    }
</script>