<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consejos</title>
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
            <section class="consejos">
                <h2>Consejos para Viajeros</h2>
                <p class="introduccion">
                    Te compartimos algunos consejos prácticos para que tu experiencia de viaje sea inolvidable.
                    Prepará tus valijas, revisá estos tips y disfrutá de cada destino sin preocupaciones. <strong>Atlas Destinos</strong>.
                </p>

                <div class="contenedor-consejos">

                    <div class="bloque-consejo">
                        <h3>1. Documentación al día:</h3>
                        <p>asegurate de llevar tu DNI o pasaporte vigente y, si viajás al exterior, los permisos necesarios.
                            Verificá con anticipación la fecha de vencimiento de los documentos y las políticas del país que visitás.
                            Llevá siempre copias digitales o impresas por si se pierden y guardá los originales en un lugar seguro.</p>
                    </div>

                    <div class="bloque-consejo">
                        <h3>2. Seguro de viaje:</h3>
                        <p>contratá un seguro médico o de asistencia. Es una pequeña inversión que puede salvarte de grandes imprevistos.
                            Muchos destinos lo exigen como requisito obligatorio, y además te brinda tranquilidad ante demoras, cancelaciones o pérdida de equipaje.
                            Elegí una cobertura que se adapte al tipo de viaje que vas a realizar.</p>
                    </div>

                    <div class="bloque-consejo">
                        <h3>3. Equipaje inteligente:</h3>
                        <p>revisá el clima del destino y llevá solo lo necesario, priorizando ropa cómoda y liviana.
                            Usá organizadores o bolsas para separar prendas y accesorios, y no olvides dejar espacio libre por si querés traer recuerdos.
                            Evitá excederte con el peso, ya que podría generarte costos adicionales o incomodidades al desplazarte.</p>
                    </div>

                    <div class="bloque-consejo">
                        <h3>4. Cuidados personales:</h3>
                        <p>hidratate, descansá bien antes del viaje y evitá comidas pesadas antes de vuelos largos.
                            Llevá siempre un pequeño botiquín con lo básico: analgésicos, protector solar y artículos de higiene.
                            Recordá que un buen descanso y una alimentación liviana ayudan a disfrutar mejor de cada experiencia.</p>
                    </div>

                    <div class="bloque-consejo">
                        <h3>5. Disfrutá el camino:</h3>
                        <p>Cada destino tiene su ritmo. Relajate, probá comidas nuevas y viví la experiencia con mente abierta.
                            No intentes verlo todo en un solo día; permitite disfrutar de los pequeños detalles y conectar con la gente local.
                            A veces, los mejores recuerdos surgen de los momentos espontáneos que no estaban en el itinerario.</p>
                    </div>

                    <div class="bloque-consejo">
                        <h3>6. Cuida tu presupuesto:</h3>
                        <p>llevá algo de efectivo local, pero priorizá medios de pago digitales seguros.
                            Evitá cambiar dinero en lugares no autorizados y verificá las comisiones de tu tarjeta en el exterior.
                            Hacé un control de gastos diario y reservá un fondo de emergencia para imprevistos.</p>
                    </div>

                    <div class="bloque-consejo">
                        <h3>7. Adaptate al idioma y costumbres:</h3>
                        <p>aprendé frases básicas del idioma local y respetá las tradiciones del destino.
                            Una sonrisa y la cortesía abren muchas puertas, especialmente en culturas distintas a la tuya.
                            Informate sobre las normas sociales, horarios y modales para integrarte mejor y evitar malentendidos.</p>
                    </div>

                    <div class="bloque-consejo">
                        <h3>8. Sé responsable con el medio ambiente:</h3>
                        <p>usá botellas reutilizables, evitá el plástico descartable y respetá los espacios naturales.
                            Cuidá los entornos que visitás dejando todo como lo encontraste, y elegí excursiones sostenibles que valoren la fauna y la flora local.
                            Cada pequeño gesto contribuye a un turismo más consciente y respetuoso con el planeta.</p>
                    </div>

                    <div class="bloque-consejo">
                        <h3>9. Seguridad digital:</h3>
                        <p>evitá conectarte a redes Wi-Fi públicas sin protección.
                            Usá contraseñas seguras y revisá que los sitios de reserva sean confiables antes de ingresar tus datos personales.
                            Guardá copias de tus documentos en la nube y activá la verificación en dos pasos en tus cuentas importantes.</p>
                    </div>

                    <div class="bloque-consejo">
                        <h3>10. Explorá la gastronomía local:</h3>
                        <p>cada destino tiene sabores únicos que forman parte de su cultura e identidad.
                            Animate a probar platos típicos, visitar mercados o ferias locales y descubrir ingredientes nuevos.
                            No te limites solo a los restaurantes turísticos: muchas veces los mejores sabores están en los lugares más simples y auténticos.
                            Probar la comida local es una forma deliciosa de conectar con la historia y las tradiciones de cada lugar que visites.</p>
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