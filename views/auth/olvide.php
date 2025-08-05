<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>

    <p class="auth__texto">Recupera tu acceso a Dev Web Camp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <!-- Formulario para recuperar la cuenta -->
    <form action="/olvide" method="post" class="formulario">

        <!-- Ingreso de correo -->
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Correo</label>
            <input type="email" class="formulario__input" placeholder="Ingresa tu corro electrónico" id="email" name="email">
        </div>

        <!-- Enviar los datos -->
        <input type="submit" class="formulario__submit" value="Enviar instrucciones">
    </form>

    <!-- Acciones extras -->
    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? ¡Inicia sesión!</a> <!-- Iniciar sesión -->
        <a href="/registro" class="acciones__enlace">¿Aún sin cuenta? ¡Crea una!</a> <!-- Crear nueva cuenta -->
    </div>
</main>