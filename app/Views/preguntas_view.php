<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas frecuentes</title>
    <link rel="stylesheet" href="<?= base_url('estilo_extras.css') ?>">

</head>

<body>
    <?php $usuario = session()->get('usuario'); ?>

    <!-- CONTENEDOR PRINCIPAL -->
    <div class="contenedor">

        <!-- ENCABEZADO -->
        <header>
            <div class="encabezado">

                <!-- IZQUIERDA -->
                <div class="izquierda">
                    <h1>Atlas Destinos</h1>
                    <ul class="menu-principal">
                        <li><a href="<?= base_url('/') ?>">Inicio</a></li>
                        <li><a href="<?= base_url('paquetes_view') ?>">Paquetes</a></li>
                        <li><a href="<?= base_url('consejos') ?>">Consejos de Viaje</a></li>
                        <li><a href="<?= base_url('preguntas') ?>">Preguntas Frecuentes</a></li>
                        <li><a href="<?= base_url('curiosidades') ?>">Curiosidades</a></li>

                        <?php if ($usuario && ($usuario['rol'] == 'administrador')): ?>
                            <li><a href="<?= base_url('crear_paquete') ?>">Crear paquete</a></li>
                            <li><a href="<?= base_url('panel_admin') ?>">Panel Administrador</a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- DERECHA -->
                <div class="derecha">
                    <?php if ($usuario): ?>
                        <a href="<?= base_url('cerrar_sesion') ?>" class="cerrar-sesion">Cerrar sesión</a>
                    <?php else: ?>
                        <a href="<?= base_url('login_view') ?>">Iniciar sesión</a>
                        <a href="<?= base_url('registro_view') ?>">Registrarse</a>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <!-- CONTENIDO PRINCIPAL -->
        <main>
            <section class="preguntas-frecuentes">
                <h2>Preguntas Frecuentes</h2>
                <p class="introduccion">
                    Encontrá respuestas a las dudas más comunes antes de planificar tu viaje con <strong>Atlas Destinos</strong>.
                </p>

                <div class="contenedor-preguntas">

                    <div class="bloque-pregunta">
                        <h3>¿Cómo puedo reservar un paquete?</h3>
                        <p>Podés realizar tu reserva directamente desde nuestro sitio seleccionando el paquete que te interese y siguiendo los pasos indicados. También podés comunicarte con un asesor para recibir asistencia personalizada.</p>
                    </div>

                    <div class="bloque-pregunta">
                        <h3>¿Qué métodos de pago aceptan?</h3>
                        <p>Aceptamos tarjetas de crédito, débito, transferencias bancarias y pagos digitales. También ofrecemos la posibilidad de abonar en cuotas según la promoción vigente.</p>
                    </div>

                    <div class="bloque-pregunta">
                        <h3>¿Puedo cancelar una reserva?</h3>
                        <p>Sí, las reservas pueden cancelarse hasta 48 horas antes de la fecha de salida sin costo adicional. Luego de ese plazo, se aplican cargos según las políticas del paquete contratado.</p>
                    </div>

                    <div class="bloque-pregunta">
                        <h3>¿Qué documentación necesito para viajar al exterior?</h3>
                        <p>Dependerá del destino. En general se requiere pasaporte vigente y, en algunos casos, visa o certificado de vacunación. Nuestro equipo puede asesorarte según el país al que viajes.</p>
                    </div>

                    <div class="bloque-pregunta">
                        <h3>¿Los paquetes incluyen excursiones o traslados?</h3>
                        <p>Sí, la mayoría de nuestros paquetes incluyen traslados desde y hacia el aeropuerto, además de excursiones guiadas. En la descripción de cada paquete encontrarás los detalles específicos.</p>
                    </div>

                    <div class="bloque-pregunta">
                        <h3>¿Puedo modificar las fechas de mi viaje?</h3>
                        <p>Podés solicitar un cambio de fecha con al menos 5 días de anticipación, sujeto a disponibilidad. Te recomendamos contactarte con nosotros lo antes posible para reprogramar tu viaje.</p>
                    </div>

                    <div class="bloque-pregunta">
                        <h3>¿Dónde puedo comunicarme en caso de emergencia?</h3>
                        <p>Contamos con un servicio de atención al cliente las 24 horas. Podés comunicarte a nuestro número de asistencia o escribirnos por WhatsApp +54 9 11 4567-8923 para recibir ayuda inmediata.</p>
                    </div>

                </div>

                <p class="mensaje-final">
                    ¿Tenés otra duda? <strong>Contactanos</strong> y nuestro equipo te ayudará a planificar tu próxima aventura +54 9 11 4567-8923.
                </p>
            </section>
        </main>


        <!-- PIE DE PÁGINA -->
        <footer class="footer">
            <div class="footer-contenido">
                <div class="footer-seccion">
                    <h3>Agencia de Viajes Atlas</h3>
                    <p>Tu puerta al mundo. Creamos experiencias únicas para cada destino.</p>
                    <p>Tu próximo viaje comienza aquí.</p>
                </div>

                <div class="footer-seccion">
                    <h4>Redes sociales</h4>
                    <ul class="footer-redes">
                        <li><a href="https://www.facebook.com/?locale=es_LA"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i> YouTube</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-copy">
                <p>&copy; 2025 Agencia de Viajes Atlas — Todos los derechos reservados a — AGUSTIN NICOLAS STELE —</p>
            </div>
        </footer>

    </div><!-- CONTENEDOR -->

</body>

</html>