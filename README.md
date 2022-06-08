<p align="center">
  <img src="public/img/escuela.jpg" alt="Logo" width="500" height="200">

  <h2 align="center">Escuela de Desarrolladores Junior Evertec</h2>

  <p align="center">Alejandro Castrillón Ciro- Aplicación: Mercatodo</p>
</p>



<!-- TABLE OF CONTENTS -->
## Tabla de contenido

* [Sobre el proyecto](#sobre-el-proyecto)
* [Construido con](#construido-con)
* [Prerequisitos](#prerequisitos)
* [Instalación](#instalación)
* [Usuario SuperAdmin](#guia)


<!-- ABOUT THE PROJECT -->
## Sobre el proyecto

En este repositorio se encuentra el código fuente del proyecto correspondiente a la 
aplicación Mercatodo de la ESCUELA DE DESARROLLADORES JUNIOR .

### Construido con
* [Laravel](https://laravel.com)
* [VueJS](https://vuejs.org/)   

### Prerequisitos

* [MySQL](https://www.mysql.com/)
* [PHP](https://www.php.net/)
* [phpMyAdmin](https://www.phpmyadmin.net/) (opcional)
* [Node.js](https://nodejs.org/es/)
* [Composer](https://getcomposer.org/)

### Instalación

1. Clonar el repositorio
```bash
git clone https://github.com/alejociro/mercatodo.git
```

2. Instalar dependencias del backend:
```bash
$ composer install
```
3. Generar archivo .env para configuración de las variables de entorno:
```bash
$ cp .env.example .env
```

>Ahora debemos configurar la base de datos en phpMyAdmin y en las variables de entorno que se encuentran en el archivo .env generado anteriormente. En este archivo también debemos configurar las credenciales de Mailtrap para probar la funcionalidad de verificación dle email del usuario.

4. Generar la llave de la aplicación:
```bash
$ php artisan key:generate
```

5. Migraciones y alimentación de la base de datos:
```bash
$ php artisan migrate --seed
```
6. Dependencias del frontend y construcción de assets:
```bash
$ npm install
$ npm run dev
```
- Despliegue:  
```bash
$ php artisan serve
```
- Ahora puedes ver el despliegue en la url: http://localhost:8000/

```bash
$ php artisan queue:work
```
### Servicios externos

Para crear el usuario administrador lo puedes registrar con el siguiente correo o establecer uno nuevo en el .env.example

```bash
User::factory()->create([
    'email' => 'mercatodo@mercatodo.com',
]);
    
