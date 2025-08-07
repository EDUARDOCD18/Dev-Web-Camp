<h2 class="dashboard__heading"><?php echo $titulo; ?>
</h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/ponentes" class="dashboard__boton">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>

<!-- FORMULARIO PARA AÑADIR A LOS PONENTES -->
<div class="dashboard__formulario">
    <?php include_once __DIR__ . '../../../templates/alertas.php' ?>

    <form action="/admin/ponentes/crear" method="POST" enctype="multipart/form-data" class="formulario">
        <?php include_once __DIR__ . '/formulario.php'; ?>

        <input class="formulario__submit" type="submit" value="Registrar ponente">
    </form>
</div>