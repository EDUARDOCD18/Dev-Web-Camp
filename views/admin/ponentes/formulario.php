<fieldset>
    <legend>Información Personal</legend>

    <!-- Nombre del ponente -->
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre:</label>
        <input type="text" class="formulario__input" id="nombre" placeholder="Nombre del ponente" name="nombre" value="<?php echo $ponente->nombre ?? ''; ?>" 
    </div>

    <!-- Apellido del ponente -->
    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido:</label>
        <input type="text" class="formulario__input" id="apellido" placeholder="Apellido del ponente" name="apellido" value="<?php echo $ponente->apellido ?? ''; ?>" 
    </div>
</fieldset>