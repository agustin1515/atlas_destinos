<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista ventas</title>
    <link rel="stylesheet" href="<?= base_url('estilo_lista.css') ?>">

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
            <section class="tabla-admin">
                <h2>Listado de Ventas</h2>

                <!-- FILTRO POR MES Y AÑO -->
                <form action="<?= base_url('lista_ventas') ?>" method="get" class="filtro-ventas">
                    <label for="mes">Mes:</label>
                    <input type="number" id="mes" name="mes" min="1" max="12" value="<?= $mes ?>" required>

                    <label for="anio">Año:</label>
                    <input type="number" id="anio" name="anio" min="2000" max="2100" value="<?= $anio ?>" required>

                    <button type="submit">Filtrar</button>
                    <a href="<?= base_url('lista_ventas') ?>" class="btn-reset">Ver todas</a>
                </form>
                <!-- TABLA -->
                <?php if ($ventas): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID_Venta</th>
                                <th>ID_Cliente</th>
                                <th>ID_Paquete</th>
                                <th>Fecha</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventas as $v): ?>
                                <tr>
                                    <td><?= $v['id'] ?></td>
                                    <td><?= $v['id_usuario'] ?></td>
                                    <td><?= $v['id_paquete'] ?></td>
                                    <td><?= date('d/m/Y', strtotime($v['fecha'])) ?></td>
                                    <td><?= $v['cantidad'] ?></td>
                                    <td>$<?= number_format($v['total'], 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="mensaje-vacio">No hay ventas registradas para este mes.</p>
                <?php endif; ?>
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