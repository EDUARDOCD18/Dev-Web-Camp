<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Inicio sesión en DebWevCamp</p>

    <!-- Formulario para inicio de sesión -->
    <form action="" class="formulario">

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

        <!-- Enviar los datos -->
        <input type="submit" class="formulario__submit" value="Iniciar Sesión">
    </form>

    
</main>