<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
    <link rel="stylesheet" href="<?= base_url('estilo_compra.css') ?>">

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
        <?php $p = $paquete; ?>
        <main>
            <section class="seccion-compra">
                <h2>Confirmar compra</h2>

                <div class="tarjeta-paquete">
                    <img src="<?= base_url('img/' . $p['imagen']) ?>">

                    <div class="info-paquete">

                        <h3><?= $p['destino'] ?></h3>
                        <p>Hotel: <?= $p['hotel'] ?></p>
                        <p>Días: <?= $p['dias'] ?></p>

                        <?php $precioFinal = $p['precio'];
                        if ($p['descuento'] > 0) {
                            $precioFinal = $p['precio'] - ($p['precio'] * $p['descuento'] / 100);
                        }
                        ?>
                        <p>Precio: $<?= $precioFinal ?></p>
                        <p>Stock disponible: <?= $p['stock'] ?></p>

                    </div>
                </div>

                <form method="post" action="<?= base_url('guardar_venta') ?>" class="form-compra" 
                 onsubmit="return confirm('¿Confirmar la compra por un total de $' + (this.cantidad.value * <?= $p['precio'] - ($p['precio'] * $p['descuento'] / 100) ?>) + '?');">

                    <input type="hidden" name="id_paquete" value="<?= $p['id'] ?>">
                    <label for="cantidad">Cantidad:</label>

                    <input type="number" name="cantidad" min="1" max="<?= $p['stock'] ?>" required>
                    <button type="submit" class="btn-comprar">Confirmar compra</button>
                </form>

                <a href="<?= base_url('paquetes_view') ?>" class="btn-volver">Cancelar</a>
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