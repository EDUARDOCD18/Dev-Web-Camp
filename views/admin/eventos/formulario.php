<!-- INFORMACIÓN DEL EVENTO -->
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

    <!-- Selección de categoría -->
    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoría o tipo de evento</label>

        <select name="categoria__id" class="formulario__select" id="categoria">
            <option value="">-- SELECCIONAR -- </option>
            <?php foreach ($categorias as $categoria) { ?>
                <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php } ?>
        </select>
    </div>

    <!-- Día del evento -->
    <div class="formulario__campo">
        <label class="formulario__label">Selecciona el día:</label>

        <div class="formulario__radio">
            <?php foreach ($dias as $dia) { ?>
                <div>
                    <label for="<?php strtolower($dia->nomnbre); ?>"><?php echo $dia->nombre; ?></label>

                    <input type="radio" id="<?php strtolower($dia->nombre); ?>" name="dia" value="<?php echo $dia->id; ?>">

                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Horas del evento -->
    <div id="horas" class="formulario__campo">
        <div class="formulario__label">Seleccionar Hora</div>

        <ul class="horas">
            <?php foreach ($horas as $hora) {  ?>
                <li class="horas__hora"><?php echo $hora->hora; ?></li>
            <?php  } ?>
        </ul>
    </div>


</fieldset>

<!-- INFORMACIÓN DEL PONENTE -->
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información extra</legend>

    <!-- Ponente -->
    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente:</label>
        <input type="text" class="formulario__input" id="ponentes" placeholder="Buscar ponente">
    </div>

    <!-- Lugares disponibles -->
    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Ponente:</label>
        <input type="number" min="1" class="formulario__input" id="disponibles" placeholder="Ejemplo: 20">
    </div>
</fieldset>