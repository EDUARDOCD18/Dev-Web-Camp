<!-- INFORMACIÓN BÁSICA DEL PONENTE -->
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>

    <!-- Nombre del ponente -->
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Ricardo:</label>
        <input type="text" class="formulario__input" id="nombre" placeholder="Nombre del ponente" name="nombre" value="<?php echo $ponente->nombre ?? ''; ?>">
    </div>

    <!-- Apellido del ponente -->
    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido:</label>
        <input type="text" class="formulario__input" id="apellido" placeholder="Apellido del ponente" name="apellido" value="<?php echo $ponente->apellido ?? ''; ?>">
    </div>

    <!-- Ciudad del ponente -->
    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad:</label>
        <input type="text" class="formulario__input" id="ciudad" placeholder="Los Ángeles" name="ciudad" value="<?php echo $ponente->ciudad ?? ''; ?>">
    </div>

    <!-- País del ponente -->
    <div class="formulario__campo">
        <label for="pais" class="formulario__label">País:</label>
        <input type="text" class="formulario__input" id="pais" placeholder="Venezuela" name="pais" value="<?php echo $ponente->pais ?? ''; ?>">
    </div>

    <!-- Imagen del ponente -->
    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen:</label>
        <input type="file" class="formulario__input formulario__input--file" id="imagen" name="imagen">
</fieldset>

<!-- INFORMACIÓN EXTRA DEL PONETE -->
<fieldset class=" formulario__fieldset">

    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">

        <!-- Áreas de experiencia -->
        <div class="formulario__campo">
            <label for="tags_input" class="formulario__label">Áreas de experiencia (separadas por coma):</label>
            <input type="text" class="formulario__input" id="tags_input" placeholder="Ej. Node, PHP, CSS, Laraver, UX / UI">
        </div>

        <div class="formulario__listado" id="tags">
            <input name="tags" type="hidden" value="<?php echo $ponente->tags ?? ''; ?>">
        </div>
    </div>
</fieldset>

<!-- REDES SOCIALES DEL PONENTE -->
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

    <!-- Facebook -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[facebook]" placeholder="Facebook" value="<?php echo $ponente->facebook ?? ''; ?>">
        </div>
    </div>

    <!-- X -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[x]" placeholder="X (Twitter)" value="<?php echo $ponente->twitter ?? ''; ?>">
        </div>
    </div>

    <!-- Youtube -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[youtube]" placeholder="Youtube" value="<?php echo $ponente->facebook ?? ''; ?>">
        </div>
    </div>

    <!-- Instagram -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[facebook]" placeholder="Instagram" value="<?php echo $ponente->instagram ?? ''; ?>">
        </div>
    </div>

    <!-- Tik Tok -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[tiktok]" placeholder="Tik Tok" value="<?php echo $ponente->instagram ?? ''; ?>">
        </div>
    </div>

    <!-- Git Hub -->
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input type="text" class="formulario__input--sociales" name="redes[github]" placeholder="Git Hub" value="<?php echo $ponente->github ?? ''; ?>">
        </div>
    </div>
</fieldset>