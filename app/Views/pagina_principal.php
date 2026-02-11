<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link rel="stylesheet" href="<?= base_url('estilo_principal.css') ?>">
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
                    <h1>Atlas Destinos - Viajes</h1>
                    <ul class="menu-principal">
                        <li><a href="#">Inicio</a></li>
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
            <section class="bienvenida">
                <h2>Bienvenido a Atlas Destinos</h2>
                <p>Explora nuestras propuestas y encontrá el viaje ideal para vos.</p>
                <p class="frase"> Tu próxima aventura comienza aquí.</p>
            </section>

            <!-- PAQUETES DESTACADOS -->
            <section class="paquetes">
                <div class="ancho">
                    <h2 class="titulo-seccion">Promociones Destacadas</h2>

                    <div class="lista-de-paquetes">

                        <?php if ($paquetes): ?>
                            <?php foreach ($paquetes as $p): ?>
                                <div class="tarjeta-paquete">
                                    <!-- IMAGEN -->
                                    <div class="imagen-del-paquete">
                                        <img src="<?= base_url('img/' . $p['imagen']) ?>">
                                        <span class="etiqueta-categoria"><?= $p['categoria'] ?></span>

                                        <?php if ($p['descuento'] > 0): ?>
                                            <span class="etiqueta-descuento">-<?= $p['descuento'] ?>%</span>
                                        <?php endif; ?>

                                        <div class="iconos-incluye">
                                            <?php if ($p['incluye_vuelo']): ?>
                                                <i class="fa-solid fa-plane" title="Vuelo"></i>
                                            <?php endif; ?>
                                            <?php if ($p['incluye_traslado']): ?>
                                                <i class="fa-solid fa-bus" title="Traslados"></i>
                                            <?php endif; ?>
                                            <?php if ($p['incluye_hotel']): ?>
                                                <i class="fa-solid fa-hotel" title="Hotel"></i>
                                            <?php endif; ?>
                                            <?php if ($p['incluye_excursion']): ?>
                                                <i class="fa-solid fa-ticket" title="Excursiones"></i>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <!-- CONTENIDO -->
                                    <div class="contenido-del-paquete">
                                        <h3 class="destino"><?= $p['destino'] ?></h3>

                                        <p class="detalle">
                                            <?= $p['hotel'] ?> - <?= $p['dias'] ?> días /
                                            <?= max(0, $p['dias'] - 1) ?> noches
                                        </p>

                                        <p class="plazas">Quedan <?= $p['stock'] ?> plazas disponibles</p>

                                        <!-- MENSAJES -->
                                        <div class="mensajes">
                                            <?php if ($p['stock'] == 0): ?>
                                                <p class="mensaje agotado">Agotado</p>

                                            <?php elseif ($p['stock'] < 50): ?>
                                                <p class="mensaje pocas">¡Pocas plazas!</p>
                                            <?php endif; ?>

                                            <?php if ($usuario): ?>
                                                <?php
                                                $totalUsuarioPaquete = 0;

                                                foreach ($ventas as $v) {
                                                    if ($v['id_paquete'] == $p['id']) {
                                                        $totalUsuarioPaquete = $v['total'];
                                                        break;
                                                    }
                                                }
                                                ?>

                                                <?php if ($totalUsuarioPaquete >= 3): ?>
                                                    <p class="mensaje frecuente">Cliente frecuente</p>
                                                <?php endif; ?>

                                            <?php endif; ?>

                                            <?php if ($p['id'] == $idPaqueteMasVendido): ?>
                                                <p class="mensaje preferido">Destino preferido</p>
                                            <?php endif; ?>

                                        </div>

                                        <!-- PRECIO -->
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

                                        <!-- BOTONES -->
                                        <div class="botones-paquete">

                                            <?php if (!$usuario): ?> <!-- USUARIO NO REGISTRADO -->
                                                <a class="boton-detalle" href="<?= base_url('login_view') ?>">Ver detalles</a>

                                                <?php if ($p['stock'] > 0): ?>
                                                    <a class="boton-comprar" href="<?= base_url('login_view') ?>">Comprar</a>
                                                <?php else: ?>
                                                    <span class="boton-comprar">Sin Stock</span>
                                                <?php endif; ?>

                                            <?php endif; ?>

                                            <?php if ($usuario && ($usuario['rol'] == 'cliente')): ?> <!-- USUARIO REGISTRADO -->
                                                <a class="boton-detalle" href="<?= base_url('detalle_paquete/' . $p['id']) ?>">Ver detalles</a>

                                                <?php if ($p['stock'] > 0): ?>
                                                    <a class="boton-comprar" href="<?= base_url('compra_view/' . $p['id']) ?>">Comprar</a>
                                                <?php else: ?>
                                                    <span class="boton-comprar">Sin Stock</span>
                                                <?php endif; ?>

                                            <?php endif; ?>

                                            <?php if ($usuario && ($usuario['rol'] == 'administrador')): ?> <!-- USUARIO ADMINISTRADOR -->
                                                <a class="boton-detalle" href="<?= base_url('detalle_paquete/' . $p['id']) ?>">Ver detalles</a>
                                                <span class="boton-comprar">Solo clientes</span>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="mensaje-if"> No hay paquetes disponibles por el momento.</p>
                        <?php endif; ?>
                    </div>

                </div>
            </section>

            <hr class="separador">
            <section class="porque-nosotros">
                <h3>¿Por qué elegir Atlas Destinos?</h3>
                <div class="razones">
                    <div class="razon">
                        <h4> Variedad de destinos</h4>
                        <p>Desde playas paradisíacas hasta montañas nevadas.</p>
                    </div>
                    <div class="razon">
                        <h4> Hoteles seleccionados</h4>
                        <p>Opciones cómodas y adaptadas a cada viaje.</p>
                    </div>
                    <div class="razon">
                        <h4> Paquetes para todos</h4>
                        <p>Familias, parejas o grupos de amigos.</p>
                    </div>
                    <div class="razon">
                        <h4> Experiencias únicas</h4>
                        <p>Actividades y excursiones para recordar siempre.</p>
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