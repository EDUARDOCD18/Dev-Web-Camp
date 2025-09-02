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

        <textarea class="formulario__input" id="descripcion" name="descripcion" placeholder="Descripción del evento" rows="8"><?php echo $evento->descripcion; ?></textarea>
    </div>

    <!-- Selección de categoría -->
    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoría o tipo de evento</label>

        <select name="categoria_id" id="categoria" class="formulario__select">
            <option value="" selected disabled class="formulario__option">&mdash;&ThickSpace;Seleccionar&ThickSpace;&mdash;</option>
            <?php foreach ($categorias as $categoria) : ?>
                <?php if ($evento->categoria_id === $categoria->id) : ?>
                    <option value="<?php echo $categoria->id; ?>" class="formulario__option" selected><?php echo $categoria->nombre; ?></option>
                <?php elseif ($evento->categoria_id !== $categoria->id) : ?>
                    <option value="<?php echo $categoria->id; ?>" class="formulario__option"><?php echo $categoria->nombre; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
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

        <input type="hidden" name="dia_id" value="<?php echo $evento->dia_id; ?>">
    </div>

    <!-- Horas del evento -->
    <div id="horas" class="formulario__campo">
        <div class="formulario__label">Seleccionar Hora</div>

        <ul class="horas">
            <?php foreach ($horas as $hora) {  ?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas__hora horas__hora--deshabilitada"><?php echo $hora->hora; ?></li>
            <?php  } ?>
        </ul>
        <input type="hidden" name="hora_id">
    </div>


</fieldset>

<!-- INFORMACIÓN DEL PONENTE -->
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información extra</legend>

    <!-- Ponente -->
    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente:</label>
        <input type="text" class="formulario__input" id="ponentes" placeholder="Buscar ponente">

        <ul id="listado-ponentes" class="listado-ponentes"></ul>
        <input type="hidden" name="ponente_id" value="">
    </div>

    <!-- Lugares disponibles -->
    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input type="number" min="1" class="formulario__input" id="disponibles" name="disponibles" placeholder="Ej. 20" value="<?php echo $evento->disponibles; ?>">
    </div>
</fieldset>