<h2 class="dashboard__heading"><?php echo $titulo; ?>
</h2>

<!-- BOTÓN PARA AGREGAR A LOS PONENTES -->
<div class="dashboard__contenedor-boton">
    <a href="/admin/ponentes/crear" class="dashboard__boton">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir ponente
    </a>
</div>

<!-- TABLA PARA MOSTRAR A LOS PONENTES -->
<div class="dashboard__contenedor">
    <?php if (!empty($ponentes)) { ?>

        <!-- Tabla para mostrar los ponenetes -->
        <table class="table">
            <!-- Cabecera de la tabla -->
            <thead class="table__thead">
                <tr>
                    <th class="table_th" scope="col">Nombre</th>
                    <th class="table_th" scope="col">Ubicación</th>
                    <th class="table_th" scope="col"></th>
                </tr>
            </thead>

            <!-- Cuerpo de la table -->
            <tbody class="table__tbody">
                <?php foreach ($ponentes as $ponente) { ?>
                    <tr class="table__tr">

                        <!-- Nombre y apellido del ponente -->
                        <td class="table__td">
                            <?php echo $ponente->nombre . " " . $ponente->apellido; ?>
                        </td>

                        <!-- Ubicación -->
                        <td class="table__td">
                            <?php echo $ponente->ciudad . ", " . $ponente->pais; ?>
                        </td>

                        <form action="" class="table__formulario">
                            <!-- Editar al ponente -->
                            <td class="table__td--acciones">
                                <a class="table__accion table__accion--editar" href="/admin/ponentes/editar?id=<?php echo $ponente->id; ?>">
                                    <fa-user-pen class="fa-solid fa-user-pen">
                                        Editar
                                </a>

                                <!-- Eliminar al ponente -->

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