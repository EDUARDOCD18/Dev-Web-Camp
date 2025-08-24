<fieldset class="formulario_fieldset">
    <legend class="formulario__legend">Información Evento</legend>

    <!-- Nombre del evento -->
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre del evento:</label>
        <input type="text" class="formulario__input" id="nombre" placeholder="Nombre evento" name="nombre" value="<?php echo $evento->nombre ?? ''; ?>">
    </div>

    <!-- Descripción del evento -->
     <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>

        <textarea class="formulario__input" id="descripcion" name="descripcion" placeholder="Descripción del evento" rows="8"></textarea>
     </div>
</fieldset>