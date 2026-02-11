<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle paquete</title>
    <link rel="stylesheet" href="<?= base_url('estilo_detalle.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

            <section class="detalle">
                <div class="ancho">

                    <!-- BLOQUE PRINCIPAL -->
                    <div class="bloque-principal">

                        <div class="fila-superior">
                            <h2><?= esc($p['destino']) ?></h2>

                            <?php if ($usuario && ($usuario['rol'] === 'administrador')): ?>

                                <div class="acciones">
                                    <a href="<?= base_url('lista_paquetes') ?>" class="listado">Ir al listado</a>

                                    <a href="<?= base_url('modificar_paquete/' . $p['id']) ?>" class="modificar">Modificar</a>

                                    <form action="<?= base_url('eliminar_paquete/' . $p['id']) ?>" method="post" class="form-eliminar"
                                        onsubmit="return confirm('¿Eliminar este paquete?');">
                                        <button type="submit">Eliminar</button>
                                    </form>
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="contenido-principal">
                            <!-- INFORMACIÓN DEL PAQUETE -->
                            <div class="columna">
                                <p class="subtitulo">
                                    <?= $p['hotel'] ?> - <?= $p['dias'] ?> días /
                                    <?= max(0, $p['dias'] - 1) ?> noches
                                </p>

                                <div class="fila-etiquetas">
                                    <span class="etiqueta">Categoría: <strong><?= $p['categoria'] ?></strong></span>
                                    <span class="etiqueta azul">Quedan <?= $p['stock'] ?> plazas</span>
                                </div>

                                <div class="precio">
                                    <?php if ($p['descuento'] > 0): ?>
                                        <span class="tachado">USD <?= number_format($p['precio'], 2) ?></span>
                                        <span class="valor">
                                            USD <?= number_format($p['precio'] - ($p['precio'] * $p['descuento'] / 100), 2) ?>
                                        </span>

                                    <?php else: ?>
                                        <span class="valor">USD <?= number_format($p['precio'], 2) ?></span>
                                    <?php endif; ?>
                                    <small>/ por persona</small>
                                </div>
                            </div>

                            <!-- INCLUYE -->
                            <div class="columna incluye-bloque">
                                <h3 class="titulo">Incluye</h3>
                                <ul class="incluye">
                                    <?php if ($p['incluye_vuelo']): ?>
                                        <li><i class="fa-solid fa-plane fa-lg"></i> Vuelo</li>
                                    <?php endif; ?>

                                    <?php if ($p['incluye_traslado']): ?>
                                        <li><i class="fa-solid fa-bus fa-lg"></i> Traslados</li>
                                    <?php endif; ?>

                                    <?php if ($p['incluye_hotel']): ?>
                                        <li><i class="fa-solid fa-hotel fa-lg"></i> Hotel</li>
                                    <?php endif; ?>

                                    <?php if ($p['incluye_excursion']): ?>
                                        <li><i class="fa-solid fa-ticket fa-lg"></i> Excursiones</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- BOTONES -->
                        <div class="botones">
                            <a href="<?= base_url('compra_view/' . $p['id']) ?>" class="comprar">Comprar</a>
                            <a href="<?= base_url('paquetes_view') ?>" class="volver">Volver</a>
                        </div>
                    </div>

                    <!-- DESCRIPCIONES -->
                    <div class="cuerpo">
                        <div class="bloque">
                            <h3 class="titulo">Descripción del paquete</h3>
                            <p class="texto"><?= nl2br($p['descripcion_paquete']) ?></p>
                        </div>

                        <div class="bloque">
                            <h3 class="titulo">Descripción del hotel</h3>
                            <p class="texto"><?= nl2br($p['descripcion_hotel']) ?></p>
                        </div>
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