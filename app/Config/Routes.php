<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->get('/paquetes_view', 'PaqueteController::indexPaquete');

$routes->get('/crear_paquete', 'PaqueteController::crearPaquete');

$routes->post('/guardar_paquete', 'PaqueteController::guardarPaquete');

$routes->get('/categoria_paquete/(:segment)', 'PaqueteController::categoria/$1');

$routes->get('/detalle_paquete/(:num)', 'PaqueteController::detallePaquete/$1');

$routes->get('/modificar_paquete/(:num)', 'PaqueteController::modificarPaquete/$1');

$routes->post('/actualizar_paquete/(:num)', 'PaqueteController::actualizarPaquete/$1');

$routes->post('/eliminar_paquete/(:num)', 'PaqueteController::eliminarPaquete/$1');

$routes->get('/registro_view', 'UsuarioController::registro');

$routes->get('/login_view', 'UsuarioController::login');

$routes->post('/guardar_registro', 'UsuarioController::guardarRegistro');

$routes->post('/validar_login', 'UsuarioController::validarLogin');

$routes->get('/cerrar_sesion', 'UsuarioController::cerrarSesion');

$routes->get('/compra_view/(:num)', 'VentaController::comprar/$1');

$routes->post('/guardar_venta', 'VentaController::guardarVenta');

$routes->get('/panel_admin', 'AdminController::panel');

$routes->get('/lista_paquetes', 'AdminController::verPaquetes');

$routes->get('/lista_ventas', 'AdminController::verVentas');

$routes->get('/lista_usuarios', 'AdminController::verUsuarios');

$routes->get('/lista_categorias_paquetes', 'AdminController::verCategoriasPaquetes');

$routes->get('/lista_resumen_ventas', 'AdminController::verResumenVentas');

$routes->get('/consejos', 'HomeController::consejos');

$routes->get('/preguntas', 'HomeController::preguntas');

$routes->get('/curiosidades', 'HomeController::datosCuriosos');










