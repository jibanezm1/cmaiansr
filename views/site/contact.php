<section class="page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="office-1 black-bg parallax full-width mb-5 sm-mb-20 bg-overlay-black-60 parallax" style="background: url(https://dapducasse.cl/732-thickbox_default/pisos-spc-toscana-cw-060.jpg);">
                    <div class="touch-in position-relative">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="d-flex h-100 p-4">
                                    <div class="feature-icon media-icon mr-4">
                                        <span class="ti-map-alt theme-color fa-3x"></span>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="text-white">Direccion</h5>
                                        <p class="mb-0 text-white">Miguel Cruz, Buin</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="d-flex h-100 p-4">
                                    <div class="feature-icon media-icon mr-4">
                                        <span class="ti-mobile theme-color fa-3x"></span>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="text-white">Telefono</h5>
                                        <p class="mb-0 text-white">+56 9 5709 1495</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="d-flex h-100 p-4">
                                    <div class="feature-icon media-icon mr-4">
                                        <span class="ti-email theme-color fa-3x"></span>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="text-white">Correo</h5>
                                        <p class="mb-0 text-white">ventas@cmaians.cl</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-30">
            <div class="col-md-10">
                <div class="section-title text-center">
                    <h6>Tienes Alguna Consulta?</h6>
                    <h2 class="title-effect">Hablemos</h2>
                    <p class="mb-50">En Comercial Maians estamos disponibles para ayudarte a construir ese proyecto que tienes en mente.<span class="tooltip-content theme-color" title="Mon-Fri 10am–7pm (GMT +1)" data-bs-toggle="tooltip" data-bs-placement="top"> Comercial Maians</span></p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="enquiry-form-box">
                    <div class="form-wrapper">


                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Su Nombre" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="correo" class="form-control" id="correos" placeholder="Correo" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="asunto" class="form-control" id="asunto" placeholder="Asunto" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="mensaje" id="mensaje" placeholder="Mensaje"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-full" value="Enviar Consulta">
                                    </div>
                                </div>
                            </div>



                        </form>
                        <div class="seo-rocket">
                            <img src="images/default-color/seo-plane-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div><!-- End Col -->
        </div>


    </div>
</section>

<script>
    jQuery(document).ready(function() {
        jQuery("form").submit(function(event) {






            var formData = {
                nombre: $("#nombre").val(),
                correo: $("#correos").val(),
                telefono: $("#telefono").val(),
                asunto: $("#asunto").val(),
                mensaje: $("#mensaje").val(),

            };
            console.log(formData);
            var settings = {
                "url": "https://cmaians.apolotec.cl/contacto/crear",
                "method": "get",
                "mimeType": "multipart/form-data",
                "data": formData
            };

            $.ajax(settings).done(function(response) {
                if (response == 1) {
                    Swal.fire({
                        title: 'Alerta',
                        text: "Mensaje ha Sido enviado",
                        icon: 'success'
                    }).then((result) => {
                        window.location.reload();

                    });
                } else {
                    Swal.fire({
                        title: 'Alerta',
                        text: "No se ha podido enviar el mensaje",
                        icon: 'warning'
                    }).then((result) => {
                        window.location.reload();

                    });

                }
            });



            event.preventDefault();
        });
    });
</script>