<h2 class="dashboard__heading"><?php echo $titulo; ?>
</h2>

<!-- BOTÓN PARA AGREGAR EVENTOS -->
<div class="dashboard__contenedor-boton">
    <a href="/admin/eventos/crear" class="dashboard__boton">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir evento
    </a>
</div>

<!-- TABLA PARA MOSTRAR A LOS EVENTOS -->
<div class="dashboard__contenedor">
    <?php if (!empty($eventos)) { ?>

        <!-- Tabla para mostrar los eventos -->
        <table class="table">
            <!-- Cabecera de la tabla -->
            <thead class="table__thead">
                <tr>
                    <th class="table_th" scope="col">Evento</th>
                    <th class="table_th" scope="col">Categoría</th>
                    <th class="table_th" scope="col">Día y hora</th>
                    <th class="table_th" scope="col">Ponente</th>
                    <th class="table_th" scope="col"></th>
                </tr>
            </thead>

            <!-- Cuerpo de la table -->
            <tbody class="table__tbody">
                <?php foreach ($eventos as $evento) { ?>
                    <tr class="table__tr">

                        <!-- ID del evento -->
                        <!--  <td class="table__td">
                             <?php echo $evento->id; ?>
                        </td> -->

                        <!-- Nombre del evento -->
                        <td class="table__td">
                            <?php echo $evento->nombre; ?>
                        </td>

                        <!-- Categoria del evento -->
                        <td class="table__td">
                            <?php echo $evento->categoria->nombre; ?>
                        </td>

                        <!-- Día y hora del evento -->
                        <td class="table__td">
                            <?php echo $evento->dia->nombre . ", " . $evento->hora->hora; ?>
                        </td>

                        <!-- Ponente del evento -->
                        <td class="table__td">
                            <?php echo $evento->ponente->nombre . " " . $evento->ponente->apellido; ?>
                        </td>

                        <!-- Editar un evento -->
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/eventos/editar?id=<?php echo $evento->id; ?>">
                                <fa-user-pen class="fa-solid fa-pencil">
                                    Editar
                            </a>

                            <!-- Eliminar un evento -->
                            <form action="/admin/eventos/eliminar" class="table__formulario" method="POST">
                                <input type="hidden" name="id" value="<?php echo $evento->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar</button>
                            </form>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>

        </table>
    <?php } else { ?>
        <p class="text-center">Sin registros</p>
    <?php } ?>
</div>

<?php echo $paginacion; ?>