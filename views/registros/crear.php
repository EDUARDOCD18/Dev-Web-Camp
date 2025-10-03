<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">
        Elige tu plan
    </p>

    <div class="paquetes__grid">
        <!-- PASE GRATIS -->
        <div <?php aos_animacion(); ?> class="paquete">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso virtual a DevWebCamp</li>
            </ul>
            <p class="paquete__precio">$0</p>

            <form action="/finalizar-registro/gratis" method="POST">
                <input type="submit" value="Inscripción Gratis" class="paquetes__submit">
            </form>
        </div>

        <!-- PASE PRESENCIAL -->
        <div <?php aos_animacion(); ?> class="paquete">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por dos días</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
                <li class="paquete__elemento">Camisa del evento</li>
                <li class="paquete__elemento">Comida y bebida</li>
            </ul>
            <p class="paquete__precio">$199</p>
            <div>
                <style>
                    .pp-8QU663FEZ28L4 {
                        margin-top: 3rem;
                        text-align: center;
                        border: none;
                        border-radius: 1.5rem;
                        min-width: 11.625rem;
                        padding: 0 2rem;
                        height: 2.625rem;
                        font-weight: bold;
                        background-color: #000000;
                        color: #ffffff;
                        font-family: "Helvetica Neue", Arial, sans-serif;
                        font-size: 1rem;
                        line-height: 1.25rem;
                        cursor: pointer;
                    }
                </style>
                <form action="https://www.sandbox.paypal.com/ncp/payment/8QU663FEZ28L4" method="post" target="_blank" style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                    <input class="pp-8QU663FEZ28L4" type="submit" value="Comprar ahora" />
                    <img src=https://www.paypalobjects.com/images/Debit_Credit.svg alt="cards" />
                    <section style="font-size: 0.75rem;"> Con la tecnología de <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height:0.875rem;vertical-align:middle;" /></section>
                </form>
            </div>
            <div id="paypal-container-8QU663FEZ28L4"></div>
        </div>

        <!-- PASE VIRTUAL -->
        <div <?php aos_animacion(); ?> class="paquete">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por dos días</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
            </ul>
            <p class="paquete__precio">$49</p>
        </div>
    </div>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=BAAp0whA53L6H7NQxUw67wjqoF_pab8AYzMsRhZbV6UTG6daseZTchmB69zaanH8fk_Z2udpRXbUokGoRo&components=hosted-buttons&disable-funding=venmo&currency=USD">
</script>