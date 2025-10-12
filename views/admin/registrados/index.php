<h2 class="dashboard__heading"><?php echo $titulo; ?>
</h2>

<!-- TABLA PARA MOSTRAR A LOS PONENTES -->
<div class="dashboard__contenedor">
    <?php if (!empty($registros)) { ?>

        <!-- Tabla para mostrar los ponenetes -->
        <table class="table">
            <!-- Cabecera de la tabla -->
            <thead class="table__thead">
                <tr>
                    <th class="table__th" scope="col">Nombre</th>
                    <th class="table__th" scope="col">Correo</th>
                    <th class="table__th" scope="col">Plan</th>
                </tr>
            </thead>

            <!-- Cuerpo de la table -->
            <tbody class="table__tbody">
                <?php foreach ($registros as $registro) { ?>
                    <tr class="table__tr">

                        <!-- Nombre y apellido del usuario -->
                        <td class="table__td">
                            <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?>
                        </td>

                        <!-- Correo del usuario -->
                        <td class="table__td">
                            <?php echo $registro->usuario->email; ?>
                        </td>

                        <!-- Plan del usuario -->
                        <td class="table__td">
                            <?php echo $registro->paquete->nombre; ?>
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