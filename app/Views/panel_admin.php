<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administrador</title>
    <link rel="stylesheet" href="<?= base_url('estilo_admin_panel.css') ?>">

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
            <section class="panel-admin">
                <div class="panel-titulo">
                    <h2>Panel del Administrador</h2>
                    <p>Gestioná toda la información del sistema desde las siguientes secciones.</p>
                </div>

                <div class="panel-opciones">
                    <div class="opcion">
                        <div class="contenido">
                            <h3>Paquetes</h3>
                            <p>Accedé al listado completo de paquetes.</p>
                        </div>
                        <a href="<?= base_url('lista_paquetes') ?>" class="btn-opcion">Ver paquetes</a>
                    </div>

                    <div class="opcion">
                        <div class="contenido">
                            <h3>Ventas</h3>
                            <p>Consultá todas las ventas realizadas.</p>
                        </div>
                        <a href="<?= base_url('lista_ventas') ?>" class="btn-opcion">Ver ventas</a>
                    </div>

                    <div class="opcion">
                        <div class="contenido">
                            <h3>Usuarios</h3>
                            <p>Visualizá los usuarios registrados y sus roles.</p>
                        </div>
                        <a href="<?= base_url('lista_usuarios') ?>" class="btn-opcion">Ver usuarios</a>
                    </div>

                    <div class="opcion">
                        <div class="contenido">
                            <h3>Paquetes por Categoría</h3>
                            <p>Consultá cuántos paquetes hay en cada categoría.</p>
                        </div>
                        <a href="<?= base_url('lista_categorias_paquetes') ?>" class="btn-opcion">Ver listado</a>
                    </div>

                    <div class="opcion">
                        <div class="contenido">
                            <h3>Resumen de Ventas</h3>
                            <p>Visualizá el total vendido agrupado por mes y año.</p>
                        </div>
                        <a href="<?= base_url('lista_resumen_ventas') ?>" class="btn-opcion">Ver resumen</a>
                    </div>
                </div>
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