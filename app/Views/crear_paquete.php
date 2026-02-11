<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear paquete</title>
    <link rel="stylesheet" href="<?= base_url('estilo_formulario.css') ?>">
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
            <section class="formulario-paquete">
                <h2>Crear Nuevo Paquete</h2>
                <form action="<?= base_url('guardar_paquete') ?>" method="post" enctype="multipart/form-data">

                    <div class="form-contenedor">
                        <div>
                            <label for="destino">Destino:</label>
                            <input type="text" id="destino" name="destino" required>

                            <label for="hotel">Hotel:</label>
                            <input type="text" id="hotel" name="hotel" required>

                            <label for="dias">Días:</label>
                            <input type="number" id="dias" name="dias" min="1" required>

                            <label for="stock">Stock:</label>
                            <input type="number" id="stock" name="stock" min="0" required>
                        </div>

                        <div>
                            <label for="precio">Precio:</label>
                            <input type="number" step="0.01" id="precio" name="precio" min="0" required>

                            <label for="categoria">Categoría:</label>
                            <select id="categoria" name="categoria" required>
                                <option value="">-- Seleccioná una categoría --</option>
                                <option value="Turismo">Turismo</option>
                                <option value="Playas">Playas</option>
                                <option value="Aventura">Aventura</option>
                            </select>

                            <label for="imagen">Imagen:</label>
                            <input type="file" id="imagen" name="imagen" accept="image/*">

                            <label for="descuento">Descuento (%):</label>
                            <input type="number" id="descuento" name="descuento" min="0" max="100" step="0.01">
                        </div>
                    </div>

                    <!-- DESCRIPCIONES Y CHECKBOXES (UNA COLUMNA NORMAL) -->
                    <label for="descripcion_hotel">Descripción del Hotel:</label>
                    <textarea id="descripcion_hotel" name="descripcion_hotel"></textarea>

                    <label for="descripcion_paquete">Descripción del Paquete:</label>
                    <textarea id="descripcion_paquete" name="descripcion_paquete"></textarea>

                    <fieldset>
                        <legend>Incluye:</legend>
                        <input type="checkbox" id="incluye_vuelo" name="incluye_vuelo" value="1">
                        <label for="incluye_vuelo">Vuelo</label><br>

                        <input type="checkbox" id="incluye_traslado" name="incluye_traslado" value="1">
                        <label for="incluye_traslado">Traslado</label><br>

                        <input type="checkbox" id="incluye_hotel" name="incluye_hotel" value="1">
                        <label for="incluye_hotel">Hotel</label><br>

                        <input type="checkbox" id="incluye_excursion" name="incluye_excursion" value="1">
                        <label for="incluye_excursion">Excursión</label><br>
                    </fieldset>

                    <!-- BOTÓN DE GUARDAR -->
                    <button type="submit">Guardar Paquete</button>
                </form>
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