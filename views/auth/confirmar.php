<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Inicio sesión en DebWevCamp</p>
    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <!-- En caso de que la confirmación de la cuenta sea exitosa -->
    <?php if (isset($alertas['exito'])) { ?>
        
        <!-- Acciones extras -->
        <div class="acciones--centrar">
            <a href="/login" class="acciones__enlace">Iniciar sesión</a> <!-- Iniciar sesión -->
        </div>
    <?php } ?>
</main>