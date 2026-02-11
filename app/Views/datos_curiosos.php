<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos curiosos</title>
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
            <section class="datos-curiosos">
                <h2>Datos Curiosos</h2>
                <p class="introduccion">
                    Descubrí datos fascinantes sobre distintos destinos del mundo antes de elegir tu próximo paquete con <strong>Atlas Destinos</strong>. Cada país esconde historias, costumbres y maravillas que te van a sorprender.
                </p>

                <div class="contenedor-datos">

                    <div class="bloque-dato">
                        <h3>Japón: el país de los trenes puntuales</h3>
                        <p>En Japón, los trenes bala (Shinkansen) tienen un promedio de retraso anual de menos de un minuto. 
                            Su sistema ferroviario es tan eficiente que si un tren se retrasa más de 5 minutos, el personal entrega certificados a los pasajeros para justificar la demora en el trabajo.</p>
                    </div>

                    <div class="bloque-dato">
                        <h3>Italia: más de 50 sitios Patrimonio de la Humanidad</h3>
                        <p>Italia alberga la mayor cantidad de lugares declarados Patrimonio Mundial por la UNESCO, 
                            con más de 50 sitios que incluyen ruinas romanas, catedrales y paisajes únicos. Desde Roma hasta la Toscana, cada rincón es una muestra viva de historia y arte.</p>
                    </div>

                    <div class="bloque-dato">
                        <h3>Brasil: el carnaval más grande del planeta</h3>
                        <p>El Carnaval de Río de Janeiro reúne a más de dos millones de personas en las calles cada año. 
                            Durante una semana, la ciudad se llena de música, color y samba, convirtiéndose en una de las celebraciones más alegres del mundo.</p>
                    </div>

                    <div class="bloque-dato">
                        <h3>Argentina: la ruta del vino más extensa</h3>
                        <p>Mendoza, al pie de la Cordillera de los Andes, concentra el 70% de la producción vitivinícola del país. 
                            Además de sus paisajes de montaña, ofrece experiencias turísticas únicas como catas, recorridos en bicicleta y alojamiento en bodegas.</p>
                    </div>

                    <div class="bloque-dato">
                        <h3>Egipto: el único país con una de las Siete Maravillas Antiguas</h3>
                        <p>Las Pirámides de Guiza siguen siendo un misterio para los arqueólogos. 
                            A pesar de tener más de 4.500 años, sus estructuras mantienen una precisión milimétrica y se orientan casi perfectamente con el norte magnético de la Tierra.</p>
                    </div>

                    <div class="bloque-dato">
                        <h3>Islandia: tierra de fuego y hielo</h3>
                        <p>En Islandia podés observar glaciares, géiseres y volcanes activos en un mismo día. 
                            Su capital, Reikiavik, utiliza energía geotérmica para calefaccionar casas y piscinas, siendo uno de los países más ecológicos del planeta.</p>
                    </div>

                    <div class="bloque-dato">
                        <h3>México: cuna del chocolate</h3>
                        <p>Los antiguos mayas y aztecas fueron los primeros en cultivar el cacao y preparar bebidas ceremoniales con él. 
                            Hoy, el chocolate mexicano artesanal conserva esa tradición ancestral y forma parte esencial de su gastronomía.</p>
                    </div>

                    <div class="bloque-dato">
                        <h3>Francia: el destino más visitado del mundo</h3>
                        <p>Con más de 80 millones de visitantes al año, Francia lidera el turismo global. 
                            París, conocida como “la ciudad de la luz”, es famosa por su arte, su cocina y su arquitectura, pero también por sus pequeños pueblos llenos de encanto.</p>
                    </div>

                </div>

                <p class="mensaje-final">
                    ¿Querés conocer más curiosidades? <strong>Explorá nuestros paquetes</strong> y descubrí todo lo que el mundo tiene para sorprenderte.
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