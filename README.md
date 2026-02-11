# Atlas Destinos

Sistema web desarrollado en PHP utilizando el framework CodeIgniter 4.

Se trata de un proyecto académico que permite gestionar paquetes turísticos, usuarios y ventas dentro de una aplicación web con autenticación y panel administrativo.

---

## Descripción general

Atlas Destinos es una aplicación web que simula la administración de una agencia de viajes. Permite:

- Registro e inicio de sesión de usuarios.
- Diferenciación de roles (administrador / usuario).
- Gestión de paquetes turísticos.
- Gestión de usuarios.
- Registro y visualización de ventas.
- Persistencia de datos mediante MySQL.

La base de datos necesaria para el funcionamiento del sistema se encuentra incluida en el repositorio dentro de la carpeta `dataBase`.

---

## Tecnologías utilizadas

- PHP 8 o superior.
- CodeIgniter 4.
- MySQL.
- HTML.
- CSS.
- Servidor local (por ejemplo XAMPP, WAMP u otro equivalente).

---

## Requisitos previos

Antes de intentar levantar el proyecto es necesario contar con:

- PHP 8+ correctamente instalado.
- Un servidor web local (Apache recomendado).
- Un servidor MySQL en ejecución.
- Git (opcional, solo si se va a clonar el repositorio).

---

## Instalación paso a paso

### 1. Clonar el repositorio

Ejecutar en la terminal:

git clone https://github.com/agustin1515/atlas_destinos.git

Esto descargará el proyecto completo en una carpeta llamada `atlas_destinos`.

---

### 2. Ubicar el proyecto en el servidor local

Mover la carpeta del proyecto dentro del directorio del servidor web.

Si se utiliza XAMPP en Windows, la ruta habitual es:

C:\xampp\htdocs\

El proyecto debería quedar así:

C:\xampp\htdocs\atlas_destinos

---

### 3. Crear la base de datos

Acceder a MySQL (puede ser desde MySQL Workbench, consola o phpMyAdmin) y crear una nueva base de datos con el siguiente nombre:

atlas_destinos

Es importante que el nombre coincida con el que se configurará en el archivo `.env`.

---

### 4. Importar la base de datos

Importar el archivo:

dataBase/atlas_destinos.sql

Este archivo contiene:

- La creación de las tablas.
- Las relaciones.
- Datos de ejemplo.
- Usuario administrador inicial.

Una vez importado correctamente, la base quedará lista para ser utilizada por la aplicación.

---

### 5. Configurar el archivo `.env`

Dentro del proyecto se encuentra el archivo `.env`.

Es necesario configurar los datos de conexión a la base de datos modificando las siguientes líneas:

database.default.hostname = localhost  
database.default.database = atlas_destinos  
database.default.username = root  
database.default.password =  
database.default.DBDriver = MySQLi  

Si tu usuario o contraseña de MySQL son diferentes, deberás ajustarlos según tu configuración local.

Guardar los cambios una vez editado.

---

### 6. Iniciar los servicios necesarios

Asegurarse de que:

- El servidor Apache esté en ejecución.
- El servicio MySQL esté activo.

Esto puede hacerse desde XAMPP u otro entorno que utilices.

---

### 7. Acceder al sistema

Abrir el navegador e ingresar:

http://localhost/atlas_destinos/public

Es importante acceder a la carpeta `public`, ya que CodeIgniter 4 utiliza esta como punto de entrada del sistema.

---

## Usuario administrador de prueba

El sistema incluye un usuario administrador de ejemplo:

Email: admin@gmail.com  
Password: 12345  

Este usuario permite acceder al panel administrativo y gestionar el sistema.

---

## Consideración sobre seguridad

Las contraseñas se almacenan en texto plano únicamente con fines académicos y simplificación del proyecto.

En un entorno de producción real deberían almacenarse utilizando funciones de hash seguras como `password_hash()` y validarse con `password_verify()`.

---

## Autor

Agustin Stele
