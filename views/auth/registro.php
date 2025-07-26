<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>

    <p class="auth__texto">Crea tu cuenta en Dev Web Camp</p>

    <!-- Formulario para la creación del usuario -->
    <form action="" class="formulario">

        <!-- Ingreso de nombre -->
        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input type="text" class="formulario__input" placeholder="Ingresa tu nombre" id="nombre" name="nombre">
        </div>

        <!-- Ingreso de apellido -->
        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellido</label>
            <input type="text" class="formulario__input" placeholder="Ingresa tu apellido" id="apellido" name="apellido">
        </div>

        <!-- Ingreso de correo -->
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Correo</label>
            <input type="email" class="formulario__input" placeholder="Ingresa tu corro electrónico" id="email" name="email">
        </div>

        <!-- Ingreso de contraseña -->
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Contraseña</label>
            <input type="password" class="formulario__input" placeholder="Ingresa tu contraseña" id="password" name="password">
        </div>

        <!-- Repetir la contraseña -->
        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Repite la contraseña</label>
            <input type="password" class="formulario__input" placeholder="Ingresa nuevamente tu contraseña" id="password2" name="password2">
        </div>

        <!-- Enviar los datos -->
        <input type="submit" class="formulario__submit" value="Crear Cuenta">
    </form>

    <!-- Acciones extras -->
    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? ¡Inicia sesión!</a> <!-- Iniciar sesión -->
        <a href="/olvide" class="acciones__enlace">¿Olvidaste la clave? ¡Recupérala!</a> <!-- Contraseña olvidada -->
    </div>
</main>