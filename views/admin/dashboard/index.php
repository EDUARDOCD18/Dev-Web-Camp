<h2 class="dashboard__heading"><?php echo $titulo; ?>
</h2>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Últimos registros</h3>

            <!-- Iterar en los registros -->
            <?php foreach ($registros as $registro) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto"> <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?>

                    </p>
                </div>
            <?php } ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Ingresos</h3>
            <p class="bloque__texto--cantidad"><?php echo "$" . $ingresos; ?></p>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos con menos disponibilidad</h3>
            <?php foreach ($menos_lugares as $evento) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto"> <?php echo $evento->nombre . " - " . $evento->disponibles . " Disponibles"; ?>

                    </p>
                </div>
            <?php } ?>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos con más disponibilidad</h3>
            <?php foreach ($mas_lugares as $evento) { ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto"> <?php echo $evento->nombre . " - " . $evento->disponibles . " Disponibles"; ?>

                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
</main>