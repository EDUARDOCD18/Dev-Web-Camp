<main class="agenda">
    <h2 class="agenda__heading">Workshops & conferencias</h2>
    <p class="agenda__descripcion">Talleres y Conferencias dictados por expertos en el Desarrollo Web.</p>

    <!-- CONFERENCIAS -->
    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferencias/></h3>
        <p class="eventos__fecha">Viernes, 3 de octubre</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias_v'] as $evento) { ?>
                    <div class="evento swiper-slider">
                        <!-- Hora del evento -->
                        <div class="evento__hora"><?php echo $evento->hora->hora ?></div>

                        <!-- Nombre del evento -->
                        <div class="evento__informacion">
                            <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>

                            <!-- Descripción del evento -->
                            <div>
                                <p class="evento__introduccion"><?php echo $evento->descripcion ?></p>
                            </div>

                            <!-- Autor del evento -->
                            <div class="evento__autor-info">

                                <picture>
                                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.webp" type="image/webp">
                                    <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" type="image/png">
                                    <img class="evento__imagen-autor" loading="lazy" width="200" height="300" src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $evento->ponente->imagen; ?>.png" alt="imagen ponenete">
                                </picture>

                                <p class="evento__autor-nombre"><?php echo $evento->ponente->nombre . " " . $evento->ponente->apellido ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <p class="eventos__fecha">Sábado, 4 de octubre</p>

        <div class="eventos__listado">
            <!-- Los datos de la base de datos van acá -->
        </div>
    </div>

    <!-- WORKSHOPS -->
    <div class="eventos eventos--workshops">
        <h3 class="eventos__heading">&lt;Workshops/></h3>
        <p class="eventos__fecha">Viernes, 3 de octubre</p>

        <div class="eventos__listado">
            <!-- Los datos de la base de datos van acá -->
        </div>

        <p class="eventos__fecha">Sábado, 4 de octubre</p>

        <div class="eventos__listado">
            <!-- Los datos de la base de datos van acá -->
        </div>
    </div>

</main>