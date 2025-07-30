<?php

foreach ($alertas as $key => $alerta) {
    foreach ($alerta as $mensaje) {
?>
        <div class="alerta alerta__<?php echo $key; ?> alerta__animar alerta__ocultar"><?php echo $mensaje ?></div>
<?php
    }
}
?>